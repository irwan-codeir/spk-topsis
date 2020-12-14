<?php
session_start();
$title = "Data Alternatif";
include "template/header.php";
include "template/sidebar.php";

require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif");


if (isset($_POST['submit'])) {
    if (tambah_alternatif($_POST) > 0) {
        // redirect dan alert dari javascript
        echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'data-alternatif.php';
			</script>
		";
        // header('Location: index.php'); ini redirect dari php
    } else {
        echo "
			<script>
				alert('data gagal ditambah');
				document.location.href = 'data-alternatif.php';
			</script>
		";
    }
}

if (isset($_GET['cari'])) {
    $alternatif = cari_alternatif($_GET['keyword']);
}

?>

<div class="main-content">
    <!-- header area start -->
    <!-- page-title -->
    <?php include "template/topbar.php"; ?>
    <!-- end page-title -->

    <!-- data alternatif -->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Data Alternatif</h4>
                <!-- <button type="button" name="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
                    Input
                </button> -->
                <form class="form-group float-right" action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" name="keyword" class="form-control" placeholder="Search" autofocus autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-transparent" type="submit" name="cari">Go</button>
                        </div>
                    </div>
                </form>
                <div class="single-table mt-3">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($alternatif as $alt) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $alt['kode_alt']; ?></td>
                                        <td><?= $alt['nama_alt']; ?></td>
                                        <td>
                                            <img src="../assets/img/<?= $alt['gambar']; ?>" alt="<?= $alt['gambar']; ?>" width="90" height="70">
                                        </td>
                                        <td><?= $alt['website']; ?></td>
                                        <td><?= $alt['website_seo']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- data admin Table end -->
</div>


<?php include "template/footer.php"; ?>