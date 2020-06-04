<?php 
  if(isset($_SESSION['MEMBER'])){
?>

<?php
$ar_judul = ['No','Nama Jabatan','Action'];
?>
<!--a href="index.php?hal=form_jabatan" type="button" 
   class="btn btn-primary">Input Data</a-->
   <!---------------- awal modal ------------------------>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_jabatan">
  Input Data
</button>

<!-- Modal -->
<div class="modal fade" id="form_jabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_jabatan.php' 
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
<h3>Data Jabatan</h3>
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
    $model = new Jabatan();
    $rs = $model->dataJabatan();
    $no = 1;
    foreach($rs as $jab){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $jab['nama'] ?></td>
            <td>
              <a href="index.php?hal=form_jabatan&idedit=<?= $jab['id'] ?>" type="button" 
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