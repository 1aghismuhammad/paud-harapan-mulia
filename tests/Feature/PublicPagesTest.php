<?php

use function Pest\Laravel\get;

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
