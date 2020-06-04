<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php
$ar_judul = ['No','Nama','Materi','Tanggal Mulai',
            'Tanggal Berakhir','Keterangan','Foto','Action'];
?>
<h3>Data Pelatihan</h3>
<!--a href="index.php?hal=form_pelatihan" type="button" 
   class="btn btn-primary">Input Data</a-->
<!---------------- awal modal ------------------------>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_pelatihan">
  Input Data
</button>

<!-- Modal -->
<div class="modal fade" id="form_pelatihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pelatihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_pelatihan.php' 
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
    $model = new Pelatihan();
    $rs = $model->dataPelatihan();
    $no = 1;
    foreach($rs as $plt){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $plt['nama'] ?></td>
            <td><?= $plt['materi'] ?></td>
            <td><?= $plt['tgl_mulai'] ?></td>
            <td><?= $plt['tgl_akhir'] ?></td>
            <td><?= $plt['keterangan'] ?></td>
            <td>
            <?php
            if(!empty($plt['foto'])){ //jika ada file foto di db
            ?>
              <img src="images/<?= $plt['foto'] ?>" width="20%"/>
            <?php 
            } 
            else{ //jika kosong nama file foto di db
            ?>
              <img src="images/nophoto.jpg" width="20%"/>
            <?php } ?>
            </td>
            <td>
              <a href="index.php?hal=detail_pelatihan&id=<?= $plt['id'] ?>" type="button" 
                class="btn btn-primary">Detail</a>
              <a href="index.php?hal=form_pelatihan&idedit=<?= $plt['id'] ?>" type="button" 
                class="btn btn-warning">Edit</a>
            </td>
        </tr>
    <?php $no++; } ?>    
  </tbody>
</table>
<?php 
} 
else{ //jika belum login
  include_once 'terlarang.php';
}
?>