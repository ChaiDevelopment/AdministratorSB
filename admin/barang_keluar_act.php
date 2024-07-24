<?php 
include '../koneksi.php';

// Ambil data dari form
$barang_id   = $_POST['barang'];
$tanggal     = $_POST['tanggal'];
$jumlah      = $_POST['jumlah'];
$lokasi      = $_POST['lokasi'];
$penerima    = $_POST['penerima'];
$keterangan  = $_POST['keterangan'];

// Query untuk mendapatkan informasi barang berdasarkan barang_id
$query_barang = "SELECT * FROM barang WHERE barang_id = '$barang_id'";
$result_barang = mysqli_query($koneksi, $query_barang);

if (!$result_barang) {
    die("Query error: " . mysqli_error($koneksi));
}

// Fetch hasil query barang
$barang = mysqli_fetch_assoc($result_barang);
$nama_barang = $barang['barang_nama'];
$jumlah_barang = $barang['barang_jumlah'];

// Cek jika jumlah yang dimasukkan lebih besar dari jumlah barang yang tersedia
if ($jumlah > $jumlah_barang) {
    header("location:barang_keluar.php?alert=lebih");
    exit; // Hentikan eksekusi script jika jumlah melebihi stok
}

// Kurangi jumlah barang yang tersedia
$jumlah_baru = $jumlah_barang - $jumlah;
$query_update_barang = "UPDATE barang SET barang_jumlah = '$jumlah_baru' WHERE barang_id = '$barang_id'";
$result_update_barang = mysqli_query($koneksi, $query_update_barang);

if (!$result_update_barang) {
    die("Query error: " . mysqli_error($koneksi));
}

// Insert data barang keluar ke dalam tabel barang_keluar tanpa bk_id
$query_insert_barang_keluar = "INSERT INTO barang_keluar (bk_nama_barang, bk_tanggal_keluar, bk_jumlah_keluar, bk_lokasi, bk_penerima, bk_keterangan)
                              VALUES ('$nama_barang', '$tanggal', '$jumlah', '$lokasi', '$penerima', '$keterangan')";
$result_insert_barang_keluar = mysqli_query($koneksi, $query_insert_barang_keluar);

if (!$result_insert_barang_keluar) {
    die("Query error: " . mysqli_error($koneksi));
}

// Redirect ke halaman barang_keluar.php setelah proses selesai
header("location:barang_keluar.php");
exit;
?>
