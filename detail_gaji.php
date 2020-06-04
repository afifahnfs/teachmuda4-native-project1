<?php
//tangkap request id di url
$nip = $_GET['nip'];
$model = new Gaji();
$gaj = $model->detailGaji([$nip]);
$total_gaji = $gaj['gapok'] + $gaj['tunjab'] + $gaj['bpjs'] + $gaj['lain2'];
?>

<div class="card" style="width: 15rem;">
<?php
    if(!empty($gaj['foto'])){ //jika ada file foto di db
?> 
  <img src="images/<?= $gaj['foto'] ?>" class="card-img-top" alt="...">
<?php
}else{
?>
  <img src="images/nophoto.jpg" class="card-img-top" alt="...">
<?php } ?>  
  <div class="card-body">
    <h5 class="card-title"><?= $gaj['nama'] ?></h5>
    <p class="card-text">
    NIP : <?= $gaj['nip'] ?> <br/>
    Jenis Kelamin : <?= $gaj['gender'] ?> <br/>
    Jabatan : <?= $gaj['jab'] ?> <br/>
    Divisi : <?= $gaj['bagian'] ?> <br/>
    Tempat Lahir : <?= $gaj['tempat_lahir'] ?> <br/>
    Tanggal Lahir : <?= $gaj['tanggal_lahir'] ?> <br/>
    Gaji Pokok : RP. <?= number_format($gaj['gapok'], 0, ',','.') ?> <br/>
    Tunjangan : RP. <?= number_format($gaj['tunjab'], 0, ',','.') ?> <br/>
    BPJS : RP. <?= number_format($gaj['bpjs'], 0, ',','.') ?> <br/>
    Lain-Lain : RP. <?= number_format($gaj['lain2'], 0, ',','.') ?> <br/>
    <b> Total Gaji : RP. <?= number_format($total_gaji, 0, ',','.') ?> <br/>
    Alamat : <?= $gaj['alamat'] ?> <br/>
    Email : <?= $gaj['email'] ?> <br/>
    </p>
    <a href="index.php?hal=gaji" class="btn btn-primary">Go Back</a>
  </div>
</div>