@extends('pages/dataAset/index')
@section('title', 'Penghapusan Data Aset')

@section('main')
    {{ Breadcrumbs::render('remove.index') }}
        <div class="content">
            <div class="card card-info card-outline">
                <form class="card-header form-horizontal" role="form" accept-charset="UTF-8" method="GET" autocomplete="off"
                    action="/remove">
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
            <h3 class="mt-5 mb-3" align="center">Data Aset yang dihapus</h3>
            <div class="card card-info card-outline">
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
                                        <td class="d-flex flex-column"><a class="btn btn-secondary btn-sm" href='{{ url('/remove/' . $item->id) }}'><i
                                                    class="bx bxs-show"></i> Preview</a>
                                            {{-- <form onsubmit="return confirm('Yakin mau merestore data?')" class="d-inline"
                                                action="{{ url('/restore/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('GET')
                                                <button class="btn btn-success btn-sm"><i class="fa-solid fa-trash-can-arrow-up"></i> Restore</button>
                                            </form> --}}
                                            <form onsubmit="return confirm('Yakin mau menghapus data?')" class="d-inline"
                                                action="{{ url('/remove/' . $item->id) }}" method="POST">
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
@endsection