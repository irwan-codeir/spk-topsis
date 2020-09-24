<?php  

require "functions.php";

$alternatif = mysqli_query($conn, "SELECT kode_alt, k01, k02, k03, k04, k05 FROM tbl_alternatif");

$row = mysqli_fetch_array($alternatif);

echo "kode : " . $row['kode_alt']. "| k01 : " . $row['k01']. "| k02 : " . $row['k02'] . "| k03 : " . $row['k03'] . "| k04 : " . $row['k04'] . "| k05 : " . $row['k05'];
echo "<br>";
echo "kode : " . $row['kode_alt']. "| k01 : " . $row['k01']. "| k02 : " . $row['k02'] . "| k03 : " . $row['k03'] . "| k04 : " . $row['k04'] . "| k05 : " . $row['k05'];
echo "<br>";
echo "kode : " . $row['kode_alt']. "| k01 : " . $row['k01']. "| k02 : " . $row['k02'] . "| k03 : " . $row['k03'] . "| k04 : " . $row['k04'] . "| k05 : " . $row['k05'];
echo "<br>";
echo "kode : " . $row['kode_alt']. "| k01 : " . $row['k01']. "| k02 : " . $row['k02'] . "| k03 : " . $row['k03'] . "| k04 : " . $row['k04'] . "| k05 : " . $row['k05'];
echo "<br>";
echo "kode : " . $row['kode_alt']. "| k01 : " . $row['k01']. "| k02 : " . $row['k02'] . "| k03 : " . $row['k03'] . "| k04 : " . $row['k04'] . "| k05 : " . $row['k05'];



$alternatif = [3, 4, 3, 5, 2];
$bobot = [1, 2, 3, 4, 5];

$a1 = pow($alternatif[0], 2);
$a2 = pow($alternatif[1], 2);
$a3 = pow($alternatif[2], 2);
$a4 = pow($alternatif[3], 2);
$a5 = pow($alternatif[4], 2);
echo "<br>";

echo $a1. "|" .$a2. "|" .$a3. "|" .$a4. "|" .$a5;
echo "<br>";

mysqli_close($conn);