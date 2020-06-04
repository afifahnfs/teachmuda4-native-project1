<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php
$ar_judul = ['No','NIP','Nama','Jabatan','Divisi',
'Gaji Pokok','Tunjangan','BPJS','Lain-lain','Foto','Action'];
?>
<h3>Data Gaji</h3>
<!--a href="index.php?hal=form_gaji" type="button" 
   class="btn btn-primary">Input Data</a-->
<!---------------- awal modal ------------------------>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_gaji">
  Input Data
</button>

<!-- Modal -->
<div class="modal fade" id="form_gaji" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Gaji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_gaji.php' 
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>
<!---------------- akhir modal ----------------------->
<br/>
<table class="table table-striped">
  <thead>
    <tr>
    <?php
    foreach($ar_judul as $jdl){
    ?>
      <th scope="col"><?= $jdl ?></th>
    <?php } ?>  
    </tr>
  </thead>
  <tbody>
    <?php
    //ciptakan object
    $model = new Gaji();
    $rs = $model->dataGaji();
    $no = 1;
    foreach($rs as $gaj){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $gaj['nip'] ?></td>
            <td><?= $gaj['nama'] ?></td>
            <td><?= $gaj['jab'] ?></td>
            <td><?= $gaj['bagian'] ?></td>
            <td>RP. <?= number_format($gaj['gapok'], 0, ',','.') ?></td>
            <td>RP. <?= number_format($gaj['tunjab'], 0, ',','.') ?></td>
            <td>RP. <?= number_format($gaj['bpjs'], 0, ',','.') ?></td>
            <td>RP. <?= number_format($gaj['lain2'], 0, ',','.') ?></td>
            <td>
            <?php
            if(!empty($gaj['foto'])){ //jika ada file foto di db
            ?>
              <img src="images/<?= $gaj['foto'] ?>" width="25%"/>
            <?php 
            } 
            else{ //jika kosong nama file foto di db
            ?>
              <img src="images/nophoto.jpg" width="25%"/>
            <?php } ?>
            </td>
            <td>
              <a href="index.php?hal=detail_gaji&nip=<?= $gaj['nip'] ?>" type="button" 
                class="btn btn-primary">Detail</a>
              <a href="index.php?hal=form_gaji&idedit=<?= $gaj['id'] ?>" type="button" 
                class="btn btn-warning">Edit</a>
            </td>
        </tr>
    <?php $no++; } ?>    
  </tbody>
</table>
<?php 
}
else{ //jika tidak login
  include_once 'terlarang.php';
}
?>