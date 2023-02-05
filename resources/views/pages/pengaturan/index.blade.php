@extends('layouts/dashboard')
@section('title', 'Pengaturan')

@section('main')
    {{ Breadcrumbs::render('pengaturan') }}
    <div class="d-flex justify-content-between card mb-4 setting">
        <div class="d-inline-flex content-setting">
            <div class="button rounded-2 mb-2 p-2 menu-setting">
                <i class='bx bx bxs-user-badge bx-tada-hover align-self-center bx-lg'></i>
                <a href="{{ url('/role') }}" class="btn btn-lg">Role User</a>
            </div>
            <div class="button rounded-2 p-2 menu-setting">
                <i class='bx bxs-user-pin bx-tada-hover align-self-center bx-lg'></i>
                <a href="{{ url('/satker') }}" class="btn btn-lg">Satuan Kerja</a>
            </div>
            <div class="button rounded-2 mt-2 p-2 menu-setting">
                <i class='bx bxs-user-circle bx-tada-hover align-self-center bx-lg' ></i>
                <a href="{{ url('/users') }}" class="btn btn-lg">User</a>
            </div>
        </div>
    </div>
@endsection
