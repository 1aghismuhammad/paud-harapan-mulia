@extends('layouts.public')

@section('title', ($newsPost->meta_title ?: $newsPost->title).' — PAUD Harapan Mulia')
@section('meta_description', $metaDescription)

@push('head')
    @php
        $articleTitle = $newsPost->meta_title ?: $newsPost->title;
        $articleUrl = route('news.show', ['newsPost' => $newsPost->slug]);
        $articleImage = $newsPost->featured_image
            ? url(\Illuminate\Support\Facades\Storage::disk('public')->url($newsPost->featured_image))
            : null;
        $articleSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'NewsArticle',
            'headline' => $articleTitle,
            'description' => $metaDescription,
            'datePublished' => $newsPost->published_at?->toAtomString(),
            'dateModified' => $newsPost->updated_at?->toAtomString(),
            'mainEntityOfPage' => $articleUrl,
            'author' => [
                '@type' => 'Person',
                'name' => $newsPost->author?->name ?? 'PAUD IT Harapan Mulia',
            ],
            'publisher' => [
                '@type' => 'EducationalOrganization',
                'name' => 'PAUD IT Harapan Mulia',
            ],
        ];

        if ($articleImage !== null) {
            $articleSchema['image'] = $articleImage;
        }
    @endphp
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $articleTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $articleUrl }}">
    <meta name="twitter:title" content="{{ $articleTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    @if ($articleImage)
        <meta property="og:image" content="{{ $articleImage }}">
        <meta name="twitter:image" content="{{ $articleImage }}">
    @endif
    <script type="application/ld+json">{!! json_encode($articleSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')
    <article class="pb-24 lg:pb-32">
        <header class="border-b border-site-border bg-[#f8faf7] py-12 md:py-16 lg:py-20">
            <div class="article-container">
                <nav aria-label="Breadcrumb" class="text-[10px] font-medium text-site-muted">
                    <a href="{{ route('home') }}" class="transition hover:text-brand-green-700">Beranda</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('news.index') }}" class="transition hover:text-brand-green-700">Berita</a>
                    <span class="mx-2">/</span>
                    <span class="text-site-text">{{ \Illuminate\Support\Str::limit($newsPost->title, 55) }}</span>
                </nav>

                <div class="mt-8 max-w-[920px]">
                    <p class="eyebrow">{{ $newsPost->published_at?->format('d M Y') }}</p>
                    <h1 class="mt-4 text-[36px] leading-[1.16] font-semibold tracking-[-0.045em] text-site-text md:text-[46px] lg:text-[54px]">
                        {{ $newsPost->title }}
                    </h1>
                    <div class="mt-6 flex flex-wrap items-center gap-x-5 gap-y-2 text-[11px] text-site-muted">
                        <span>Oleh <strong class="font-semibold text-site-text">{{ $newsPost->author?->name ?? 'PAUD IT Harapan Mulia' }}</strong></span>
                        @if ($newsPost->tags)
                            <span>{{ count($newsPost->tags) }} tag</span>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <div class="article-container pt-10 md:pt-12 lg:pt-16">
            <div class="mx-auto max-w-[900px]">
                @if ($newsPost->featured_image)
                    <figure class="mb-10 md:mb-12">
                        <img
                            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($newsPost->featured_image) }}"
                            alt="{{ $newsPost->title }}"
                            class="max-h-[680px] w-full rounded-[8px] border border-site-border object-cover shadow-[0_16px_42px_rgba(17,24,39,0.07)]"
                            decoding="async"
                        >
                    </figure>
                @endif

                <div class="public-news-content">
                    {!! $safeContent !!}
                </div>

                @if ($newsPost->tags)
                    <div class="mt-12 border-t border-site-border pt-7">
                        <p class="text-[10px] font-semibold uppercase tracking-[0.14em] text-site-muted">Tags</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach ($newsPost->tags as $tag)
                                <span class="rounded-full border border-[#dfe6dc] bg-[#f6f9f5] px-3 py-1.5 text-[10px] font-medium text-brand-green-950">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="mt-12 flex flex-wrap items-center justify-between gap-4 border-t border-site-border pt-7">
                    <a href="{{ route('news.index') }}" class="inline-flex items-center gap-2 text-[11px] font-semibold text-brand-green-700 transition hover:text-brand-green-950">
                        <span aria-hidden="true">←</span> Kembali ke Berita
                    </a>
                    <span class="text-[10px] text-site-muted">Dipublikasikan {{ $newsPost->published_at?->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>
    </article>
@endsection
