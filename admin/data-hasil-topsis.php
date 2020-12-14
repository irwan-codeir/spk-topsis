<?php
session_start();
$title = "Data Hasil Topsis";
include "template/header.php";
include "template/sidebar.php";

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

// konfigurasi pagination
// $row = mysqli_fetch_row($visitor);
// $jumlahDataPerhalaman = 5;
// $jumlahData = count($row);
// // var_dump($jumlahData);
// // die;
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
// $visitors = mysqli_query($conn, "SELECT * FROM tbl_visitor LIMIT $awalData, $jumlahDataPerhalaman");

// $pengunjung = mysqli_query($conn, "SELECT * FROM tbl_pengunjung ORDER BY id DESC");

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
                        <h4 class="header-title">Data Hasil Topsis</h4>
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

                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Visitor</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Bobot Kriteria Yang DiPilih</th>

                                    <th scope="col">Detail Perhitungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($visitor as $hsl) : ?>
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
                                                    <div class="row">
                                                        <div class="col">
                                                            Warna
                                                        </div>
                                                        <div class="col">
                                                            : <?= $hsl['k06']; ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            <a href="detail-hasil-topsis.php?id=<?= $hsl['id']; ?>" class="text-danger"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- pagination -->
                <!-- <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-4">
                    <ul class="pagination">
                        <?php if ($halamanAktif > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="data-hasil-topsis.php?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item"><a class="page-link" style="font-weight: bold; color: red; font-size:medium;" href="data-hasil-topsis.php?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link" href="data-hasil-topsis.php?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <li class="page-item">
                                <a class="page-link" href="data-hasil-topsis.php?halaman=<?= $halamanAktif + 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav> -->
                <!-- end pagination -->
            </div>
        </div>
    </div>
    <!-- data admin Table end -->
</div>


<?php include "template/footer.php"; ?>