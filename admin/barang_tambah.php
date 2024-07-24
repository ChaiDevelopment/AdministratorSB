<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Tambah Barang Baru</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6 col-lg-offset-3">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Tambah Barang Baru</h3>
            <a href="barang.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="barang_act.php" method="post">
              <div class="form-group">
                <label for="barang_nama">Nama</label>
                <input type="text" class="form-control" name="barang_nama" id="barang_nama" required="required" placeholder="Masukkan Nama ..">
              </div>
              <div class="form-group">
                <label for="barang_spesifikasi">Spesifikasi</label>
                <input type="text" class="form-control" name="barang_spesifikasi" id="barang_spesifikasi" required="required" placeholder="Masukkan spesifikasi ..">
              </div>
              <div class="form-group">
                <label for="barang_lokasi">Lokasi</label>
                <input type="text" class="form-control" name="barang_lokasi" id="barang_lokasi" required="required" placeholder="Masukkan lokasi ..">
              </div>
              <div class="form-group">
                <label for="barang_kondisi">Kondisi</label>
                <input type="text" class="form-control" name="barang_kondisi" id="barang_kondisi" required="required" placeholder="Masukkan kondisi ..">
              </div>
              <div class="form-group">
                <label for="barang_jumlah">Jumlah</label>
                <input type="number" class="form-control" name="barang_jumlah" id="barang_jumlah" required="required" placeholder="Masukkan jumlah ..">
              </div>
              <div class="form-group">
                <label for="barang_sumber_dana">Sumber Dana</label>
                <input type="text" class="form-control" name="barang_sumber_dana" id="barang_sumber_dana" required="required" placeholder="Masukkan sumber dana ..">
              </div>
              <div class="form-group">
                <label for="barang_keterangan">Keterangan</label>
                <input type="text" class="form-control" name="barang_keterangan" id="barang_keterangan" placeholder="Masukkan keterangan ..">
              </div>
   
              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>
