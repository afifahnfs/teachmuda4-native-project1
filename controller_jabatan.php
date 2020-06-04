<?php
include_once 'koneksi.php';
include_once 'models/Jabatan.php';
//1. tangkap request form
$nama = $_POST['nama'];
//2. simpan ke sebuah data array
$data = [$nama];
//3. eksekusi tombol
$tombol = $_POST['proses'];
$model = new Jabatan(); //ciptakan object dari Model
switch ($tombol) {
    case 'simpan': $model->input($data); break;
    case 'ubah':
        $data [] = $_POST['idx'];
        $model->ubah($data); break;
    case 'hapus':
        unset($data);
        $id = [$_POST['idx']];
        $model->hapus($id); break;
    default: header('location:index.php?hal=jabatan');
}
//4.arahkan ke suatu halaman/redirect/landing page
header('location:index.php?hal=jabatan');