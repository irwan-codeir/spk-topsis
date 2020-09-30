<?php

require "../functions.php";

$id = $_GET['id_alt'];
$result = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alt = $id");
$adit_alt = mysqli_fetch_assoc($result);


if (edit_alternatif($_POST) > 0) {
    // redirect dan alert dari javascript
    echo "
			<script>
				alert('data berhasil diedit');
				document.location.href = 'index.php';
			</script>
		";
    // header('Location: index.php'); ini redirect dari php
} else {
    echo "
			<script>
				alert('data gagal diedit');
				document.location.href = 'index.php';
			</script>
		";
}
