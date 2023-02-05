@extends('layouts/dashboard')
@section('title', 'Laporan Aset')

@section('laporan')
    {{ Breadcrumbs::render('laporan') }}
    <div class="content">
        <h3 class="mt-3 mb-3" align="center">Laporan Data Aset</h3>
        <div class="card card-info card-outline">
            <div class="card-header">
                <a href="{{ url('/generate-pdf')}}" class="btn btn-success">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table table-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Aset</th>
                                <th>Nama Aset</th>
                                <th>Jenis</th>
                                <th>Kategori</th>
                                <th>Pemakai Aset</th>
                                <th>Lokasi Aset</th>
                                <th>Kondisi</th>
                                <th>Tanggal Terima</th>
                                <th>Nilai Aset</th>
                                <th>Nilai Penyusutan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->kode_aset }}</td>
                                <td>{{ $item->name_aset }}</td>
                                <td>{{ $item->name_jenis }}</td>
                                <td>{{ $item->name_kategori }}</td>
                                <td>{{ $item->name_satker }}</td>
                                <td>{{ $item->lokasi_aset }}</td>
                                <td>{{ $item->kondisi }}</td>
                                <td>{{ $item->tgl_terima }}</td>
                                <td>Rp. {{ number_format($item->nilai_aset,0,'.','.') }}</td>
                                <td>Rp. {{ number_format($item->nilai_aset / $item->batas_pemakaian,0,'.','.') }}</td>
                            </tr>
                            <?php
                            $no++;
                            ?>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $data->links() }}
@endsection