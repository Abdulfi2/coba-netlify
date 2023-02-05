@extends('pages/dataAset/index')
@section('title', 'Detail Penyusutan Aset')

@section('main')
{{ Breadcrumbs::render('penyusutan.show', $data) }}
<div class="row g-5 justify-content-start mb-3">
    <div class="col">
        <a href="/penyusutan" class="btn btn-secondary mb-3"> Back </a>
    </div>
</div>
<div class="accordion aset-tinggi" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Detail Data Aset
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table class="data-table table table-striped table-bordered table-hover row-border border-gray mt-3">
                <thead class="table-light">
                    <tr>
                        <th scope="col-2">Name</th>
                        <th scope="col-9">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kode Aset</td>
                        <td>{{$data->kode_aset}}</td>
                    </tr>
                    <tr>
                        <td>Nama Aset</td>
                        <td>{{$data->name_aset}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Aset</td>
                        <td>{{$data->name_jenis}}</td>
                    </tr>
                    <tr>
                        <td>Kategori Aset</td>
                        <td>{{$data->name_kategori}}</td>
                    </tr>
                    <tr>
                        <td>Sumber Dana Aset</td>
                        <td>{{$data->name_anggaran}}</td>
                    </tr>
                    <tr>
                        <td>Kondisi Aset</td>
                        <td>{{$data->kondisi}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Terima Aset</td>
                        <td>{{$data->tgl_terima}}</td>
                    </tr>
                    <tr>
                        <td>Nilai Aset</td>
                        <td>Rp. {{ number_format($data->nilai_aset,0,'.','.') }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Penyusutan</td>
                        <td>Rp. {{ number_format($data->nilai_aset/$data->batas_pemakaian,0,'.','.') }}</td>
                    </tr>
                    <tr>
                        <td>Pemakai Aset</td>
                        <td>{{$data->name_satker}}</td>
                    </tr>
                    <tr>
                        <td>Batas Pemakaian Aset</td>
                        <td>{{$data->batas_pemakaian}}</td>
                    </tr>
                    <tr>
                        <td>Lokasi Aset</td>
                        <td>{{$data->lokasi_aset}}</td>
                    </tr>
                    <tr>
                        <td>Keterangan Aset</td>
                        <td>{{$data->ket_aset}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row g-5 align-items-center mb-3">
                <div class="col-12">
                    <h5 class="card-title text-align-center">Foto Aset</h5>
                </div>
            </div>
            <div class="row g-5 align-items-center mb-3">
                <div class="col-12">
                    @if ($data->foto)
                        <a href="{{ asset('storage/'. $data->foto)}}" target="_blank">                
                            <img src="{{ asset('storage/'. $data->foto)}}" alt="aset-item" class="rounded-3 foto-aset" style="width: 30%;">
                        </a>
                    @endif
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection