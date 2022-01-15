<?php 
	session_start();
	include 'koneksi/koneksi.php';
	if(isset($_SESSION['kd_cs'])){
		$kode_cs = $_SESSION['kd_cs'];
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tatsaka Batik - Batik Khas Banyuwangi</title>

	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/icons/css/boxicons.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<nav class="navbar navbar-light bg-white navbar-expand-lg" style="padding: 5px;">
		<div class="container">
			<a href="." class="navbar-brand">
				<img src="./image/tatsaka-logo.jpeg" width="50" height="50">
				<span style="font-weight: 600">Tatsaka Batik</span>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
					<li class="nav-item"><a class="nav-link" href="about.php">Tentang Kami</a></li>
					<li class="nav-item"><a class="nav-link" href="manual.php">Cara Order</a></li>
					<?php
						if(isset($_SESSION['kd_cs'])){
							$kode_cs = $_SESSION['kd_cs'];
							$cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
							$value = mysqli_num_rows($cek);
					?>
					<li class="nav-item">
						<a class="nav-link" href="keranjang.php">
							<i class="bx bx-cart"></i> <b>[<?= $value ?>]</b>
						</a>
					</li>
					<?php 
						}

						if(!isset($_SESSION['user'])){
					?>

					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle px-3" data-bs-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false" style="background-color: #000000; color: #FFFFFF">
							<i class="bx bx-user"></i> Akun <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="user_login.php">login</a></li>
							<li><a class="dropdown-item" href="register.php">Register</a></li>
						</ul>
					</li>
					<?php 
					}else{
					?>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button"
							aria-haspopup="true" aria-expanded="false"><i class="bx bx-user"></i>
							<?= $_SESSION['user']; ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="proses/logout.php">Log Out</a></li>
							<li><a class="dropdown-item" href="pesanan-saya.php">Pesanan Saya</a></li>
						</ul>
					</li>
					<?php 
					}
					?>
				</ul>
			</div>
		</div>
	</nav>