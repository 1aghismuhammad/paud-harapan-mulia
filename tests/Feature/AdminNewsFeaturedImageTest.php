<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

function fakeFeaturedPng(string $name = 'featured.png'): UploadedFile
{
    $png = base64_decode(
        'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAusB9Y9ZqWQAAAAASUVORK5CYII=',
        true,
    );

    return UploadedFile::fake()
        ->createWithContent($name, $png ?: '')
        ->mimeType('image/png');
}

it('shows the featured image upload control on the news form', function (): void {
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->get(route('admin.news.create'))
        ->assertOk()
        ->assertSee('Featured Image')
        ->assertSee('multipart/form-data', false)
        ->assertSee('name="featured_image"', false);
});

it('stores an optional featured image on the public disk', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();

    $response = $this->actingAs($admin)->post(route('admin.news.store'), [
        'title' => 'Berita Dengan Gambar',
        'content' => 'Isi berita dengan featured image.',
        'status' => NewsPost::STATUS_DRAFT,
        'featured_image' => fakeFeaturedPng(),
    ]);

    $post = NewsPost::query()->sole();

    $response->assertRedirect(route('admin.news.edit', $post));

    expect($post->featured_image)
        ->not->toBeNull()
        ->and($post->featured_image)->toStartWith('news/');

    Storage::disk('public')->assertExists($post->featured_image);
});

it('allows a news post to be saved and published without a featured image', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();

    $this->actingAs($admin)->post(route('admin.news.store'), [
        'title' => 'Berita Tanpa Gambar',
        'content' => 'Featured image bersifat opsional.',
        'status' => NewsPost::STATUS_PUBLISHED,
        'published_at' => now()->format('Y-m-d H:i:s'),
    ])->assertSessionHasNoErrors();

    expect(NewsPost::query()->sole()->featured_image)->toBeNull();
});

it('rejects non image uploads', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->post(route('admin.news.store'), [
            'title' => 'Berita Upload Tidak Valid',
            'content' => 'Isi berita.',
            'status' => NewsPost::STATUS_DRAFT,
            'featured_image' => UploadedFile::fake()->create('dokumen.txt', 20, 'text/plain'),
        ])
        ->assertSessionHasErrors(['featured_image']);

    expect(NewsPost::query()->count())->toBe(0);
});

it('replaces the previous featured image and deletes the old file', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();
    Storage::disk('public')->put('news/old.png', 'old-image');

    $post = NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'featured_image' => 'news/old.png',
    ]);

    $this->actingAs($admin)->put(route('admin.news.update', $post), [
        'title' => 'Berita Gambar Baru',
        'content' => 'Isi berita setelah gambar diganti.',
        'status' => NewsPost::STATUS_DRAFT,
        'featured_image' => fakeFeaturedPng('replacement.png'),
    ])->assertSessionHasNoErrors();

    $post->refresh();

    expect($post->featured_image)
        ->not->toBe('news/old.png')
        ->toStartWith('news/');

    Storage::disk('public')->assertMissing('news/old.png');
    Storage::disk('public')->assertExists($post->featured_image);
});

it('removes a featured image when requested from the edit form', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();
    Storage::disk('public')->put('news/remove-me.png', 'image');

    $post = NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'featured_image' => 'news/remove-me.png',
    ]);

    $this->actingAs($admin)->put(route('admin.news.update', $post), [
        'title' => $post->title,
        'content' => $post->content,
        'status' => NewsPost::STATUS_DRAFT,
        'remove_featured_image' => '1',
    ])->assertSessionHasNoErrors();

    expect($post->fresh()->featured_image)->toBeNull();
    Storage::disk('public')->assertMissing('news/remove-me.png');
});

it('deletes the featured image file when the news post is deleted', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();
    Storage::disk('public')->put('news/delete-with-post.png', 'image');

    $post = NewsPost::factory()->create([
        'user_id' => $admin->id,
        'featured_image' => 'news/delete-with-post.png',
    ]);

    $this->actingAs($admin)
        ->delete(route('admin.news.destroy', $post))
        ->assertRedirect(route('admin.news.index'));

    Storage::disk('public')->assertMissing('news/delete-with-post.png');
    $this->assertDatabaseMissing('news_posts', ['id' => $post->id]);
});
