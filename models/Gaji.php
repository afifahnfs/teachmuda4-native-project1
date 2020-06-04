<?php
class Gaji{
    // 1. var
    private $koneksi;
    // 2. konstruktor
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }
    // 3. fungsi CRUD
    public function dataGaji(){
        $sql = "SELECT gaji.*, pegawai.nip, pegawai.nama, pegawai.gender, 
        pegawai.tempat_lahir, pegawai.tanggal_lahir, 
        pegawai.alamat,pegawai.email, pegawai.foto,
        jabatan.nama AS jab, divisi.nama AS bagian 
        FROM gaji
        INNER JOIN pegawai ON pegawai.id = gaji.pegawai_id
        INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
        INNER JOIN divisi ON divisi.id = pegawai.iddivisi";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getGaji($id){
        $sql = "SELECT g.*, p.nip, p.nama, p.foto, j.nama AS jab, d.nama AS bagian
                FROM gaji g
                INNER JOIN pegawai p ON p.id = g.pegawai_id
                INNER JOIN jabatan j ON j.id = p.idjabatan
                INNER JOIN divisi d ON d.id = p.iddivisi
                WHERE g.id = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }
    public function detailGaji($nip){
        $sql = "SELECT g.*, p.nip, p.nama, p.gender, 
        p.tempat_lahir, p.tanggal_lahir, 
        p.alamat, p.email, p.foto,
        j.nama AS jab, d.nama AS bagian 
        FROM gaji g
        INNER JOIN pegawai p ON p.id = g.pegawai_id
        INNER JOIN jabatan j ON j.id = p.idjabatan
        INNER JOIN divisi d ON d.id = p.iddivisi
        WHERE p.nip = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($nip);
        $rs = $ps->fetch();
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO gaji(pegawai_id, gapok, tunjab, bpjs, lain2)
                VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data){
        $sql = "UPDATE gaji SET 
        pegawai_id=?,gapok=?,tunjab=?,bpjs=?,lain2=? 
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM gaji WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}