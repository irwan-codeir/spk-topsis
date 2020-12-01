<?php $title = "Data Visitor"; ?>
<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

session_start();
require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$visitor = mysqli_query($conn, "SELECT * FROM tbl_visitor ORDER BY date DESC");

// jika tombol cari diklik
if (isset($_GET['cari'])) {
    $visitor = cari_visitor($_GET['keyword']);
}


?>

<div class="main-content">
    <!-- header area start -->
    <!-- page-title -->
    <?php include "template/topbar.php"; ?>
    <!-- end page-title -->

    <!-- data admin -->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <h4 class="header-title d-flex align-self-center">Data Visitor</h4>
                    </div>
                    <div class="col-md-6">
                        <form class="form-group float-right" action="" method="get">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="keyword" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-transparent" type="submit" name="cari">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="single-table mt-2">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tgl Akses</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($visitor as $v) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $v['nama']; ?></td>
                                        <td><?= $v['email']; ?></td>
                                        <td><?= $v['date']; ?></td>
                                        <td>
                                            <a href="hapus-visitor.php?<?= $v['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah anda ingin hapus!');">Hapus</a>
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
    <!-- data admin Table end -->
</div>

<?php include "template/footer.php"; ?>