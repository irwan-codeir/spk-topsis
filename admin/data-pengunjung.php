<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

require '../functions.php';

$view = mysqli_query($conn, "SELECT * FROM tbl_pengunjung");

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
                        <li><span>Data Pengunjung</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                <div class="user-profile pull-right">
                    <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Irwan <i class="fa fa-angle-down"></i></h4>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Message</a>
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
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <h4 class="header-title d-flex align-self-center">Data Pengunjung</h4>
                    </div>
                    <div class="col-md-6">
                        <form class="form-group float-right" action="" method="get">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-transparent" type="submit">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="single-table mt-2">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($view as $v) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $v['nama']; ?></td>
                                        <td><?= $v['email']; ?></td>
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