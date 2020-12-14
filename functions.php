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

// CRUD Data Visitor
function tambah_visitor($data)
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
	$k05 = $data['k06'];
	$tgl = $data['date'];


	// query insert data
	$query = "INSERT INTO tbl_visitor
				VALUES
				('','$nama','$email','$k01','$k02','$k03','$k04','$k05','$k06','$tgl')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_visitor($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_visitor WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function cari_visitor($keyword)
{
	// query search
	$query = "SELECT * FROM tbl_visitor
				WHERE
				nama LIKE '%$keyword%' OR
				email LIKE '%$keyword%'
		";
	return query($query);
}


// CRUD Data Kriteria
function tambah_kriteria($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$kode = $data['kode'];
	$kriteria = $data['kriteria'];

	// query insert data
	$query = "INSERT INTO tbl_kriteria
				VALUES
				('','$kode','$kriteria')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_kriteria($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_kriteria WHERE id_krt = $id");
	return mysqli_affected_rows($conn);
}

function cari_kriteria($keyword)
{
	// query search
	$query = "SELECT * FROM tbl_kriteria 
				WHERE
				nama_krt LIKE '%$keyword%' OR
				kode_krt LIKE '%$keyword%'
		";
	return query($query);
}

// tambah bobot kriteria harga, bbm, kenyamanan, jumlah penumpang, kapasitas mesin
function tambah_bobot_kriteria($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$nama = $data['kriteria'];
	$bobot = $data['bobot'];

	// query insert data
	$query = "INSERT INTO tbl_bobot_kriteria
				VALUES
				('','$nama','$bobot')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah_bobot_kriteria_harga($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$nama = $data['harga'];
	$bobot = $data['bobot'];

	// query insert data
	$query = "INSERT INTO tbl_bobot_kriteria_harga
				VALUES
				('','$nama','$bobot')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah_bobot_kriteria_bbm($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$nama = $data['bbm'];
	$bobot = $data['bobot'];

	// query insert data
	$query = "INSERT INTO tbl_bobot_kriteria_bbm
				VALUES
				('','$nama','$bobot')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah_bobot_kriteria_kenyamanan($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$nama = $data['kenyamanan'];
	$bobot = $data['bobot'];

	// query insert data
	$query = "INSERT INTO tbl_bobot_kriteria_kenyamanan
				VALUES
				('','$nama','$bobot')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah_bobot_kriteria_mesin($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$nama = $data['mesin'];
	$bobot = $data['bobot'];

	// query insert data
	$query = "INSERT INTO tbl_bobot_kriteria_mesin
				VALUES
				('','$nama','$bobot')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah_bobot_kriteria_penumpang($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$nama = $data['penumpang'];
	$bobot = $data['bobot'];

	// query insert data
	$query = "INSERT INTO tbl_bobot_kriteria_penumpang
				VALUES
				('','$nama','$bobot')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// hapus bobot kriteria harga, bbm, mesin, penumpang, kenyamanan
function hapus_bobot_kriteria($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_bobot_kriteria_bbm WHERE id_bbm = $id");
	return mysqli_affected_rows($conn);
}

function hapus_bobot_kriteria_bbm($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_bobot_kriteria_bbm WHERE id_bbm = $id");
	return mysqli_affected_rows($conn);
}

function hapus_bobot_kriteria_harga($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_bobot_kriteria_harga WHERE id_harga = $id");
	return mysqli_affected_rows($conn);
}

function hapus_bobot_kriteria_kenyamanan($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_bobot_kriteria_kenyamanan WHERE id_kenyamanan = $id");
	return mysqli_affected_rows($conn);
}

function hapus_bobot_kriteria_penumpang($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_bobot_kriteria_penumpang WHERE id_penumpang = $id");
	return mysqli_affected_rows($conn);
}

function hapus_bobot_kriteria_mesin($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_bobot_kriteria_mesin WHERE id_mesin = $id");
	return mysqli_affected_rows($conn);
}

// CRUD Data Alternatif
function tambah_alternatif($data)
{
	global $conn;

	// ambil data dari tiap elemen dalam form / dari name
	$kode_alt = $data['kode_alt'];
	$nama_alt = $data['alternatif'];
	// upload gambar/image
	$gambar = upload_alternatif();
	if ($gambar === false) {
		// kalo gagal upload fungsi insert hentikan 
		return false;
	}
	$website = $data['url'];
	$website_seo = $data['website_seo'];
	$k01 = $data['k01'];
	$k02 = $data['k02'];
	$k03 = $data['k03'];
	$k04 = $data['k04'];
	$k05 = $data['k05'];

	// query insert data
	$query = "INSERT INTO tbl_alternatif
				VALUES
				('','$kode_alt','$nama_alt','$gambar','$website','$website_seo','$k01','$k02','$k03','$k04','$k05')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// fungsi upload image/gambar alternatif
function upload_alternatif()
{
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

	move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

	return $namaFileBaru;
	// kenapa namafile nya di return, supaya ketika gambar nya berhasil di upload, isi dari gambar/foto(lihat baris 31) adalah nama file nya sehingga gambar bisa di insert kan ke database

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


function hapus_alternatif($id)
{
	global $conn;

	mysqli_query($conn, "DELETE FROM tbl_alternatif WHERE id_alt = $id");
	return mysqli_affected_rows($conn);
}


function cari_alternatif($keyword)
{
	// query search
	$query = "SELECT * FROM tbl_alternatif 
				WHERE
-- gunakan wild card agar pencarian kata nya fleksibel, bukan dgn = tapi dgn LIKE
				-- nama = '$keyword'
				-- cari berdasarkan field nama dan nik
				nama_alt LIKE '%$keyword%' OR
				website_seo LIKE '%$keyword%' OR
				kode_alt LIKE '%$keyword%'
		";
	return query($query);
}

function tambah_admin($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$enkripsipassword = password_hash($password, PASSWORD_DEFAULT);

	// upload foto
	// panggil fungsi upload()
	$foto = upload();
	if ($foto === false) {
		// kalo gagal fungsi INSERT nya hentikan
		return false;
	}
	// query insert data
	$query = "INSERT INTO tbl_admin
				VALUES
				('','$nama','$username','$enkripsipassword','$foto')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload()
{
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name']; // tampat gambar disimpan smentara

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
	$namaFoto = pathinfo($namaFile, PATHINFO_BASENAME);
	$format = pathinfo($namaFoto, PATHINFO_EXTENSION);
	// $ekstensiGambar = strtolower(end($format));
	if (!$format) { // in_array ngecek string di dalam array
		// !in_array kalo tidak ada gambar yg valid, kasih pesan
		echo "<script>
			alert('yang anda upload bukan foto!');
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

	move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);

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
	$enkripsipassword = password_hash($password, PASSWORD_DEFAULT);
	// ambil gambar lama
	$fotoLama = $data['fotoLama'];

	// tambahkan form edit enctype="" dan kirimkan input type=hidden dgn value=foto di file edit.php
	// edit upload foto
	// cek apakah user pilih foto baru atau tidak
	if ($_FILES['foto']['error'] === 4) {
		$foto = $fotoLama;
	} else {

		$foto = upload();
	}

	// query insert data
	$query = "UPDATE tbl_admin SET
					nama = '$nama',
					username = '$username',
					password = '$enkripsipassword',
					foto = '$foto'
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

function hapus_pref()
{
	global $conn;

	mysqli_query($conn, "TRUNCATE TABLE tbl_preferensi");

	// Fungsi mysqli_affected_rows () mengembalikan jumlah baris yang terpengaruh 
	// di SELECT, INSERT, UPDATE, REPLACE, atau DELETE query sebelumnya
	// mysqli_affected_rows mengambil nilai berupa angka 1 brti ada data yg terpengaruh, 
	// dan -1 data tidak ada perubahan data
	return mysqli_affected_rows($conn);
}
