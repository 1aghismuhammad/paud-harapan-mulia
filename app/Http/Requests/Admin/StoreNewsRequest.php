<?php

namespace App\Http\Requests\Admin;

use App\Models\NewsPost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:600'],
            'content' => ['required', 'string', 'max:100000'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'status' => ['required', Rule::in([NewsPost::STATUS_DRAFT, NewsPost::STATUS_PUBLISHED])],
            'published_at' => ['nullable', 'date'],
            'tags' => ['nullable', 'string', 'max:500'],
            'meta_title' => ['nullable', 'string', 'max:70'],
            'meta_description' => ['nullable', 'string', 'max:160'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul berita wajib diisi.',
            'content.required' => 'Isi berita wajib diisi.',
            'content.max' => 'Isi berita terlalu panjang. Maksimal 100.000 karakter HTML.',
            'featured_image.image' => 'Featured image harus berupa file gambar yang valid.',
            'featured_image.mimes' => 'Featured image hanya boleh berformat JPG, JPEG, PNG, atau WEBP.',
            'featured_image.max' => 'Ukuran featured image maksimal 5 MB.',
            'status.required' => 'Status berita wajib dipilih.',
            'status.in' => 'Status berita tidak valid.',
            'published_at.date' => 'Tanggal publikasi tidak valid.',
            'meta_title.max' => 'Meta title maksimal 70 karakter.',
            'meta_description.max' => 'Meta description maksimal 160 karakter.',
        ];
    }
}
