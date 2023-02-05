<?php

namespace App\Imports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ToModel;

class AssetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asset([
            'name_aset' => $row[2],
            'id_jenis' => $row[3],
            'id_kategori' => $row[4],
            'id_anggaran' => $row[5],
            'kondisi' => $row[6],
            'tgl_terima' => $row[7],
            'nilai_aset' => $row[8],
            'id_satker' => $row[9],
            'batas_pemakaian' => $row[10],
            'penyusutan' => $row[11],
            'lokasi_aset' => $row[12],
        ]);
    }
}
