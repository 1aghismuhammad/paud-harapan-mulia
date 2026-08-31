<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('renders the public company profile pages', function (string $uri): void {
    get($uri)->assertOk();
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

it('shows the two real parent testimonials on the homepage', function (): void {
    get('/')
        ->assertOk()
        ->assertSee('Bunda Cakrawala')
        ->assertSee('Kelas Raudhah')
        ->assertSee('images/paud/testimonials/bunda-cakrawala.png')
        ->assertSee('Orang Tua Murid')
        ->assertSee('PAUD IT Harapan Mulia')
        ->assertSee('images/paud/testimonials/orang-tua-murid.png')
        ->assertSee('Alhamdulillah, kami sangat bersyukur')
        ->assertSee('tertanam dengan sangat baik')
        ->assertSee('Kami terkesan bukan hanya dengan kegiatan belajarnya')
        ->assertSee('Para guru sangat komunikatif dan penuh perhatian')
        ->assertSee('PAUD IT Harapan Mulia Ngawen')
        ->assertDontSee('Placeholder 01')
        ->assertDontSee('Placeholder 02')
        ->assertDontSee('Placeholder 03')
        ->assertDontSee('Placeholder 04')
        ->assertDontSee('Placeholder 05')
        ->assertDontSee('Placeholder 06');
});

it('sends the homepage Profil Sekolah CTA to Sekolah Kami and omits the old showcase section', function (): void {
    get('/')
        ->assertOk()
        ->assertSee('Lihat Profil Sekolah')
        ->assertSee('href="'.route('school.index').'"', false)
        ->assertDontSee('Tumbuh, Belajar, dan Berkembang')
        ->assertDontSee('Lebih dari Sekadar Tempat Belajar')
        ->assertDontSee('Kenali Sekolah Kami');
});

it('presents Sekolah Kami as a direct primary destination without PAUD or TK submenu links', function (): void {
    get('/')
        ->assertOk()
        ->assertSee('href="'.route('school.index').'"', false)
        ->assertSee('>Sekolah Kami</a>', false)
        ->assertDontSee(route('school.paud'), false)
        ->assertDontSee(route('school.tk'), false)
        ->assertDontSee('id="mobile-school-menu"', false)
        ->assertDontSee('dropdown-item !py-[17px]">PAUD</a>', false)
        ->assertDontSee('dropdown-item !py-[17px]">TK</a>', false);
});

it('keeps legacy PAUD and TK pages available outside primary navigation', function (): void {
    get('/sekolah/paud')->assertOk();
    get('/sekolah/tk')->assertOk();
});

it('shows Fasilitas in the shared about-page hero and keeps the facilities content heading', function (): void {
    get('/tentang-kami/fasilitas')
        ->assertOk()
        ->assertSee('inner-page-hero', false)
        ->assertSee('<h1', false)
        ->assertSee('Fasilitas')
        ->assertSee('Beranda')
        ->assertSee('Ruang & Sarana Belajar');
});

it('renders the canonical Sekolah Kami page as one Harapan Mulia institution', function (): void {
    get('/sekolah-kami')
        ->assertOk()
        ->assertSee('<title>Sekolah Kami — PAUD Harapan Mulia</title>', false)
        ->assertSee('PAUD dan TK Islam Terpadu Harapan Mulia')
        ->assertSee('satu lingkungan pendidikan')
        ->assertSee('Keunggulan Sekolah')
        ->assertSee('href="'.route('school.index').'"', false);
});
