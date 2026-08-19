<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows the phase 3f rich text editor on the news form', function (): void {
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->get(route('admin.news.create'))
        ->assertOk()
        ->assertSee('Rich Text Aktif')
        ->assertSee('data-news-editor', false)
        ->assertSee('data-editor-image', false)
        ->assertSee(route('admin.news.media.store'), false);
});

it('keeps allowed rich text and strips dangerous html before storing', function (): void {
    $admin = User::factory()->create();

    $content = <<<'HTML'
<h2 onclick="alert(1)">Kegiatan Sekolah</h2>
<p><strong>Tebal</strong> dan <em>miring</em>.</p>
<script>alert('xss')</script>
<iframe src="https://example.com"></iframe>
<p><a href="javascript:alert(1)" onclick="alert(2)">Tautan berbahaya</a></p>
<p><a href="https://example.com" style="color:red">Tautan aman</a></p>
HTML;

    $this->actingAs($admin)
        ->post(route('admin.news.store'), [
            'title' => 'Berita Rich Text',
            'content' => $content,
            'status' => NewsPost::STATUS_DRAFT,
        ])
        ->assertSessionHasNoErrors();

    $stored = NewsPost::query()->sole()->content;

    expect($stored)
        ->toContain('<h2>Kegiatan Sekolah</h2>')
        ->toContain('<strong>Tebal</strong>')
        ->toContain('<em>miring</em>')
        ->toContain('href="https://example.com"')
        ->not->toContain('<script')
        ->not->toContain('<iframe')
        ->not->toContain('onclick=')
        ->not->toContain('javascript:')
        ->not->toContain('style=');
});

it('allows only inline images served from the managed news content folder', function (): void {
    $admin = User::factory()->create();

    $content = <<<'HTML'
<p>Dokumentasi kegiatan.</p>
<figure><img src="http://localhost:8000/storage/news/content/foto-aman.png" onerror="alert(1)"><figcaption>Foto kegiatan</figcaption></figure>
<img src="https://tracker.example/image.png" alt="remote">
HTML;

    $this->actingAs($admin)
        ->post(route('admin.news.store'), [
            'title' => 'Berita Dengan Inline Image',
            'content' => $content,
            'status' => NewsPost::STATUS_DRAFT,
        ])
        ->assertSessionHasNoErrors();

    $stored = NewsPost::query()->sole()->content;

    expect($stored)
        ->toContain('src="/storage/news/content/foto-aman.png"')
        ->toContain('<figcaption>Foto kegiatan</figcaption>')
        ->toContain('loading="lazy"')
        ->not->toContain('onerror=')
        ->not->toContain('tracker.example');
});

it('rejects news content that becomes empty after sanitization', function (): void {
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->post(route('admin.news.store'), [
            'title' => 'Konten Tidak Aman',
            'content' => '<script>alert(1)</script><iframe src="https://example.com"></iframe>',
            'status' => NewsPost::STATUS_DRAFT,
        ])
        ->assertSessionHasErrors(['content']);

    expect(NewsPost::query()->count())->toBe(0);
});

it('sanitizes rich text again when a news post is updated', function (): void {
    $admin = User::factory()->create();
    $post = NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'content' => '<p>Konten lama.</p>',
    ]);

    $this->actingAs($admin)
        ->put(route('admin.news.update', $post), [
            'title' => 'Konten Diperbarui',
            'content' => '<h3>Subjudul</h3><p onmouseover="alert(1)">Isi baru.</p><object>bahaya</object>',
            'status' => NewsPost::STATUS_DRAFT,
        ])
        ->assertSessionHasNoErrors();

    $stored = $post->fresh()->content;

    expect($stored)
        ->toContain('<h3>Subjudul</h3>')
        ->toContain('<p>Isi baru.</p>')
        ->not->toContain('onmouseover')
        ->not->toContain('<object');
});
