<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('uses Asia/Jakarta as the application timezone', function (): void {
    expect(config('app.timezone'))->toBe('Asia/Jakarta');
});

it('does not force HTTPS outside production', function (): void {
    expect(app()->isProduction())->toBeFalse();
    expect(url('/'))->toStartWith('http://');
});

it('adds lightweight security headers to public responses', function (): void {
    $this->get('/')
        ->assertOk()
        ->assertHeader('X-Content-Type-Options', 'nosniff')
        ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
        ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
});

it('adds lightweight security headers to the admin login page', function (): void {
    $this->get(route('admin.login'))
        ->assertOk()
        ->assertHeader('X-Content-Type-Options', 'nosniff')
        ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
        ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
});

it('disallows admin and health paths in robots.txt', function (): void {
    $robots = file_get_contents(public_path('robots.txt'));

    expect($robots)->not->toBeFalse()
        ->and($robots)->toContain('User-agent: *')
        ->and($robots)->toContain('Allow: /')
        ->and($robots)->toContain('Disallow: /admin')
        ->and($robots)->toContain('Disallow: /up');
});
