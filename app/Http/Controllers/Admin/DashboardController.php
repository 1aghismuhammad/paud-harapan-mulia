<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'total' => NewsPost::query()->count(),
            'published' => NewsPost::query()->where('status', NewsPost::STATUS_PUBLISHED)->count(),
            'draft' => NewsPost::query()->where('status', NewsPost::STATUS_DRAFT)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
