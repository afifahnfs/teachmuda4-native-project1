<?php 
  if(isset($_SESSION['MEMBER'])){
?>

<?php
// 1. tangkap request di url (idedit)
$idedit = $_GET['idedit'];
// 2. simpan ke sebuah data array
if(!empty($idedit)){
  $model = new Jabatan();
  $rs = $model->getJabatan([$idedit]);
}
else{
  $rs = [];
}
?>
<h3>Form Jabatan</h3>
<form method="POST" action="controller_jabatan.php">
  <div class="form-group row">
    <label class="col-4 col-form-label" for="nama">Nama Jabatan</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $rs['nama'] ?>" type="text" 
      class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <?php
      if(empty($idedit)){
      ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
      <?php
      }
      else{
      ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <button name="proses" value="hapus" type="submit" 
      onclick="return confirm('Yakin dihapus???')" class="btn btn-danger">Hapus</button>
      <input type="hidden" name='idx' value="<?= $idedit ?>"/>
      <?php } ?>
      <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>
<?php 
} 
else{ //jika belum login
  include_once 'terlarang.php';
}
?>