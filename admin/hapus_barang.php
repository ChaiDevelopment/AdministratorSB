<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM barang WHERE id='$id'";
if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
