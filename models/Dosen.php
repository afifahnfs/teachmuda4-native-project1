<?php
include_once 'Person.php';

class Dosen extends Person{
    //member1 varibel
    public $gelar;
    protected $jabatan;
    //member2 konstruktor
    public function __construct($nama,$gender,$umur,$gelar,$jabatan){
        parent::__construct($nama,$gender,$umur);
        $this->gelar = $gelar;
        $this->jabatan = $jabatan;
    }

    public function cetak(){
        parent::cetak();
        echo '<br/>Gelar : '.$this->gelar;
        echo '<br/>Jabatan : '.$this->jabatan;
        echo '<hr/>';
    }
}