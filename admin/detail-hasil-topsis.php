<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php require "../functions.php"; ?>
<?php $alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif"); ?>

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
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../index.php">Lihat Web</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Log Out</a>
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
                <h4 class="header-title text-center">Data Hasil Topsis</h4>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Nilai Alternatif</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">K01</th>
                                        <th scope="col">K02</th>
                                        <th scope="col">K03</th>
                                        <th scope="col">K04</th>
                                        <th scope="col">K05</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $alt) : ?>
                                        <tr>
                                            <td><?= $alt['kode_alt']; ?></td>
                                            <td><?= $alt['k01']; ?></td>
                                            <td><?= $alt['k02']; ?></td>
                                            <td><?= $alt['k03']; ?></td>
                                            <td><?= $alt['k04']; ?></td>
                                            <td><?= $alt['k05']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Nilai Normalisasi</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">K01</th>
                                        <th scope="col">K02</th>
                                        <th scope="col">K03</th>
                                        <th scope="col">K04</th>
                                        <th scope="col">K05</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A01</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Nilai Normalisasi Terbobot</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">K01</th>
                                        <th scope="col">K02</th>
                                        <th scope="col">K03</th>
                                        <th scope="col">K04</th>
                                        <th scope="col">K05</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A01</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                        <td>sadas</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Menentukan Solusi Ideal Positif (A+) dan Matriks Ideal Negatif (A-)</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Yi</th>
                                        <th scope="col" colspan="15">Solusi Ideal</th>
                                        <th scope="col">Max</th>
                                        <th scope="col">Min</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Y1</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>Max</td>
                                        <td>Min</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Menghitung jarak solusi ideal positif (D+) dan solusi ideal negatif(D-)</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-sm progress-table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col" colspan="2">Ideal Positif(D+)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>D1+</td>
                                                <td>0.9525</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-sm progress-table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col" colspan="2">Ideal Negatif(D-)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>D1-</td>
                                                <td>0.9525</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 offset-1">
                        <p class="mb-2">Menghitung Nilai Preferensi untuk setiap alternatif</p>
                        <div class="table-responsive">
                            <table class="table table-sm progress-table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col" colspan="2">Nilai Preferensi</th>
                                        <th scope="col">Perangkingan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>V1</td>
                                        <td>0.9525</td>
                                        <td>2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data admin Table end -->
</div>

<?php include "template/footer.php"; ?>