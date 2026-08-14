@extends('layouts.public')

@section('title', 'Fasilitas — PAUD Harapan Mulia')
@section('meta_description', 'Lingkungan dan dokumentasi fasilitas PAUD Islam Terpadu Harapan Mulia.')

@section('content')
    <x-site.page-hero title="Fasilitas" breadcrumb="Fasilitas" />

    <section class="page-section-space">
        <div class="inner-content-container">
            <h2 class="page-title">Fasilitas</h2>

            <section class="mt-10 text-center">
                <h3 class="text-[28px] font-semibold tracking-[-0.035em] md:text-[34px]">Ruang & Sarana Belajar</h3>
                <p class="mx-auto mt-4 max-w-[760px] text-[12px] leading-6 text-site-muted">
                    Dokumentasi berikut digunakan untuk membangun komposisi halaman sesuai reference. Nama, jumlah, dan inventaris fasilitas final tetap perlu dikonfirmasi pihak sekolah.
                </p>

                <div class="mt-8 flex items-center justify-center gap-4">
                    <span class="reference-arrow hidden md:inline-flex">←</span>

                    <div class="grid w-full max-w-[860px] gap-4 sm:grid-cols-3">
                        <div class="reference-media-card aspect-square">
                            <img src="{{ asset('images/paud/fasilitas-lingkungan.jpeg') }}" alt="Lingkungan PAUD Harapan Mulia">
                        </div>

                        <div class="reference-media-card aspect-square">
                            <img src="{{ asset('images/paud/fasilitas-aktivitas.jpeg') }}" alt="Area aktivitas PAUD Harapan Mulia">
                            <div class="reference-media-overlay">Dokumentasi<br>Fasilitas</div>
                        </div>

                        <div class="reference-media-card aspect-square">
                            <img src="{{ asset('images/paud/profile-sekolah.jpeg') }}" alt="Dokumentasi lingkungan sekolah">
                        </div>
                    </div>

                    <span class="reference-arrow hidden md:inline-flex">→</span>
                </div>
            </section>

            <section class="mt-14 text-center">
                <h3 class="text-[28px] font-semibold tracking-[-0.035em] md:text-[34px]">Lingkungan & Aktivitas</h3>
                <p class="mx-auto mt-4 max-w-[760px] text-[12px] leading-6 text-site-muted">
                    Area dan aktivitas sekolah disajikan sebagai dokumentasi visual sambil menunggu data fasilitas yang telah diverifikasi secara lengkap.
                </p>

                <div class="mt-8 flex items-center justify-center gap-4">
                    <span class="reference-arrow hidden md:inline-flex">←</span>

                    <div class="grid w-full max-w-[860px] gap-4 sm:grid-cols-3">
                        <div class="reference-media-card aspect-square">
                            <img src="{{ asset('images/paud/hero-sekolah.jpeg') }}" alt="Kegiatan PAUD Harapan Mulia">
                        </div>

                        <div class="reference-media-card aspect-square">
                            <img src="{{ asset('images/paud/visi-kegiatan.jpeg') }}" alt="Kegiatan belajar siswa">
                            <div class="reference-media-overlay">Aktivitas<br>Sekolah</div>
                        </div>

                        <div class="reference-media-card aspect-square">
                            <img src="{{ asset('images/paud/unit-tk.jpeg') }}" alt="Dokumentasi unit TK">
                        </div>
                    </div>

                    <span class="reference-arrow hidden md:inline-flex">→</span>
                </div>
            </section>

            <div class="mx-auto mt-12 max-w-[860px] rounded-[5px] border border-brand-yellow-400/30 bg-brand-yellow-400/10 px-6 py-5 text-[11px] leading-6 text-amber-900">
                Konten fasilitas masih berstatus layout preview. Detail fasilitas production wajib disesuaikan dengan data resmi sekolah.
            </div>
        </div>
    </section>
@endsection
