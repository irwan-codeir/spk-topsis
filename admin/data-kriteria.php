<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

require '../functions.php';

$admin = mysqli_query($conn, "SELECT * FROM tbl_admin");

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
                        <li><span>Data Kriteria</span></li>
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
                <h4 class="header-title text-center">Data Kriteria</h4>
                <a name="" id="" class="btn btn-primary btn-sm float-left" href="#" role="button">Input</a>
                <form class="form-group float-right" action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-transparent" type="submit">Go</button>
                        </div>
                    </div>
                </form>
                <div class="single-table mt-2">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($admin as $adm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $adm['nama']; ?></td>
                                        <td><?= $adm['username']; ?></td>
                                        <td><?= $adm['pasword']; ?></td>
                                        <td>
                                            <img src="assets/img/<?= $adm['image']; ?>" alt="">
                                        </td>
                                        <td>
                                            <a href="edit.php?"><i class="fas fa-edit"></i>Edit</a>
                                            <a href="hapus.php?"><i class="fas fa-trash-alt"></i>Hapus</a>
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