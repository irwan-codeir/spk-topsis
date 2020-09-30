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


function tambah_pengunjung($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$nama = $data['nama'];
	$email = $data['email'];
	$k01 = $data['k01'];
	$k02 = $data['k02'];
	$k03 = $data['k03'];
	$k04 = $data['k04'];
	$k05 = $data['k05'];

	// query insert data
	$query = "INSERT INTO tbl_pengunjung
				VALUES
				('','$nama','$email','$k01','$k02','$k03','$k04','$k05')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah_bobot_alternatif($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$kode_alt = $data['kode_alt'];
	$k01 = $data['k01'];
	$k02 = $data['k02'];
	$k03 = $data['k03'];
	$k04 = $data['k04'];
	$k05 = $data['k05'];

	// query insert data
	$query = "INSERT INTO tbl_alternatif
				VALUES
				('','$kode_alt','$k01','$k02','$k03','$k04','$k05')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah_alternatif($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$kode = $data['kode'];
	$alternatif = $data['alternatif'];
	$image = $data['image'];
	$dealer = $data['dealer'];

	// query insert data
	$query = "INSERT INTO alternatif
				VALUES
				('','$kode','$alternatif','$image','$dealer')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function edit_bobot_alternatif($data)
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
	$query = "UPDATE tbl_alternatif SET
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

function edit_alternatif($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$id = $data['id'];
	$kode = $data['kode'];
	$alternatif = $data['alternatif'];
	$image = $data['image'];
	$dealer = $data['dealer'];


	// query insert data
	$query = "UPDATE alternatif SET
					kode_alt = '$kode',
					alternatif = '$alternatif',
					image = '$image',
					dealer = '$dealer'
				WHERE id = $id
			";
	mysqli_query($conn, $query);

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}

function hapus_bobot_alternatif($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_alternatif WHERE id_alt = $id");

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}

function hapus_alternatif($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM alternatif WHERE id_alt = $id");

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

function tambah_admin($data)
{
	global $conn;

	$nama = htmlspecialchars($data['nama']);
	$username = htmlspecialchars($data['username']);
	$password = htmlspecialchars($data['password']);
	$image = htmlspecialchars($data['image']);

	// query insert data
	$query = "INSERT INTO tbl_alternatif
				VALUES
				('','$nama','$username','$password','$image')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload()
{
	// FILE HANDLING atau yg akan dipelajari dalam proses upload gambar
	// <input type='file'
	// enctype atau encoding type
	// $_FILES
	// move_upload_file

	// string diambil mnggunakan $_POST
	// file/gambar diambil menggunakan $_FILES
	// di dalam $_FILES ada 5 element jika kita tampilkan mggunakan var_damp()

	// fitur upload terhubung di dalam function tambah()
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name']; // tampat gambar disimpan smentara

	// cek apakah tidak ada gambar yg diupload
	if ($error === 4) {
		// error 4 = tdak ada gambar yg diupload
		echo "<script>
			alert('pilih gambar terlebih dahulu');
		</script>";
		return false;
	}

	// cek apakah yg diupload adalah gambar
	// pathinfo(), PATHINFO_EXTENSION menyimpan file extension jpg, png dll
	$namaGambar = pathinfo($namaFile, PATHINFO_BASENAME);
	$format = pathinfo($namaGambar, PATHINFO_EXTENSION);
	// $ekstensiGambar = strtolower(end($format));
	if (!$format) { // in_array ngecek string di dalam array
		// !in_array kalo tidak ada gambar yg valid, kasih pesan
		echo "<script>
			alert('yang anda upload bukan gambar!');
		</script>";
		return false;
	}

	// cek jika ukuran terlalu besar, misal max size gambar 2mb
	if ($ukuranFile > 1000000) { // dalam satuan byte, 1000000byte = 1mb
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			</script>";
		return false;
	}

	// jika lolos semua pengecekan, gambar siap di upload
	// untuk menghindari upload gambar dengan nama yang sama
	// generate nama gambar baru
	$namaFileBaru = uniqid(); // membuat random angka, misal 987953720
	$namaFileBaru .= '.';
	$namaFileBaru .= $format;


	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
	// kenapa namafile nya di return, supaya ketika gambar nya berhasil di upload, isi dari gambar/foto(lihat baris 31) adalah nama file nya sehingga gambar bisa di insert kan ke database

}

function edit_admin($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$id = $data['id'];
	$nama = htmlspecialchars($data['nama']);
	$username = htmlspecialchars($data['username']);
	$password = htmlspecialchars($data['password']);
	$image = htmlspecialchars($data['image']);
	// ambil gambar lama
	$gambarLama = $data['gambarLama'];

	// tambahkan form edit enctype="" dan kirimkan input type=hidden dgn value=gambar di file edit.php
	// edit upload foto
	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else {

		$gambar = upload();
	}

	// query insert data
	$query = "UPDATE karyawan SET
					nama = '$nama',
					username = '$username',
					password = '$password',
					image = '$image'
				WHERE id = $id
			";
	mysqli_query($conn, $query);

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}

function hapus_admin($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_admin WHERE id = $id");

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}


function cari_admin($keyword)
{
	// query search
	$query = "SELECT * FROM tbl_admin 
				WHERE
-- gunakan wild card agar pencarian kata nya fleksibel, bukan dgn = tapi dgn LIKE
				-- nama = '$keyword'
				-- cari berdasarkan field nama dan nik
				nama LIKE '%$keyword%' OR
				username LIKE '%$keyword%'
		";
	return query($query);
}
