<?php
session_start();
$title = "Data Admin";
include "template/header.php";
include "template/sidebar.php";

require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$admin = mysqli_query($conn, "SELECT * FROM tbl_admin");
$data = mysqli_fetch_assoc($admin);

if (isset($_POST['submit'])) {
    if (tambah_admin($_POST) > 0) {
        // redirect dan alert dari javascript
        echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'data-admin.php';
			</script>
		";
        // header('Location: index.php'); ini redirect dari php
    } else {
        echo "
			<script>
				alert('data gagal ditambah');
				document.location.href = 'data-admin.php';
			</script>
		";
    }
}

// jika tombol cari diklik
if (isset($_GET['cari'])) {
    $admin = cari_admin($_GET['keyword']);

    // alur form search, setelah form pencarian dibuat, buat alur pencariannya
    // jika user masukan pencarian atau ketik keyword lalu mengklik tombol cari
    // maka akan dikirim ke function cari() di file functions.php
    // di function cari() buat query "SELECT * FROM nama_tabel WHERE field" untuk mengolah data yg di kirim dari ketikan input pencarian
    // kembalikan atau return variabel $query ke dalam function query yg sudah dibuat
}

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
                <h4 class="header-title text-center">Data Admin</h4>
                <button type="button" name="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
                    Input
                </button>
                <form class="form-group float-right" action="" method="get">
                    <div class="input-group mb-2">
                        <input type="text" name="keyword" class="form-control" placeholder="Search" autofocus autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-transparent" type="submit" name="cari">Go</button>
                        </div>
                    </div>
                </form>
                <div class="single-table mt-2">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <!-- <th scope="col">Password</th> -->
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($admin as $adm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td>
                                            <img src="assets/img/<?= $adm['foto']; ?>" alt="<?= $adm['foto']; ?>" width="80" height="80">
                                        </td>
                                        <td><?= $adm['nama']; ?></td>
                                        <td><?= $adm['username']; ?></td>
                                        <!-- <td><?= $adm['password']; ?></td> -->
                                        <td>
                                            <a href="#" class="badge badge-success editBtn">Edit</a>
                                            <a href="hapus-admin.php?id=<?= $adm['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah anda ingin hapus!');">Hapus</a>
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

<!-- modal edit admin -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="edit-data-admin.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="fotoLama" id="foto">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Upload Foto</label>
                                        <!-- <img src="assets/img/<?= $row['foto']; ?>" alt="<?= $row['foto']; ?>" width="80"> -->
                                        <input type="file" class="form-control-file" name="foto" id="foto">
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah admin -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" id="" class="form-control form-control-sm" autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="" class="form-control form-control-sm" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Upload Foto</label>
                                        <input type="file" class="form-control-file" name="foto" id="foto">
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
</div>

<?php include "template/footer.php"; ?>