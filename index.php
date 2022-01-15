<?php 
	include 'header.php';
?>

<div class="header-home">
	<div class="container">
		<div class="content">
			<h1 class="home-title">Selamat datang di Tatsaka Batik</h1>
			<p class="home-description">Berbelanja disini dan dapatkan batik premium dengan harga yang sangat bersahabat
				tapi kualitas sangat bagus.</p>
			<a href="produk.php" class="btn p-3">Lanjut Berbelanja</a>
		</div>
	</div>
</div>

<section class="about-us">
	<div class="container">
		<h4 class="title text-center">Mengenal lebih dekat dengan kami</h4>
		<p class="description text-center">
			Tatsaka Batik merupakan home industri batik Tatsaka di Desa Tampo Kecamatan Cluring Kabupaten Banyuwangi,
			Jawa Timur. Rumah industri Tatsaka memproduksi batik khas Banyuwangi kebanyakan berdasarkan pesanan. Tunggu
			apalagi, scroll ke bawah untuk melihat gallery kami.
		</p>
	</div>
</section>

<section class="products">
	<div class="container">
		<h4 class="title text-center">Produk andalan kami</h4>

		<div class="row mt-5">
			<?php
				$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY kode_produk ASC LIMIT 4");
				while($row = mysqli_fetch_assoc($result)) {
			?>

			<div class="col-sm-6 col-md-3">
				<div class="card text-center mb-5">
					<img src="image/produk/<?= $row['image'] ?>" alt="<?= $row['nama'] ?>" class="card-img-top">
						<h4 class="card-title"><?= $row['nama'] ?></h4>
						<p class="card-description">
							<?php 
								if(strpos($row['harga'], ",") == false) {
									echo "Rp. ".number_format($row['harga'])."";
								} else {
									$a = explode(",", $row['harga']);
									echo "Rp. ".number_format($a[0])." - Rp. ".number_format(end($a));  
								}
							?>
						</p>
						<a href="detail_produk.php?produk=<?= $row['kode_produk'] ?>" class="btn btn-black px-4 py-2">
							Detail produk
						</a>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>
</section>

<?php 
	include 'footer.php';
?>