<?php
include_once 'koneksi.php';
include_once 'models/Pelatihan.php';
//1.tangkap request element2 form
$pegawai_id = $_POST['pegawai_id'];
$materi_id = $_POST['materi_id'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_akhir = $_POST['tgl_akhir'];
$keterangan = $_POST['keterangan'];
//2.simpan ke sebuah array
$data = [
    $pegawai_id, // ? 1
    $materi_id, // ? 2
    $tgl_mulai, // ? 3
    $tgl_akhir, // ? 4
    $keterangan, // ? 5
];
//3.eksekusi tombol
$tombol = $_POST['proses'];
$model = new Pelatihan(); //ciptkan object
if($tombol == 'simpan'){
    $model->simpan($data); // panggil fungsi simpan di model
}
else if($tombol == 'ubah'){
    // panggil fungsi ubah di model
    $data[] = $_POST['idx']; //tangkap hidden field dari form u/ ? 11 klausa where id = ?
    $model->ubah($data);
}
else if($tombol == 'hapus'){
    // panggil fungsi hapus di model
    unset($data); //hapus 10 ? di atas
    $id = [$_POST['idx']];
    $model->hapus($id);
}
else{ //tombol batal
    header('Location:index.php?hal=pelatihan');
}
//4. setelah selesai proses diarahkan ke halaman/redirect/landing page
header('Location:index.php?hal=pelatihan');