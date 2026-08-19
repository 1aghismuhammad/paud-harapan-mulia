<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

it('protects all news management routes from guests', function (): void {
    $post = NewsPost::factory()->create();

    $this->get('/admin/berita')->assertRedirect(route('admin.login'));
    $this->get('/admin/berita/tambah')->assertRedirect(route('admin.login'));
    $this->post('/admin/berita', [])->assertRedirect(route('admin.login'));
    $this->get("/admin/berita/{$post->id}/edit")->assertRedirect(route('admin.login'));
    $this->put("/admin/berita/{$post->id}", [])->assertRedirect(route('admin.login'));
    $this->delete("/admin/berita/{$post->id}")->assertRedirect(route('admin.login'));
});

it('shows the news index and create form to an authenticated admin', function (): void {
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->get(route('admin.news.index'))
        ->assertOk()
        ->assertSee('Kelola Berita')
        ->assertSee('Tambah Berita');

    $this->actingAs($admin)
        ->get(route('admin.news.create'))
        ->assertOk()
        ->assertSee('Judul')
        ->assertSee('Isi Berita')
        ->assertSee('Ringkasan / Excerpt')
        ->assertSee('Tags')
        ->assertSee('Tanggal Publish');
});

it('creates a draft with automatic author slug and normalized tags', function (): void {
    $admin = User::factory()->create();

    $response = $this->actingAs($admin)->post(route('admin.news.store'), [
        'title' => 'Kegiatan Market Day',
        'excerpt' => '',
        'content' => 'Isi berita kegiatan Market Day PAUD IT Harapan Mulia.',
        'status' => NewsPost::STATUS_DRAFT,
        'published_at' => now()->format('Y-m-d H:i:s'),
        'tags' => 'Market Day, TK, market day, Parenting',
        'meta_title' => '',
        'meta_description' => '',
    ]);

    $post = NewsPost::query()->sole();

    $response->assertRedirect(route('admin.news.edit', $post));

    expect($post->user_id)->toBe($admin->id)
        ->and($post->slug)->toBe('kegiatan-market-day')
        ->and($post->status)->toBe(NewsPost::STATUS_DRAFT)
        ->and($post->published_at)->toBeNull()
        ->and($post->excerpt)->toBeNull()
        ->and($post->tags)->toBe(['Market Day', 'TK', 'Parenting']);
});

it('creates unique slugs when multiple news posts use the same title', function (): void {
    $admin = User::factory()->create();

    foreach (range(1, 3) as $iteration) {
        $this->actingAs($admin)->post(route('admin.news.store'), [
            'title' => 'Market Day',
            'content' => "Isi berita ke {$iteration}.",
            'status' => NewsPost::STATUS_DRAFT,
        ])->assertSessionHasNoErrors();
    }

    expect(NewsPost::query()->orderBy('id')->pluck('slug')->all())
        ->toBe(['market-day', 'market-day-2', 'market-day-3']);
});

it('publishes using the chosen date and keeps future publications out of the public scope', function (): void {
    Carbon::setTestNow('2026-08-19 08:00:00');
    $admin = User::factory()->create();

    $this->actingAs($admin)->post(route('admin.news.store'), [
        'title' => 'Berita Hari Ini',
        'content' => 'Berita yang diterbitkan saat ini.',
        'status' => NewsPost::STATUS_PUBLISHED,
        'published_at' => '2026-08-19 08:00:00',
    ])->assertSessionHasNoErrors();

    $this->actingAs($admin)->post(route('admin.news.store'), [
        'title' => 'Berita Terjadwal',
        'content' => 'Berita yang dijadwalkan besok.',
        'status' => NewsPost::STATUS_PUBLISHED,
        'published_at' => '2026-08-20 08:00:00',
    ])->assertSessionHasNoErrors();

    expect(NewsPost::query()->published()->pluck('slug')->all())
        ->toBe(['berita-hari-ini']);

    Carbon::setTestNow();
});

it('validates the required fields and accepted status', function (): void {
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->post(route('admin.news.store'), [
            'title' => '',
            'content' => '',
            'status' => 'archived',
        ])
        ->assertSessionHasErrors(['title', 'content', 'status']);
});

it('updates a news post and regenerates its slug without losing its author', function (): void {
    $admin = User::factory()->create();
    $post = NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'title' => 'Judul Lama',
        'slug' => 'judul-lama',
    ]);

    $this->actingAs($admin)
        ->put(route('admin.news.update', $post), [
            'title' => 'Judul Baru',
            'excerpt' => 'Ringkasan baru.',
            'content' => 'Isi berita yang telah diperbarui.',
            'status' => NewsPost::STATUS_PUBLISHED,
            'published_at' => '2026-08-19 09:00:00',
            'tags' => 'Prestasi, Sekolah',
            'meta_title' => 'Judul Baru - PAUD IT Harapan Mulia',
            'meta_description' => 'Deskripsi berita baru.',
        ])
        ->assertRedirect(route('admin.news.edit', $post));

    $post->refresh();

    expect($post->title)->toBe('Judul Baru')
        ->and($post->slug)->toBe('judul-baru')
        ->and($post->user_id)->toBe($admin->id)
        ->and($post->status)->toBe(NewsPost::STATUS_PUBLISHED)
        ->and($post->tags)->toBe(['Prestasi', 'Sekolah']);
});

it('deletes a news post from the admin module', function (): void {
    $admin = User::factory()->create();
    $post = NewsPost::factory()->create(['user_id' => $admin->id]);

    $this->actingAs($admin)
        ->delete(route('admin.news.destroy', $post))
        ->assertRedirect(route('admin.news.index'));

    $this->assertDatabaseMissing('news_posts', ['id' => $post->id]);
});

it('adds the nullable tags column without changing the phase 3c fields', function (): void {
    expect(Schema::hasColumn('news_posts', 'tags'))->toBeTrue();
});
