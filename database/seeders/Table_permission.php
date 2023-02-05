<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class Table_permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        

        $permission = Permission::create(['create role']);
        $permission = Permission::create(['read role']);
        $permission = Permission::create(['update role']);
        $permission = Permission::create(['delete role']);




    }
}
