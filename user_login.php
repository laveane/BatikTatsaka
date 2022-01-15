<?php 
	include 'header.php';
?>

<section class="login" style="margin-bottom: 200px">
	<div class="container">
		<h4 class="title text-center">Silahkan Login untuk Melanjutkan Pembelian</h4>

		<div class="row justify-content-center mt-5">
			<div class="col-md-6">
				<form action="proses/login.php" method="POST">
					<div class="form-group mb-3">
						<label for="exampleInputEmail1">username</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username"
							name="username">
					</div>

					<div class="form-group mb-3">
						<label for="exampleInputEmail1">Password</label>
						<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password"
							name="pass">
					</div>
					<button type="submit" class="btn btn-black px-5 py-2">Login</button>
					<a href="register.php" class="btn btn-primary px-5 py-2">Daftar</a>
				</form>
			</div>
		</div>

	</div>
</section>

<?php 
	include 'footer.php';
?>