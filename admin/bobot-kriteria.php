<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>
<?php
session_start();
require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!-- main content area start -->
<div class="main-content">
    <!-- header area start -->
    <!-- page-title -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <!-- <h4 class="page-title pull-left">Dashboard</h4> -->
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.php">Home</a></li>
                        <li><span>Bobot Kriteria</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION["username"]; ?><i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Message</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page-title -->


    <div class="main-content-inner">
        <div class="row">
            <!-- bobot kriteria -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Kriteria Bobot</h4>
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
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Rendah</td>
                                            <td>1</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Cukup</td>
                                            <td>3</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Tinggi</td>
                                            <td>3</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
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
                        <h4 class="header-title">Kriteria Harga</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Range Harga</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Diatas 290juta</td>
                                            <td>1</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>200juta - 289juta</td>
                                            <td>3</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>140juta - 199juta</td>
                                            <td>5</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
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
                        <h4 class="header-title">Kriteria BBM</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Range BBM</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>8 - 10km</td>
                                            <td>1</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>11 - 12km</td>
                                            <td>3</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>12 - 17km</td>
                                            <td>5</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
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
                        <h4 class="header-title">Kriteria Kenyamanan</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Range Rate</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Rate 4 - 4,4</td>
                                            <td>1</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Rate 4,5 - 4,7</td>
                                            <td>3</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Rate diatas 4,8</td>
                                            <td>5</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
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
                        <h4 class="header-title">Kriteria Jumlah Penumpang</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Range Jumlah Penumpang</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>7 orang</td>
                                            <td>3</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>8 orang</td>
                                            <td>8</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>

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
                        <h4 class="header-title">Kriteria Mesin</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Range BBM</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>1300cc - 1350cc</td>
                                            <td>1</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>1360cc - 1460cc</td>
                                            <td>3</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>1462cc - 2499cc</td>
                                            <td>5</td>
                                            <td><i class="ti-trash"></i></td>
                                        </tr>
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


    <?php include "template/footer.php"; ?>