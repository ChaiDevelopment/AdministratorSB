<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../koneksi.php';

    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $query = "INSERT INTO barang1 (nama_barang, kategori, jumlah, harga) VALUES ('$nama_barang', '$kategori', '$jumlah', '$harga')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h1>Tambah Barang</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required>
        </div>
        <button type="submit">Tambah</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
