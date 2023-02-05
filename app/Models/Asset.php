<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{

    use HasFactory;
    protected $table = "asset";

    protected $fillable = [
        'kode_aset',
        'name_aset',
        'id_jenis',
        'id_kategori',
        'id_anggaran',
        'kondisi',
        'tgl_terima',
        'nilai_aset',
        'id_satker',
        'batas_pemakaian',
        'penyusutan',
        'lokasi_aset',
        'ket_aset',
        'foto',
    ];

    // belongsto table jenis
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id');
    }

    // belongsto table kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    // belongs to table anggaran
    public function anggaran()
    {
        return $this->belongsTo(Anggaran::class, 'id_anggaran', 'id');
    }

    // belongs to table satker
    public function satker()
    {
        return $this->belongsTo(Satker::class, 'id_satker', 'id');
    }
    
}
