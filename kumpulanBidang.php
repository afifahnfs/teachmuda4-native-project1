<?php
include_once 'models/Lingkaran.php';
include_once 'models/PersegiPanjang.php';
include_once 'models/SegitigaSiku2.php';
include_once 'models/JajarGenjang.php';
//ciptakan object
$l1 = new Lingkaran('Bidang 2 Dimensi','Lingkaran 1',15);
$l2 = new Lingkaran('Bidang 2 Dimensi','Lingkaran 2',35);
$p1 = new PersegiPanjang('Bidang 2 Dimensi','Persegi Panjang 1',12,28);
$p2 = new PersegiPanjang('Bidang 2 Dimensi','Persegi Panjang 2',8,6);
$s1 = new SegitigaSiku2('Bidang 2 Dimensi','Segitiga Siku-Siku 1',15,20);
$s2 = new SegitigaSiku2('Bidang 2 Dimensi','Segitiga Siku-Siku 2',9,12);
$j1 = new JajarGenjang('Bidang 2 Dimensi','Jajar Genjang 1',16,18,28);
$j2 = new JajarGenjang('Bidang 2 Dimensi','Jajar Genjang 2',12,6,9);
$l1->luas(); $l1->keliling();
$l2->luas(); $l2->keliling();
$p1->luas(); $p1->keliling();
$p2->luas(); $p2->keliling();
$s1->sisiMiring(); $s1->luas(); $s1->keliling();
$s2->sisiMiring(); $s2->luas(); $s2->keliling();
$j1->luas(); $j1->keliling();
$j2->luas(); $j2->keliling();
?>
<div class="jumbotron">
	<h2>
        Kumpulan Bidang 2 dimensi
	</h2>
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Lingkaran</th>
      <th scope="col">Persegi Panjang</th>
      <th scope="col">Segitiga Siku-Siku</th>
      <th scope="col">Jajar Genjang</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php $l1->cetak(); $l2->cetak() ?></td>
      <td><?php $p1->cetak(); $p2->cetak() ?></td>
	  <td><?php $s1->cetak(); $s2->cetak() ?></td>
	  <td><?php $j1->cetak(); $j2->cetak() ?></td>
    </tr>
  </tbody>
</table>
	<p>
	    <a class="btn btn-primary btn-large" href="#">
        Selanjutnya
		<i class="fas fa-arrow-alt-circle-right"></i>
        </a>
	</p>
</div>