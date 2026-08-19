@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="mx-auto w-full max-w-[1100px]">
        @if (session('status'))
            <div class="mb-5 rounded-[12px] border border-[#cfe6cc] bg-[#f1f8ef] px-4 py-3 text-[12px] font-medium text-brand-green-950">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-brand-green-600">Berita</p>
                <h2 class="mt-1.5 text-[25px] font-semibold tracking-[-0.02em] text-site-text sm:text-[30px]">Edit Berita</h2>
                <p class="mt-1 max-w-[700px] truncate text-[10px] text-[#9a9da5]">/{{ $newsPost->slug }}</p>
            </div>
            <a href="{{ route('admin.news.index') }}" class="inline-flex min-h-10 w-fit items-center rounded-[9px] border border-site-border px-3.5 text-[11px] font-semibold text-site-muted transition hover:border-brand-green-600 hover:text-brand-green-950">Kembali ke Daftar</a>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.news.update', $newsPost) }}">
            @csrf
            @method('PUT')
            @include('admin.news._form', ['newsPost' => $newsPost])
        </form>
    </div>
@endsection
