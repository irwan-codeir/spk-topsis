<?php $title = "Gallery"; ?>
<?php include "template/header.php"; ?>
<?php include "template/navbar.php"; ?>

<?php
require "functions.php";

$galery = mysqli_query($conn, "SELECT * FROM tbl_alternatif");

?>

<section>
    <div class="container mt-5 mb-5">
        <div class="row text-center">
            <div class="col">
                <h3>Gallery MPV Cars</h3>
                <hr width="50%">
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <?php foreach ($galery as $gl) : ?>
                <div class="card m-3" style="width: 12rem;">
                    <img src="assets/img/<?= $gl['gambar']; ?>" class="card-img-top" alt="<?= $gl['gambar']; ?>">
                    <div class="card-body">
                        <p class="card-text"><?= $gl['nama_alt']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include "template/footer.php"; ?>