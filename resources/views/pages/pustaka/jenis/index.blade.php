@extends('pages/pustaka/index')
@section('title', 'Data Jenis')

@section('main')
    {{ Breadcrumbs::render('jenis.index') }}
    <div class="content">
        <div class="card card-info card-outline">
            <form class="card-header form-horizontal" role="form" accept-charset="UTF-8" method="GET" autocomplete="off"
                action="/jenis">
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
                                <a class="btn btn-warning btn-white align-middle" href="/jenis">
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
        <h3 class="mt-3 mb-3" align="center">Data Jenis Aset</h3>
        <div class="card card-info card-outline">
            <div class="card-header p-3">
                <div class="col-12">
                    <a href="/jenis/create" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="data-table table table-striped table-bordered table-hover row-border border-gray mt-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis Aset</th>
                                <th scope="col">Kode Jenis Aset</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name_jenis }}</td>
                                    <td>{{ $item->kode_jenis }}</td>
                                    <td><a class="btn btn-secondary btn-sm" href='{{ url('/jenis/' . $item->id) }}'><i
                                                class="bx bxs-show"></i> Preview</a>
                                        <a class="btn btn-warning btn-sm" href='{{ url('/jenis/' . $item->id . '/edit') }}'><i
                                                class="bx bxs-edit"></i> Edit</a>
                                        <form onsubmit="return confirm('Yakin mau menghapus data?')" class="d-inline"
                                            action="{{ url('/jenis/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="bx bxs-eraser"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $data->links() }}
    <code>JAGA KERAHASIAAN DATA ANDA, KARENA ITU SANGAT BERHARGA!</code>
@endsection
