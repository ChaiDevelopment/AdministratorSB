<?php 
include '../koneksi.php';
session_start();
$id = $_SESSION['user_id'];
$password = $_POST['password'];

// Menggunakan password_hash untuk mengenkripsi kata sandi
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if ($stmt = $koneksi->prepare("UPDATE users SET password=? WHERE id=?")) {
    $stmt->bind_param("si", $hashed_password, $id);
    if ($stmt->execute()) {
        header("location:gantipassword.php?alert=sukses");
    } else {
        // Tangani kesalahan jika eksekusi query gagal
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Tangani kesalahan jika prepare statement gagal
    echo "Error: " . $koneksi->error;
}

$koneksi->close();
?>
