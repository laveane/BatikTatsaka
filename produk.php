<?php 
	include 'header.php';
 ?>

<section class="products">
	<div class="container">
		<h4 class="title text-center">Produk andalan kami</h4>

		<div class="row mt-5">
			<?php
				$result = mysqli_query($conn, "SELECT * FROM produk");
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