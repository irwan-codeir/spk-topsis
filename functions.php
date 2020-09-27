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


function tambah_alternatif()
{
	global $conn;

	if ($_GET['act'] == 'tambah_alt') {
		// ambil data dari tiap elemen dalam form / dari name
		$kode_alt = htmlspecialchars($_POST['kode_alt']);
		$k01 = htmlspecialchars($_POST['k01']);
		$k02 = htmlspecialchars($_POST['k02']);
		$k03 = htmlspecialchars($_POST['k03']);
		$k04 = htmlspecialchars($_POST['k04']);
		$k05 = htmlspecialchars($_POST['k05']);

		// query insert data
		$query = "INSERT INTO tbl_alternatif
				VALUES
				('','$kode_alt','$k01','$k02','$k03','$k04','$k05')
				";
		$query_tambah = mysqli_query($conn, $query);

		if ($query_tambah) {
			header("location: admin/data-alternatif.php");
			// echo "
			// 	<script>
			// 		alert('data berhasil ditambah');
			// 		document.location.href = 'topsis.php';
			// 	</script>
			// ";
		} else {
			echo "
				<script>
					alert('data gagal ditambah');
					document.location.href = 'topsis.php';
				</script>
			";
		}

		// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
		// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
		// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
		// dan -1 data tidak ada perubahan data
		// return mysqli_affected_rows($conn);
	}
}


function normalisasi()
{
	global $conn;

	// query insert data
	$query = "INSERT INTO tbl_alternatif
				VALUES
				('','$kode_alt','$k01','$k02','$k03','$k04','$k05')
				";
	mysqli_query($conn, $query);
}


function edit_alternatif($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$id = $data['id_alt'];
	$kode_alt = $data['kode_alt'];
	$k01 = $data['k01'];
	$k02 = $data['k02'];
	$k03 = $data['k03'];
	$k04 = $data['k04'];
	$k05 = $data['k05'];


	// query insert data
	$query = "UPDATE karyawan tbl_alternatif
					kode_alt = '$kode_alt',
					k01 = '$k01',
					k02 = '$k02',
					k03 = '$k03',
					k04 = '$k04',
					k05 = '$k05'
				WHERE id_alt = $id
			";
	mysqli_query($conn, $query);

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_alternatif WHERE id_alt = $id");

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}


function cari($keyword)
{
	// query search
	$query = "SELECT * FROM tbl_alternatif 
				WHERE
-- gunakan wild card agar pencarian kata nya fleksibel, bukan dgn = tapi dgn LIKE
				-- nama = '$keyword'
				-- cari berdasarkan field nama dan nik
				kode_alt LIKE '%$keyword%'
		";
	return query($query);
}
