<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Models\NewsPost;
use App\Support\NewsContentSanitizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class NewsController extends Controller
{
    public function __construct(private readonly NewsContentSanitizer $contentSanitizer)
    {
    }

    public function index(): View
    {
        $newsPosts = NewsPost::query()
            ->with('author:id,name,email')
            ->latest('updated_at')
            ->paginate(10);

        return view('admin.news.index', compact('newsPosts'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $featuredImage = $this->storeFeaturedImage($request);

        try {
            $newsPost = NewsPost::query()->create([
                'user_id' => $request->user()->id,
                'title' => $data['title'],
                'slug' => $this->uniqueSlug($data['title']),
                'excerpt' => $this->nullableText($data['excerpt'] ?? null),
                'content' => $this->sanitizeContent($data['content']),
                'featured_image' => $featuredImage,
                'status' => $data['status'],
                'published_at' => $this->resolvePublishedAt($data['status'], $data['published_at'] ?? null),
                'tags' => $this->normalizeTags($data['tags'] ?? null),
                'meta_title' => $this->nullableText($data['meta_title'] ?? null),
                'meta_description' => $this->nullableText($data['meta_description'] ?? null),
            ]);
        } catch (Throwable $exception) {
            $this->deleteFeaturedImage($featuredImage);

            throw $exception;
        }

        return redirect()
            ->route('admin.news.edit', $newsPost)
            ->with('status', $newsPost->status === NewsPost::STATUS_PUBLISHED
                ? 'Berita berhasil dipublikasikan.'
                : 'Berita berhasil disimpan sebagai draft.');
    }

    public function edit(NewsPost $newsPost): View
    {
        return view('admin.news.edit', compact('newsPost'));
    }

    public function update(UpdateNewsRequest $request, NewsPost $newsPost): RedirectResponse
    {
        $data = $request->validated();
        $previousFeaturedImage = $newsPost->featured_image;
        $uploadedFeaturedImage = $this->storeFeaturedImage($request);
        $removeFeaturedImage = $request->boolean('remove_featured_image');

        $featuredImage = $uploadedFeaturedImage
            ?? ($removeFeaturedImage ? null : $previousFeaturedImage);

        try {
            $newsPost->update([
                'title' => $data['title'],
                'slug' => $this->uniqueSlug($data['title'], $newsPost),
                'excerpt' => $this->nullableText($data['excerpt'] ?? null),
                'content' => $this->sanitizeContent($data['content']),
                'featured_image' => $featuredImage,
                'status' => $data['status'],
                'published_at' => $this->resolvePublishedAt(
                    $data['status'],
                    $data['published_at'] ?? null,
                    $newsPost->published_at,
                ),
                'tags' => $this->normalizeTags($data['tags'] ?? null),
                'meta_title' => $this->nullableText($data['meta_title'] ?? null),
                'meta_description' => $this->nullableText($data['meta_description'] ?? null),
            ]);
        } catch (Throwable $exception) {
            $this->deleteFeaturedImage($uploadedFeaturedImage);

            throw $exception;
        }

        if ($previousFeaturedImage !== null && $previousFeaturedImage !== $featuredImage) {
            $this->deleteFeaturedImage($previousFeaturedImage);
        }

        return redirect()
            ->route('admin.news.edit', $newsPost)
            ->with('status', 'Perubahan berita berhasil disimpan.');
    }

    public function destroy(NewsPost $newsPost): RedirectResponse
    {
        $title = $newsPost->title;
        $featuredImage = $newsPost->featured_image;

        $newsPost->delete();
        $this->deleteFeaturedImage($featuredImage);

        return redirect()
            ->route('admin.news.index')
            ->with('status', "Berita \"{$title}\" berhasil dihapus.");
    }

    private function storeFeaturedImage(StoreNewsRequest|UpdateNewsRequest $request): ?string
    {
        if (! $request->hasFile('featured_image')) {
            return null;
        }

        return $request->file('featured_image')->store('news', 'public');
    }

    private function deleteFeaturedImage(?string $path): void
    {
        if ($path === null || trim($path) === '') {
            return;
        }

        Storage::disk('public')->delete($path);
    }

    private function uniqueSlug(string $title, ?NewsPost $ignore = null): string
    {
        $base = Str::slug($title) ?: 'berita';
        $slug = $base;
        $suffix = 2;

        while ($this->slugExists($slug, $ignore)) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    private function slugExists(string $slug, ?NewsPost $ignore): bool
    {
        return NewsPost::query()
            ->where('slug', $slug)
            ->when($ignore, fn ($query) => $query->where('id', '!=', $ignore->getKey()))
            ->exists();
    }

    /**
     * @return array<int, string>|null
     */
    private function normalizeTags(?string $tags): ?array
    {
        if ($tags === null || trim($tags) === '') {
            return null;
        }

        $normalized = collect(explode(',', $tags))
            ->map(fn (string $tag): string => trim($tag))
            ->filter()
            ->unique(fn (string $tag): string => mb_strtolower($tag))
            ->take(10)
            ->values()
            ->all();

        return $normalized === [] ? null : $normalized;
    }

    private function resolvePublishedAt(
        string $status,
        ?string $publishedAt,
        ?Carbon $existing = null,
    ): ?Carbon {
        if ($status !== NewsPost::STATUS_PUBLISHED) {
            return null;
        }

        if ($publishedAt !== null && trim($publishedAt) !== '') {
            return Carbon::parse($publishedAt);
        }

        return $existing ?? now();
    }

    private function sanitizeContent(string $content): string
    {
        $sanitized = $this->contentSanitizer->sanitize($content);

        if (! $this->contentSanitizer->hasMeaningfulContent($sanitized)) {
            throw ValidationException::withMessages([
                'content' => 'Isi berita wajib memiliki teks atau gambar yang valid.',
            ]);
        }

        return $sanitized;
    }

    private function nullableText(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim($value);

        return $value === '' ? null : $value;
    }
}
