<?php
include_once 'Bidang.php';

class SegitigaSiku2 extends Bidang{
    //member1 varibel
    public $bentuk;
    public $alas;
    public $tinggi;
    public $sisiMiring;
    public $luas;
    public $keliling;

    //member2 konstruktor
    public function __construct($nama,$bentuk,$alas,$tinggi){
        parent::__construct($nama);
        $this->bentuk = $bentuk;
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }
    //member3 fungsi2
    public function sisiMiring(){
        $this->sisiMiring = sqrt(pow($this->alas,2) + pow($this->tinggi,2));
    }
    public function luas(){
        $this->luas = $this->alas * $this->tinggi / 2;
    }
    public function keliling(){
        $this->keliling = $this->alas + $this->tinggi + $this->sisiMiring;
    }

    public function cetak(){
        parent::cetak();
        echo '<br/>Bentuk: '.$this->bentuk;
        echo '<br/>Alas: '.$this->alas.'cm';
        echo '<br/>Tinggi: '.$this->tinggi.'cm';
        echo '<br/>Sisi Miring: '.$this->sisiMiring.'cm';
        echo '<br/>Luasnya : '.$this->luas.'cm<sup>2</sup>';
        echo '<br/>Kelilingnya: '.$this->keliling.'cm';
        echo '<hr/>';
    }
}