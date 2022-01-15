<?php 
include 'header.php';
?>

<section class="register" style="margin-bottom: 200px">
	<div class="container">

		<h4 class="title text-center">Form pendaftaran</h4>

		<div class="row justify-content-center mt-5">
			<div class="col-md-6">
				<form action="proses/register.php" method="POST">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group mb-3">
								<label for="exampleInputPassword1">Nama</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama"
									name="nama" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-3">
								<label for="exampleInputPassword1">Email</label>
								<input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email"
									name="email" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group mb-3">
								<label for="exampleInputPassword1">username</label>
								<input type="text" class="form-control" id="exampleInputPassword1"
									placeholder="Username" name="username" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-3">
								<label for="exampleInputPassword1">No Tepl</label>
								<input type="text" class="form-control" id="exampleInputPassword1" placeholder="+62"
									name="telp" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group mb-3">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1"
									placeholder="Password" name="password" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group mb-3">
								<label for="exampleInputPassword1">Konfirmasi Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1"
									placeholder="Konfirmasi Password" name="konfirmasi" required>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-black px-5 py-2">Register</button>
				</form>
			</div>

		</div>

	</div>
</section>

<?php 
include 'footer.php';
?>