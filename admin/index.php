<?php
session_start();
$title = "Dashboard";
include "template/header.php";
include "template/sidebar.php";

require "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

?>


<!-- main content area start -->
<div class="main-content mb-4">
    <!-- header area start -->
    <!-- page-title -->
    <?php include "template/topbar.php"; ?>
    <!-- end page-title -->

    <!-- content utama -->
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-lg-0">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Data Visitor</div>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT Count(*) FROM tbl_visitor");
                                    $visitor = mysqli_fetch_assoc($query);
                                    ?>
                                    <div class="dashboard-visitor">
                                        <h1>
                                            <?php
                                            foreach ($visitor as $visit) {
                                                echo $visit;
                                            }
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Data Admin</div>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT Count(*) FROM tbl_admin");
                                    $admin = mysqli_fetch_assoc($query);
                                    ?>
                                    <div class="dashboard-visitor">
                                        <h1>
                                            <?php
                                            foreach ($admin as $adm) {
                                                echo $adm;
                                            }
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0">Overview</h4>
                                    <select class="custome-select border-0 pr-3">
                                        <option selected>Last 24 Hours</option>
                                    </select>
                                </div>
                                <div id="verview-shart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content utama end -->
</div>

<?php include "template/footer.php"; ?>