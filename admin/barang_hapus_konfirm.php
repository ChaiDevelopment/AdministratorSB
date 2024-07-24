<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Hapus Barang
      <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Yakin Ingin Menghapus Barang ?</h3>
          </div>
          <div class="box-body">
            <?php 
            // Periksa apakah parameter 'barang_id' ada dalam URL
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
            ?>
              <p>Dengan menghapus, semua data barang keluar dan barag masuk yang berhubungan dengan barang ini akan ikut dihapus.</p>
              <br/>
              <a href="barang.php" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
              <a href="barang_hapus.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-check"></i> &nbsp Hapus</a> 
            <?php 
            } else {
              echo "ID barang tidak ditemukan.";
            }
            ?>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>
