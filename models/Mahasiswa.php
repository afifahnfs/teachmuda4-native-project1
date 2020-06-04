<?php
include_once 'Person.php';
class Mahasiswa extends Person{
    //member1 varibel
    public $jurusan;
    protected $semester;
    //member2 konstruktor
    public function __construct($nama,$gender,$umur,$jurusan){
       parent::__construct($nama,$gender,$umur);
        $this->jurusan = $jurusan;
    }
    //member fungsi2
    public function setSemester($a){
        $this->semester = $s;
        return $s;
    }

    public function cetak(){
        parent::cetak();
        echo '<br/>Jurusan : '.$this->jurusan;
        echo '<br/>Semester : '.$this->semester;
        echo '<hr/>';
    }
}