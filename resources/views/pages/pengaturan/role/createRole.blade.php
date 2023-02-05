@extends('pages/pengaturan/index')
@section('title', 'Tambah Data Role')

@section('main')
    {{ Breadcrumbs::render('role.create') }}
    <a href="/role" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="/role">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Role</label>
            <input type="name" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="guard_name" class="form-label">Level Role</label>
            <input type="guard_name" class="form-control" name="guard_name" id="guard_name" value="{{ old('guard_name') }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
