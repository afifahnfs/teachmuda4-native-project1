<?php
class Bidang{
    //member1 varibel
    public $nama;
    //member2 konstruktor
    public function __construct($nama){
        $this->nama = $nama;
    }
    //member3 fungsi2
    public function cetak(){
        echo 'Nama : '.$this->nama;
    } 
}