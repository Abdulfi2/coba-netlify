@extends('pages/pustaka/index')
@section('title', 'Edit Data Sumber Dana ')

@section('main')
    {{ Breadcrumbs::render('sumber-dana.store') }}
    <a href="/sumber-dana" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="{{ url('/sumber-dana/' . $data->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2> Nama Sumber Dana Aset : {{ $data->name_anggaran }}</h2>
        </div>
        <div class="mb-3">
            <label for="name_anggaran" class="form-label">Nama Sumber Dana Aset</label>
            <input type="text" class="form-control" name="name_anggaran" id="name_anggaran"
                value="{{ $data->name_anggaran }}">
        </div>
        <div class="mb-3">
            <label for="kode_anggaran" class="form-label">Kode Sumber Dana Aset</label>
            <input type="text" class="form-control" name="kode_anggaran" id="kode_anggaran" value="{{ $data->kode_anggaran }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
