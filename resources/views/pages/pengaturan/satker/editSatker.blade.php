@extends('pages/pengaturan/index')
@section('title', 'Edit Data Satuan Kerja')

@section('main')
    {{ Breadcrumbs::render('satker.store') }}
    <a href="/satker" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="{{ url('/satker/' . $data->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name_satker" class="form-label">Nama Satuan Kerja</label>
            <input type="name_satker" class="form-control" name="name_satker" id="name_satker" value="{{ $data->name_satker}}">
        </div>
        <div class="mb-3">
            <label for="kode_satker" class="form-label">Kode Satuan Kerja</label>
            <input type="kode_satker" class="form-control" name="kode_satker" id="kode_satker" value="{{ $data->kode_satker }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
