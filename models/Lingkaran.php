<?php
include_once 'Bidang.php';

class Lingkaran extends Bidang{
    //member1 varibel
    public $bentuk;
    public $jari2;
    public $luas;
    public $keliling;

    //member2 konstruktor
    public function __construct($nama,$bentuk,$jari2){
        parent::__construct($nama);
        $this->bentuk = $bentuk;
        $this->jari2 = $jari2;
    }
    //member3 fungsi2
    public function luas(){
        $this->luas = 3.14 * $this->jari2 * $this->jari2;
    }
    public function keliling(){
        $this->keliling = 2 * 3.14 * $this->jari2;
    }

    public function cetak(){
        parent::cetak();
        echo '<br/>Bentuk: '.$this->bentuk;
        echo '<br/>Jari-Jari: '.$this->jari2.'cm';
        echo '<br/>Luasnya : '.$this->luas.'cm<sup>2</sup>';
        echo '<br/>Kelilingnya: '.$this->keliling.'cm';
        echo '<hr/>';
    }
}