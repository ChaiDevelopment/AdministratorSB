<?php 
include '../koneksi.php';

$nama = $_POST['user_nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['user_level'];

$rand = rand();
$allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['foto']['name'];

if($filename == "") {
    $query = "INSERT INTO users (user_nama, username, password, user_foto, user_level) VALUES ('$nama', '$username', '$password', '', '$level')";
    if(mysqli_query($koneksi, $query)) {
        header("Location: user.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext, $allowed)) {
        header("Location: user.php?alert=gagal");
    } else {
        $file_gambar = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/' . $file_gambar);
        $query = "INSERT INTO users (user_nama, username, password, user_foto, user_level) VALUES ('$nama', '$username', '$password', '$file_gambar', '$level')";
        if(mysqli_query($koneksi, $query)) {
            header("Location: user.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
}

mysqli_close($koneksi);
?>
