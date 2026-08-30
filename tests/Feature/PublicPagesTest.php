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
