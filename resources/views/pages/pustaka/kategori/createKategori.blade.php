@extends('pages/pustaka/index')
@section('title', 'Tambah Data Kategori')

@section('main')
{{ Breadcrumbs::render('kategori.create') }}
    <a href="/kategori" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="/kategori">
        @csrf
        <div class="mb-3">
            <label for="name_kategori" class="form-label">Nama Kategori Aset</label>
            <input type="text" class="form-control" name="name_kategori" id="name_kategori" value="{{ old('name_kategori') }}">
        </div>
        <div class="mb-3">
            <label for="kode_kategori" class="form-label">Kode Kategori Aset</label>
            <input type="text" class="form-control" name="kode_kategori" id="kode_kategori" value="{{old('kode_kategori')}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
