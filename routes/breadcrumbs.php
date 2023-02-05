<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Anggaran;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\Penghapusan;
use App\Models\Role;
use App\Models\Satker;


// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('data-aset', function (BreadcrumbTrail $trail) {
    $trail->push('Data Aset', route('data-aset'));
});

Breadcrumbs::for('pustaka', function (BreadcrumbTrail $trail) {
    $trail->push('Pustaka', route('pustaka'));
});

Breadcrumbs::for('laporan', function (BreadcrumbTrail $trail) {
    $trail->push('Laporan', route('laporan'));
});

Breadcrumbs::for('pengaturan', function (BreadcrumbTrail $trail) {
    $trail->push('Pengaturan', route('pengaturan'));
});

// Asset
Breadcrumbs::for('aset.index', function (BreadcrumbTrail $trail) {
    $trail->parent('data-aset');
    $trail->push('Dashboard Data Aset', route('aset.index'));
});
Breadcrumbs::for('aset.create', function (BreadcrumbTrail $trail) {
    $trail->parent('aset.index');
    $trail->push('Tambah Data Aset', route('aset.create'));
});
Breadcrumbs::for('aset.show', function (BreadcrumbTrail $trail, Asset $data) {
    $trail->parent('aset.index');
    $trail->push($data->name_aset, route('aset.show', $data));
});
Breadcrumbs::for('aset.store', function (BreadcrumbTrail $trail) {
    $trail->parent('aset.index');
    $trail->push('Edit Data Aset', route('aset.store'));
});

// Data Aset
Breadcrumbs::for('sumber-dana.index', function (BreadcrumbTrail $trail) {
    $trail->parent('pustaka');
    $trail->push('Sumber Dana Aset', route('sumber-dana.index'));
});
Breadcrumbs::for('sumber-dana.create', function (BreadcrumbTrail $trail) {
    $trail->parent('sumber-dana.index');
    $trail->push('Tambah Sumber Dana Aset', route('sumber-dana.create'));
});
Breadcrumbs::for('sumber-dana.show', function (BreadcrumbTrail $trail, Anggaran $data) {
    $trail->parent('sumber-dana.index');
    $trail->push($data->kode_anggaran, route('sumber-dana.show', $data));
});
Breadcrumbs::for('sumber-dana.store', function (BreadcrumbTrail $trail) {
    $trail->parent('sumber-dana.index');
    $trail->push('Edit Sumber Dana Aset', route('sumber-dana.store'));
});

// Jenis
Breadcrumbs::for('jenis.index', function (BreadcrumbTrail $trail) {
    $trail->parent('pustaka');
    $trail->push('Data Jenis Aset', route('jenis.index'));
});
Breadcrumbs::for('jenis.create', function (BreadcrumbTrail $trail) {
    $trail->parent('jenis.index');
    $trail->push('Tambah Data Jenis Aset', route('jenis.create'));
});
Breadcrumbs::for('jenis.show', function (BreadcrumbTrail $trail, Jenis $data) {
    $trail->parent('jenis.index');
    $trail->push($data->kode_jenis, route('jenis.show', $data));
});
Breadcrumbs::for('jenis.store', function (BreadcrumbTrail $trail) {
    $trail->parent('jenis.index');
    $trail->push('Edit Data Jenis Aset', route('jenis.store'));
});

// Kategori
Breadcrumbs::for('kategori.index', function (BreadcrumbTrail $trail) {
    $trail->parent('pustaka');
    $trail->push('Data Kategori Aset', route('kategori.index'));
});
Breadcrumbs::for('kategori.create', function (BreadcrumbTrail $trail) {
    $trail->parent('kategori.index');
    $trail->push('Tambah Data Kategori Aset', route('kategori.create'));
});
Breadcrumbs::for('kategori.show', function (BreadcrumbTrail $trail, Kategori $data) {
    $trail->parent('kategori.index');
    $trail->push($data->kode_kategori, route('kategori.show', $data));
});
Breadcrumbs::for('kategori.store', function (BreadcrumbTrail $trail) {
    $trail->parent('kategori.index');
    $trail->push('Edit Data Kategori Aset', route('kategori.store'));
});

// Role
Breadcrumbs::for('role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('pengaturan');
    $trail->push('Data Role User', route('role.index'));
});
Breadcrumbs::for('role.create', function (BreadcrumbTrail $trail) {
    $trail->parent('role.index');
    $trail->push('Tambah Data Role User', route('role.create'));
});
Breadcrumbs::for('role.show', function (BreadcrumbTrail $trail, Role $data) {
    $trail->parent('role.index');
    $trail->push($data->name, route('role.show', $data));
});
Breadcrumbs::for('role.store', function (BreadcrumbTrail $trail) {
    $trail->parent('role.index');
    $trail->push('Edit Data Role User', route('role.store'));
});

// Satuan Kerja
Breadcrumbs::for('satker.index', function (BreadcrumbTrail $trail) {
    $trail->parent('pengaturan');
    $trail->push('Data Satuan Kerja', route('satker.index'));
});
Breadcrumbs::for('satker.create', function (BreadcrumbTrail $trail) {
    $trail->parent('satker.index');
    $trail->push('Tambah Data Satuan Kerja', route('satker.create'));
});
Breadcrumbs::for('satker.show', function (BreadcrumbTrail $trail, Satker $data) {
    $trail->parent('satker.index');
    $trail->push($data->kode_satker, route('satker.show', $data));
});
Breadcrumbs::for('satker.store', function (BreadcrumbTrail $trail) {
    $trail->parent('satker.index');
    $trail->push('Edit Data Satuan Kerja', route('satker.store'));
});

// Users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('pengaturan');
    $trail->push('Data Users', route('users.index'));
});
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Tambah Data User', route('users.create'));
});
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $data) {
    $trail->parent('users.index');
    $trail->push($data->name_full, route('users.show', $data));
});
Breadcrumbs::for('users.store', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Edit Data User', route('users.store'));
});

// laporan
Breadcrumbs::for('laporan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('laporan');
    $trail->push('Laporan Aset', route('laporan.index'));
});

// Penghapusan
Breadcrumbs::for('remove.index', function (BreadcrumbTrail $trail) {
    $trail->parent('data-aset');
    $trail->push('Penghapusan Aset', route('remove.index'));
});
Breadcrumbs::for('remove.show', function (BreadcrumbTrail $trail, Penghapusan $data) {
    $trail->parent('remove.index');
    $trail->push($data->name_aset, route('remove.show', $data));
});
// Penyusutan
Breadcrumbs::for('penyusutan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('data-aset');
    $trail->push('Penyusutan Aset', route('penyusutan.index'));
});
Breadcrumbs::for('penyusutan.show', function (BreadcrumbTrail $trail, Asset $data) {
    $trail->parent('penyusutan.index');
    $trail->push($data->kode_aset, route('penyusutan.show', $data));
});