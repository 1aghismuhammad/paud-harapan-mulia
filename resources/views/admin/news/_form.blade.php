@php
    $isEdit = $newsPost !== null;
    $selectedStatus = old('status', $newsPost?->status ?? \App\Models\NewsPost::STATUS_DRAFT);
    $publishedAt = old(
        'published_at',
        $newsPost?->published_at?->format('Y-m-d\TH:i') ?? now()->format('Y-m-d\TH:i')
    );
    $tagValue = old('tags', $newsPost?->tags ? implode(', ', $newsPost->tags) : '');
@endphp

@if ($errors->any())
    <div class="mb-5 rounded-[12px] border border-red-200 bg-red-50 px-4 py-3">
        <p class="text-[12px] font-semibold text-red-800">Periksa kembali isian berita.</p>
        <ul class="mt-2 list-disc space-y-1 pl-5 text-[11px] text-red-700">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5 lg:grid-cols-[minmax(0,1.55fr)_minmax(280px,0.75fr)]">
    <section class="space-y-5 rounded-[16px] border border-site-border bg-white p-5 shadow-[0_10px_28px_rgba(29,79,48,0.05)] sm:p-6">
        <div>
            <label for="title" class="block text-[12px] font-semibold text-site-text">Judul <span class="text-red-600">*</span></label>
            <input
                id="title"
                name="title"
                type="text"
                value="{{ old('title', $newsPost?->title) }}"
                maxlength="255"
                required
                autofocus
                class="mt-2 min-h-12 w-full rounded-[10px] border border-site-border px-3.5 text-[14px] text-site-text outline-none transition focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]"
                placeholder="Contoh: Kegiatan Market Day PAUD IT Harapan Mulia"
            >
            <p class="mt-1.5 text-[10px] leading-5 text-[#9a9da5]">Slug URL dibuat otomatis dari judul dan dijaga tetap unik.</p>
        </div>

        <div>
            <label for="content" class="block text-[12px] font-semibold text-site-text">Isi Berita <span class="text-red-600">*</span></label>
            <textarea
                id="content"
                name="content"
                rows="16"
                required
                class="mt-2 w-full rounded-[10px] border border-site-border px-3.5 py-3 text-[13px] leading-7 text-site-text outline-none transition focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]"
                placeholder="Tulis isi berita di sini..."
            >{{ old('content', $newsPost?->content) }}</textarea>
            <p class="mt-1.5 text-[10px] leading-5 text-[#9a9da5]">Phase 3D menggunakan textarea aman. Toolbar rich text dan gambar di dalam artikel ditambahkan pada Phase 3F.</p>
        </div>

        <div>
            <div class="flex items-center justify-between gap-3">
                <label for="excerpt" class="block text-[12px] font-semibold text-site-text">Ringkasan / Excerpt <span class="font-normal text-site-muted">(opsional)</span></label>
                <span class="text-[9px] text-[#9a9da5]">Maks. 600 karakter</span>
            </div>
            <textarea
                id="excerpt"
                name="excerpt"
                rows="4"
                maxlength="600"
                class="mt-2 w-full rounded-[10px] border border-site-border px-3.5 py-3 text-[12px] leading-6 text-site-text outline-none transition focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]"
                placeholder="Ringkasan singkat untuk card berita. Boleh dikosongkan."
            >{{ old('excerpt', $newsPost?->excerpt) }}</textarea>
        </div>

        <div>
            <label for="tags" class="block text-[12px] font-semibold text-site-text">Tags <span class="font-normal text-site-muted">(opsional)</span></label>
            <input
                id="tags"
                name="tags"
                type="text"
                value="{{ $tagValue }}"
                maxlength="500"
                class="mt-2 min-h-11 w-full rounded-[10px] border border-site-border px-3.5 text-[12px] text-site-text outline-none transition focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]"
                placeholder="Contoh: Market Day, Parenting, TK"
            >
            <p class="mt-1.5 text-[10px] leading-5 text-[#9a9da5]">Pisahkan tag dengan koma. Sistem menyimpan maksimal 10 tag unik.</p>
        </div>
    </section>

    <div class="space-y-5">
        <section class="rounded-[16px] border border-site-border bg-white p-5 shadow-[0_10px_28px_rgba(29,79,48,0.05)]">
            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-brand-green-600">Publikasi</p>

            <div class="mt-4">
                <label for="status" class="block text-[11px] font-semibold text-site-text">Status</label>
                <select id="status" name="status" class="mt-2 min-h-11 w-full rounded-[10px] border border-site-border bg-white px-3 text-[12px] text-site-text outline-none focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]">
                    <option value="draft" @selected($selectedStatus === 'draft')>Draft</option>
                    <option value="published" @selected($selectedStatus === 'published')>Published</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="published_at" class="block text-[11px] font-semibold text-site-text">Tanggal Publish</label>
                <input
                    id="published_at"
                    name="published_at"
                    type="datetime-local"
                    value="{{ $publishedAt }}"
                    class="mt-2 min-h-11 w-full rounded-[10px] border border-site-border px-3 text-[11px] text-site-text outline-none focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]"
                >
                <p class="mt-2 text-[9px] leading-4 text-[#9a9da5]">Default menggunakan waktu sekarang. Tanggal masa depan akan menjadi publikasi terjadwal.</p>
            </div>

            <div class="mt-5 rounded-[10px] bg-[#f5f8f4] px-3.5 py-3 text-[10px] leading-5 text-site-muted">
                Author otomatis: <strong class="text-site-text">{{ auth()->user()->name }}</strong>
            </div>
        </section>

        <section class="rounded-[16px] border border-site-border bg-white p-5 shadow-[0_10px_28px_rgba(29,79,48,0.05)]">
            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-brand-green-600">SEO</p>

            <div class="mt-4">
                <label for="meta_title" class="block text-[11px] font-semibold text-site-text">Meta Title <span class="font-normal text-site-muted">(opsional)</span></label>
                <input id="meta_title" name="meta_title" type="text" maxlength="70" value="{{ old('meta_title', $newsPost?->meta_title) }}" class="mt-2 min-h-11 w-full rounded-[10px] border border-site-border px-3 text-[11px] text-site-text outline-none focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]">
                <p class="mt-1.5 text-[9px] text-[#9a9da5]">Maks. 70 karakter.</p>
            </div>

            <div class="mt-4">
                <label for="meta_description" class="block text-[11px] font-semibold text-site-text">Meta Description <span class="font-normal text-site-muted">(opsional)</span></label>
                <textarea id="meta_description" name="meta_description" rows="4" maxlength="160" class="mt-2 w-full rounded-[10px] border border-site-border px-3 py-2.5 text-[11px] leading-5 text-site-text outline-none focus:border-brand-green-600 focus:ring-2 focus:ring-[#dfeeda]">{{ old('meta_description', $newsPost?->meta_description) }}</textarea>
                <p class="mt-1.5 text-[9px] text-[#9a9da5]">Maks. 160 karakter.</p>
            </div>
        </section>

        <section class="rounded-[16px] border border-site-border bg-white p-5 shadow-[0_10px_28px_rgba(29,79,48,0.05)]">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-brand-green-600">Featured Image</p>
                    <p class="mt-1.5 text-[10px] leading-5 text-site-muted">Opsional. Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.</p>
                </div>
                <span class="rounded-full bg-[#edf5ea] px-2.5 py-1 text-[9px] font-semibold text-brand-green-950">Phase 3E</span>
            </div>

            @if ($newsPost?->featured_image)
                <div id="featured-current-wrap" class="mt-4">
                    <p class="mb-2 text-[9px] font-semibold uppercase tracking-[0.08em] text-[#9a9da5]">Gambar Saat Ini</p>
                    <img
                        id="featured-current-image"
                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($newsPost->featured_image) }}"
                        alt="Featured image {{ $newsPost->title }}"
                        class="aspect-[16/10] w-full rounded-[10px] border border-site-border object-cover"
                    >
                </div>
            @endif

            <div id="featured-preview-wrap" class="mt-4 hidden">
                <p class="mb-2 text-[9px] font-semibold uppercase tracking-[0.08em] text-[#9a9da5]">Preview Gambar Baru</p>
                <img id="featured-preview" alt="Preview featured image baru" class="aspect-[16/10] w-full rounded-[10px] border border-site-border object-cover">
            </div>

            <label for="featured_image" class="mt-4 flex min-h-11 cursor-pointer items-center justify-center rounded-[10px] border border-dashed border-[#b9c9b6] bg-[#f8faf7] px-3 text-center text-[10px] font-semibold text-brand-green-950 transition hover:border-brand-green-600 hover:bg-[#f0f7ed]">
                <span id="featured-file-label">{{ $newsPost?->featured_image ? 'Ganti Featured Image' : 'Pilih Featured Image' }}</span>
            </label>
            <input
                id="featured_image"
                name="featured_image"
                type="file"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                class="sr-only"
            >

            @if ($newsPost?->featured_image)
                <label class="mt-3 flex items-start gap-2 text-[10px] leading-5 text-site-muted">
                    <input
                        id="remove_featured_image"
                        name="remove_featured_image"
                        type="checkbox"
                        value="1"
                        @checked(old('remove_featured_image'))
                        class="mt-1 h-3.5 w-3.5 rounded border-site-border text-brand-green-900 focus:ring-brand-green-600"
                    >
                    <span>Hapus featured image saat perubahan disimpan.</span>
                </label>
            @endif
        </section>

        <div class="flex flex-col gap-2 sm:flex-row lg:flex-col xl:flex-row">
            <button type="submit" class="inline-flex min-h-11 flex-1 items-center justify-center rounded-[10px] bg-brand-green-900 px-4 text-[12px] font-semibold text-white transition hover:bg-brand-green-950">
                {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Berita' }}
            </button>
            <a href="{{ route('admin.news.index') }}" class="inline-flex min-h-11 flex-1 items-center justify-center rounded-[10px] border border-site-border px-4 text-[12px] font-semibold text-site-muted transition hover:border-brand-green-600 hover:text-brand-green-950">Batal</a>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('featured_image');
        const previewWrap = document.getElementById('featured-preview-wrap');
        const preview = document.getElementById('featured-preview');
        const fileLabel = document.getElementById('featured-file-label');
        const removeCheckbox = document.getElementById('remove_featured_image');
        let previewUrl = null;

        if (!input || !previewWrap || !preview || !fileLabel) {
            return;
        }

        input.addEventListener('change', () => {
            const [file] = input.files;

            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
                previewUrl = null;
            }

            if (!file) {
                preview.removeAttribute('src');
                previewWrap.classList.add('hidden');
                fileLabel.textContent = @json($newsPost?->featured_image ? 'Ganti Featured Image' : 'Pilih Featured Image');
                return;
            }

            previewUrl = URL.createObjectURL(file);
            preview.src = previewUrl;
            previewWrap.classList.remove('hidden');
            fileLabel.textContent = file.name;

            if (removeCheckbox) {
                removeCheckbox.checked = false;
            }
        });

        window.addEventListener('beforeunload', () => {
            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
            }
        });
    });
</script>
