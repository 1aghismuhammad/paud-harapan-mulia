<footer class="bg-brand-green-900 text-white">
    <div class="footer-container grid gap-12 py-16 md:grid-cols-3 md:gap-20 lg:py-20">
        <div>
            <h2 class="text-[12px] font-semibold">Kontak</h2>
            <div class="mt-6 space-y-5 text-[11px] leading-5 text-white/70">
                <a href="https://wa.me/6289613624186" class="flex gap-3 hover:text-white">
                    <span class="text-brand-yellow-400">◉</span>
                    <span><small class="block text-[9px] text-white/45">Hubungi Kami</small>0896 1362 4186</span>
                </a>

                <a href="mailto:tkitharapanmulia063@gmail.com" class="flex gap-3 hover:text-white">
                    <span class="text-brand-yellow-400">✉</span>
                    <span class="break-all"><small class="block text-[9px] text-white/45">Kirim Email</small>tkitharapanmulia063@gmail.com</span>
                </a>

                <div class="flex gap-3">
                    <span class="text-brand-yellow-400">⌖</span>
                    <span><small class="block text-[9px] text-white/45">Kunjungi Sekolah</small>Jl. Caren RT 01 RW 04, Ngawen, Blora</span>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-[12px] font-semibold">Link</h2>
            <nav class="mt-6 grid gap-3 text-[11px] text-white/65" aria-label="Navigasi footer">
                <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
                <a href="{{ route('about.history') }}" class="hover:text-white">Sejarah</a>
                <a href="{{ route('about.vision-mission') }}" class="hover:text-white">Visi & Misi</a>
                <a href="{{ route('about.facilities') }}" class="hover:text-white">Fasilitas</a>
                <a href="{{ route('school.paud') }}" class="hover:text-white">PAUD</a>
                <a href="{{ route('school.tk') }}" class="hover:text-white">TK</a>
                <a href="{{ route('news.index') }}" class="hover:text-white">Berita</a>
            </nav>
        </div>

        <div>
            <h2 class="text-[12px] font-semibold">Kata Perenungan</h2>
            <blockquote class="mt-6 max-w-[290px] text-[11px] leading-6 text-white/65">
                “Pendidikan adalah proses menumbuhkan kebiasaan baik, kemandirian, kreativitas, dan akhlak dalam lingkungan yang aman serta menyenangkan.”
            </blockquote>
            <p class="mt-3 text-[9px] text-brand-yellow-400">— Preview copy, menunggu final sekolah</p>
        </div>
    </div>

    <div class="bg-[#171924]">
        <div class="footer-container flex flex-col gap-4 py-5 text-[10px] text-white/55 sm:flex-row sm:items-center sm:justify-between">
            <p>© {{ date('Y') }} PAUD Harapan Mulia</p>
            <div class="flex gap-5">
                <a href="#" class="hover:text-white">Facebook</a>
                <a href="#" class="hover:text-white">YouTube</a>
                <a href="#" class="hover:text-white">Instagram</a>
            </div>
        </div>
    </div>
</footer>
