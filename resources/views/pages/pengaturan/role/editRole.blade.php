@extends('pages/pengaturan/index')
@section('title', 'Edit Data Role')

@section('main')
    {{ Breadcrumbs::render('role.store') }}
    <a href="/role" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="{{ url('/role/' . $data->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Role</label>
            <input type="name" class="form-control" name="name" id="name" value="{{ $data->name}}">
        </div>
        <div class="mb-3">
            <label for="guard_name" class="form-label">Level Role</label>
            <input type="guard_name" class="form-control" name="guard_name" id="guard_name" value="{{ $data->guard_name }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
