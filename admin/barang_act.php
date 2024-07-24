<?php 
include '../koneksi.php'; // Pastikan file koneksi berada di path yang benar

// Mengambil data dari form
$nama = $_POST['barang_nama'];
$spesifikasi = $_POST['barang_spesifikasi'];
$lokasi = $_POST['barang_lokasi'];
$kondisi = $_POST['barang_kondisi'];
$jumlah = $_POST['barang_jumlah'];
$sumber_dana = $_POST['barang_sumber_dana'];
$keterangan = $_POST['barang_keterangan'];
$jenis = $_POST['barang_jenis'];

// Menyisipkan data ke dalam tabel 'barang'
$sql = "INSERT INTO barang (barang_nama, barang_spesifikasi, barang_lokasi, barang_kondisi, barang_jumlah, barang_sumber_dana, barang_keterangan, barang_jenis) 
        VALUES ('$nama', '$spesifikasi', '$lokasi', '$kondisi', '$jumlah', '$sumber_dana', '$keterangan', '$jenis')";

if (mysqli_query($koneksi, $sql)) {
    header("location:barang.php"); // Redirect ke halaman barang.php setelah berhasil menambahkan data
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
