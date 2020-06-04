<?php
include_once 'Bidang.php';

class PersegiPanjang extends Bidang{
    //member1 varibel
    public $bentuk;
    public $panjang;
    public $luas;
    public $keliling;

    //member2 konstruktor
    public function __construct($nama,$bentuk,$panjang,$lebar){
        parent::__construct($nama);
        $this->bentuk = $bentuk;
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }
    //member3 fungsi2
    public function luas(){
        $this->luas = $this->panjang * $this->lebar;
    }
    public function keliling(){
        $this->keliling = 2 *  ($this->panjang + $this->lebar);
    }

    public function cetak(){
        parent::cetak();
        echo '<br/>Bentuk: '.$this->bentuk;
        echo '<br/>Panjang: '.$this->panjang.'cm';
        echo '<br/>Lebar: '.$this->lebar.'cm';
        echo '<br/>Luasnya : '.$this->luas.'cm<sup>2</sup>';
        echo '<br/>Kelilingnya: '.$this->keliling.'cm';
        echo '<hr/>';
    }
}