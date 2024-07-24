<?php 
include '../koneksi.php';

$barang  = $_POST['barang'];
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$suplier = $_POST['suplier'];

// Mengambil data barang berdasarkan barang_id
$b = mysqli_query($koneksi,"SELECT * FROM barang WHERE barang_id='$barang'");
$bb = mysqli_fetch_assoc($b);
$nama_barang = $bb['barang_nama'];

// Mengambil data suplier berdasarkan suplier_id
$s = mysqli_query($koneksi,"SELECT * FROM suplier WHERE suplier_id='$suplier'");
$ss = mysqli_fetch_assoc($s);
$nama_suplier = $ss['suplier_nama'];

// Menambah jumlah data barang
$jumlah_lama = $bb['barang_stok'];
$jumlah_baru = $jumlah_lama + $jumlah;
mysqli_query($koneksi,"UPDATE barang SET barang_stok='$jumlah_baru' WHERE barang_id='$barang'");

// Menambahkan data ke tabel barang_masuk
mysqli_query($koneksi, "INSERT INTO barang_masuk (bm_id_barang, bm_tgl_masuk, bm_jumlah, bm_id_suplier) VALUES ('$barang', '$tanggal', '$jumlah', '$suplier')");

// Redirect ke halaman barang_masuk.php
header("location:barang_masuk.php");
?>
