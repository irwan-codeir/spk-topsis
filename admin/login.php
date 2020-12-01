<?php
session_start();
require "../functions.php";

if (isset($_POST["login"])) {
    $foto = $_SESSION["foto"];
    // $foto = $_POST["foto"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result)) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["username"] = $username;
            // $_SESSION["nama"] = true;
            $_SESSION["foto"] = $foto;
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="././assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" href="./assets/css/metisMenu.css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="./assets/css/typography.css">
    <link rel="stylesheet" href="./assets/css/default-css.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="bg-dark" style="opacity: 0.9;">
    <div class="container login d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <div class="form">
                    <h5>Login Oto<span style="color: darkcyan;">Expert</span></h5>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert" style="margin-left: 80px; margin-right:80px; margin-top:5px; margin-bottom: -20px;">
                            username/password salah!
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="form-group mt-2">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn bg-dark border-secondary text-white" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="./assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="./assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="./assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="./assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/scripts.js"></script>
</body>

</html>