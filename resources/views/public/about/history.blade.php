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

            <div class="mx-auto mt-10 max-w-[900px] overflow-hidden rounded-[5px] bg-slate-100 md:mt-12 lg:max-w-[1000px]">
                <img
                    src="{{ asset('images/paud/hero-sekolah.jpeg') }}"
                    alt="Dokumentasi PAUD Harapan Mulia"
                    class="aspect-[1.8/1] w-full object-cover"
                    loading="lazy"
                    decoding="async"
                >
            </div>

            <div class="mt-10 space-y-7 text-[16px] leading-[1.95] text-site-muted md:mt-12 md:text-[17px] md:leading-[2] lg:text-[18px] lg:leading-[2]">
                <p>
                    TK IT Harapan Mulia berdiri di Kecamatan Ngawen, Kabupaten Blora pada tahun 2011. Sekolah hadir untuk memberikan layanan pendidikan anak usia dini yang dekat dengan kebutuhan keluarga dan masyarakat sekitar.
                </p>

                <p>
                    Dalam perkembangannya, sekolah mengembangkan layanan pendidikan yang memadukan pembiasaan keagamaan, kegiatan belajar kreatif, kemandirian anak, serta program parenting sebagai bentuk kolaborasi dengan orang tua.
                </p>

                <p>
                    Pengenalan membaca Al-Qur’an, hafalan doa, praktik ibadah, dan pembiasaan perilaku Islami menjadi bagian dari karakter layanan pendidikan sekolah.
                </p>

                <h3 class="pt-4 text-[20px] font-semibold leading-[1.45] text-site-text md:text-[22px] lg:text-[24px]">Tujuan Penyelenggaraan Sekolah</h3>
                <p>
                    Sekolah berupaya menciptakan lingkungan belajar yang sehat, bersih, tertib, aman, nyaman, dan bernuansa Islami, sekaligus mendukung perkembangan peserta didik secara mandiri, kreatif, dan menyenangkan.
                </p>

                <h3 class="pt-4 text-[20px] font-semibold leading-[1.45] text-site-text md:text-[22px] lg:text-[24px]">Keunggulan</h3>
                <ol class="list-decimal space-y-3 pl-5 md:pl-6">
                    <li>Pembiasaan keagamaan melalui doa, Al-Qur’an, dan praktik ibadah.</li>
                    <li>Pembelajaran kreatif dan menyenangkan yang mendukung kemandirian anak.</li>
                    <li>Kolaborasi dengan orang tua melalui program parenting.</li>
                    <li>Lingkungan sekolah yang mendukung pembentukan karakter dan kebiasaan baik.</li>
                </ol>

                <p class="pt-4 text-[13px] leading-[1.85] italic text-site-muted md:text-[14px] lg:text-[15px]">
                    Catatan: detail sejarah tetap perlu diverifikasi secara editorial oleh pihak sekolah sebelum production.
                </p>
            </div>
        </div>
    </section>
@endsection
