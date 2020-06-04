<?php
class Pelatihan{
    // 1. var
    private $koneksi;
    // 2. konstruktor
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }
    // 3. fungsi CRUD
    public function dataPelatihan(){
        $sql = "SELECT pelatihan.*, pegawai.foto, 
        pegawai.nama AS nama, materi.nama AS materi
        FROM pelatihan
        INNER JOIN pegawai ON pegawai.id = pelatihan.pegawai_id
        INNER JOIN materi ON materi.id = pelatihan.materi_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getPelatihan($id){
        $sql = "SELECT pelatihan.*, pegawai.foto,
                    pegawai.nama AS nama, 
                    materi.nama AS materi
                FROM pelatihan
                INNER JOIN pegawai ON pegawai.id = pelatihan.pegawai_id
                INNER JOIN materi ON materi.id = pelatihan.materi_id
                WHERE pelatihan.id = ?";  
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data
        return $rs;
    }
    public function detailPelatihan($id){
        $sql = "SELECT pelatihan.*, pegawai.foto,
                    pegawai.nama AS nama, 
                    materi.nama AS materi
                FROM pelatihan
                INNER JOIN pegawai ON pegawai.id = pelatihan.pegawai_id
                INNER JOIN materi ON materi.id = pelatihan.materi_id
        WHERE pelatihan.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO pelatihan(pegawai_id,materi_id,tgl_mulai,tgl_akhir, keterangan)
                VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data){
        $sql = "UPDATE pelatihan SET 
                        pegawai_id=?, materi_id=?, tgl_mulai=?,
                        tgl_akhir=?, keterangan=?
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM pelatihan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}