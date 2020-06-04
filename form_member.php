<?php
$idedit = $_REQUEST['idedit'];
$model = new Member();
if(!empty($idedit)){
    $rs = $model->getMember([$idedit]);
}else{
    $rs = [];
}
//master data radio
$ar_role = ['Administrator'=>'Administrator','Manager'=>'Manager','Staff'=>'Staff'];
?>
<h3>Form Member</h3>
<form method="POST" action="controller_member.php">
  <div class="form-group row">
    <label for="fullname" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <input id="fullname" name="fullname" value="<?= $rs['fullname'] ?>"
      type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="username" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="username" name="username" value="<?= $rs['username'] ?>"
      type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="password" name="password" value="<?= $rs['pasword'] ?>"
      type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Role</label> 
    <div class="col-8">
        <?php 
        foreach($ar_role as $label => $rl){
            //tampilkan data lama
            $cek = ($rl == $rs['role']) ? 'checked' : '';
        ?>
      <div class="form-check form-check-inline">
        <input name="role" type="radio" <?= $cek ?> class="form-check-input" value="<?= $rl ?>"> 
        <label class="form-check-label"><?= $label ?></label>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" value="<?= $rs['email'] ?>" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?= $rs['foto'] ?>" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php
    if(empty($idedit)){ //-------modus entry data baru------
    ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
    <?php
    }
    else{ //-------modus edit data lama------
    ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <button name="proses" value="hapus" type="submit" 
              onclick="return confirm('ciuus mau dihapus?')" class="btn btn-danger">Hapus</button>
      <!-- hidden field untuk melempar idedit ke controller -->
      <input type="hidden" name="idx" value="<?= $idedit ?>"/>
    <?php } ?>
    <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>