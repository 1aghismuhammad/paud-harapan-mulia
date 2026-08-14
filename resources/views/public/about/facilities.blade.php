@extends('layouts.public')
@section('title', 'Fasilitas — PAUD Harapan Mulia')
@section('content')
    <x-site.page-hero title="Fasilitas Sekolah" description="Ruang dan lingkungan belajar yang mendukung kegiatan anak." />

    <section class="section-space">
        <div class="site-container">
            <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="grid grid-cols-2 gap-3">
                    <img src="{{ asset('images/paud/fasilitas-aktivitas.jpeg') }}" alt="Area kegiatan PAUD Harapan Mulia" class="aspect-[4/5] w-full rounded-lg object-cover shadow-card">
                    <img src="{{ asset('images/paud/fasilitas-lingkungan.jpeg') }}" alt="Lingkungan kegiatan siswa PAUD Harapan Mulia" class="mt-8 aspect-[4/5] w-full rounded-lg object-cover shadow-card">
                </div>
                <div>
                    <x-site.section-heading eyebrow="Tentang Kami" title="Lingkungan untuk belajar dan beraktivitas" />
                    <p class="section-copy">Dokumen sekolah menyebutkan ketersediaan ruang kelas dan upaya berkelanjutan untuk meningkatkan sarana prasarana yang menunjang proses pembelajaran. Detail inventaris fasilitas belum tersedia pada dataset saat ini.</p>
                    <div class="mt-7 rounded-lg border border-brand-yellow-400/40 bg-brand-yellow-400/10 p-5 text-sm leading-7 text-amber-900">
                        Konten fasilitas pada halaman ini masih berupa struktur UI. Nama, jumlah, dan deskripsi fasilitas harus diverifikasi dengan pihak sekolah sebelum production.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
