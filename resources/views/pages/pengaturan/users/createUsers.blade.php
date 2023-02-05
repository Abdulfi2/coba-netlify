@extends('pages/pengaturan/index')
@section('title', 'Tambah Data User')

@section('main')
    {{ Breadcrumbs::render('users.create') }}
    <a href="/users" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="/users">
        @csrf
        <div class="mb-3">
            <label for="name_full" class="form-label">Nama Lengkap</label>
            <input type="name_full" class="form-control" name="name_full" id="name_full" value="{{ old('name_full')}}">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" class="form-control" name="username" id="username" value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role Users</label>
            <select id="role_id" name="role_id" class="form-select" aria-label="select">
                <option>-- Pilih Role --</option>
                @foreach ($roles as $id => $name_role)
                    <option value="{{ $id }}">{{ $name_role }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
