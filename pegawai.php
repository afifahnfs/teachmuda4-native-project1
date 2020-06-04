
<?php 
  if(isset($_SESSION['MEMBER'])){
?>

<?php
$ar_judul = ['No','NIP','Nama','Jabatan','Divisi','Foto','Action'];
?>
<h3>Data Pegawai</h3>
<!--a href="index.php?hal=form_pegawai" type="button" 
   class="btn btn-primary">Input Data</a-->
<!---------------- awal modal ------------------------>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_pegawai">
  Input Data
</button>

<!-- Modal -->
<div class="modal fade" id="form_pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_pegawai.php' 
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
<br/><br/>
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
    $model = new Pegawai();
    //fitur cari nama dan filter divisi
    $nama = $_GET['nama']; //tangkap request search di url
    $id = $_GET['id']; //tangkap request filter divisi
    $idx = $_GET['jabpeg']; //tangkap request filter jabatan
    //print_r($nama); exit;
    if(!empty($nama)){
      $rs = $model->cariPegawai($nama); //tampilkan sesuai data yg dicari
    }
    else if(!empty($id)){
      $rs = $model->filterDivisi($id); //tampilkan data pegawai berdasarkan filter divisi
    }
    else if(!empty($idx)){
      $rs = $model->filterJabatan($idx); //tampilkan data pegawai berdasarkan filter divisi
    }
    else{
      $rs = $model->dataPegawai(); //tampilkan seluruh data pegawai
    }
    $no = 1;
    foreach($rs as $peg){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $peg['nip'] ?></td>
            <td><?= $peg['nama'] ?></td>
            <td><?= $peg['jab'] ?></td>
            <td><?= $peg['bagian'] ?></td>
            <td>
            <?php
            if(!empty($peg['foto'])){ //jika ada file foto di db
            ?>
              <img src="images/<?= $peg['foto'] ?>" width="20%"/>
            <?php 
            } 
            else{ //jika kosong nama file foto di db
            ?>
              <img src="images/nophoto.jpg" width="20%"/>
            <?php } ?>
            </td>
            <td>
              <a href="index.php?hal=detail_pegawai&id=<?= $peg['id'] ?>" type="button" 
                class="btn btn-primary">Detail</a>
              <a href="index.php?hal=form_pegawai&idedit=<?= $peg['id'] ?>" type="button" 
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