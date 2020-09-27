<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

require '../functions.php';

$alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif");


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
                        <li><span>Bobot Alternatif</span></li>
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
                <h4 class="header-title text-center">Bobot Alternatif</h4>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
                    Input
                </button>
                <form class="form-group float-right" action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-transparent" type="submit">Go</button>
                        </div>
                    </div>
                </form>
                <div class="single-table mt-3">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">K01</th>
                                    <th scope="col">K02</th>
                                    <th scope="col">K03</th>
                                    <th scope="col">K04</th>
                                    <th scope="col">K05</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($alternatif as $alt) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $alt['kode_alt']; ?></td>
                                        <td><?= $alt['k01']; ?></td>
                                        <td><?= $alt['k02']; ?></td>
                                        <td><?= $alt['k03']; ?></td>
                                        <td><?= $alt['k04']; ?></td>
                                        <td><?= $alt['k05']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $alt['id_alt']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#checkoutModal">Edit</a>
                                            <a href="hapus.php?id=<?= $alt['id_alt']; ?>" class="badge badge-danger" onclick="return confirm('apakah anda ingin hapus!');">Hapus</a>
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

<!-- modal tambah -->
<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="./functions.php?act=tambah_alt" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kode Alt</label>
                                        <input type="text" class="form-control" name="kode_alt" placeholder="cth: A01" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K01</label>
                                        <input type="number" class="form-control" name="k01" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K02</label>
                                        <input type="number" class="form-control" name="k02" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K03</label>
                                        <input type="number" class="form-control" name="k03" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K04</label>
                                        <input type="number" class="form-control" name="k04" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">K05</label>
                                <input type="number" class="form-control" name="k05" placeholder="" required>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal edit -->
<?php foreach ($alternatif as $data) : ?>


    <div class="modal fade checkout-modal-success" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>Edit Data Alternatif</h3>
                    <hr>
                    <form action="/action_page.php">
                        <input type="hidden" class="form-control name=" ide_alt" form-control-sm">
                        <div class="form-group">
                            <label for="kode">Kode Alternatif</label>
                            <input type="text" name="kode_alt" class="form-control form-control-sm" placeholder="cth: A01" value="<?= $data['kode_alt']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="k01">K01</label>
                            <input type="number" name="k01" class="form-control form-control-sm" value="<?= $data['k01']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="k02">K02</label>
                            <input type="number" name="k02" class="form-control form-control-sm" value="<?= $data['k02']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="k03">K03</label>
                            <input type="number" name="k03" class="form-control form-control-sm" value="<?= $data['k03']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="k04">K04</label>
                            <input type="number" name="k04" class="form-control form-control-sm" value="<?= $data['k04']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="k05">K05</label>
                            <input type="number" name="k05" class="form-control form-control-sm" value="<?= $data['k05']; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>


<?php include "template/footer.php"; ?>