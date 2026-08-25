<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('includes canonical open graph twitter and organization schema on public pages', function (string $uri): void {
    get($uri)
        ->assertOk()
        ->assertSee('<link rel="canonical"', false)
        ->assertSee('property="og:type"', false)
        ->assertSee('content="website"', false)
        ->assertSee('property="og:site_name"', false)
        ->assertSee('name="twitter:card"', false)
        ->assertSee('application/ld+json', false)
        ->assertSee('EducationalOrganization', false)
        ->assertSee('PAUD Islam Terpadu Harapan Mulia', false)
        ->assertDontSee(route('admin.login'), false);
})->with([
    '/',
    '/tentang-kami/sejarah',
    '/tentang-kami/visi-misi',
    '/tentang-kami/fasilitas',
    '/sekolah/paud',
    '/sekolah/tk',
    '/berita',
]);

it('uses a consistent document title on the PAUD and TK pages', function (): void {
    $this->get(route('school.paud'))
        ->assertOk()
        ->assertSee('<title>PAUD — PAUD Harapan Mulia</title>', false);

    $this->get(route('school.tk'))
        ->assertOk()
        ->assertSee('<title>TK — PAUD Harapan Mulia</title>', false);
});

it('marks a published news detail as an article with news schema', function (): void {
    $admin = User::factory()->create(['name' => 'Admin PAUD']);
    $post = NewsPost::factory()->published()->create([
        'user_id' => $admin->id,
        'title' => 'Market Day Harapan Mulia',
        'slug' => 'market-day-harapan-mulia',
        'meta_title' => 'Market Day PAUD IT Harapan Mulia',
        'meta_description' => 'Kegiatan Market Day peserta didik PAUD IT Harapan Mulia.',
    ]);

    $this->get(route('news.show', ['newsPost' => $post->slug]))
        ->assertOk()
        ->assertSee('<link rel="canonical"', false)
        ->assertSee('content="article"', false)
        ->assertSee('Market Day PAUD IT Harapan Mulia')
        ->assertSee('Kegiatan Market Day peserta didik PAUD IT Harapan Mulia.')
        ->assertSee('"@type":"NewsArticle"', false)
        ->assertSee('Admin PAUD');
});

it('serves a sitemap of public pages and currently published news only', function (): void {
    Carbon::setTestNow('2026-08-19 10:00:00');
    $admin = User::factory()->create();

    $published = NewsPost::factory()->published()->create([
        'user_id' => $admin->id,
        'title' => 'Berita Terbit Sitemap',
        'slug' => 'berita-terbit-sitemap',
        'published_at' => now()->subHour(),
    ]);

    NewsPost::factory()->draft()->create([
        'user_id' => $admin->id,
        'title' => 'Draft Sitemap',
        'slug' => 'draft-sitemap',
    ]);

    NewsPost::factory()->create([
        'user_id' => $admin->id,
        'title' => 'Jadwal Sitemap',
        'slug' => 'jadwal-sitemap',
        'status' => NewsPost::STATUS_PUBLISHED,
        'published_at' => now()->addHour(),
    ]);

    $response = $this->get(route('sitemap'));

    $response->assertOk()
        ->assertHeader('Content-Type', 'application/xml')
        ->assertSee(route('home'), false)
        ->assertSee(route('about.history'), false)
        ->assertSee(route('news.index'), false)
        ->assertSee(route('news.show', ['newsPost' => $published->slug]), false)
        ->assertDontSee('draft-sitemap', false)
        ->assertDontSee('jadwal-sitemap', false)
        ->assertDontSee('/admin', false)
        ->assertDontSee(url('/up'), false);

    Carbon::setTestNow();
});
