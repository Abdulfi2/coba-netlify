@extends('layouts/dashboard')

@section('main')
    {{ Breadcrumbs::render('dashboard') }}
    <div class="alert alert-warning alert-dismissible fade show" role="alert" align="center">
        <strong>Ahlan wa Sahlan</strong><br> Datang di Website SIMASET Sistem Informasi Manajemen Aset Laz Zakat Sukses.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsection
