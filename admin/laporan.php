<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Filter Laporan</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-4">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                  <div class="form-group">
                    <label>Laporan</label>
                    <select name="jenis" class="form-control" required="required">
                      <option value="">- Pilih -</option>
                      <option <?php if(isset($_GET['jenis'])){ if($_GET['jenis'] == "barang_masuk"){echo "selected='selected'";}} ?> value="barang_masuk">Barang Masuk</option>
                      <option <?php if(isset($_GET['jenis'])){ if($_GET['jenis'] == "barang_keluar"){echo "selected='selected'";}} ?> value="barang_keluar">Barang Keluar</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['jenis'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              $jenis = $_GET['jenis'];
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>
                    <tr>
                      <th>JENIS</th>
                      <th>:</th>
                      <td><?php echo $jenis; ?></td>
                    </tr>
                  </table>
                  
                </div>
              </div>

              <?php 
              if($jenis == "barang_masuk"){
                ?>
                <a href="laporan_pdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&jenis=<?php echo $jenis ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
                <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&jenis=<?php echo $jenis ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped" id="table-datatable">
                    <thead>
                      <tr>
                        <th width="1%">NO</th>
                        <th>NAMA BARANG</th>
                        <th>TANGGAL MASUK</th>
                        <th>JUMLAH</th>
                        <th>NAMA SUPLIER</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      include '../koneksi.php';
                      $no=1;
                      $data = mysqli_query($koneksi,"SELECT * FROM barang_masuk bm
                      INNER JOIN barang b ON bm.bm_id_barang = b.barang_id
                      INNER JOIN suplier s ON bm.bm_id_suplier = s.suplier_id
                       WHERE date(bm_tgl_masuk) >= '$tgl_dari' AND date(bm_tgl_masuk) <= '$tgl_sampai'");
                      while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $d['barang_nama']; ?></td>
                          <td><?php echo $d['bm_tgl_masuk']; ?></td>
                          <td><?php echo $d['bm_jumlah']; ?></td>
                          <td><?php echo $d['suplier_nama']; ?></td>
                        </tr>
                        <?php 
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                <?php 
              }elseif($jenis == "barang_keluar"){
               ?>
               <a href="laporan_pdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&jenis=<?php echo $jenis ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
               <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&jenis=<?php echo $jenis ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>

               <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-datatable">
                  <thead>
                    <tr>
                      <th width="1%">NO</th>
                      <th>NAMA BARANG</th>
                      <th>TANGGAL KELUAR</th>
                      <th>JUMLAH</th>
                      <th>LOKASI</th>
                      <th>PENERIMA</th>
                      <th>KETERANGAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT * FROM barang_keluar WHERE date(bk_tanggal_keluar) >= '$tgl_dari' AND date(bk_tanggal_keluar) <= '$tgl_sampai'");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['bk_nama_barang']; ?></td>
                        <td><?php echo $d['bk_tanggal_keluar']; ?></td>
                        <td><?php echo $d['bk_jumlah_keluar']; ?></td>
                        <td><?php echo $d['bk_lokasi']; ?></td>
                        <td><?php echo $d['bk_penerima']; ?></td>
                        <td><?php echo $d['bk_keterangan']; ?></td>
                      </tr>
                      <?php 
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <?php 
            } 
            ?>

            <?php 
          }else{
            ?>

            <div class="alert alert-info text-center">
              Silahkan Filter Laporan Terlebih Dulu.
            </div>

            <?php
          }
          ?>

        </div>
      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>