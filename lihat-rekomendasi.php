<?php $title = "Hasil Rekomendasi"; ?>
<?php include "template/header.php"; ?>
<?php
require "functions.php";

$alternatif = mysqli_query($conn, "SELECT * FROM tbl_alternatif");

// $delete = mysqli_query($conn, "TRUNCATE TABLE tbl_preferensi");
mysqli_query($conn, "TRUNCATE TABLE tbl_preferensi");

$a2 = mysqli_query($conn, "SELECT SUM(pow(k01, 2)) AS total1, SUM(pow(k02, 2)) AS total2, SUM(pow(k03, 2)) AS total3, SUM(pow(k04, 2)) AS total4, SUM(pow(k05, 2)) AS total5 FROM tbl_alternatif");
// <!-- menghitung jumlah sum masing2 alternatif -->
foreach ($a2 as $a) {
    $sum1 = $a['total1'];
    $sum2 = $a['total2'];
    $sum3 = $a['total3'];
    $sum4 = $a['total4'];
    $sum5 = $a['total5'];
}


$result = mysqli_query($conn, "SELECT * FROM tbl_pengunjung ORDER BY id DESC limit 1");
$k = mysqli_fetch_assoc($result);

// var_dump($k);
// exit;

$kriteria1 = $k['k01'];
$kriteria2 = $k['k02'];
$kriteria3 = $k['k03'];
$kriteria4 = $k['k04'];
$kriteria5 = $k['k05'];

$query = mysqli_query($conn, "SELECT max(k01) as max1, min(k01) as min1, max(k02) as max2, min(k02) as min2, max(k03) as max3, min(k03) as min3, max(k04) as max4, min(k04) as min4, max(k05) as max5, min(k05) as min5 FROM tbl_alternatif");
foreach ($query as $a) {
    $maksimal1 = ($a['max1'] / sqrt($sum1)) * $kriteria1;
    $maksimal2 = ($a['max2'] / sqrt($sum2)) * $kriteria2;
    $maksimal3 = ($a['max3'] / sqrt($sum3)) * $kriteria3;
    $maksimal4 = ($a['max4'] / sqrt($sum4)) * $kriteria4;
    $maksimal5 = ($a['max5'] / sqrt($sum5)) * $kriteria5;

    $minimal1 = ($a['min1'] / sqrt($sum1)) * $kriteria1;
    $minimal2 = ($a['min2'] / sqrt($sum2)) * $kriteria2;
    $minimal3 = ($a['min3'] / sqrt($sum3)) * $kriteria3;
    $minimal4 = ($a['min4'] / sqrt($sum4)) * $kriteria4;
    $minimal5 = ($a['min5'] / sqrt($sum5)) * $kriteria5;

    foreach ($alternatif as $a) {

        $y1 = $a['k01'] / sqrt($sum1) * $kriteria1;
        $y2 = $a['k02'] / sqrt($sum2) * $kriteria2;
        $y3 = $a['k03'] / sqrt($sum3) * $kriteria3;
        $y4 = $a['k04'] / sqrt($sum4) * $kriteria4;
        $y5 = $a['k05'] / sqrt($sum5) * $kriteria5;

        $dPositif = number_format(sqrt(pow(($maksimal1 - $y1), 2) + pow(($maksimal2 - $y2), 2) + pow(($maksimal3 - $y3), 2) + pow(($maksimal4 - $y4), 2) + pow(($maksimal5 - $y5), 2)), 4);

        $dNegatif = number_format(sqrt(pow(($minimal1 - $y1), 2) + pow(($minimal2 - $y2), 2) + pow(($minimal3 - $y3), 2) + pow(($minimal4 - $y4), 2) + pow(($minimal5 - $y5), 2)), 4);

        $pref = $dNegatif / ($dNegatif + $dPositif);

        $query = "INSERT INTO tbl_preferensi VALUES('','$pref')";

        mysqli_query($conn, $query);
    }
}


// $pref = mysqli_query($conn, "SELECT id, max(pref) as pre FROM tbl_preferensi"); max(pref) as pre
$pref = mysqli_query($conn, "SELECT * FROM tbl_preferensi INNER JOIN tbl_alternatif ON id_alt = id ORDER BY pref DESC LIMIT 1");

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card text-center d-flex align-items-center p-5" style="border: none;">
                    <?php foreach ($pref as $pre) : ?>
                        <img class="card-img-top img-thumbnail" src="assets/img/<?= $pre["gambar"]; ?>" alt="<?= $pre["gambar"]; ?>" style="width: 300px; height: 180px; border:none;">
                        <div class="card-body">
                            <!-- <h4 class="card-title"><?= $pre["id_alt"]; ?></h4> -->
                            <h4 class="card-title"><?= $pre["nama_alt"]; ?>, menjadi rekomendasi terbaik untuk anda!</h4>
                            <!-- <h4 class="card-title"><?= $pre["pref"]; ?></h4> -->
                            <p>Kunjungi dealer <a href="<?= $pre["website"]; ?>" target="_blank"><?= $pre["website_seo"]; ?></a>.</p>
                        </div>
                    <?php endforeach; ?>
                    <a href=" index.php" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>