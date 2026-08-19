<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UploadNewsMediaRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'image.required' => 'Pilih gambar yang ingin dimasukkan ke isi berita.',
            'image.image' => 'File harus berupa gambar yang valid.',
            'image.mimes' => 'Gambar hanya boleh berformat JPG, JPEG, PNG, atau WEBP.',
            'image.max' => 'Ukuran gambar maksimal 5 MB.',
        ];
    }
}
