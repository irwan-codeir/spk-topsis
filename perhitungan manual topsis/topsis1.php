<?php

require "functions.php";

$test = mysqli_query($conn, "SELECT * FROM test");

$kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
foreach ($kriteria as $k) {
    $kr1 = $k['harga'];
    $kr2 = $k['bbm'];
    $kr3 = $k['kenyamanan'];
    $kr4 = $k['jml_penumpang'];
    $kr5 = $k['mesin'];
}
echo $kr1 . "<br>";

foreach ($test as $ts) {

    echo $kr1 * $ts['t1'] . "<br>";
}
