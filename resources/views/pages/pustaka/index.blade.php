@extends('layouts/dashboard')
@section('title', 'Pustaka')

@section('main')
    {{ Breadcrumbs::render('pustaka') }}
    <div class="d-flex justify-content-between card mb-4 setting">
        <div class="d-inline-flex content-setting">
            <div class="button rounded-2 mb-2 p-2 menu-setting">
                <i class='bx bx-money bx-tada-hover align-self-center bx-lg'></i>
                <a href="{{ url('/sumber-dana') }}" class="btn btn-lg">Sumber Dana Aset</a>
            </div>
            <div class="button rounded-2 p-2 menu-setting">
                <i class='bx bx-list-ul bx-tada-hover align-self-center bx-lg' ></i>
                <a href="{{ url('/jenis') }}" class="btn btn-lg">Jenis Aset</a>
            </div>
            <div class="button rounded-2 mt-2 p-2 menu-setting">
                <i class='bx bxs-category-alt bx-tada-hover align-self-center bx-lg'></i>
                <a href="{{ url('/kategori') }}" class="btn btn-lg">Kategori Aset</a>
            </div>
        </div>
    </div>
@endsection
