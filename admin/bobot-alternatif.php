<?php $title = "Bobot Alternatif"; ?>
<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

session_start();
require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


$bobotAlternatif = mysqli_query($conn, "SELECT * FROM tbl_bobot_alternatif INNER JOIN tbl_alternatif ON id_alt = id");

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
                document.location.href = 'bobot-alternatif.php';
            </script>
        ";
    }
}



?>

<div class="main-content">

    <!-- title -->
    <?php include "template/topbar.php"; ?>

    <!-- data admin -->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Bobot Alternatif</h4>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
                    Input
                </button>
                <?php
                // $popover =  "'K01 : Harga', 'K02 : BBM', 'K03 : Kenyamanan', 'K04 : Penumpang', 'K05 : Mesin'";

                ?>
                <!-- <button type="button" class="btn btn-secondary btn-sm" data-container="body" data-toggle="popover" data-placement="right" data-content="<?= $popover; ?>"> -->
                <!-- Keterangan -->
                <!-- </button> -->
                <form class="form-group float-right" action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="keyword" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-transparent" type="submit" name="cari">Go</button>
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
                                    <th scope="col">Alternatif</th>
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
                                <?php foreach ($bobotAlternatif as $alt) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $alt['kode_alt']; ?></td>
                                        <td><?= $alt['nama_alt']; ?></td>
                                        <td><?= $alt['k01']; ?></td>
                                        <td><?= $alt['k02']; ?></td>
                                        <td><?= $alt['k03']; ?></td>
                                        <td><?= $alt['k04']; ?></td>
                                        <td><?= $alt['k05']; ?></td>
                                        <td>
                                            <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editModal<?= $alt['id_alt']; ?>">Edit</a>
                                            <a href="hapus-bobot-alternatif.php?id=<?= $alt['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah anda ingin hapus!');">Hapus</a>
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
                            <!-- <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kode Alt</label>
                                        <input type="text" class="form-control" name="kode_alt" value="<?= $kodeData; ?>">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K01 (Harga)</label>
                                        <input type="number" class="form-control" name="k01" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K02 (BBM)</label>
                                        <input type="number" class="form-control" name="k02" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K03 (Kenyamanan)</label>
                                        <input type="number" class="form-control" name="k03" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">K04 (Penumpang)</label>
                                        <input type="number" class="form-control" name="k04" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">K05 (Mesin)</label>
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

<?php include "template/footer.php"; ?>