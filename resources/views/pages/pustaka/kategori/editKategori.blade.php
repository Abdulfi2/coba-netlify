@extends('pages/pustaka/index')
@section('title', 'Edit Data Kategori')

@section('main')
    {{ Breadcrumbs::render('kategori.store') }}
    <a href="/kategori" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="{{ url('/kategori/' . $data->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2> Nama Kategori Aset : {{ $data->name_kategori }}</h2>
        </div>
        <div class="mb-3">
            <label for="name_kategori" class="form-label">Nama Kategori Aset</label>
            <input type="text" class="form-control" name="name_kategori" id="name_kategori"
                value="{{ $data->name_kategori }}">
        </div>
        <div class="mb-3">
            <label for="kode_kategori" class="form-label">Kode Kategori Aset</label>
            <input type="text" class="form-control" name="kode_kategori" id="kode_kategori" value="{{ $data->kode_kategori }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
