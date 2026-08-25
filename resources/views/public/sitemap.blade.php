{!! '<' . '?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($staticUrls as $loc)
    <url>
        <loc>{{ $loc }}</loc>
    </url>
@endforeach
@foreach ($newsPosts as $newsPost)
    <url>
        <loc>{{ route('news.show', ['newsPost' => $newsPost->slug]) }}</loc>
        <lastmod>{{ $newsPost->updated_at->toAtomString() }}</lastmod>
    </url>
@endforeach
</urlset>
@php
    // #region agent log
    $src = file_get_contents(base_path('resources/views/public/sitemap.blade.php'));
    $xmlPi = '<'.'?xml';
    $parseError = null;
    try {
        token_get_all($src, TOKEN_PARSE);
    } catch (\ParseError $e) {
        $parseError = $e->getMessage();
    }
    $compiled = file_get_contents(__FILE__);
    $compiledParseError = null;
    try {
        token_get_all($compiled, TOKEN_PARSE);
    } catch (\ParseError $e) {
        $compiledParseError = $e->getMessage();
    }
    file_put_contents(base_path('debug-b53639.log'), json_encode([
        'sessionId' => 'b53639',
        'runId' => 'pre-fix',
        'hypothesisId' => 'A',
        'location' => 'resources/views/public/sitemap.blade.php',
        'message' => 'PHP TOKEN_PARSE of sitemap blade source vs compiled view',
        'data' => [
            'containsXmlProcessingInstruction' => str_contains($src, $xmlPi),
            'line1StartsWithBladeEcho' => str_starts_with($src, '{!!'),
            'sourceParseError' => $parseError,
            'compiledParseError' => $compiledParseError,
            'compiledFile' => basename(__FILE__),
            'shortOpenTag' => ini_get('short_open_tag'),
            'outputPrefix' => substr((string) ob_get_contents(), 0, 45),
        ],
        'timestamp' => (int) round(microtime(true) * 1000),
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES).PHP_EOL, FILE_APPEND);
    // #endregion
@endphp
