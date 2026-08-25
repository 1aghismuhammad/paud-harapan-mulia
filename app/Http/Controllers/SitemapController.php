<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $staticUrls = [
            route('home'),
            route('about.history'),
            route('about.vision-mission'),
            route('about.facilities'),
            route('school.paud'),
            route('school.tk'),
            route('news.index'),
        ];

        $newsPosts = NewsPost::query()
            ->published()
            ->orderByDesc('published_at')
            ->get(['slug', 'updated_at']);

        return response()
            ->view('public.sitemap', compact('staticUrls', 'newsPosts'))
            ->header('Content-Type', 'application/xml');
    }
}
