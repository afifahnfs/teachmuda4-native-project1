<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>
<?php
//------------------ awal edit data ---------------
$idedit = $_REQUEST['idedit'];
$model = new Gaji();
if(!empty($idedit)){
  $rs = $model->getGaji([$idedit]);
}
else{
  $rs = [];
}
//------------------ akhir edit data --------------
//master data di radio dan select
$obj = new Pegawai();
$ar_pegawai = $obj->dataPegawai();
?>
<h3>Form Gaji</h3>
<form method="POST" action="controller_gaji.php">
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">Pegawai</label> 
    <div class="col-8">
    <select id="pegawai" name="pegawai_id" class="custom-select">
        <option value="">-- Pilih Pegawai --</option>
        <?php
        foreach($ar_pegawai as $peg){
          //menampilkan data lama
          $sel = ($peg['id'] == $rs['pegawai_id']) ? 'selected' : '';
        ?>
        <option value="<?= $peg['id'] ?>" <?= $sel ?> > <?= $peg['nama']?> </option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Gaji Pokok</label> 
    <div class="col-8">
      <input id="gapok" name="gapok" value="<?= $rs['gapok'] ?>" type="double" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tmp" class="col-4 col-form-label">Tunjangan</label> 
    <div class="col-8">
      <input id="tunjab" name="tunjab" value="<?= $rs['tunjab'] ?>" type="double" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">BPJS</label> 
    <div class="col-8">
    <input id="bpjs" name="bpjs" value="<?= $rs['bpjs'] ?>" type="double" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Lain-Lain</label> 
    <div class="col-8">
      <input id="lain2" name="lain2" value="<?= $rs['lain2'] ?>" type="double" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php
    if(empty($idedit)){ //-------- entry data baru
    ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
    <?php
    }
    else{ //------------- edit data lam
    ?>
     <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <button name="proses" value="hapus" type="submit" 
              onclick="return confirm('Yakin nih dihapus???')" class="btn btn-danger">Hapus</button>
      <!-- hidden field untuk melempar idedit ke controller -->
      <input type="hidden" name="idx" value="<?= $idedit ?>"/>
    <?php } ?>
    <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>
<?php 
}
else{ //jika tidak login
  include_once 'terlarang.php';
}
?>