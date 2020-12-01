<?php

require "../functions.php";

$id = $_GET["id"];

if (hapus_bobot_kriteria_mesin($id) > 0) {
    echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'bobot-kriteria.php';
            </script>
        ";
} else {
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'bobot-kriteria.php';
        </script>
    ";
}
