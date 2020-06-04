<?php
class Member{
    // 1. var
    private $koneksi;
    // 2. konstruktor
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }
    // 3. fungsi CRUD
    public function dataMember(){
        $sql = "SELECT * FROM member";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getMember($id){
        $sql = "SELECT * FROM member WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
        $rs = $ps->fetch(); // ambil 1 baris data yang mau di edit
        return $rs;
    }
    public function simpan($data){
        $sql = "INSERT INTO member(fullname, username, password, 
                            role, email, foto) 
                VALUES (?,?,SHA1(?),?,?,?)";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi 
    }
    public function ubah($data){
        $sql = "UPDATE member SET fullname=?, username=?, password=SHA1(?),
                        role=?, email=?, foto=? 
        WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($data); //eksekusi
    }
    public function hapus($id){
        $sql = "DELETE FROM member WHERE id=?";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql); //persiapan
        $ps->execute($id); //eksekusi
    }
}