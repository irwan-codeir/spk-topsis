<?php $title = "Bobot Masing-Masing Kriteria"; ?>
<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>
<?php
session_start();
require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$bobotKriteria = mysqli_query($conn, "SELECT * FROM tbl_bobot_kriteria");
$harga = mysqli_query($conn, "SELECT * FROM tbl_bobot_kriteria_harga");
$bbm = mysqli_query($conn, "SELECT * FROM tbl_bobot_kriteria_bbm");
$kenyamanan = mysqli_query($conn, "SELECT * FROM tbl_bobot_kriteria_kenyamanan");
$penumpang = mysqli_query($conn, "SELECT * FROM tbl_bobot_kriteria_penumpang");
$mesin = mysqli_query($conn, "SELECT * FROM tbl_bobot_kriteria_mesin");

if (isset($_POST['submit_harga'])) {
    if (tambah_bobot_kriteria_harga($_POST) > 0) {
        // redirect dan alert dari javascript
        echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'bobot-kriteria.php';
			</script>
        ";
    } else {
        echo "
			<script>
				alert('data gagal ditambah');
				document.location.href = 'bobot-kriteria.php';
			</script>
        ";
    }
} elseif (isset($_POST['submit_bbm'])) {
    if (tambah_bobot_kriteria_bbm($_POST) > 0) {
        echo "
			<script>
				alert('data Berhasil ditambah');
				document.location.href = 'bobot-kriteria.php';
			</script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambah');
                document.location.href = 'bobot-kriteria.php';
            </script>
        ";
    }
} elseif (isset($_POST['submit_kenyamanan'])) {
    if (tambah_bobot_kriteria_kenyamanan($_POST) > 0) {
        echo "
		<script>
			alert('data Berhasil ditambah');
			document.location.href = 'bobot-kriteria.php';
		</script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambah');
                document.location.href = 'bobot-kriteria.php';
            </script>
            ";
    }
} elseif (isset($_POST['submit_penumpang'])) {
    if (tambah_bobot_kriteria_penumpang($_POST) > 0) {
        echo "
			<script>
				alert('data Berhasil ditambah');
				document.location.href = 'bobot-kriteria.php';
			</script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambah');
                document.location.href = 'bobot-kriteria.php';
            </script>
        ";
    }
} elseif (isset($_POST['submit_mesin'])) {
    if (tambah_bobot_kriteria_mesin($_POST) > 0) {
        echo "
			<script>
				alert('data Berhasil ditambah');
				document.location.href = 'bobot-kriteria.php';
			</script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambah');
                document.location.href = 'bobot-kriteria.php';
            </script>
         ";
    }
} elseif (isset($_POST['submit_kriteria'])) {
    if (tambah_bobot_kriteria($_POST) > 0) {
        echo "
			<script>
				alert('data Berhasil ditambah');
				document.location.href = 'bobot-kriteria.php';
			</script>
        ";
    } else {
        echo "
			<script>
				alert('data gagal ditambah');
				document.location.href = 'bobot-kriteria.php';
			</script>
        ";
    }
}

?>
<!-- main content area start -->
<div class="main-content">
    <!-- header area start -->
    <!-- page-title -->
    <?php include "template/topbar.php"; ?>
    <!-- end page-title -->

    <div class="main-content-inner">
        <div class="row">
            <!-- bobot kriteria -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Kriteria Bobot</h4>
                        <button type="button" name="submit" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#tambahKriteriaBobot">
                            Input
                        </button>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Kriteria</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($bobotKriteria as $bk) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $bk['kriteria']; ?></td>
                                                <td><?= $bk['bobot']; ?></td>
                                                <td>
                                                    <a href="hapus-kriteria-bobotKriteria.php?id=<?= $bk['id_kriteria']; ?>" onclick="return confirm('apakah anda ingin hapus!');"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bobot Kriteria Hoverable Rows Table end -->

            <!-- kriteria harga -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Bobot Kriteria Harga</h4>
                        <button type="button" name="submit" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#tambahHarga">
                            Input
                        </button>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($harga as $hrg) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $hrg['harga']; ?></td>
                                                <td><?= $hrg['bobot']; ?></td>
                                                <td>
                                                    <a href="hapus-kriteria-harga.php?id=<?= $hrg['id_harga']; ?>" onclick="return confirm('apakah anda ingin hapus!');"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Harga Hoverable Rows Table end -->

            <!-- BBM Rows Table start -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Bobot Kriteria BBM</h4>
                        <button type="button" name="submit" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#tambahBBM">
                            Input
                        </button>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">BBM</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($bbm as $b) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $b['bbm']; ?></td>
                                                <td><?= $b['bobot']; ?></td>
                                                <td>
                                                    <a href="hapus-kriteria-bbm.php?id=<?= $b['id_bbm']; ?>" onclick="return confirm('apakah anda ingin hapus!');"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hoverable Rows Table end -->

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Bobot Kriteria Kenyamanan</h4>
                        <button type="button" name="submit" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#tambahKenyamanan">
                            Input
                        </button>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Rate</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kenyamanan as $ky) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $ky['kenyamanan']; ?></td>
                                                <td><?= $ky['bobot']; ?></td>
                                                <td>
                                                    <a href="hapus-kriteria-kenyamanan.php?id=<?= $ky['id_kenyamanan']; ?>" onclick="return confirm('apakah anda ingin hapus!');"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- rate Hoverable Rows Table end -->

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Bobot Kriteria Jumlah Penumpang</h4>
                        <button type="button" name="submit" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#tambahPenumpang">
                            Input
                        </button>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Jumlah Penumpang</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($penumpang as $p) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $p['penumpang']; ?></td>
                                                <td><?= $p['bobot']; ?></td>
                                                <td>
                                                    <a href="hapus-kriteria-penumpang.php?id=<?= $p['id_penumpang']; ?>" onclick="return confirm('apakah anda ingin hapus!');"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- penumpang Hoverable Rows Table end -->
            <!-- mesin -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Bobot Kriteria Kapasitas Mesin</h4>
                        <button type="button" name="submit" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#tambahMesin">
                            Input
                        </button>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Mesin</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($mesin as $ms) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $ms['mesin']; ?></td>
                                                <td><?= $ms['bobot']; ?></td>
                                                <td>
                                                    <a href="hapus-kriteria-mesin.php?id=<?= $ms['id_mesin']; ?>" onclick="return confirm('apakah anda ingin hapus!');"><i class="ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mesin Hoverable Rows Table end -->
        </div>
    </div>
    <!-- main content area end -->
</div>

<!-- modal tambah Kriteria Bobot -->
<div class="modal fade" id="tambahKriteriaBobot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria Bobot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Kriteria</label>
                                        <input type="text" name="kriteria" id="" class="form-control form-control-sm" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot</label>
                                        <input type="number" name="bobot" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_kriteria" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah Bobot Harga -->
<div class="modal fade" id="tambahHarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Kriteria Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="text" name="harga" id="" class="form-control form-control-sm" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot</label>
                                        <input type="number" name="bobot" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_harga" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah  Bobot Kriteria bbm-->
<div class="modal fade" id="tambahBBM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Kriteria BBM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">BBM</label>
                                        <input type="text" name="bbm" id="" class="form-control form-control-sm" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot</label>
                                        <input type="number" name="bobot" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_bbm" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah  Bobot Kriteria Kenyamanan-->
<div class="modal fade" id="tambahKenyamanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Kriteria Kenyamanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Kenyamanan</label>
                                        <input type="text" name="kenyamanan" id="" class="form-control form-control-sm" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot</label>
                                        <input type="number" name="bobot" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_kenyamanan" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah  Bobot Kriteria Penumpang-->
<div class="modal fade" id="tambahPenumpang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Kriteria Penumpang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Jumlah Penumpang</label>
                                        <input type="text" name="penumpang" id="" class="form-control form-control-sm" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot</label>
                                        <input type="number" name="bobot" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_penumpang" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah  Bobot Kriteria Mesin-->
<div class="modal fade" id="tambahMesin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Kriteria Mesin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Mesin</label>
                                        <input type="text" name="mesin" id="" class="form-control form-control-sm" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot</label>
                                        <input type="number" name="bobot" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_mesin" class="btn btn-primary">Tambah Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>




<?php include "template/footer.php"; ?>