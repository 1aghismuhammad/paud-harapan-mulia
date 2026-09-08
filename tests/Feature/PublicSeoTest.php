<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

/**
 * @return array{0: list<string>, 1: list<string>, 2: list<string>}
 */
function publicSeoMetaValues(string $html): array
{
    preg_match_all('/<meta property="og:type" content="([^"]+)">/', $html, $ogTypes);
    preg_match_all('/<meta property="og:image" content="([^"]+)">/', $html, $ogImages);
    preg_match_all('/<meta name="twitter:image" content="([^"]+)">/', $html, $twitterImages);

    return [$ogTypes[1], $ogImages[1], $twitterImages[1]];
}

it('includes canonical open graph twitter and organization schema on public pages', function (string $uri): void {
    $html = get($uri)
        ->assertOk()
        ->assertSee('<link rel="canonical"', false)
        ->assertSee('property="og:site_name"', false)
        ->assertSee('name="twitter:card"', false)
        ->assertSee('application/ld+json', false)
        ->assertSee('EducationalOrganization', false)
        ->assertSee('PAUD Islam Terpadu Harapan Mulia', false)
        ->assertDontSee(route('admin.login'), false)
        ->getContent();

    [$ogTypes, $ogImages, $twitterImages] = publicSeoMetaValues($html);

    expect($ogTypes)->toBe(['website'])
        ->and($ogImages)->toHaveCount(1)
        ->and($ogImages[0])->toContain('logo-official.webp')
        ->and($twitterImages)->toBe($ogImages);
})->with([
    '/',
    '/tentang-kami/sejarah',
    '/tentang-kami/visi-misi',
    '/tentang-kami/fasilitas',
    '/sekolah-kami',
    '/sekolah/paud',
    '/sekolah/tk',
    '/berita',
]);

it('uses a consistent document title on the Sekolah Kami and legacy PAUD and TK pages', function (): void {
    $this->get(route('school.index'))
        ->assertOk()
        ->assertSee('<title>Sekolah Kami — PAUD Harapan Mulia</title>', false)
        ->assertSee('<link rel="canonical" href="'.route('school.index').'"', false)
        ->assertSee('property="og:url"', false)
        ->assertSee('PAUD dan TK Islam Terpadu Harapan Mulia di Ngawen, Blora', false);

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

    $html = $this->get(route('news.show', ['newsPost' => $post->slug]))
        ->assertOk()
        ->assertSee('<link rel="canonical"', false)
        ->assertSee('Market Day PAUD IT Harapan Mulia')
        ->assertSee('Kegiatan Market Day peserta didik PAUD IT Harapan Mulia.')
        ->assertSee('"@type":"NewsArticle"', false)
        ->assertSee('Admin PAUD')
        ->getContent();

    [$ogTypes, $ogImages, $twitterImages] = publicSeoMetaValues($html);

    expect($ogTypes)->toBe(['article'])
        ->and($ogImages)->toHaveCount(1)
        ->and($ogImages[0])->toContain('logo-official.webp')
        ->and($twitterImages)->toBe($ogImages);
});

it('uses the featured image once for news detail open graph and twitter image', function (): void {
    Storage::fake('public');
    Storage::disk('public')->put('news/featured.jpg', 'image-content');

    $admin = User::factory()->create(['name' => 'Admin PAUD']);
    $post = NewsPost::factory()->published()->create([
        'user_id' => $admin->id,
        'title' => 'Market Day Harapan Mulia',
        'slug' => 'market-day-harapan-mulia',
        'featured_image' => 'news/featured.jpg',
        'meta_title' => 'Market Day PAUD IT Harapan Mulia',
        'meta_description' => 'Kegiatan Market Day peserta didik PAUD IT Harapan Mulia.',
    ]);

    $featuredUrl = url(Storage::disk('public')->url('news/featured.jpg'));
    $html = $this->get(route('news.show', ['newsPost' => $post->slug]))
        ->assertOk()
        ->assertSee('"@type":"NewsArticle"', false)
        ->getContent();

    [$ogTypes, $ogImages, $twitterImages] = publicSeoMetaValues($html);

    expect($ogTypes)->toBe(['article'])
        ->and($ogImages)->toBe([$featuredUrl])
        ->and($twitterImages)->toBe([$featuredUrl])
        ->and($ogImages[0])->not->toContain('logo-official.webp');
});

it('uses h2 for first about-page content sections and omits empty page-title markup', function (): void {
    $facilities = get('/tentang-kami/fasilitas')->assertOk()->getContent();

    expect($facilities)
        ->toMatch('/<h2[^>]*id="facility-section-0"[^>]*>\s*Ruang &amp; Sarana Belajar\s*<\/h2>/')
        ->toMatch('/<h2[^>]*id="parenting-section"[^>]*>\s*Program Parenting &amp; Kolaborasi Keluarga\s*<\/h2>/')
        ->toMatch('/<h3[^>]*id="parenting-program-0"[^>]*>\s*Kajian Sinergi Keluarga\s*<\/h3>/');

    $history = get('/tentang-kami/sejarah')->assertOk()->getContent();

    expect($history)
        ->toContain('>Tujuan Penyelenggaraan Sekolah</h2>')
        ->toContain('>Keunggulan</h2>')
        ->not->toContain('>Tujuan Penyelenggaraan Sekolah</h3>')
        ->not->toContain('>Keunggulan</h3>');

    $vision = get('/tentang-kami/visi-misi')->assertOk()->getContent();

    expect($vision)
        ->toContain('>Visi</h2>')
        ->toContain('>Misi</h2>')
        ->toContain('>Tujuan</h2>')
        ->not->toContain('class="page-title')
        ->not->toContain('>Visi</h3>');
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
        ->assertSee(route('school.index'), false)
        ->assertSee(route('news.index'), false)
        ->assertSee(route('news.show', ['newsPost' => $published->slug]), false)
        ->assertDontSee(route('school.paud'), false)
        ->assertDontSee(route('school.tk'), false)
        ->assertDontSee('draft-sitemap', false)
        ->assertDontSee('jadwal-sitemap', false)
        ->assertDontSee('/admin', false)
        ->assertDontSee(url('/up'), false);

    Carbon::setTestNow();
});
