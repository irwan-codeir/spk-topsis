-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2020 pada 14.38
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_topsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `username`, `password`, `foto`) VALUES
(4, 'andi', 'andi', '$2y$10$5zguXYFxtGPIsRRA7QLjkeYRHr1zA7IPMsnzYzTCdg7PSkbr75gn.', 'irwan.jpg'),
(5, 'dimas', 'dimas', '$2y$10$5zguXYFxtGPIsRRA7QLjkeYRHr1zA7IPMsnzYzTCdg7PSkbr75gn.', 'irwan2.jpg'),
(7, 'adm', 'adm', '$2y$10$wRY9eq0eHlET5hgmrt0d7.CKnc/J2WjKtGR8w.bxr8XuWQ19enma6', '5fac747b5855a.jpg'),
(15, 'a', 'a', '$2y$10$bcTXs3BJxX0UqY4NRNquHem1iN0LEAvA3s3lewTPvHFMzsMZ0OBWi', '5fc78c6e276a8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alt` int(11) NOT NULL,
  `kode_alt` varchar(12) NOT NULL,
  `nama_alt` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `website` varchar(150) NOT NULL,
  `website_seo` varchar(50) NOT NULL,
  `k01` double NOT NULL,
  `k02` double NOT NULL,
  `k03` double NOT NULL,
  `k04` double NOT NULL,
  `k05` double NOT NULL,
  `k06` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alt`, `kode_alt`, `nama_alt`, `gambar`, `website`, `website_seo`, `k01`, `k02`, `k03`, `k04`, `k05`, `k06`) VALUES
(1, 'A01', 'Avanza', 'avanza.jpg', 'https://www.toyota.astra.co.id/product/avanza', 'Toyota Astra', 5, 5, 5, 3, 1, 1),
(2, 'A02', 'Veloz', 'veloz.jpg', 'www.toyota.com', '', 3, 5, 3, 3, 1, 5),
(3, 'A03', 'Sienta', 'sienta.jpg', 'www.toyota.com', '', 3, 3, 3, 3, 5, 5),
(4, 'A04', 'Mobilio', 'mobilio.jpg', 'www.toyota.com', '', 3, 5, 3, 3, 5, 4),
(5, 'A05', 'Ertiga', 'ertiga.jpg', 'www.toyota.com', '', 3, 3, 5, 3, 5, 3),
(6, 'A06', 'Ertiga Sport', 'ertigasport.jpg', 'www.toyota.com', '', 3, 3, 5, 3, 5, 3),
(7, 'A07', 'APV Arena', 'apvarena.jpg', 'www.toyota.com', '', 5, 1, 3, 3, 5, 3),
(8, 'A08', 'APV Luxury', 'apvluxury.jpg', 'www.toyota.com', '', 3, 1, 5, 3, 5, 3),
(9, 'A09', 'Xenia', 'xenia.jpg', 'www.toyota.com', '', 5, 1, 3, 3, 5, 5),
(10, 'A10', 'Xpander', 'xpander.jpg', 'www.toyota.com', '', 3, 5, 3, 3, 5, 3),
(11, 'A11', 'Xpander Cross', 'xpandercross.jpg', 'www.toyota.com', '', 3, 3, 3, 3, 5, 5),
(12, 'A12', 'Grand Livina', 'livina.jpg', 'www.toyota.com', '', 3, 1, 3, 3, 5, 5),
(13, 'A13', 'Cortez', 'cortez.jpg', 'https://wulingofficial.com/?s=cortez', '', 3, 1, 3, 3, 5, 3),
(14, 'A14', 'Confero', 'confero.jpg', 'https://wulingofficial.com/?s=confero', 'Wuling Motors', 5, 3, 3, 5, 5, 3),
(15, 'A15', 'Panther', 'panther.jpg', 'www.toyota.com', '', 3, 3, 3, 3, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot_kriteria`
--

CREATE TABLE `tbl_bobot_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bobot_kriteria`
--

INSERT INTO `tbl_bobot_kriteria` (`id_kriteria`, `kriteria`, `bobot`) VALUES
(1, 'Rendah', 1),
(2, 'Cukup', 3),
(3, 'Tinggi', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot_kriteria_bbm`
--

CREATE TABLE `tbl_bobot_kriteria_bbm` (
  `id_bbm` int(11) NOT NULL,
  `bbm` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bobot_kriteria_bbm`
--

INSERT INTO `tbl_bobot_kriteria_bbm` (`id_bbm`, `bbm`, `bobot`) VALUES
(2, '8 - 10 km', 1),
(3, '11 - 12 km', 3),
(4, '12 - 17 km', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot_kriteria_harga`
--

CREATE TABLE `tbl_bobot_kriteria_harga` (
  `id_harga` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bobot_kriteria_harga`
--

INSERT INTO `tbl_bobot_kriteria_harga` (`id_harga`, `harga`, `bobot`) VALUES
(2, 'Di atas 290 juta', 1),
(3, '200 juta - 289 juta', 3),
(4, '140 juta - 199 juta', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot_kriteria_kenyamanan`
--

CREATE TABLE `tbl_bobot_kriteria_kenyamanan` (
  `id_kenyamanan` int(11) NOT NULL,
  `kenyamanan` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bobot_kriteria_kenyamanan`
--

INSERT INTO `tbl_bobot_kriteria_kenyamanan` (`id_kenyamanan`, `kenyamanan`, `bobot`) VALUES
(1, 'Rate 4 - 4.4', 1),
(2, 'Rate 4.5 - 4.7', 3),
(3, 'Rate Diatas 4.8', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot_kriteria_mesin`
--

CREATE TABLE `tbl_bobot_kriteria_mesin` (
  `id_mesin` int(11) NOT NULL,
  `mesin` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bobot_kriteria_mesin`
--

INSERT INTO `tbl_bobot_kriteria_mesin` (`id_mesin`, `mesin`, `bobot`) VALUES
(1, '1300 cc - 1350 cc', 1),
(2, '1360 cc - 1460 cc', 3),
(3, '1462 cc - 2499 cc', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot_kriteria_penumpang`
--

CREATE TABLE `tbl_bobot_kriteria_penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `penumpang` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bobot_kriteria_penumpang`
--

INSERT INTO `tbl_bobot_kriteria_penumpang` (`id_penumpang`, `penumpang`, `bobot`) VALUES
(1, '7 Orang', 3),
(2, '8 Orang', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bobot_kriteria_warna`
--

CREATE TABLE `tbl_bobot_kriteria_warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(11) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_krt` int(11) NOT NULL,
  `kode_krt` varchar(50) NOT NULL,
  `nama_krt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_krt`, `kode_krt`, `nama_krt`) VALUES
(1, 'k01', 'harga'),
(2, 'k02', 'bbm'),
(3, 'k03', 'kenyaman'),
(4, 'k04', 'penumpang'),
(5, 'k05', 'mesin'),
(7, 'k06', 'warna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_preferensi`
--

CREATE TABLE `tbl_preferensi` (
  `id` int(11) NOT NULL,
  `pref` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_preferensi`
--

INSERT INTO `tbl_preferensi` (`id`, `pref`) VALUES
(1, 0.58682),
(2, 0.608233),
(3, 0.523469),
(4, 0.650572),
(5, 0.501159),
(6, 0.501159),
(7, 0.385333),
(8, 0.346306),
(9, 0.429853),
(10, 0.629728),
(11, 0.523469),
(12, 0.379456),
(13, 0.317629),
(14, 0.618999),
(15, 0.47245),
(16, 0.506228);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_visitor`
--

CREATE TABLE `tbl_visitor` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `k01` int(11) NOT NULL,
  `k02` int(11) NOT NULL,
  `k03` int(11) NOT NULL,
  `k04` int(11) NOT NULL,
  `k05` int(11) NOT NULL,
  `k06` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`id`, `nama`, `email`, `k01`, `k02`, `k03`, `k04`, `k05`, `k06`, `date`) VALUES
(1, 'data-fact', 'fact@irwanesia.co.id', 5, 4, 3, 2, 3, 3, '2020-10-12'),
(2, 'andi', 'andi@irwanesia.co.id', 1, 5, 5, 3, 5, 3, '2020-10-12'),
(3, 'admin', 'adm@adm.com', 1, 5, 5, 3, 5, 3, '2020-10-13'),
(4, 'felicia', 'felc@irwanesia.co.id', 3, 5, 3, 5, 3, 3, '2020-10-13'),
(5, 'aaa', 'aaa@aaa.aa', 5, 3, 3, 5, 5, 3, '2020-10-13'),
(6, 'irwan', 'ir@gn.ca', 3, 5, 5, 5, 3, 3, '2020-10-13'),
(7, 'adi', 'adi@gmail.com', 1, 3, 3, 5, 3, 3, '2020-11-03'),
(8, 'gvgvg', 'irwanramadhan131@gmail.com', 3, 1, 3, 3, 3, 3, '2020-11-03'),
(9, 'irwan', 'irw.cd@gmail.com', 3, 3, 3, 5, 3, 3, '2020-11-11'),
(10, 'dimas', 'ds@gmail.com', 1, 1, 1, 3, 1, 3, '2020-11-11'),
(11, 'Aceng', 'ac@irwanesia.co.id', 3, 3, 3, 5, 3, 3, '2020-12-03'),
(12, 'ecy', 'ecy@codeir.co.id', 3, 3, 5, 5, 3, 3, '2020-12-13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alt`);

--
-- Indeks untuk tabel `tbl_bobot_kriteria`
--
ALTER TABLE `tbl_bobot_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_bobot_kriteria_bbm`
--
ALTER TABLE `tbl_bobot_kriteria_bbm`
  ADD PRIMARY KEY (`id_bbm`);

--
-- Indeks untuk tabel `tbl_bobot_kriteria_harga`
--
ALTER TABLE `tbl_bobot_kriteria_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indeks untuk tabel `tbl_bobot_kriteria_kenyamanan`
--
ALTER TABLE `tbl_bobot_kriteria_kenyamanan`
  ADD PRIMARY KEY (`id_kenyamanan`);

--
-- Indeks untuk tabel `tbl_bobot_kriteria_mesin`
--
ALTER TABLE `tbl_bobot_kriteria_mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indeks untuk tabel `tbl_bobot_kriteria_penumpang`
--
ALTER TABLE `tbl_bobot_kriteria_penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indeks untuk tabel `tbl_bobot_kriteria_warna`
--
ALTER TABLE `tbl_bobot_kriteria_warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_krt`);

--
-- Indeks untuk tabel `tbl_preferensi`
--
ALTER TABLE `tbl_preferensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot_kriteria`
--
ALTER TABLE `tbl_bobot_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot_kriteria_bbm`
--
ALTER TABLE `tbl_bobot_kriteria_bbm`
  MODIFY `id_bbm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot_kriteria_harga`
--
ALTER TABLE `tbl_bobot_kriteria_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot_kriteria_kenyamanan`
--
ALTER TABLE `tbl_bobot_kriteria_kenyamanan`
  MODIFY `id_kenyamanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot_kriteria_mesin`
--
ALTER TABLE `tbl_bobot_kriteria_mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot_kriteria_penumpang`
--
ALTER TABLE `tbl_bobot_kriteria_penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_bobot_kriteria_warna`
--
ALTER TABLE `tbl_bobot_kriteria_warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_krt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_preferensi`
--
ALTER TABLE `tbl_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
