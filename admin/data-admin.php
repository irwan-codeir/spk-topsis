<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

require '../functions.php';

// $admin = mysqli_query($conn, "SELECT * FROM tbl_admin");
// membuat pagination
// konfigurasi
$jumlahDataPerhalaman = 4;
// $result = mysqli_query($conn, "SELECT * FROM karyawan");
// $jumlahData = mysqli_num_rows($result);
$jumlahData = count(query("SELECT * FROM tbl_admin"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
// if (isset($_GET["halaman"])) {
// 	$halamanAktif = $_GET["halaman"];
// } else {
// 	$halamanAktif = 1;
// }
// if else ternary
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// halaman aktif adalah hal 2, maka awal data = 4
// halaman aktif adalah hal 3, maka awal data = 8
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$admin = mysqli_query($conn, "SELECT * FROM tbl_admin LIMIT $awalData, $jumlahDataPerhalaman");

// jika tombol cari diklik
if (isset($_POST['cari'])) {
    $admin = cari($_POST['keyword']);

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
    <!-- page-title -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <!-- <h4 class="page-title pull-left">Data</h4> -->
                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Data Admin</span></li>
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
                <h4 class="header-title text-center">Data Admin</h4>
                <a name="" id="" class="btn btn-primary btn-sm float-left" href="tambah-data-admin.php" role="button">Input</a>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($admin as $adm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $adm['nama']; ?></td>
                                        <td><?= $adm['username']; ?></td>
                                        <td><?= $adm['password']; ?></td>
                                        <td>
                                            asd<img src="assets/img/<?= $adm['image']; ?>" alt="">
                                        </td>
                                        <td>
                                            <a href="edit-data-admin.php?id=<?= $adm['id']; ?>"><i class="fas fa-edit"></i>Edit</a>
                                            <a href="hapus-data-admin.php?id=<?= $adm['id']; ?>"><i class="fas fa-trash-alt"></i>Hapus</a>
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