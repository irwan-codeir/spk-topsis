<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php
session_start();
require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$pengunjung = mysqli_query($conn, "SELECT * FROM tbl_pengunjung");

?>

<div class="main-content">
    <!-- header area start -->
    <!-- page-title -->
    <!-- page-title -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <!-- <h4 class="page-title pull-left">Data</h4> -->
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Data Hasil Topsis</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION["username"]; ?><i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../index.php">Lihat Web</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page-title -->

    <!-- data admin -->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Hasil Topsis</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Kriteria Yang DiPilih</th>

                                    <th scope="col">Lihat Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengunjung as $hsl) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $hsl['nama']; ?></td>
                                        <td><?= $hsl['email']; ?></td>
                                        <td>
                                            <ul class="text-left">
                                                <li scope="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            Harga
                                                        </div>
                                                        <div class="col">
                                                            : <?= $hsl['k01']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            BBM
                                                        </div>
                                                        <div class="col">
                                                            : <?= $hsl['k02']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            Kenyaman
                                                        </div>
                                                        <div class="col">
                                                            : <?= $hsl['k03']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            Penumpang
                                                        </div>
                                                        <div class="col">
                                                            : <?= $hsl['k04']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            Mesin
                                                        </div>
                                                        <div class="col">
                                                            : <?= $hsl['k05']; ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li><a href="detail-hasil-topsis.php?id=<?= $hsl['id']; ?>" class="text-danger"><i class="fa fa-eye"></i></a></li>
                                            </ul>
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