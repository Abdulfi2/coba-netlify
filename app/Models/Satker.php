<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{

    use HasFactory;
    protected $table = 'satker';

    protected $fillable = [
        'kode_satker',
        'name_satker',
    ];

}
