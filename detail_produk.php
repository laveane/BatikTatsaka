<?php 
	include 'header.php';
	$kode   = mysqli_real_escape_string($conn,$_GET['produk']);
	$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
	$jml    = mysqli_num_rows($result);
	$row    = mysqli_fetch_assoc($result);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<section class="product-detail">
	<div class="container">
		<h4 class="title w-100">Detail Produk</h4>

		<form action="proses/add.php" method="get">

			<input type="hidden" name="kd_cs" value="<?= $kode_cs; ?>">
			<input type="hidden" name="berat" value="<?php echo $row['berat']; ?>">
			<input type="hidden" id="kode" name="produk" value="<?= $kode;  ?>">
			<input type="hidden" name="hal" value="2">
			<input type="hidden" name="harga" value="" id="setharga">

			<div class="row justify-content-center align-items-center mt-5">
				<div class="col-md-4">
					<img src="./image/produk/<?= $row['image'] ?>" alt="">
				</div>
				<div class="col-md-8">
					<h4 class="product-title"><?= $row['nama'] ?></h4>
					<p class="description w-100" id="harga">
						<?php 
					if(strpos($row['harga'], ",") == false){
						echo "Rp.".number_format($row['harga'])."";
					}else{
						$a = explode(",", $row['harga']);
						echo "Rp. ".number_format($a[0])." - ".number_format(end($a));  

					}
				?>
					</p>
					<p class="description w-100 mt-3">
						<?= $row['deskripsi'] ?>
					</p>

					<div class="row align-items-center mt-3">
						<div class="col-2">Ukuran</div>
						<div class="col-5">
							<?php 
								$arr = explode(",", $row['ukuran']);
								$jml = count($arr);
							?>
							<select class="form-control" name="ukuran" id="ukuran">
								<option selected value="nul">-- Pilih Ukuran --</option>
								<?php for ($i=0; $i < $jml; $i++) { 
									?>
								<option value="<?php echo $arr[$i]; ?>"><?php echo strtoupper($arr[$i]); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row mt-3 mb-5">
						<div class="col-2">Jumlah</div>
						<div class="col-5">
							<input class="form-control" type="number" min="1" name="jml" value="1">
						</div>
					</div>

					<?php 
						if(isset($_SESSION['user'])){
					?>
					<button type="submit" class="btn btn-black px-4 py-2"><i class="bx bx-cart"></i> Tambahkan ke
						Keranjang</button>
					<?php 
						}else{

					?>
					<a href="keranjang.php" class="btn btn-black px-4 py-2"><i class="bx bx-cart"></i> Tambahkan ke
						Keranjang</a>
					<?php 
				}
				?>
					<a href="index.php" class="btn btn-warning px-4 py-2"> Kembali Belanja</a>
				</div>
			</div>
		</form>

	</div>
</section>

<script type="text/javascript">
	$(document).ready(function () {

		$("#ukuran").change(function () {
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
			var ukuran = $('#ukuran').val();
			var kode = $('#kode').val();

			$.ajax({
				type: 'POST',
				url: 'http://localhost/batik-production/cekharga.php',
				data: {
					'ukuran': ukuran,
					'kode': kode
				},
				success: function (data) {
					var arr = data.split("|");

					$("#harga").html(arr[0]);
					$("#setharga").val(arr[1]);
				}
			});
		});
	});
</script>

<?php 
include 'footer.php';
?>