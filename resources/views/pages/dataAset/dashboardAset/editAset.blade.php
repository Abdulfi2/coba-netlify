@extends('pages/dataAset/index')
@section('title', 'Edit Data Aset')

@section('main')
    {{ Breadcrumbs::render('aset.store') }}
    <a href="/aset" class="btn btn-secondary mb-3"> Back </a>
    <div class="accordion aset-tinggi" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Edit Data Aset
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <form method="POST" action="{{ url('/aset/' . $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- kode aset --}}
                    <fieldset disabled>
                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-3">
                                <label for="kode_aset" class="form-label">Kode Aset</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="kode_aset" id="kode_aset" class="form-control" placeholder="Auto Generate" value="{{ $data->kode_aset }}">
                            </div>
                        </div>
                    </fieldset>
                    {{-- nama aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3">
                            <label for="name_aset" class="form-label">Name Aset</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control @error('name_aset') is-invalid @enderror" name="name_aset" id="name_aset" value="{{ $data->name_aset }}">
                            @error('name_aset')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- jenis aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3">
                            <label for="id_jenis" class="form-label">Jenis Aset</label>
                        </div>
                        <div class="col-9">
                            <select id="id_jenis" name="id_jenis" class="form-select @error ('id_jenis') is-invalid @enderror" aria-label="select">
                                <option value="" disabled>-- Pilih Jenis Aset --</option>
                                @foreach ($j as $id => $name_jenis)
                                    <option value="{{ $id }}" {{ $id == $data->id_jenis? 'selected' : '' }}>{{ $name_jenis }}</option>
                                @endforeach
                            </select>
                            @error('id_jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- kategori aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="id_kategori" class="form-label">Kategori Aset</label></div>
                        <div class="col-9">
                            <select name="id_kategori" class="form-select @error ('id_kategori') is-invalid @enderror" aria-label="select">
                                <option value="" disabled>-- Pilih Kategori Aset --</option>
                                @foreach ($k as $id => $name_kategori)
                                    <option value="{{ $id }}" {{ $id == $data->id_satker ? 'selected' : '' }}>{{ $name_kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- anggaran aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="id_anggaran" class="form-label">Sumber Dana Aset</label></div>
                        <div class="col-9">
                            <select name="id_anggaran" class="form-select @error ('id_anggaran') is-invalid @enderror" aria-label="select">
                                <option value="" disabled>-- Pilih Sumber Dana Aset --</option>
                                @foreach ($a as $id => $name_anggaran)
                                    <option value="{{ $id }}" {{ $id == $data->id_anggaran ? 'selected' : '' }}>{{ $name_anggaran }}</option>
                                @endforeach
                            </select>
                            @error('id_anggaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- kondisi aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="kondisi" class="form-label">Kondisi Aset</label></div>
                        <div class="col-9">
                            <select name="kondisi" id="kondisi" class="form-select @error ('kondisi') is-invalid @enderror" aria-label="select">
                                <option value="" disabled>{{$data->kondisi}}</option>
                                @foreach (['Baik','Rusak', 'Renovasi', 'Dipinjam'] as $item)
                                    <option value="{{ $item }}" {{ $item == $data->kondisi ? 'selected' : '' }}>{{$item}}</option>
                                @endforeach
                            </select>
                            @error('kondisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- tgl terima aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="tgl_terima" class="form-label">Tanggal Terima Aset</label></div>
                        <div class="col-9">
                            <input type="date" class="form-control @error ('tgl_terima') is-invalid @enderror" name="tgl_terima" id="tgl_terima" value="{{ $data->tgl_terima }}">
                            @error('tgl_terima')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- nilai aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="nilai_aset" class="form-label" >Nilai Aset</label>  </div>
                        <div class="col-9">
                            <div class="input-group d-flex">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control @error ('nilai_aset') is-invalid @enderror" id="nilai_aset" name="nilai_aset" aria-label="Amount (to the nearest rupiah)" value="{{ $data->nilai_aset }}">
                                <span class="input-group-text">,00</span>
                                @error('nilai_aset')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- pemakai aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="id_satker" class="form-label">Pemakai Aset</label></div>
                        <div class="col-9">
                            <select name="id_satker" id="id_satker" class="form-select @error ('id_satker') is-invalid @enderror" aria-label="select">
                                <option value="" disabled>-- Pilih Satuan Kerja --</option>
                                @foreach($s as $id => $name_satker)
                                    <option value="{{ $id }}" {{ $id == $data->id_satker? 'selected' : '' }}>{{ $name_satker }}</option>
                                @endforeach
                            </select>
                            @error('id_satker')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- batas pemakaian --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="batas_pemakaian" class="form-label">Batas Pemakaian</label></div>
                        <div class="col-9">
                            <input type="number" class="form-control @error ('batas_pemakaian') is-invalid @enderror" name="batas_pemakaian" id="batas_pemakaian" value="{{ $data->batas_pemakaian }}">
                            @error('batas_pemakaian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- penyusutan --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3">
                            <label class="form-label" for="penyusutan">Hitung Penyusutan</label>
                        </div>
                        <div class="col-9">
                            <select id="penyusutan" name="penyusutan" class="form-select @error ('penyusutan') is-invalid @enderror" aria-label="select">
                                <option value="" disabled>Pilih Penyusutan</option>
                                @foreach (['ya','no'] as $item)
                                    <option value="{{ $item }}" {{ $item == $data->penyusutan ? 'selected' : '' }}>{{$item}}</option>
                                @endforeach
                            </select>
                            @error('penyusutan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- lokasi aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="lokasi_aset" class="form-label">Lokasi Aset</label></div>
                        <div class="col-9">
                            <input type="text" class="form-control @error ('lokasi_aset') is-invalid @enderror" name="lokasi_aset" id="lokasi_aset" value="{{ $data->lokasi_aset }}">
                            @error('lokasi_aset')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- foto aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="foto" class="form-label">Foto Aset</label></div>
                        <div class="col-9 d-flex flex-column">
                            @if ($data['foto'])
                                <img src="{{ asset('storage/'. $data['foto'])}}" alt="aset-item" class="rounded-3 foto-aset" style="width: 50%;">
                            @endif
                            <input type="file" class="form-control-file mt-3 @error('foto') is-invalid @enderror" name="foto" id="foto" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- keterangan aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="ket_aset" class="form-label">Keterangan Aset</label></div>
                        <div class="col-9"><textarea class="form-control" placeholder="Keterangan Aset" name="ket_aset" id="ket_aset">{{ $data->ket_aset }}</textarea></div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
@endsection
