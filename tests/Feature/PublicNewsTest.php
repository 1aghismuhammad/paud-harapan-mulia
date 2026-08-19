<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('shows only the three latest currently published posts on the homepage', function (): void {
    Carbon::setTestNow('2026-08-19 10:00:00');
    $admin = User::factory()->create(['name' => 'Admin Sekolah']);

    foreach (range(1, 4) as $index) {
        NewsPost::factory()->published()->create([
            'user_id' => $admin->id,
            'title' => "Berita Published {$index}",
            'slug' => "berita-published-{$index}",
            'published_at' => now()->subHours(5 - $index),
        ]);
    }

    NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'title' => 'Berita Draft Rahasia',
        'slug' => 'berita-draft-rahasia',
    ]);

    NewsPost::factory()->create([
        'user_id' => $admin->id,
        'title' => 'Berita Besok',
        'slug' => 'berita-besok',
        'status' => NewsPost::STATUS_PUBLISHED,
        'published_at' => now()->addDay(),
    ]);

    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertSee('Berita Published 4')
        ->assertSee('Berita Published 3')
        ->assertSee('Berita Published 2')
        ->assertDontSee('Berita Published 1')
        ->assertDontSee('Berita Draft Rahasia')
        ->assertDontSee('Berita Besok');

    Carbon::setTestNow();
});

it('lists only currently published news and paginates the public news archive', function (): void {
    $admin = User::factory()->create();

    NewsPost::factory()->count(10)->published()->create(['user_id' => $admin->id]);
    NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'title' => 'Draft Tidak Publik',
        'slug' => 'draft-tidak-publik',
    ]);

    $this->get(route('news.index'))
        ->assertOk()
        ->assertDontSee('Draft Tidak Publik')
        ->assertSee('?page=2', false);

    $this->get(route('news.index', ['page' => 2]))
        ->assertOk();
});

it('renders a published news detail with author rich text tags featured image and seo metadata', function (): void {
    Storage::fake('public');
    Storage::disk('public')->put('news/featured.jpg', 'image-content');

    $admin = User::factory()->create(['name' => 'Admin PAUD']);
    $post = NewsPost::factory()->published()->create([
        'user_id' => $admin->id,
        'title' => 'Market Day Harapan Mulia',
        'slug' => 'market-day-harapan-mulia',
        'excerpt' => 'Ringkasan Market Day.',
        'content' => '<h2>Belajar Mandiri</h2><p>Peserta didik belajar melalui kegiatan Market Day.</p><script>alert(1)</script>',
        'featured_image' => 'news/featured.jpg',
        'tags' => ['Market Day', 'TK'],
        'meta_title' => 'Market Day PAUD IT Harapan Mulia',
        'meta_description' => 'Kegiatan Market Day peserta didik PAUD IT Harapan Mulia.',
    ]);

    $this->get(route('news.show', ['newsPost' => $post->slug]))
        ->assertOk()
        ->assertSee('Market Day Harapan Mulia')
        ->assertSee('Admin PAUD')
        ->assertSee('Belajar Mandiri')
        ->assertSee('Peserta didik belajar melalui kegiatan Market Day.')
        ->assertSee('Market Day')
        ->assertSee('TK')
        ->assertSee('Market Day PAUD IT Harapan Mulia')
        ->assertSee('Kegiatan Market Day peserta didik PAUD IT Harapan Mulia.')
        ->assertDontSee('<script>alert(1)</script>', false)
        ->assertDontSee('alert(1)');
});

it('returns 404 for draft and future scheduled news details', function (): void {
    Carbon::setTestNow('2026-08-19 10:00:00');
    $admin = User::factory()->create();

    $draft = NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'slug' => 'draft-rahasia',
    ]);

    $scheduled = NewsPost::factory()->create([
        'user_id' => $admin->id,
        'slug' => 'berita-terjadwal',
        'status' => NewsPost::STATUS_PUBLISHED,
        'published_at' => now()->addHour(),
    ]);

    $this->get(route('news.show', ['newsPost' => $draft->slug]))->assertNotFound();
    $this->get(route('news.show', ['newsPost' => $scheduled->slug]))->assertNotFound();

    Carbon::setTestNow();
});

it('falls back to article text for cards and meta description when excerpt and seo description are empty', function (): void {
    $admin = User::factory()->create();
    $post = NewsPost::factory()->published()->create([
        'user_id' => $admin->id,
        'title' => 'Berita Tanpa Ringkasan',
        'slug' => 'berita-tanpa-ringkasan',
        'excerpt' => null,
        'content' => '<p>Ini adalah isi artikel yang dipakai sebagai fallback ringkasan untuk pengunjung website.</p>',
        'meta_description' => null,
    ]);

    $this->get(route('news.index'))
        ->assertOk()
        ->assertSee('Ini adalah isi artikel yang dipakai sebagai fallback ringkasan');

    $this->get(route('news.show', ['newsPost' => $post->slug]))
        ->assertOk()
        ->assertSee('content="Ini adalah isi artikel yang dipakai sebagai fallback ringkasan untuk pengunjung website."', false);
});
