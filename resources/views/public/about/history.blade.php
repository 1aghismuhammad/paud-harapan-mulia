@extends('layouts.public')

@section('title', 'Sejarah — PAUD Harapan Mulia')
@section('meta_description', 'Sejarah PAUD Islam Terpadu Harapan Mulia di Kecamatan Ngawen, Kabupaten Blora.')

@section('content')
    <x-site.page-hero
        title="Sejarah"
        breadcrumb="Sejarah"
        description="Perjalanan PAUD Harapan Mulia dalam melayani pendidikan anak usia dini."
    />

    <section class="page-section-space">
        <div class="article-container">
            <h2 class="page-title">Sejarah</h2>
            <p class="mt-5 text-[11px] font-medium text-site-muted">Sejarah Berdirinya Sekolah</p>

            <div class="mx-auto mt-8 max-w-[700px] overflow-hidden rounded-[3px] bg-slate-100">
                <img
                    src="{{ asset('images/paud/hero-sekolah.jpeg') }}"
                    alt="Dokumentasi PAUD Harapan Mulia"
                    class="aspect-[1.8/1] w-full object-cover"
                >
            </div>

            <div class="mt-8 space-y-5 reference-body-copy">
                <p>
                    TK IT Harapan Mulia berdiri di Kecamatan Ngawen, Kabupaten Blora pada tahun 2011. Sekolah hadir untuk memberikan layanan pendidikan anak usia dini yang dekat dengan kebutuhan keluarga dan masyarakat sekitar.
                </p>

                <p>
                    Dalam perkembangannya, sekolah mengembangkan layanan pendidikan yang memadukan pembiasaan keagamaan, kegiatan belajar kreatif, kemandirian anak, serta program parenting sebagai bentuk kolaborasi dengan orang tua.
                </p>

                <p>
                    Pengenalan membaca Al-Qur’an, hafalan doa, praktik ibadah, dan pembiasaan perilaku Islami menjadi bagian dari karakter layanan pendidikan sekolah.
                </p>

                <h3 class="pt-2 text-[13px] font-semibold text-site-text">Tujuan Penyelenggaraan Sekolah</h3>
                <p>
                    Sekolah berupaya menciptakan lingkungan belajar yang sehat, bersih, tertib, aman, nyaman, dan bernuansa Islami, sekaligus mendukung perkembangan peserta didik secara mandiri, kreatif, dan menyenangkan.
                </p>

                <h3 class="pt-2 text-[13px] font-semibold text-site-text">Keunggulan</h3>
                <ol class="list-decimal space-y-2 pl-5">
                    <li>Pembiasaan keagamaan melalui doa, Al-Qur’an, dan praktik ibadah.</li>
                    <li>Pembelajaran kreatif dan menyenangkan yang mendukung kemandirian anak.</li>
                    <li>Kolaborasi dengan orang tua melalui program parenting.</li>
                    <li>Lingkungan sekolah yang mendukung pembentukan karakter dan kebiasaan baik.</li>
                </ol>

                <p class="pt-2 text-[11px] italic text-site-muted">
                    Catatan: detail sejarah tetap perlu diverifikasi secara editorial oleh pihak sekolah sebelum production.
                </p>
            </div>
        </div>
    </section>
@endsection
