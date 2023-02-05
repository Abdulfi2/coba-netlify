@extends('pages/pengaturan/index')
@section('title', 'Detail Data User')

@section('main')
{{ Breadcrumbs::render('users.show', $data) }}
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$data->name_full}}</h5>
        <p class="card-text"><b>Username : </b>{{ $data->username }}</p>
        <p class="card-text"><b>Email : </b>{{ $data->email }}</p>
        <p class="card-text"><b>Role : </b> {{ $data->name_role}}</p>
        <a href="/users" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection