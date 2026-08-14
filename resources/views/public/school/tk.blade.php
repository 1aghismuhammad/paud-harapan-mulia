@extends('layouts.public')
@section('title', 'TK — Harapan Mulia')
@section('content')
    <x-site.page-hero eyebrow="Sekolah Kami" title="TK Islam Terpadu Harapan Mulia" description="Unit TK Harapan Mulia di Kecamatan Ngawen, Kabupaten Blora." />

    <section class="section-space">
        <div class="site-container grid items-center gap-12 lg:grid-cols-2 lg:gap-20">
            <div>
                <x-site.section-heading eyebrow="Unit Pendidikan" title="Mendampingi anak tumbuh mandiri dan berakhlak" />
                <p class="section-copy">Dokumen karakteristik sekolah mencatat TK IT Harapan Mulia telah melayani masyarakat sejak 2011 dan mengembangkan program keagamaan, parenting, serta pembelajaran yang mendukung kemandirian dan kreativitas anak.</p>
                <ul class="mt-6 space-y-3 text-sm leading-7 text-site-muted">
                    <li>• Pembiasaan doa dan praktik ibadah.</li>
                    <li>• Pengenalan membaca Al-Qur’an.</li>
                    <li>• Pembelajaran kreatif dan menyenangkan.</li>
                    <li>• Kolaborasi dengan orang tua melalui program parenting.</li>
                </ul>
            </div>
            <div class="overflow-hidden rounded-xl shadow-soft">
                <img src="{{ asset('images/paud/unit-tk.jpeg') }}" alt="Dokumentasi siswa TK Harapan Mulia" class="aspect-[4/3] w-full object-cover">
            </div>
        </div>
    </section>
@endsection
