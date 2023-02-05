<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Table_kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            'kode' => 'INVEN', 
            'name_kategori' => 'Peralatan Inventaris',  
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('kategori')->insert([ 
            'kode' => 'KES', 
            'name_kategori' => 'Peralatan Kesehatan', 
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('kategori')->insert([ 
            'kode' => 'PKKS', 
            'name_kategori' => 'Perkakas', 
            'created_at'=>date('Y-m-d H:i:s') 
        ]);
        DB::table('kategori')->insert([ 
            'kode' => 'TNH', 
            'name_kategori' => 'Tanah', 
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('kategori')->insert([  
            'kode' => 'ELEC', 
            'name_kategori' => 'Peralatan Elektronik', 
            'created_at'=>date('Y-m-d H:i:s') 
        ]);
        DB::table('kategori')->insert([  
            'kode' => 'LL', 
            'name_kategori' => 'Lain-lain',
            'created_at'=>date('Y-m-d H:i:s') 
        ]);
    }
}
