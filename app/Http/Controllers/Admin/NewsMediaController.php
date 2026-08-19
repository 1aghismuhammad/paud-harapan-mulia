<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UploadNewsMediaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class NewsMediaController extends Controller
{
    public function __invoke(UploadNewsMediaRequest $request): JsonResponse
    {
        $path = $request->file('image')->store('news/content', 'public');

        return response()->json([
            'path' => $path,
            'url' => Storage::disk('public')->url($path),
        ], 201);
    }
}
