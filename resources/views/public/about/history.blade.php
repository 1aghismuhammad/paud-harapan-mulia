@extends('layouts.public')
@section('title', 'Sejarah — PAUD Harapan Mulia')
@section('content')
    <x-site.page-hero title="Sejarah PAUD Harapan Mulia" description="Perjalanan sekolah dalam melayani pendidikan anak usia dini di Kecamatan Ngawen, Blora." />

    <section class="section-space">
        <div class="site-container grid gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:gap-20">
            <div>
                <x-site.section-heading eyebrow="Tentang Kami" title="Bertumbuh Bersama Masyarakat" />
                <div class="mt-6 space-y-5 text-sm leading-8 text-site-muted">
                    <p>TK IT Harapan Mulia berdiri di Kecamatan Ngawen, Kabupaten Blora pada tahun 2011. Lokasinya berada di lingkungan yang mudah dijangkau masyarakat dan sejak awal hadir untuk memberikan layanan pendidikan anak usia dini yang dekat dengan kebutuhan keluarga.</p>
                    <p>Dalam perkembangannya sekolah dikenal melalui layanan pendidikan yang memadukan pembiasaan keagamaan, kegiatan belajar yang kreatif, serta program parenting. Pengenalan membaca Al-Qur’an, hafalan doa, praktik ibadah, dan pembiasaan perilaku Islami menjadi bagian dari karakter layanan sekolah.</p>
                    <p>Konten sejarah ini merupakan ringkasan dari dokumen karakteristik sekolah yang diberikan. Detail akhir dapat dipoles kembali setelah pihak sekolah melakukan verifikasi editorial.</p>
                </div>
            </div>
            <div class="overflow-hidden rounded-xl shadow-soft">
                <img src="{{ asset('images/paud/hero-sekolah.jpeg') }}" alt="Dokumentasi PAUD Harapan Mulia" class="aspect-[4/3] h-full w-full object-cover">
            </div>
        </div>
    </section>
@endsection
