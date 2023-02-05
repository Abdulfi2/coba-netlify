@extends('pages/pustaka/index')
@section('title', 'Detail Data Kategori')

@section('main')
{{ Breadcrumbs::render('kategori.show', $data) }}
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 name="title" class="card-title">{{$data->name_kategori}}</h5>
                    <p class="card-text"><b>Nama Kategori Aset : </b>{{ $data->name_kategori }}</p>
                    <p class="card-text"><b>Kode Kategori Aset : </b>{{ $data->kode_kategori }}</p>
                    <a href="/kategori" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
