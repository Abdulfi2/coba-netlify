@extends('pages/pengaturan/index')
@section('title', 'Edit Data User')

@section('main')
    {{ Breadcrumbs::render('users.store') }}
    <a href="/users" class="btn btn-secondary mb-3"> Back </a>
    <form method="POST" action="{{ url('/users/' . $data->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h2> Nama Users : {{ $data->name_full }}</h2>
        </div>
        <div class="mb-3">
            <label for="name_full" class="form-label">Nama Lengkap</label>
            <input type="name_full" class="form-control" name="name_full" id="name_full" value="{{ $data->name_full }}">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" class="form-control" name="username" id="username" value="{{ $data->username }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $data->email }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru">
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role Users</label>
            <select id="role_id" name="role_id" class="form-select" aria-label="select">
                <option value="" disabled>-- Pilih Role --</option>
                @foreach ($roles as $id => $name_role)
                    <option value="{{ $id }}" {{ $id == $data->role_id? 'selected' : '' }}>{{ $name_role }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
