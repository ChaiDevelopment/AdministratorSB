<?php 
include '../koneksi.php';

$id  = $_POST['id'];
$user_nama  = $_POST['user_nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$level = $_POST['user_level'];

// cek gambar
$rand = rand();
$allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['user_foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if ($pwd == "" && $filename == "") {
    $stmt = $koneksi->prepare("UPDATE users SET user_nama=?, username=?, user_level=? WHERE id=?");
    $stmt->bind_param("sssi", $user_nama, $username, $level, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: user.php");
} elseif ($pwd == "") {
    if (!in_array($ext, $allowed)) {
        header("Location: user.php?alert=gagal");
    } else {
        $new_filename = $rand . '_' . $filename;
        move_uploaded_file($_FILES['user_foto']['tmp_name'], '../gambar/user/' . $new_filename);
        $stmt = $koneksi->prepare("UPDATE users SET user_nama=?, username=?, user_foto=?, user_level=? WHERE id=?");
        $stmt->bind_param("ssssi", $user_nama, $username, $new_filename, $level, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: user.php?alert=berhasil");
    }
} elseif ($filename == "") {
    // Simpan password tanpa hashing
    $stmt = $koneksi->prepare("UPDATE users SET user_nama=?, username=?, password=?, user_level=? WHERE id=?");
    $stmt->bind_param("ssssi", $user_nama, $username, $pwd, $level, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: user.php");
} else {
    // Simpan password tanpa hashing
    $new_filename = $rand . '_' . $filename;
    move_uploaded_file($_FILES['user_foto']['tmp_name'], '../gambar/user/' . $new_filename);
    $stmt = $koneksi->prepare("UPDATE users SET user_nama=?, username=?, password=?, user_foto=?, user_level=? WHERE id=?");
    $stmt->bind_param("sssssi", $user_nama, $username, $pwd, $new_filename, $level, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: user.php?alert=berhasil");
}

$koneksi->close();
?>
