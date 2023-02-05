@extends('pages/dataAset/index')
@section('title', 'Dashboard Data Aset')

@section('main')
    {{ Breadcrumbs::render('aset.index') }}
    <div class="content">
        <div class="card card-info card-outline">
            <form class="card-header form-horizontal" role="form" accept-charset="UTF-8" method="GET" autocomplete="off"
                action="/aset">
                <div class="form-group">
                    <label class="col-sm-12 control-label no-padding-right">Pencarian</label>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-sm-9 me-3">
                            <span class="input-icon">
                                <input type="search" id="form-field-icon-1" size="150" name="search"
                                    class="form-control" placeholder="Kata kunci . . .">
                            </span>
                        </div>
                        <div class="col-sm-3">
                            <span class="input-icon">
                                <button type="submit" class="btn btn-primary btn-white">
                                    <span class="bx bx-search bx-tada-hover"></span>Cari</button>
                                <a class="btn btn-warning btn-white align-middle" href="/aset">
                                    <span class="bx bx-reset bx-tada-hover"></span>Reset</a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if (session('error'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger alert-dismissible fade show">
                    <div role="alert">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <h3 class="mt-3 mb-3" align="center">Data Aset</h3>
        <div class="card card-info card-outline">
            <div class="card-header p-3">
                <div class="col-12">
                    <a href="/aset/create" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Tambah Data</a>
                    <a href="{{ url('export-asset') }}" class="btn btn-primary">Export</a>
                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Import</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="data-table table table-striped table-bordered table-hover row-border border-gray align-middle mt-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode aset</th>
                                <th scope="col">Nama aset</th>
                                <th scope="col">Jenis aset</th>
                                <th scope="col">Kategori aset</th>
                                <th scope="col">Tanggal Terima</th>
                                <th scope="col">Masa Pemakaian</th>
                                <th scope="col">Nilai aset</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($data as $item)
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>{{ $item->kode_aset }}</td>
                                    <td>{{ $item->name_aset }}</td>
                                    <td>{{ $item->name_jenis }}</td>
                                    <td>{{ $item->name_kategori }}</td>
                                    <td>{{ $item->tgl_terima }}</td>
                                    <td>{{ $item->batas_pemakaian }}</td>
                                    <td>{{ number_format($item->nilai_aset,0,'.','.') }}</td>
                                    <td class="d-flex flex-column"><a class="btn btn-secondary btn-sm" href='{{ url('/aset/' . $item->id) }}'><i
                                                class="bx bxs-show"></i> Preview</a>
                                        <a class="btn btn-warning btn-sm" href='{{ url('/aset/' . $item->id . '/edit') }}'><i
                                                class="bx bxs-edit"></i> Edit</a>
                                        <form onsubmit="return confirm('Yakin mau menghapus data?')" class="d-inline"
                                            action="{{ url('/aset/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="bx bxs-eraser"></i> Hapus</button>
                                        </form>
                                    </td>
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Asset</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('import-asset') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="form-group">
                                <input type="file" name="file" id="file" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer container text-center">
                        <div class="col">
                            <p>Download Sample Data
                            <a href="{{url('export-asset-sample')}}">Sample.xlsx</a></p>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{ $data->links() }}
    <code>JAGA KERAHASIAAN DATA ANDA, KARENA ITU SANGAT BERHARGA!</code>
@endsection
