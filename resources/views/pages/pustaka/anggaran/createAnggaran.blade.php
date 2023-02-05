@extends('pages/pustaka/index')
@section('title', 'Tambah Data Sumber Dana')

@section('main')
{{ Breadcrumbs::render('sumber-dana.create') }}
    <a href="/sumber-dana" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="/sumber-dana">
        @csrf
        <div class="mb-3">
            <label for="name_anggaran" class="form-label">Nama Sumber Dana Aset</label>
            <input type="text" class="form-control" name="name_anggaran" id="name_anggaran" value="{{ old('name_anggaran') }}">
        </div>
        <div class="mb-3">
            <label for="kode_anggaran" class="form-label">Kode Sumber Dana Aset</label>
            <input type="text" class="form-control" name="kode_anggaran" id="kode_anggaran" value="{{old('kode_anggaran')}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
