@extends('pages/pustaka/index')
@section('title', 'Edit Data Jenis')

@section('main')
    {{ Breadcrumbs::render('jenis.store') }}
    <a href="/jenis" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="{{ url('/jenis/' . $data->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2> Nama Jenis Aset : {{ $data->name_jenis }}</h2>
        </div>
        <div class="mb-3">
            <label for="name_jenis" class="form-label">Nama Jenis Aset</label>
            <input type="text" class="form-control" name="name_jenis" id="name_jenis"
                value="{{ $data->name_jenis }}">
        </div>
        <div class="mb-3">
            <label for="kode_jenis" class="form-label">Kode Jenis Aset</label>
            <input type="text" class="form-control" name="kode_jenis" id="kode_jenis" value="{{ $data->kode_jenis }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
