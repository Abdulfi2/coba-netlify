@extends('pages/pustaka/index')
@section('title', 'Tambah Data Jenis')

@section('main')
{{ Breadcrumbs::render('jenis.create') }}
    <a href="/jenis" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="/jenis">
        @csrf
        <div class="mb-3">
            <label for="name_jenis" class="form-label">Nama Jenis Aset</label>
            <input type="text" class="form-control" name="name_jenis" id="name_jenis" value="{{ old('name_jenis') }}">
        </div>
        <div class="mb-3">
            <label for="kode_jenis" class="form-label">Kode Jenis Aset</label>
            <input type="text" class="form-control" name="kode_jenis" id="kode_jenis" value="{{old('kode_jenis')}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
