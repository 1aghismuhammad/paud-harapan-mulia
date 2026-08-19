<?php

use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

it('creates the news posts table with the required phase 3c columns', function (): void {
    expect(Schema::hasColumns('news_posts', [
        'id',
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'created_at',
        'updated_at',
    ]))->toBeTrue();
});

it('creates draft news posts with an admin author relation', function (): void {
    $admin = User::factory()->create();

    $post = NewsPost::factory()->create([
        'user_id' => $admin->id,
    ]);

    expect($post->status)->toBe(NewsPost::STATUS_DRAFT)
        ->and($post->published_at)->toBeNull()
        ->and($post->author->is($admin))->toBeTrue()
        ->and($admin->newsPosts()->whereKey($post->id)->exists())->toBeTrue();
});

it('requires unique news slugs', function (): void {
    NewsPost::factory()->create(['slug' => 'berita-sekolah']);

    expect(fn () => NewsPost::factory()->create(['slug' => 'berita-sekolah']))
        ->toThrow(QueryException::class);
});

it('returns only currently published posts from the published scope', function (): void {
    $current = NewsPost::factory()->published()->create([
        'slug' => 'published-current',
        'published_at' => now()->subMinute(),
    ]);

    NewsPost::factory()->draft()->create([
        'slug' => 'draft-post',
    ]);

    NewsPost::factory()->create([
        'slug' => 'published-future',
        'status' => NewsPost::STATUS_PUBLISHED,
        'published_at' => now()->addDay(),
    ]);

    expect(NewsPost::query()->published()->pluck('id')->all())
        ->toBe([$current->id]);
});

it('keeps news posts when an admin account is deleted', function (): void {
    $admin = User::factory()->create();
    $post = NewsPost::factory()->create(['user_id' => $admin->id]);

    $admin->delete();
    $post->refresh();

    expect($post->exists)->toBeTrue()
        ->and($post->user_id)->toBeNull()
        ->and($post->author)->toBeNull();
});
