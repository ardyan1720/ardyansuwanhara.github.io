-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2021 pada 04.37
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `program_pi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `nama_admin` varchar(50) NOT NULL,
  `kata_kunci` varchar(20) NOT NULL,
  `pengguna_admin` varchar(25) NOT NULL,
  `id_admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`nama_admin`, `kata_kunci`, `pengguna_admin`, `id_admin`) VALUES
('ardyan', 'ardyan123', 'ardyan_123', 1),
('suwanhara', 'suwanhara123', 'suwanhara_123', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_kandidat` varchar(255) NOT NULL,
  `tentang` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `kode`, `nama_kandidat`, `tentang`, `foto`) VALUES
(57, '1', 'ardyan', 'Visi:\r\n- Menjadikan OSIS yang progresif, dinamis, dan solid\r\n- Mendorong siswa agar mampu untuk mengasah potensinya \r\n  sendiri berdasarkan kreativitas yang telah diberikan Tuhan kepadanya\r\n\r\nMisi:\r\n- Mengutamakan Ketuhanan Yang Maha Esa dalam segala aspek\r\n- Merangkul dan menjalin hubungan yang baik antar civitas akademik \r\n   dalam setiap program kerja dan juga keseharian\r\n- Mengutamakan kerjasama dan kebersamaan\r\n- Menjalankan dan meningkatkan kualitas program kerja\r\n', 'IMG20191016085301~2.jpg'),
(59, '2', 'suwanhara', 'Visi:\r\n-Menjadi pelajar yang peduli terhadap pengembangan \r\n  kualitas sumber daya manusia di bidang kerohanian, \r\n  pengabdian masyarakat, pelajaran, dan perkembangan \r\n  teknologi terkini.\r\n\r\nMisi:\r\n- Membentuk wadah belajar kelompok terpadu bagi siswa.\r\n- Menyelenggarakan perlombaan yang mendidik.\r\n- Menyelenggarakan kegiatan masa orientasi siswa yang \r\n  jauh dari kesan pembodohan.\r\n- Aktif belajar di media sosial seperti Brainly, Edmodo, \r\n  dan Quipper.\r\n- ikut membantu penyelenggaran kegiatan hari besar keagamaan.', 'aa 2~4.jpg'),
(60, '3', 'Sandi', 'Visi:\r\n- Menciptakan suasana sekolah yang cinta keberagaman, \r\nmenyenangkan, cinta lingkungan, dan kondusif.\r\n\r\nMisi:\r\n- Melakukan pengembangan secara maksimal terhadap \r\n   ekstrakulikuler sekolah.\r\n- Menyelenggarakan bakti lingkungan secara berkala di dalam \r\n   lingkungan sekolah dan sekitarnya.\r\n- Optimalisasi peran serta fungsi OSIS sebagai penyelenggara \r\n   berbagai kegiatan siswa.\r\n- Menyelenggarakan event tahunan seni dan olahraga sebagai \r\n   wujud toleransi perbedaan.\r\n- OSIS wajib menjadi tauladan untuk seluruh siswa.\r\n- Pengembangan dan peningkatan program kerja OSIS angkatan \r\n   sebelumnya.', 'PicsArt_02-16-08.19.38~2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `nama_pemilih` varchar(50) NOT NULL,
  `NIS` varchar(12) NOT NULL,
  `NISN` varchar(12) NOT NULL,
  `pilihan` int(11) NOT NULL DEFAULT 0,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`nama_pemilih`, `NIS`, `NISN`, `pilihan`, `id_siswa`) VALUES
('suwanhara', '0987654321', '1234567890', 3, 2),
('ardyan', '1234567890', '0987654321', 1, 3),
('rendra hari', '1122334455', '5544332211', 1, 13),
('ichsan', '6677889900', '0099887766', 2, 14),
('bagus', '5432109876', '0987612345', 2, 15),
('faizal', '1100229933', '3399220011', 0, 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
