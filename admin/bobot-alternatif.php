<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

require "../functions.php";



$alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif");

if (isset($_POST['submit'])) {
    if (tambah_bobot_alternatif($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'bobot-alternatif.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'tambah_alternatif.php';
            </script>
        ";
    }
}



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
                                            <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editModal<?= $alt['id_alt']; ?>">Edit</a>
                                            <a href="hapus-bobot-alternatif.php?id_alt=<?= $alt['id_alt']; ?>" class="badge badge-danger" onclick="return confirm('apakah anda ingin hapus!');">Hapus</a>
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

<!-- modal tambah bobot alternatif -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kode Alt</label>
                                        <input type="text" class="form-control" name="kode_alt" placeholder="cth: A01" autofocus autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K01</label>
                                        <input type="number" class="form-control" name="k01" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K02</label>
                                        <input type="number" class="form-control" name="k02" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K03</label>
                                        <input type="number" class="form-control" name="k03" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K04</label>
                                        <input type="number" class="form-control" name="k04" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">K05</label>
                                <input type="number" class="form-control" name="k05" placeholder="">
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php $edit_alt = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alt = $id"); ?>
<?php foreach ($edit_alt as $alt) : ?>
    <!-- modal edit bobot alternatif -->
    <div class="modal fade" id="editModal<?= $alt['id_alt']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Bobot Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 offset-1">

                            <form action="" method="post">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id_alt" value="<?= $alt['id_alt']; ?>">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Kode Alt</label>
                                            <input type="text" class="form-control" name="kode_alt" placeholder="cth: A01" required autofocus autocomplete="off" value="<?= $alt['kode_alt']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">K01</label>
                                            <input type="number" class="form-control" name="k01" placeholder="" required value="<?= $alt['k01']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">K02</label>
                                            <input type="number" class="form-control" name="k02" placeholder="" required value="<?= $alt['k02']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">K03</label>
                                            <input type="number" class="form-control" name="k03" placeholder="" required value="<?= $row['k03']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">K04</label>
                                            <input type="number" class="form-control" name="k04" placeholder="" required value="<?= $row['k04']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">K05</label>
                                    <input type="number" class="form-control" name="k05" placeholder="" required value="<?= $row['k05']; ?>">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit" value="Simpan">Update</button>
                </div>
                </form>
            <?php endforeach; ?>

            </div>
        </div>
    </div>

    </div>

    <?php include "template/footer.php"; ?>