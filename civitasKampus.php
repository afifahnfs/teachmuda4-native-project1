<?php
include_once 'models/Dosen.php';
include_once 'models/Mahasiswa.php';
//ciptakan object
$d1 = new Dosen('Pendi','L',30,'Dr, M.Kom','Kaprodi SI');
$d2 = new Dosen('Pipah','P',26,'S.Kom. M.Kom','Kaprodi TI');
$m1 = new Mahasiswa('Salva','P','24','SI');
$m2 = new Mahasiswa('Whulan','P','23','IT');
$m1->setSemester(5);
$m2->setSemester(2);
?>
<div class="jumbotron">
	<h2>
        Civitas Kampus STT-NF
	</h2>
	<p>
	    <h5>Data Dosen</h5><br/>
        <?php
        $d1->cetak(); $d2->cetak()
        ?>
	</p>
    <p>
	    <h5>Data Mahasiswa</h5><br/>
        <?php
        $m1->cetak(); $m2->cetak()
        ?>
	</p>
	<p>
	    <a class="btn btn-primary btn-large" href="#">
        Selanjutnya
		<i class="fas fa-arrow-alt-circle-right"></i>
        </a>
	</p>
</div>