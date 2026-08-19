<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Support\NewsContentSanitizer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class PublicNewsController extends Controller
{
    public function index(): View
    {
        $newsPosts = NewsPost::query()
            ->published()
            ->with('author')
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('public.news.index', compact('newsPosts'));
    }

    public function show(NewsPost $newsPost, NewsContentSanitizer $sanitizer): View
    {
        abort_unless($newsPost->isPublished(), 404);

        $newsPost->loadMissing('author');

        $safeContent = $sanitizer->sanitize($newsPost->content);
        $plainContent = trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($safeContent), ENT_QUOTES | ENT_HTML5, 'UTF-8')) ?? '');
        $metaDescription = trim((string) $newsPost->meta_description)
            ?: trim((string) $newsPost->excerpt)
            ?: Str::limit($plainContent, 155, '…');

        return view('public.news.show', compact('newsPost', 'safeContent', 'metaDescription'));
    }
}
