<?php	
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] == 'administrator'){
?>							
<?php
$ar_judul = ['No','Nama Lengkap','Username','Password','Role','Email','Foto','Action'];
?>
<h3>Data Member</h3>
<a href="index.php?hal=form_member" type="button" 
   class="btn btn-primary">Input Data</a>
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
    $model = new Member();
    $rs = $model->dataMember();
    $no = 1;
    foreach($rs as $member){
    ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $member['fullname'] ?></td>
            <td><?= $member['username'] ?></td>
            <td><?= $member['password'] ?></td>
            <td><?= $member['role'] ?></td>
            <td><?= $member['email'] ?></td>
            <td>
            <?php
            if(!empty($member['foto'])){ //jika ada file foto di db
            ?>
              <img src="images/<?= $member['foto'] ?>" width="30%"/>
            <?php 
            } 
            else{ //jika kosong nama file foto di db
            ?>
              <img src="images/nophoto.jpg" width="20%"/>
            <?php } ?>
            </td>
            <td>
              <a href="index.php?hal=form_member&idedit=<?= $member['id'] ?>" type="button" 
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