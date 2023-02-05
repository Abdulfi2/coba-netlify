<!DOCTYPE html>
<html>
    <head>
        <title>SIMASET - Laporan Data Aset</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <div class="display-3 text-center mb-3">
                        <h1>Laporan Data Asset Yayasan Zakat Sukses</h1>
                    </div>
                </div>
                <?php
                    $no = 1;
                ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Asset</th>
                                        <th>Nama Asset</th>
                                        <th>Jenis</th>
                                        <th>Kategori</th>
                                        <th>Pemakai Aset</th>
                                        <th>Lokasi Aset</th>
                                        <th>Kondisi</th>
                                        <th>Tgl Terima</th>
                                        <th>Nilai Aset</th>
                                        <th>Nilai Penyusutan</th>
                                    </tr>
                                </thead>
                                <tbody>
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
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>