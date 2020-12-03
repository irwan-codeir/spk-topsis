<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>

<?php

require '../functions.php';

// $id = $_GET["id"];


// query data karyawan
// $admin = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE id = $id");
// $adm = mysqli_fetch_assoc($admin);

// cek apakah tombol submit sudah di tekan
if (isset($_POST["submit"])) {

    if (edit_admin($_POST) > 0) {
        // redirect dan alert dari javascript
        echo "
			<script>
				alert('data berhasil diedit');
				document.location.href = 'data-admin.php';
			</script>
		";
        // header('Location: index.php'); ini redirect dari php
    } else {
        echo "
			<script>
				alert('data gagal diedit');
				document.location.href = 'data-admin.php';
			</script>
		";
    }
}



?>

<?php include "template/footer.php"; ?>