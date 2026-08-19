<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('redirects guests away from the admin dashboard', function (): void {
    $this->get('/admin')
        ->assertRedirect(route('admin.login'));
});

it('shows the dashboard to an authenticated admin', function (): void {
    $user = User::factory()->create([
        'name' => 'Admin PAUD Harapan Mulia',
        'email' => 'admin@example.com',
    ]);

    $this->actingAs($user)
        ->get('/admin')
        ->assertOk()
        ->assertSee('Dashboard')
        ->assertSee('Admin PAUD Harapan Mulia')
        ->assertSee('admin@example.com')
        ->assertSee('Ringkasan Konten')
        ->assertSee('Total Berita')
        ->assertSee('Published')
        ->assertSee('Draft');
});

it('shows database backed news statistics', function (): void {
    $user = User::factory()->create();

    NewsPost::factory()->count(2)->published()->create(['user_id' => $user->id]);
    NewsPost::factory()->count(3)->draft()->create(['user_id' => $user->id]);

    $this->actingAs($user)
        ->get('/admin')
        ->assertOk()
        ->assertViewHas('stats', [
            'total' => 5,
            'published' => 2,
            'draft' => 3,
        ])
        ->assertSee('data-stat="total">5</p>', false)
        ->assertSee('data-stat="published">2</p>', false)
        ->assertSee('data-stat="draft">3</p>', false);
});

it('shows safe dashboard actions without exposing an unfinished news route', function (): void {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin')
        ->assertOk()
        ->assertSee('Lihat Website')
        ->assertSee('Keluar')
        ->assertSee('Kelola Berita — Phase 3D')
        ->assertDontSee('href="/admin/berita"', false);
});
