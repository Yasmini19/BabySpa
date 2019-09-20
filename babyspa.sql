-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2019 pada 14.07
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babyspa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id_contact` int(11) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id_contact`, `contact`, `keterangan`) VALUES
(1, 'Location', 'Malang'),
(2, 'Phone', '081209329023'),
(3, 'Social Media', 'instagram : maminaa_'),
(4, 'Email', 'ertyuio@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_reservasi`
--

CREATE TABLE `detail_reservasi` (
  `id_detail` int(11) NOT NULL,
  `reservasi_id` int(11) NOT NULL,
  `subkategori_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id_galery` int(11) NOT NULL,
  `galery` varchar(500) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `keterangan`) VALUES
(1, 'Baby'),
(2, 'Mom'),
(3, 'Konselor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `keterangan`) VALUES
(1, 'Superadmin'),
(2, 'User'),
(3, 'Terapis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `pemesan_id` int(11) NOT NULL,
  `terapis_id` int(11) NOT NULL,
  `sesi_id` int(11) NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `total_harga_awal` int(11) NOT NULL,
  `diskon_pesen` varchar(5) NOT NULL,
  `nominal_diskon` float NOT NULL,
  `biaya_transportasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi_reservasi`
--

CREATE TABLE `sesi_reservasi` (
  `id_sesi` int(11) NOT NULL,
  `sesi` varchar(20) NOT NULL,
  `waktu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi_reservasi`
--

INSERT INTO `sesi_reservasi` (`id_sesi`, `sesi`, `waktu`) VALUES
(1, 'Pagi', '8:00 - 10:00'),
(2, 'Pagi', '10:00 - 12:00'),
(3, 'Siang', '12:00 - 14:00'),
(4, 'Siang', '14:00 - 16:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul_sub` varchar(500) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_sub` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `kategori_id`, `judul_sub`, `keterangan`, `foto_sub`, `harga`) VALUES
(1, 1, 'Massage', 'Pijatan lembut oleh tenaga profesional yang akan membantu memperlancar peredaran darah si kecil. Min', 'baby.jpg', 85000),
(2, 1, 'Scrub', 'Dalam baby body scrub ini anak akan diberikan bergabai macam body scrub pada bagian tubuhnya yang tentunya terbuat dari bahan – bahan yang aman bagi kulit anak. Seperti lulur lumpur dan cokelat. Baby body scrub ini akan memakan waktu 15 – 20 menit agar scrub tersebut meresap ke dalam kulit anak yang akan memberikan manfaat yang baik.', 'babyscrub.jpg', 90000),
(3, 1, 'gymball', 'Menguatkan otot-otot dan persendian,Meningkatkan perkembangan motorik,Meningkatkan fleksibilitas atau daya kelenturan tubuh', 'gymball.jpg', 80000),
(4, 1, 'Swim', 'Begitu masuk kedalam klinik “Baby Spa”, Anda akan langsung disambut oleh 2 kolam besar berwarna putih lengkap dengan bola-bola mainannya. Ini yang menjadi ciri unik Baby spa dibanding tempat spa lainnya. Konsep semi outdoor memudahkan bunda dan keluarga untuk melihat langsung si kecil saat berenang. Baby Swim ini hanya diperuntukkan bagi bayi yang sudah memiliki berat badan minimal 5 kilogram. ', 'b6.jpg', 85000),
(5, 2, 'yoga ibu hamil', 'Dengan melakukan penetralan yoga, akan mendukung perubahan tubuh yang terjadi dan memperkuat otot tubuh menjelang melahirkan', 'yoga.jpg', 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `full_name`, `username`, `email`, `no_telp`, `alamat`, `foto`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '091322332234', 'malang', '', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'sasa', 'sasa', 'sasa@123', '0813999293433', 'Malang', '', 'f45731e3d39a1b2330bbf93e9b3de59e', 2),
(5, 'meli', 'meli', 'meli@gmail.com', '2', 'meli', NULL, '315fef7b8d30f99d6964f489ee4c9828', 2),
(6, 'yasmini', 'yasmini', 'yasmini@gmail.com', '9029109012', 'malang', 't1.jpg', '0bad1b8571cd7ad70fb02939a1f9b6fb', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detailreservasi_subkategori` (`subkategori_id`),
  ADD KEY `fk_detailreservasi_reservasi` (`reservasi_id`);

--
-- Indeks untuk tabel `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `fk_reservasi_sesi` (`sesi_id`),
  ADD KEY `fk_reservasi_user` (`pemesan_id`);

--
-- Indeks untuk tabel `sesi_reservasi`
--
ALTER TABLE `sesi_reservasi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD KEY `fk_subkategori_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_level` (`level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galery`
--
ALTER TABLE `galery`
  MODIFY `id_galery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sesi_reservasi`
--
ALTER TABLE `sesi_reservasi`
  MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD CONSTRAINT `fk_detailreservasi_reservasi` FOREIGN KEY (`reservasi_id`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detailreservasi_subkategori` FOREIGN KEY (`subkategori_id`) REFERENCES `sub_kategori` (`id_sub_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_reservasi_sesi` FOREIGN KEY (`sesi_id`) REFERENCES `sesi_reservasi` (`id_sesi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservasi_user` FOREIGN KEY (`pemesan_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `fk_subkategori_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
