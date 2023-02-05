@extends('pages/pengaturan/index')
@section('title', 'Detail Data Satuan Kerja')

@section('main')
{{ Breadcrumbs::render('satker.show', $data) }}
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-12">
      <div class="card-body">
        <h5 class="card-title">{{$data->name_satker}}</h5>
        <p class="card-text"><b>Nama Satuan Kerja : </b>{{ $data->name_satker }}</p>
        <p class="card-text"><b>Kode Satuan Kerja : </b>{{ $data->kode_satker }}</p>
        <a href="/satker" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection