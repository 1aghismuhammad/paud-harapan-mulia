@extends('layouts.public')
@section('title', 'Berita — PAUD Harapan Mulia')
@section('content')
    <x-site.page-hero eyebrow="Berita & Artikel" title="Berita PAUD Harapan Mulia" description="Preview UI daftar berita sebelum CMS berita dibangun pada Phase 3." />

    <section class="section-space">
        <div class="site-container">
            <div class="rounded-lg border border-brand-yellow-400/40 bg-brand-yellow-400/10 p-4 text-sm text-amber-900">
                Daftar ini adalah preview UI. Judul dan ringkasan belum merupakan publikasi resmi sekolah.
            </div>
            <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <x-site.news-card image="images/paud/news-parenting.jpeg" date="Preview Konten" title="Home Parenting PAUD Harapan Mulia" excerpt="Contoh layout artikel untuk kebutuhan review UI." />
                <x-site.news-card image="images/paud/news-akhirussanah.jpeg" date="Preview Konten" title="Kegiatan Akhirussanah" excerpt="Contoh layout artikel untuk kebutuhan review UI." />
                <x-site.news-card image="images/paud/news-kegiatan.jpeg" date="Preview Konten" title="Kegiatan Siswa Harapan Mulia" excerpt="Contoh layout artikel untuk kebutuhan review UI." />
            </div>
        </div>
    </section>
@endsection
