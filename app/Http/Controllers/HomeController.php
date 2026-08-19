<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $latestNews = NewsPost::query()
            ->published()
            ->with('author')
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view('public.home.index', compact('latestNews'));
    }
}
