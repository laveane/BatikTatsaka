<?php 
	include 'header.php';
		// $_SESSION['cek'] = true;
		//  $_SESSION['inv'] = "INV0003";

	if(empty($_SESSION['inv'])) {
		echo `
		<div class="container mt-5" style="margin-bottom: 200px;">
			<div class="row">
				<div class="col-md-6">
					<h3 class="alert-warning">Tidak Ada Pesanan</h3>
				</div>
			</div>
		</div>
		`;
	}
	else if(isset($_SESSION['inv'])){
		$inv    = $_SESSION['inv'];
		$result = mysqli_query($conn, "SELECT * FROM produksi WHERE kode_customer = '$kode_cs' and invoice = '$inv'");
		$row    = mysqli_fetch_assoc($result);
		$data   = $row['tanggal'];
		$ongkir = $row['ongkir'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
?>

<?php
	if($row['images'] != '' || $row['status'] == 'Pesanan Baru' && $row['terima'] == 1){
?>

<div class="container mt-5" style="margin-bottom: 200px;">
	<div class="row">
		<?php
			if($row['images'] != ''){
		?>
		<div class="col-md-12">
			<h3 class="alert-success">Pembayaran Berhasil Resi Akan Dikirimkan Ke Alamat Email Anda </h3>
			<!-- <div id="timer" style="font-size: 40px;" class="alert-warning text-center"> </div> -->

			<?php 
				unset($_SESSION['msg']);
				unset($_SESSION['inv']);
				}
			?>
		</div>
		<?php
		}
		else {
		?>
		<section class="completed">
			<div class="container">
				<h2 class="bg-success " style="padding: 10px;">Checkout Berhasil</h2>
				<div class="row">
					<div class="col-md-8">
						<h3>Sisa Waktu Pembayaran :</h3>
						<div id="timer" style="font-size: 20px;" class="alert-warning text-center mb-3"> </div>
						<?php 
						}
						if(isset($_SESSION['cek'])){
					?>
						<table class="table table-stripped" style="background-color: #fff;">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Harga</th>
								<th>Qty</th>
								<th>Sub Total</th>
							</tr>
							<?php 
							$result = mysqli_query($conn, "SELECT * FROM produksi WHERE kode_customer = '$kode_cs' and invoice = '$inv'");
							$no=1;
							$hasil = 0;

							while($rows = mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $rows['nama_produk']; ?></td>

								<td>Rp.<?= number_format($rows['harga']); ?></td>
								<td><?= $rows['qty']; ?></td>
								<td>Rp.<?= number_format($rows['harga'] * $rows['qty']);  ?></td>
							</tr>
							<?php 
								$total = $rows['harga'] * $rows['qty'];
								$hasil += $total;
								$no++;
								$ong = $rows['ongkir'];
							}
						?>
							<tr>
								<td colspan="5" style="text-align: right;font-weight: bold;">Ongkir =
									<?= number_format($ong); ?></td>
							</tr>
							<tr>
								<td colspan="5" style="text-align: right; font-weight: bold;">Grand Total =
									<?= number_format($hasil+$ong); ?></td>
							</tr>
						</table>

						<h4>Bayar Sesuai Nominal Dibawah ini :</h4>
						<table class="table table-striped">
							<tr>
								<th>Total yang Harus dibayar</th>
								<th>Rp.
									<?php echo number_format($row['grand_total']+$ongkir); ?></th>
							</tr>
						</table>
						<?php 
						}
					?>
					</div>
					<?php 
					if(isset($_SESSION['cek'])){
				?>
					<div class="col-md-4">
						<h4>Informasi Pembayaran</h4>
						<table class="table table-striped">
							<tr>
								<td>Atas Nama</td>
								<td>Via Vallen</td>
							</tr>
							<tr>
								<td>No Rekening</td>
								<td>4581321302266340</td>
							</tr>
							<tr>
								<td>Bank</td>
								<td>BRI</td>
							</tr>
						</table>
					</div>
					<?php 
					}
				?>
				</div>

				<div class="row">
					<?php 
					if(isset($_SESSION['cek'])){
				?>
					<div class="col-md-6">
						<h4>Silahkan Upload Bukti Pembyaran disini :</h4>

						<form action="proses/bukti.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="cs" value="<?php echo $kode_cs; ?>">
							<input type="hidden" name="inv" value="<?php echo $inv; ?>">
							<div class="form-group">
								<label>Pilih Gambar</label>
								<input type="file" name="image" class="form-control" required>
							</div>

							<button type="submit" class="btn btn-warning">Upload</button>
						</form>

					</div>
					<?php 
					}
				?>
				</div>
			</div>
		</section>

		<script>
			// Set the date we're counting down to
			var countDownDate = new Date("<?php echo $data; ?>").getTime();
			console.log(countDownDate);

			// Update the count down every 1 second
			var x = setInterval(function () {

				// Get today's date and time
				var now = new Date().getTime();

				// Find the distance between now and the count down date
				var distance = now - countDownDate;

				console.log(now);
				console.log(distance);

				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				// Output the result in an element with id="demo"


				document.getElementById("timer").innerHTML = hours + " Jam : " +
					minutes + " Menit : " + seconds + " Detik";


				// If the count down is over, write some text 
				if (distance < 1) {

					$.ajax({
						type: 'POST',
						url: 'http://localhost/batik-production/cek.php',
						success: function (data) {
							console.log(data);
						}
					});


					clearInterval(x);
					document.getElementById("timer").innerHTML = "Pembayaran dilakukan 1x24 jam";
				}
			}, 1000);
		</script>
				<?php
	}
	include 'footer.php';
?>