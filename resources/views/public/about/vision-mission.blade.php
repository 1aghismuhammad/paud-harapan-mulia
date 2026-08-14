@extends('layouts.public')
@section('title', 'Visi & Misi — PAUD Harapan Mulia')
@section('content')
    <x-site.page-hero title="Visi & Misi" description="Arah pendidikan PAUD Islam Terpadu Harapan Mulia." />

    <section class="section-space">
        <div class="site-container">
            <div class="grid gap-8 lg:grid-cols-2">
                <article class="soft-card p-7 md:p-9">
                    <p class="eyebrow">Visi</p>
                    <h2 class="mt-4 text-2xl font-semibold leading-10 text-site-text">Mewujudkan Generasi Islam yang Sehat, Mandiri, Kreatif, Berakhlak Mulia dan Berjiwa Pancasila.</h2>
                </article>
                <article class="soft-card p-7 md:p-9">
                    <p class="eyebrow">Misi</p>
                    <ol class="mt-5 space-y-4 text-sm leading-7 text-site-muted">
                        <li>1. Menciptakan lingkungan yang sehat, bersih, tertib, aman dan nyaman.</li>
                        <li>2. Menanamkan sikap mandiri pada peserta didik.</li>
                        <li>3. Menciptakan pembelajaran yang kreatif dan menyenangkan.</li>
                        <li>4. Membiasakan berperilaku Islami dengan meneladani sikap Rasulullah.</li>
                        <li>5. Menerapkan pembelajaran yang mendukung perwujudan Profil Pelajar Pancasila.</li>
                    </ol>
                </article>
            </div>

            <div class="mt-10 grid items-center gap-10 lg:grid-cols-2">
                <img src="{{ asset('images/paud/visi-kegiatan.jpeg') }}" alt="Kegiatan belajar PAUD Harapan Mulia" class="aspect-[4/3] w-full rounded-xl object-cover shadow-soft">
                <div>
                    <x-site.section-heading eyebrow="Tujuan" title="Lingkungan belajar yang bertumbuh" />
                    <ul class="mt-6 space-y-3 text-sm leading-7 text-site-muted">
                        <li>• Menciptakan suasana sekolah yang bernuansa agamis, bersih, dan sehat.</li>
                        <li>• Mengembangkan kurikulum yang berlandaskan Al-Qur’an dan As-Sunnah.</li>
                        <li>• Mengembangkan pembelajaran yang mandiri, kreatif, dan inovatif.</li>
                        <li>• Meningkatkan kualitas sarana prasarana dan profesionalisme tenaga pendidik.</li>
                        <li>• Menjalin kerja sama yang harmonis dengan stakeholder terkait.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
