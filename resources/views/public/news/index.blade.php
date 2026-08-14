@extends('layouts.public')

@section('title', 'Berita — PAUD Harapan Mulia')
@section('meta_description', 'Berita dan artikel PAUD Islam Terpadu Harapan Mulia.')

@section('content')
    <section class="pt-24 pb-24 md:pt-28 md:pb-28 lg:pt-32 lg:pb-32">
        <div class="content-container">
            <div class="text-center">
                <p class="eyebrow">Berita & Artikel</p>
                <h1 class="mt-3 text-[36px] font-semibold tracking-[-0.04em] text-site-text md:text-[44px]">
                    Berita & Artikel
                </h1>
            </div>

            <div class="mt-12 flex items-center justify-center gap-4">
                <span class="reference-arrow hidden lg:inline-flex">←</span>

                <div class="grid w-full gap-7 md:grid-cols-3">
                    <x-site.news-card
                        image="images/paud/news-parenting.jpeg"
                        date="Preview Konten"
                        title="Home Parenting PAUD Harapan Mulia"
                        excerpt="Contoh layout artikel untuk kebutuhan review UI sebelum CMS berita dibangun."
                    />
                    <x-site.news-card
                        image="images/paud/news-akhirussanah.jpeg"
                        date="Preview Konten"
                        title="Kegiatan Akhirussanah"
                        excerpt="Preview tampilan berita sekolah yang nantinya dikelola melalui dashboard admin."
                    />
                    <x-site.news-card
                        image="images/paud/news-kegiatan.jpeg"
                        date="Preview Konten"
                        title="Kegiatan Siswa Harapan Mulia"
                        excerpt="Konten production nantinya berasal dari berita yang dipublikasikan admin."
                    />
                </div>

                <span class="reference-arrow hidden lg:inline-flex">→</span>
            </div>

            <div class="mx-auto mt-10 max-w-[700px] rounded-[5px] border border-brand-yellow-400/30 bg-brand-yellow-400/10 px-5 py-4 text-center text-[10px] leading-5 text-amber-900">
                Halaman ini masih preview UI. Judul, tanggal, dan ringkasan belum merupakan publikasi resmi sekolah.
            </div>
        </div>
    </section>
@endsection
