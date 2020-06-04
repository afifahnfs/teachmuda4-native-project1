<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
?>

<?php
//-----------awal proses edit data---------------
//1.tangkap request idedit
$idedit = $_REQUEST['idedit'];
$model =new Pelatihan();
if(!empty($idedit)){ //modus edit data lama
  $rs = $model->detailPelatihan([$idedit]);
}else{ //modus entry data bau
  $rs = [];
}
//-----------akhir proses edit data--------------
//master data select
$obj1 = new Pegawai();
$obj2 = new Materi();
$ar_pegawai = $obj1->dataPegawai();
$ar_materi = $obj2->dataMateri();
?>
<h3>Form Pegawai</h3>
<form method="POST" action="controller_pelatihan.php">
<div class="form-group row">
    <label for="nip" class="col-4 col-form-label">Nama Pegawai</label> 
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
    <label for="nip" class="col-4 col-form-label">Materi</label> 
    <div class="col-8">
    <select id="materi" name="materi_id" class="custom-select">
        <option value="">-- Pilih Materi --</option>
        <?php
        foreach($ar_materi as $materi){
          //menampilkan data lama
          $sel = ($materi['id'] == $rs['materi_id']) ? 'selected' : '';
        ?>
        <option value="<?= $materi['id'] ?>" <?= $sel ?> > <?= $materi['nama']?> </option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">Tanggal Mulai</label> 
    <div class="col-8">
      <input id="tgl_mulai" name="tgl_mulai" value="<?= $rs['tgl_mulai'] ?>" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">Tanggal Berakhir</label> 
    <div class="col-8">
      <input id="tgl_akhir" name="tgl_akhir" value="<?= $rs['tgl_akhir'] ?>" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">Keterangan</label> 
    <div class="col-8">
      <input id="keterangan" name="keterangan" value="<?= $rs['keterangan'] ?>" type="text" class="form-control">
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
<?php 
} 
else{ //jika belum login
  include_once 'terlarang.php';
}
?>