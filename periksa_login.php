<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['id'];
	$_SESSION['user_nama'] = $data['user_nama'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['role'] = $data['user_level'];
	$_SESSION['foto'] = $data['user_foto'];

	if($data['user_level'] == "administrator"){
		header("location:admin/");
	}else if($data['user_level'] == "manajemen"){
		header("location:manajemen/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else{
	header("location:index.php?alert=gagal");
}
