@extends('pages/pengaturan/index')
@section('title', 'Detail Data Role')

@section('main')
{{ Breadcrumbs::render('role.show', $data) }}
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-12">
      <div class="card-body">
        <h5 class="card-title">{{$data->name_role}}</h5>
        <p class="card-text"><b>Nama Role : </b>{{ $data->name }}</p>
        <p class="card-text"><b>Level Role : </b>{{ $data->guard_name }}</p>
        <a href="/role" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection