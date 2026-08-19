@extends('layouts.admin')

@section('title', 'Berita')

@section('content')
    <div class="mx-auto w-full max-w-[1240px]">
        @if (session('status'))
            <div class="mb-5 rounded-[12px] border border-[#cfe6cc] bg-[#f1f8ef] px-4 py-3 text-[12px] font-medium text-brand-green-950">
                {{ session('status') }}
            </div>
        @endif

        <section class="rounded-[18px] border border-site-border bg-white p-5 shadow-[0_14px_36px_rgba(29,79,48,0.06)] sm:p-6 lg:p-7">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-brand-green-600">Phase 3E</p>
                    <h2 class="mt-1.5 text-[25px] font-semibold tracking-[-0.02em] text-site-text sm:text-[30px]">Kelola Berita</h2>
                    <p class="mt-2 max-w-[680px] text-[13px] leading-6 text-site-muted">
                        Kelola berita sekolah beserta featured image opsional, status draft/published, dan jadwal publikasi.
                    </p>
                </div>

                <a href="{{ route('admin.news.create') }}" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-[10px] bg-brand-green-900 px-4 text-[12px] font-semibold text-white transition hover:bg-brand-green-950">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                    Tambah Berita
                </a>
            </div>
        </section>

        <section class="mt-5 overflow-hidden rounded-[16px] border border-site-border bg-white shadow-[0_10px_28px_rgba(29,79,48,0.05)]">
            @if ($newsPosts->isEmpty())
                <div class="px-6 py-14 text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#edf5ea] text-brand-green-900">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M6 3.75h9.25L19 7.5v12.75H6V3.75Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                            <path d="M15 3.75V7.5h4M9 11h7M9 14.5h7M9 18h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-[18px] font-semibold text-site-text">Belum ada berita</h3>
                    <p class="mt-2 text-[12px] text-site-muted">Mulai dengan membuat berita pertama untuk PAUD IT Harapan Mulia.</p>
                    <a href="{{ route('admin.news.create') }}" class="mt-5 inline-flex min-h-10 items-center rounded-[9px] border border-brand-green-900 px-4 text-[12px] font-semibold text-brand-green-950 transition hover:bg-brand-green-900 hover:text-white">
                        Tambah Berita
                    </a>
                </div>
            @else
                <div class="hidden overflow-x-auto md:block">
                    <table class="w-full min-w-[900px] border-collapse text-left">
                        <thead class="border-b border-site-border bg-[#f8faf7]">
                            <tr class="text-[10px] font-semibold uppercase tracking-[0.08em] text-[#8f949b]">
                                <th class="px-5 py-3.5">Judul</th>
                                <th class="px-4 py-3.5">Status</th>
                                <th class="px-4 py-3.5">Author</th>
                                <th class="px-4 py-3.5">Tanggal Publish</th>
                                <th class="px-4 py-3.5">Diperbarui</th>
                                <th class="px-5 py-3.5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-site-border">
                            @foreach ($newsPosts as $newsPost)
                                @php
                                    $isScheduled = $newsPost->status === \App\Models\NewsPost::STATUS_PUBLISHED
                                        && $newsPost->published_at?->isFuture();
                                    $statusLabel = $isScheduled
                                        ? 'Terjadwal'
                                        : ($newsPost->status === \App\Models\NewsPost::STATUS_PUBLISHED ? 'Published' : 'Draft');
                                    $statusClass = $isScheduled
                                        ? 'bg-amber-50 text-amber-700 border-amber-200'
                                        : ($newsPost->status === \App\Models\NewsPost::STATUS_PUBLISHED
                                            ? 'bg-[#edf5ea] text-brand-green-950 border-[#d8ead3]'
                                            : 'bg-slate-50 text-slate-600 border-slate-200');
                                @endphp
                                <tr class="align-top">
                                    <td class="px-5 py-4">
                                        <div class="flex items-start gap-3">
                                            @if ($newsPost->featured_image)
                                                <img
                                                    src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($newsPost->featured_image) }}"
                                                    alt=""
                                                    class="h-12 w-16 shrink-0 rounded-[8px] border border-site-border object-cover"
                                                >
                                            @else
                                                <div class="flex h-12 w-16 shrink-0 items-center justify-center rounded-[8px] border border-dashed border-site-border bg-[#f8faf7] text-[8px] font-semibold uppercase tracking-[0.05em] text-[#afb2b7]">No Image</div>
                                            @endif
                                            <div class="min-w-0">
                                                <a href="{{ route('admin.news.edit', $newsPost) }}" class="font-semibold text-[13px] leading-5 text-site-text hover:text-brand-green-900">
                                                    {{ $newsPost->title }}
                                                </a>
                                                <p class="mt-1 max-w-[300px] truncate text-[10px] text-[#9a9da5]">/{{ $newsPost->slug }}</p>
                                            </div>
                                        </div>
                                        @if ($newsPost->tags)
                                            <div class="mt-2 flex flex-wrap gap-1.5">
                                                @foreach (array_slice($newsPost->tags, 0, 3) as $tag)
                                                    <span class="rounded-full bg-[#f3f6f2] px-2 py-1 text-[9px] font-medium text-site-muted">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="inline-flex rounded-full border px-2.5 py-1 text-[10px] font-semibold {{ $statusClass }}">{{ $statusLabel }}</span>
                                    </td>
                                    <td class="px-4 py-4 text-[11px] text-site-muted">{{ $newsPost->author?->name ?? 'Admin dihapus' }}</td>
                                    <td class="px-4 py-4 text-[11px] text-site-muted">
                                        {{ $newsPost->published_at?->format('d M Y, H:i') ?? '—' }}
                                    </td>
                                    <td class="px-4 py-4 text-[11px] text-site-muted">{{ $newsPost->updated_at->format('d M Y, H:i') }}</td>
                                    <td class="px-5 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.news.edit', $newsPost) }}" class="inline-flex min-h-9 items-center rounded-[8px] border border-site-border px-3 text-[10px] font-semibold text-site-text transition hover:border-brand-green-600 hover:text-brand-green-950">Edit</a>
                                            <form method="POST" action="{{ route('admin.news.destroy', $newsPost) }}" onsubmit="return confirm('Hapus berita ini? Tindakan ini tidak dapat dibatalkan.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex min-h-9 items-center rounded-[8px] border border-red-200 px-3 text-[10px] font-semibold text-red-700 transition hover:bg-red-50">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="divide-y divide-site-border md:hidden">
                    @foreach ($newsPosts as $newsPost)
                        @php
                            $isScheduled = $newsPost->status === \App\Models\NewsPost::STATUS_PUBLISHED
                                && $newsPost->published_at?->isFuture();
                            $statusLabel = $isScheduled
                                ? 'Terjadwal'
                                : ($newsPost->status === \App\Models\NewsPost::STATUS_PUBLISHED ? 'Published' : 'Draft');
                        @endphp
                        <article class="p-5">
                            @if ($newsPost->featured_image)
                                <img
                                    src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($newsPost->featured_image) }}"
                                    alt=""
                                    class="mb-4 aspect-[16/8] w-full rounded-[10px] border border-site-border object-cover"
                                >
                            @endif
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <span class="inline-flex rounded-full bg-[#f3f6f2] px-2.5 py-1 text-[9px] font-semibold text-site-muted">{{ $statusLabel }}</span>
                                    <h3 class="mt-2 text-[14px] font-semibold leading-5 text-site-text">{{ $newsPost->title }}</h3>
                                </div>
                            </div>
                            <div class="mt-3 grid grid-cols-2 gap-3 text-[10px] text-site-muted">
                                <div>
                                    <span class="block text-[#a5a8ae]">Author</span>
                                    <span class="mt-1 block">{{ $newsPost->author?->name ?? 'Admin dihapus' }}</span>
                                </div>
                                <div>
                                    <span class="block text-[#a5a8ae]">Publish</span>
                                    <span class="mt-1 block">{{ $newsPost->published_at?->format('d M Y, H:i') ?? '—' }}</span>
                                </div>
                            </div>
                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('admin.news.edit', $newsPost) }}" class="inline-flex min-h-9 flex-1 items-center justify-center rounded-[8px] border border-brand-green-900 px-3 text-[10px] font-semibold text-brand-green-950">Edit</a>
                                <form method="POST" action="{{ route('admin.news.destroy', $newsPost) }}" class="flex-1" onsubmit="return confirm('Hapus berita ini? Tindakan ini tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="min-h-9 w-full rounded-[8px] border border-red-200 px-3 text-[10px] font-semibold text-red-700">Hapus</button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        @if ($newsPosts->hasPages())
            <div class="mt-5">{{ $newsPosts->links() }}</div>
        @endif
    </div>
@endsection
