<?php 

$conn = mysqli_connect("localhost", "root", "", "db_spk_topsis");

function query($query)
{
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}


function tambah($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$kode_alt = htmlspecialchars($data['kode_alt']);
	$k01 = htmlspecialchars($data['k01']);
	$k02 = htmlspecialchars($data['k02']);
	$k03 = htmlspecialchars($data['k03']);
	$k04 = htmlspecialchars($data['k04']);
	$k05 = htmlspecialchars($data['k05']);

	// query insert data
	$query = "INSERT INTO tbl_alternatif
				VALUES
				('','$kode_alt','$k01','$k02','$k03','$k04','$k05')
				";
	mysqli_query($conn, $query);

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}

function normalisasi(){
	global $conn;

	// query insert data
	$query = "INSERT INTO tbl_alternatif
				VALUES
				('','$kode_alt','$k01','$k02','$k03','$k04','$k05')
				";
	mysqli_query($conn, $query);

}

 ?>