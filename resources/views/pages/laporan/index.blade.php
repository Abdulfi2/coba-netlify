@extends('layouts/dashboard')
@section('title', 'Data Aset')

@section('main')
    {{ Breadcrumbs::render('data-aset') }}
    <div class="d-flex justify-content-between card mb-4 setting">
        <div class="d-inline-flex content-setting">
            <div class="button rounded-2 mb-2 p-2 menu-setting">
                <i class="bx bxs-report icon align-self-center fa-2x" style="--fa-animation-duration: 15s;"></i>
                <a href="{{ url('/laporan-aset') }}" class="btn btn-lg">Laporan Data Aset</a>
            </div>
        </div>
    </div>
@endsection
