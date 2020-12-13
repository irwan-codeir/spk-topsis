<?php
session_start();
$title = "Edit Alternatif";
include "template/header.php";
include "template/sidebar.php";

require "../functions.php";

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


$id = $_GET['id'];
$alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alt = $id");
$rows = mysqli_fetch_assoc($alternatif);


// if (edit_alternatifff($_POST) > 0) {
// 	// redirect dan alert dari javascript
// 	echo "
// 			<script>
// 				alert('data berhasil diedit');
// 				document.location.href = 'bobot-alternatif.php';
// 			</script>
// 		";
// 	// header('Location: edit-alternatif.php'); ini redirect dari php
// } else {
// 	echo "
// 			<script>
// 				alert('data gagal diedit');
// 				document.location.href = 'edit-alternatif.php';
// 			</script>
// 		";
// }



?>

<div class="main-content">

	<!-- title -->
	<?php include "template/topbar.php"; ?>

	<!-- data admin -->
	<div class="col-12 mt-2">
		<div class="card">
			<div class="card-body">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data & Bobot Alternatif</h5>
				</div>
				<div class="row mt-4 pl-5 pr-5">
					<div class="col-md">
						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?= $rows['id_alt']; ?>">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleFormControlInput1">Kode</label>
										<input type="text" class="form-control" name="kode_alt" value="<?= $rows['kode_alt']; ?>">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="exampleFormControlInput1">Alternatif</label>
										<input type="text" class="form-control" name="alternatif" value="<?= $rows['nama_alt']; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Upload Image Alternatif</label>
								<img src="../assets/img/<?= $rows['gambar']; ?>" alt="../assets/img/<?= $rows['gambar']; ?>" width="80">
								<input type="file" class="form-control-file" name="gambar" id="gambar">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">URL</label>
								<input type="text" class="form-control" name="url" id="url" value="<?= $rows['website']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Website SEO</label>
								<input type="text" class="form-control" name="website_seo" id="website_seo" value="<?= $rows['website_seo']; ?>">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleFormControlInput1">K01 (Harga)</label>
										<input type="number" class="form-control" name="k01" value="<?= $rows['k01']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleFormControlInput1">K02 (BBM)</label>
										<input type="number" class="form-control" name="k02" value="<?= $rows['k02']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleFormControlInput1">K03 (Kenyamanan)</label>
										<input type="number" class="form-control" name="k03" value="<?= $rows['k03']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleFormControlInput1">K04 (Penumpang)</label>
										<input type="number" class="form-control" name="k04" value="<?= $rows['k04']; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">K05 (Mesin)</label>
								<input type="number" class="form-control" name="k05" value="<?= $rows['k05']; ?>">
							</div>
					</div>
				</div>
			</div>
			<div class="p-5">
				<button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
				<a href="bobot-alternatif.php" class="btn btn-secondary">Cancel</a>
			</div>
			</form>
		</div>
	</div>
</div>

<?php include "template/footer.php"; ?>