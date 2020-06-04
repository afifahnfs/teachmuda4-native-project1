<?php
//tangkap request id di url
$id = $_GET['id'];
$model = new Pelatihan();
$plt = $model->detailPelatihan([$id]);
?>

<div class="card" style="width: 20rem;">
<?php
    if(!empty($plt['foto'])){ //jika ada file foto di db
?> 
  <img src="images/<?= $plt['foto'] ?>" width="20%" class="card-img-top" alt="...">
<?php
}else{
?>
  <img src="images/nophoto.jpg" width="20%" class="card-img-top" alt="...">
<?php } ?>  
  <div class="card-body">
    <h5 class="card-title"><?= $plt['nama'] ?></h5>
    <p class="card-text">
    Materi : <?= $plt['materi'] ?> <br/>
    Tanggal Mulai : <?= $plt['tgl_mulai'] ?> <br/>
    Tanggal Berakhir : <?= $plt['tgl_akhir'] ?> <br/>
    Keterangan : <?= $plt['keterangan'] ?> <br/>
    </p>
    <a href="index.php?hal=pelatihan" class="btn btn-primary">Go Back</a>
  </div>
</div>