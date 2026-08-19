@extends('layouts.public')

@section('title', 'Berita — PAUD Harapan Mulia')
@section('meta_description', 'Berita dan artikel terbaru PAUD Islam Terpadu Harapan Mulia.')

@section('content')
    <section class="pt-20 pb-24 md:pt-24 md:pb-28 lg:pt-28 lg:pb-32">
        <div class="content-container">
            <div class="text-center">
                <p class="eyebrow">Berita & Artikel</p>
                <h1 class="mt-3 text-[36px] font-semibold tracking-[-0.04em] text-site-text md:text-[44px]">Berita Terbaru</h1>
                <p class="mx-auto mt-4 max-w-[680px] text-[13px] leading-7 text-site-muted">
                    Informasi kegiatan, program, dan kabar terbaru dari PAUD IT Harapan Mulia.
                </p>
            </div>

            @if ($newsPosts->isNotEmpty())
                <div class="mt-12 grid gap-7 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($newsPosts as $newsPost)
                        @php
                            $plainExcerpt = trim((string) $newsPost->excerpt) ?: \Illuminate\Support\Str::limit(
                                trim(preg_replace('/\s+/', ' ', strip_tags($newsPost->content)) ?? ''),
                                155,
                                '…'
                            );
                            $imageUrl = $newsPost->featured_image
                                ? \Illuminate\Support\Facades\Storage::disk('public')->url($newsPost->featured_image)
                                : null;
                        @endphp

                        <x-site.news-card
                            :image="$imageUrl"
                            :date="$newsPost->published_at?->format('d M Y') ?? '—'"
                            :title="$newsPost->title"
                            :excerpt="$plainExcerpt"
                            :author="$newsPost->author?->name"
                            :url="route('news.show', ['newsPost' => $newsPost->slug])"
                        />
                    @endforeach
                </div>

                @if ($newsPosts->hasPages())
                    <div class="mt-12">{{ $newsPosts->links() }}</div>
                @endif
            @else
                <div class="mx-auto mt-12 max-w-[720px] rounded-[8px] border border-site-border bg-[#f8faf7] px-6 py-12 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#edf5ea] text-brand-green-900">◷</div>
                    <h2 class="mt-4 text-[18px] font-semibold text-site-text">Belum ada berita yang dipublikasikan</h2>
                    <p class="mt-2 text-[12px] leading-6 text-site-muted">Silakan kembali lagi untuk melihat kabar terbaru dari sekolah.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
