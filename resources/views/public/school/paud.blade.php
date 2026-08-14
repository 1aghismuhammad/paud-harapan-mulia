@extends('layouts.public')
@section('title', 'PAUD — Harapan Mulia')
@section('content')
    <x-site.page-hero eyebrow="Sekolah Kami" title="PAUD Harapan Mulia" description="Halaman unit PAUD dengan pendekatan visual yang mengikuti referensi halaman unit sekolah." />

    <section class="section-space">
        <div class="site-container grid items-center gap-12 lg:grid-cols-2 lg:gap-20">
            <div class="overflow-hidden rounded-xl shadow-soft">
                <img src="{{ asset('images/paud/unit-paud.jpeg') }}" alt="Kegiatan unit PAUD Harapan Mulia" class="aspect-[4/3] w-full object-cover">
            </div>
            <div>
                <x-site.section-heading eyebrow="Unit Pendidikan" title="Belajar melalui pengalaman yang menyenangkan" />
                <p class="section-copy">Struktur halaman ini sudah siap untuk review visual. Deskripsi spesifik unit PAUD belum tersedia secara lengkap pada sumber yang diberikan, sehingga copy final tidak diarang dan akan dilengkapi setelah sekolah memberikan data unit.</p>
                <div class="mt-7 grid gap-3 sm:grid-cols-2">
                    <div class="soft-card p-5"><p class="text-sm font-semibold">Pembiasaan Islami</p><p class="mt-2 text-xs leading-6 text-site-muted">Arah program didukung oleh dokumen sekolah tentang doa, Al-Qur’an, dan praktik ibadah.</p></div>
                    <div class="soft-card p-5"><p class="text-sm font-semibold">Kreatif & Menyenangkan</p><p class="mt-2 text-xs leading-6 text-site-muted">Misi sekolah menekankan pembelajaran kreatif dan menyenangkan.</p></div>
                </div>
            </div>
        </div>
    </section>
@endsection
