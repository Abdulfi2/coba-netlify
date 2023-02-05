@extends('pages/dataAset/index')
@section('title', 'Edit Data Aset')

@section('main')
    {{ Breadcrumbs::render('aset.create') }}
    <a href="/aset" class="btn btn-secondary mb-3"> Back </a>
    <div class="accordion aset-tinggi" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Tambah Data Aset
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <form method="POST" action="/aset" enctype="multipart/form-data">
                    @csrf
                    {{-- kode aset --}}
                    <fieldset disabled>
                        <div class="row g-5 align-items-center mb-3">
                            <div class="col-3">
                                <label for="kode_aset" class="form-label">Kode Aset</label>
                            </div>
                            <div class="col-9">
                                <input type="text" name="kode_aset" id="kode_aset" class="form-control" placeholder="Auto Generate" value="{{ old('kode_aset') }}">
                            </div>
                        </div>
                    </fieldset>
                    {{-- nama aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3">
                            <label for="name_aset" class="form-label">Name Aset</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control @error('name_aset') is-invalid @enderror" name="name_aset" id="name_aset" value="{{ old('name_aset') }}">
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
                                <option>-- Pilih Jenis Aset --</option>
                                @foreach ($data['jenis'] as $j => $name_jenis)
                                    <option value="{{ $j }}" {{ old('id_jenis') == $j ? 'selected' : '' }}>{{ $name_jenis }}</option>
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
                                <option>-- Pilih Kategori Aset --</option>
                                @foreach($data['kategori'] as $k => $name_kategori)
                                <option value="{{ $k }}" {{ old('id_kategori') == $k ? 'selected' : '' }}>{{ $name_kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- summber dana aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="id_anggaran" class="form-label">Sumber Dana Aset</label></div>
                        <div class="col-9">
                            <select name="id_anggaran" class="form-select @error ('id_anggaran') is-invalid @enderror" aria-label="select">
                                <option>-- Pilih Sumber Dana Aset --</option>
                                @foreach($data['anggaran'] as $a => $name_anggaran)
                                    <option value="{{ $a }}" {{ old('id_anggaran') == $a ? 'selected' : '' }}>{{ $name_anggaran }}</option>
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
                                <option>-- Pilih Kondisi Aset --</option>
                                <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak" {{ old('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="Renovasi" {{ old('kondisi') == 'Renovasi' ? 'selected' : '' }}>Renovasi</option>
                                <option value="Dipinjam" {{ old('kondisi') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
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
                            <input type="date" class="form-control @error ('tgl_terima') is-invalid @enderror" name="tgl_terima" id="tgl_terima" value="{{ old('tgl_terima')}}">
                            @error('tgl_terima')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- nilai aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="nilai_aset" class="form-label" >Nilai Aset</label> </div>
                        <div class="col-9">
                            <div class="input-group d-flex">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control @error ('nilai_aset') is-invalid @enderror" id="nilai_aset" name="nilai_aset" aria-label="Amount (to the nearest rupiah)" value="{{ old('nilai_aset') }}">
                                <span class="input-group-text">,00</span>
                            </div>
                                @error('nilai_aset')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>
                    {{-- pemakai aset --}}
                    <div class="row g-5 align-items-center mb-3">
                        <div class="col-3"><label for="id_satker" class="form-label">Pemakai Aset</label></div>
                        <div class="col-9">
                            <select name="id_satker" id="id_satker" class="form-select @error ('id_satker') is-invalid @enderror" aria-label="select">
                                <option>-- Pilih Satuan Kerja --</option>
                                @foreach($data['satker'] as $id => $satker)
                                    <option value="{{ $id }}" {{ old('id_satker') == $id ? 'selected' : '' }}>{{ $satker }}</option>
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
                            <input type="number" class="form-control @error ('batas_pemakaian') is-invalid @enderror" name="batas_pemakaian" id="batas_pemakaian" value="{{ old('batas_pemakaian')}}">
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
                                <option>-- Hitung Penyusutan --</option>
                                <option value="ya" {{ old('penyusutan') == 'ya' ? 'selected' : '' }}>Ya</option>
                                <option value="no" {{ old('penyusutan') == 'no' ? 'selected' : '' }}>No</option>
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
                            <input type="text" class="form-control @error ('lokasi_aset') is-invalid @enderror" name="lokasi_aset" id="lokasi_aset" value="{{ old('lokasi_aset')}}">
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
                        <div class="col-9">
                            <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" id="foto" accept="image/*">
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
                        <div class="col-9"><textarea class="form-control" placeholder="Keterangan Aset" name="ket_aset" id="ket_aset">{{ old('ket_aset') }}</textarea></div>
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
