@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
    <div class="mx-auto w-full max-w-[1100px]">
        <div class="mb-5 flex items-center justify-between gap-4">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-brand-green-600">Berita</p>
                <h2 class="mt-1.5 text-[25px] font-semibold tracking-[-0.02em] text-site-text sm:text-[30px]">Tambah Berita</h2>
            </div>
            <a href="{{ route('admin.news.index') }}" class="inline-flex min-h-10 items-center rounded-[9px] border border-site-border px-3.5 text-[11px] font-semibold text-site-muted transition hover:border-brand-green-600 hover:text-brand-green-950">Kembali</a>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.news.store') }}">
            @csrf
            @include('admin.news._form', ['newsPost' => null])
        </form>
    </div>
@endsection
