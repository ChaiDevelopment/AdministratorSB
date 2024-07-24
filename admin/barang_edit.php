<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Barang
      <small>Edit Barang</small>
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
            <h3 class="box-title">Edit Barang</h3>
            <a href="barang.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="barang_update.php" method="post">
              <?php 
              // Ambil id dari URL dan pastikan sudah diinisialisasi
              if(isset($_GET['id'])) {
                $id = $_GET['id'];              
                $query = "SELECT * FROM barang WHERE barang_id='$id'";
                $result = mysqli_query($koneksi, $query);

                // Cek apakah query berhasil
                if(!$result) {
                  echo "Error: " . mysqli_error($koneksi);
                  exit;
                }

                // Ambil data dari hasil query
                $d = mysqli_fetch_array($result);
                if($d) {
                  ?>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?php echo $d['barang_id']; ?>">
                    <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama .." value="<?php echo $d['barang_nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Spesifikasi</label>
                    <input type="text" class="form-control" name="spesifikasi" required="required" placeholder="Masukkan spesifikasi .." value="<?php echo $d['barang_spesifikasi']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" required="required" placeholder="Masukkan lokasi .." value="<?php echo $d['barang_lokasi']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Kondisi</label>
                    <input type="text" class="form-control" name="kondisi" required="required" placeholder="Masukkan kondisi .." value="<?php echo $d['barang_kondisi']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" required="required" placeholder="Masukkan jumlah .." value="<?php echo $d['barang_jumlah']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Sumber Dana</label>
                    <input type="text" class="form-control" name="sumber_dana" required="required" placeholder="Masukkan sumber dana .." value="<?php echo $d['barang_sumber_dana']; ?>">
                  </div>

                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" required="required" placeholder="Masukkan keterangan .." value="<?php echo $d['barang_keterangan']; ?>">
                  </div>

                 

                  <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                  </div>
                  <?php 
                } else {
                  echo "Data tidak ditemukan.";
                }
              } else {
                echo "ID tidak ditemukan.";
              }
              ?>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>
