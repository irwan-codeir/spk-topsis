<?php
session_start();
require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$alternatif = mysqli_query($conn, "SELECT * FROM alternatif");

if (isset($_POST['submit'])) {
    if (tambah_alternatif($_POST) > 0) {
        // redirect dan alert dari javascript
        echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'data-alternatif.php';
			</script>
		";
        // header('Location: index.php'); ini redirect dari php
    } else {
        echo "
			<script>
				alert('data gagal ditambah');
				document.location.href = 'data-alternatif.php';
			</script>
		";
    }
}

?>
<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>



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
                        <li><span>Data Alternatif</span></li>
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

    <!-- data alternatif -->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">Data Alternatif</h4>
                <button type="button" name="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
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
                        <table class="table table-hover progress-table">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Web Dealer</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($alternatif as $alt) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $alt['kode']; ?></td>
                                        <td><?= $alt['alternatif']; ?></td>
                                        <td><?= $alt['image']; ?></td>
                                        <td><?= $alt['dealer']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $alt['id']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#editModal">Edit</a>
                                            <a href="hapus.php?id=<?= $alt['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah anda ingin hapus!');">Hapus</a>
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

<!-- modal tambah alternatif -->
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
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kode</label>
                                        <input type="text" class="form-control" name="kode" placeholder="cth: A01" required autofocus autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nama Alternatif</label>
                                        <input type="text" class="form-control" name="alternatif" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Dealer</label>
                                        <input type="text" class="form-control" name="dealer" placeholder="" required>
                                    </div>
                                </div>
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

<!-- modal edit alternatif -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Alternatif</h5>
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
                                    <input type="hidden" name="id_alt">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Kode Alt</label>
                                        <input type="text" class="form-control" name="kode_alt" placeholder="cth: A01" required autofocus autocomplete="off">
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
                <button type="submit" class="btn btn-primary" name="submit" value="Simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div>


<?php include "template/footer.php"; ?>