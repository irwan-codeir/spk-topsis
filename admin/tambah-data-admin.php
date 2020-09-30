<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

require '../functions.php';

if (isset($_POST["submit"])) {
    if (tambah_admin($_POST) > 0) {
        // redirect dan alert dari javascript
        echo "
			<script>
				alert('data berhasil ditambah');
				document.location.href = 'index.php';
			</script>
		";
        // header('Location: index.php'); ini redirect dari php
    } else {
        echo "
			<script>
				alert('data gagal ditambah');
				document.location.href = 'tambah.php';
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
                        <li><span>Tambah Data Admin</span></li>
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
                <h4 class="header-title">Tambah Data Admin</h4>
                <div class="row">
                    <div class="col-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <a type="submit" href="data-admin.php" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- data admin Table end -->
    </div>
</div>

<?php include "template/footer.php"; ?>