<?php 

require 'functions.php';

if(isset($_POST['submit'])) {

	if (tambah($_POST) > 0) {
		# code...
		echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'topsis.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah');
				document.location.href = 'topsis.php';
			</script>
		";
	}
}

 ?>


<?php include 'template/header.php'; ?>

<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-6">
			<h1>Form Tambah Data Alternatif</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleFormControlInput1">Kode Alt</label>
					<input type="text" class="form-control" name="kode_alt" placeholder="kode alternatif" required autofocus>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">K01</label>
					<input type="number" class="form-control" name="k01" placeholder="input kriteria" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">K02</label>
					<input type="number" class="form-control" name="k02" placeholder="input kriteria" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">K03</label>
					<input type="number" class="form-control" name="k03" placeholder="input kriteria" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">K04</label>
					<input type="number" class="form-control" name="k04" placeholder="input kriteria" required>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">K05</label>
					<input type="number" class="form-control" name="k05" placeholder="input kriteria" required>
				</div>
				<div>
					<button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include 'template/footer.php'; ?>