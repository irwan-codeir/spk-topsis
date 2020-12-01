<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <!-- <h4 class="page-title pull-left">Data</h4> -->
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span><?= $title; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <?php
                // query data karyawan
                $users =  $_SESSION["username"];
                $admin1 = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$users'");
                $adm = mysqli_fetch_assoc($admin1);
                ?>
                <img class="avatar user-thumb" src="assets/img/<?= $adm['foto']; ?>" alt="avatar">

                <?php

                // $gaambar = $_SESSION['foto'];
                // print_r($adm);
                // die;

                ?>
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $adm["username"]; ?><i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../index.php" target="_blank">Go to website</a>
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>