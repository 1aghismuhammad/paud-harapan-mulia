{!! '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL !!}
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
