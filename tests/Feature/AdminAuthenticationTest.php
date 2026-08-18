<?php

use App\Actions\Admin\AuthenticateAdmin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    RateLimiter::clear(app(AuthenticateAdmin::class)->throttleKey('admin@example.com', '127.0.0.1'));
});

it('shows the admin login page to guests', function (): void {
    $this->get('/admin/login')
        ->assertOk()
        ->assertSee('Masuk ke Dashboard');
});

it('redirects guests away from the admin dashboard', function (): void {
    $this->get('/admin')
        ->assertRedirect(route('admin.login'));
});

it('authenticates an admin with valid credentials', function (): void {
    $user = User::factory()->create([
        'email' => 'admin@example.com',
        'password' => 'password-rahasia',
    ]);

    $this->post('/admin/login', [
        'email' => 'admin@example.com',
        'password' => 'password-rahasia',
    ])->assertRedirect(route('admin.dashboard'));

    $this->assertAuthenticatedAs($user);
});

it('rejects invalid admin credentials', function (): void {
    User::factory()->create([
        'email' => 'admin@example.com',
        'password' => 'password-rahasia',
    ]);

    $this->from('/admin/login')
        ->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'salah-password',
        ])
        ->assertRedirect('/admin/login')
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

it('rate limits repeated failed login attempts', function (): void {
    User::factory()->create([
        'email' => 'admin@example.com',
        'password' => 'password-rahasia',
    ]);

    foreach (range(1, 5) as $attempt) {
        $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'salah-password',
        ])->assertSessionHasErrors('email');
    }

    $response = $this->post('/admin/login', [
        'email' => 'admin@example.com',
        'password' => 'password-rahasia',
    ]);

    $response->assertSessionHasErrors('email');
    expect(session('errors')->first('email'))->toContain('Terlalu banyak percobaan login.');

    $this->assertGuest();
});

it('logs an authenticated admin out', function (): void {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/admin/logout')
        ->assertRedirect(route('admin.login'));

    $this->assertGuest();
});

it('redirects authenticated admins away from the login page', function (): void {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/login')
        ->assertRedirect(route('admin.dashboard'));
});
