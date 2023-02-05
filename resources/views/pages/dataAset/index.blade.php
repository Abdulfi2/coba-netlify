@extends('layouts/dashboard')
@section('title', 'Data Aset')

@section('main')
    {{ Breadcrumbs::render('data-aset') }}
    <div class="d-flex justify-content-between card mb-4 setting">
        <div class="d-inline-flex content-setting">
            
            @if (Auth::user()->role_id != 1)
            <div class="button rounded-2 mb-2 p-2 menu-setting">
                <i class="fa-sharp fa-solid fa-gauge-high fa-shake align-self-center fa-2x" style="--fa-animation-duration: 15s;"></i>
                <a href="{{ url('/aset') }}" class="btn btn-lg">Dashboard Data Aset</a>
            </div>
            @else
            <div class="button rounded-2 mb-2 p-2 menu-setting">
                <i class="fa-sharp fa-solid fa-gauge-high fa-shake align-self-center fa-2x" style="--fa-animation-duration: 15s;"></i>
                <a href="{{ url('/aset') }}" class="btn btn-lg">Dashboard Data Aset</a>
            </div>
            <div class="button rounded-2 p-2 menu-setting">
                <i class="fa-solid fa-arrow-trend-down fa-shake align-self-center fa-2x" style="--fa-animation-duration: 15s;"></i>
                <a href="{{ url('/penyusutan') }}" class="btn btn-lg">Penyusutan</a>
            </div>
            <div class="button rounded-2 mt-2  p-2 menu-setting">
                <i class="fa-solid fa-money-bill-wave fa-shake align-self-center fa-2x" style="--fa-animation-duration: 15s;"></i>
                <a href="{{ url('/remove') }}" class="btn btn-lg">Penghapusan Aset</a>
            </div>
            @endif
        </div>
    </div>
@endsection
