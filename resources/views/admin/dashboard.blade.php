@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mx-auto w-full max-w-[1240px]">
        <section class="overflow-hidden rounded-[18px] border border-site-border bg-white shadow-[0_14px_36px_rgba(29,79,48,0.07)]">
            <div class="grid gap-6 px-6 py-7 sm:px-7 md:grid-cols-[minmax(0,1fr)_auto] md:items-center md:px-8 md:py-8">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-brand-green-600">Phase 3C</p>
                    <h2 class="mt-2 text-[26px] font-semibold leading-tight tracking-[-0.025em] text-site-text sm:text-[32px]">
                        Selamat datang, {{ auth()->user()->name }}
                    </h2>
                    <p class="mt-3 max-w-[680px] text-[13px] leading-7 text-site-muted sm:text-[14px]">
                        Dashboard admin siap digunakan sebagai pusat pengelolaan konten. Database berita sudah aktif. CRUD pengelolaan berita akan diaktifkan pada batch Phase 3D berikutnya.
                    </p>
                </div>

                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex min-h-11 w-fit items-center justify-center gap-2 rounded-[10px] border border-brand-green-900 px-4 text-[12px] font-semibold text-brand-green-950 transition hover:bg-brand-green-900 hover:text-white"
                >
                    Lihat Website
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M14 5h5v5M19 5l-7 7M10 7H5v12h12v-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </section>

        <section class="mt-6 sm:mt-7">
            <div class="flex items-end justify-between gap-4">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-brand-green-600">Ringkasan Konten</p>
                    <h2 class="mt-1.5 text-[20px] font-semibold text-site-text sm:text-[22px]">Berita Sekolah</h2>
                </div>
                <span class="rounded-full border border-site-border bg-white px-3 py-1.5 text-[10px] font-semibold text-site-muted">Database Aktif</span>
            </div>

            <div class="mt-4 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ([
                    ['label' => 'Total Berita', 'icon' => 'total', 'value' => $stats['total']],
                    ['label' => 'Published', 'icon' => 'published', 'value' => $stats['published']],
                    ['label' => 'Draft', 'icon' => 'draft', 'value' => $stats['draft']],
                ] as $stat)
                    <article class="rounded-[16px] border border-site-border bg-white p-5 shadow-[0_10px_28px_rgba(29,79,48,0.05)] sm:p-6">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[12px] font-medium text-site-muted">{{ $stat['label'] }}</p>
                                <p class="mt-3 text-[32px] font-semibold leading-none text-site-text" data-stat="{{ $stat['icon'] }}">{{ $stat['value'] }}</p>
                            </div>
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-[11px] bg-[#edf5ea] text-brand-green-900">
                                @if ($stat['icon'] === 'published')
                                    <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="m7 12 3 3 7-7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/>
                                    </svg>
                                @elseif ($stat['icon'] === 'draft')
                                    <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 19h4l9-9-4-4-9 9v4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                        <path d="m12.5 7.5 4 4" stroke="currentColor" stroke-width="1.7"/>
                                    </svg>
                                @else
                                    <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M6 3.75h9.25L19 7.5v12.75H6V3.75Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                                        <path d="M15 3.75V7.5h4M9 11h7M9 14.5h7M9 18h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                    </svg>
                                @endif
                            </span>
                        </div>
                        <p class="mt-4 text-[11px] leading-5 text-[#9a9da5]">Statistik dihitung langsung dari database berita.</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="mt-6 grid gap-4 lg:grid-cols-[minmax(0,1.4fr)_minmax(300px,0.6fr)] sm:mt-7">
            <article class="rounded-[16px] border border-site-border bg-white p-6 shadow-[0_10px_28px_rgba(29,79,48,0.05)]">
                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-brand-green-600">Pengelolaan Konten</p>
                <h2 class="mt-2 text-[20px] font-semibold text-site-text">Berita</h2>
                <p class="mt-2 max-w-[620px] text-[13px] leading-6 text-site-muted">
                    Modul berita belum diaktifkan pada Phase 3C. Database, status draft/published, dan CRUD akan dibuat pada batch berikutnya.
                </p>
                <button type="button" disabled class="mt-5 inline-flex min-h-11 cursor-not-allowed items-center rounded-[10px] bg-[#edf0ed] px-4 text-[12px] font-semibold text-[#9a9da5]">
                    Kelola Berita — Phase 3D
                </button>
            </article>

            <article class="rounded-[16px] border border-site-border bg-brand-green-950 p-6 text-white shadow-[0_12px_30px_rgba(29,79,48,0.14)]">
                <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-brand-green-300">Akun Aktif</p>
                <div class="mt-5 flex items-center gap-3">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-white/12 text-[14px] font-semibold uppercase">
                        {{ mb_substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="truncate text-[13px] font-semibold">{{ auth()->user()->name }}</p>
                        <p class="mt-1 truncate text-[10px] text-white/60">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <p class="mt-5 text-[11px] leading-5 text-white/65">Akses dashboard dilindungi authentication middleware dan session login aktif.</p>
            </article>
        </section>
    </div>
@endsection
