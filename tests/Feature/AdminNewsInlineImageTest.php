<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

function fakeInlineNewsPng(string $name = 'inline.png', int $extraBytes = 0): UploadedFile
{
    $png = base64_decode(
        'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAusB9Y9ZqWQAAAAASUVORK5CYII=',
        true,
    );

    return UploadedFile::fake()
        ->createWithContent($name, ($png ?: '').str_repeat('0', $extraBytes))
        ->mimeType('image/png');
}

it('protects the inline news media upload route from guests', function (): void {
    $this->post(route('admin.news.media.store'), [
        'image' => fakeInlineNewsPng(),
    ])->assertRedirect(route('admin.login'));
});

it('stores an authenticated inline image in the managed news content folder', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();

    $response = $this->actingAs($admin)
        ->postJson(route('admin.news.media.store'), [
            'image' => fakeInlineNewsPng(),
        ])
        ->assertCreated()
        ->assertJsonStructure(['path', 'url']);

    $path = $response->json('path');

    expect($path)->toStartWith('news/content/');
    Storage::disk('public')->assertExists($path);
});

it('rejects non image files from the inline media endpoint', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->postJson(route('admin.news.media.store'), [
            'image' => UploadedFile::fake()->create('payload.txt', 20, 'text/plain'),
        ])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['image']);

    expect(Storage::disk('public')->allFiles('news/content'))->toBe([]);
});

it('rejects inline images larger than five megabytes', function (): void {
    Storage::fake('public');
    $admin = User::factory()->create();

    $this->actingAs($admin)
        ->postJson(route('admin.news.media.store'), [
            'image' => fakeInlineNewsPng('large.png', 6 * 1024 * 1024),
        ])
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['image']);
});
