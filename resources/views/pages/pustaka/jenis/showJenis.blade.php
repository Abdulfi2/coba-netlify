@extends('pages/pustaka/index')
@section('title', 'Detail Data Jenis')

@section('main')
{{ Breadcrumbs::render('jenis.show', $data) }}
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 name="title" class="card-title">{{ $data->name_jenis }}</h5>
                    <p class="card-text"><b>Nama Jenis Aset : </b>{{ $data->name_jenis }}</p>
                    <p class="card-text"><b>Kode Jenis Aset : </b>{{ $data->kode_jenis }}</p>
                    <a href="/jenis" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
