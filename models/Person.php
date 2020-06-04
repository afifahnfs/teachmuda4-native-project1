<?php
class Person{
    //member1 varibel
    public $nama;
    protected $gender;
    private $umur;
    //member2 konstruktor
    public function __construct($nama,$gender,$umur){
        $this->nama = $nama;
        $this->gender = $gender;
        $this->umur = $umur;
    }
    //member3 fungsi2
    public function cetak(){
        echo 'Nama : '.$this->nama; 
        echo '<br/>gender : '.$this->gender;
        echo '<br/>umur : '.$this->umur.'tahun';
    } 
}