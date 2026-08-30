<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Contracts\View\View;

class SchoolController extends Controller
{
    private function latestNews(): array
    {
        return [
            'latestNews' => NewsPost::query()
                ->published()
                ->with('author')
                ->orderByDesc('published_at')
                ->limit(3)
                ->get(),
        ];
    }

    public function index(): View
    {
        return view('public.school.index', $this->latestNews());
    }

    public function paud(): View
    {
        return view('public.school.paud', $this->latestNews());
    }

    public function tk(): View
    {
        return view('public.school.tk', $this->latestNews());
    }
}
