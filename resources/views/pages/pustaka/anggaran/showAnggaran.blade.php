@extends('pages/pustaka/index')
@section('title', 'Detail Data Sumber Dana ')

@section('main')
{{ Breadcrumbs::render('sumber-dana.show', $data) }}
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <h5 name="title" class="card-title">{{$data->name_anggaran}}</h5>
                    <p class="card-text"><b>Nama Sumber Dana Aset : </b>{{ $data->name_anggaran }}</p>
                    <p class="card-text"><b>Kode Sumber Dana Aset : </b>{{ $data->kode_anggaran }}</p>
                    <a href="/sumber-dana" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
