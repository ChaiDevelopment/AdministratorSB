<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $query = "UPDATE barang SET nama_barang='$nama_barang', kategori='$kategori', jumlah='$jumlah', harga='$harga' WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    $query = "SELECT * FROM barang WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $barang = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <h1>Edit Barang</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" value="<?php echo $barang['kategori']; ?>" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" value="<?php echo $barang['jumlah']; ?>" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="<?php echo $barang['harga']; ?>" required>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
