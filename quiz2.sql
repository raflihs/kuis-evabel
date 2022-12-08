-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 04:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz2`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_acc` int(11) NOT NULL,
  `nim` bigint(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `name_acc` varchar(100) NOT NULL,
  `email_acc` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('guru','siswa','','') NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_acc`, `nim`, `username`, `name_acc`, `email_acc`, `password`, `status`, `nilai`) VALUES
(1, 5302420030, 'raflihs', 'Rafli Hada Setiawan', 'raflijr47@gmail.com', 'admin', 'guru', 1),
(18, 5302420031, 'putrycw', 'PUTRY CHANDRA WENING', 'putrychandrawening773@gmail.com', 'putrycw', 'siswa', 0),
(20, 5302420030, 'ummird', 'UMMI RAMADHANI', 'ummird@gmail.com', 'ummird', 'siswa', 7);

-- --------------------------------------------------------

--
-- Table structure for table `opsi_jawab`
--

CREATE TABLE `opsi_jawab` (
  `id_soal` int(11) NOT NULL,
  `opsi` varchar(200) NOT NULL,
  `id_opsi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opsi_jawab`
--

INSERT INTO `opsi_jawab` (`id_soal`, `opsi`, `id_opsi`) VALUES
(1, 'Coding', '1'),
(1, 'Kompilasi', '2'),
(1, 'Debugging', '3'),
(1, 'Sosialisasi', '4'),
(3, 'Adobe Premiere', '1'),
(3, 'Wordpad', '2'),
(3, 'Netbeans', '3'),
(3, 'Adobe Firework', '4'),
(4, 'Aliran proses program cukup rinci dengan pemodelan secara visual', '1'),
(4, 'Tidak cocok untuk program yang kompleks', '2'),
(4, 'Penjelasan dalam alir proses tidak detail', '3'),
(4, 'Sulit untuk menerjemahkan ke dalam bentuk kode program sebenarnya', '4'),
(5, 'Proses', '1'),
(5, 'Decision', '2'),
(5, 'Preparation', '3'),
(5, 'Input / Output', '4'),
(6, 'Alur', '1'),
(6, 'Algoritma', '2'),
(6, 'Bagan Alir', '3'),
(6, 'Diagram', '4'),
(7, 'Menjumlahkan dua bilangan', '1'),
(7, 'Menampilkan hasil bagi', '2'),
(7, 'Mengalikan dua bilangan', '3'),
(7, 'Mengurangi bilangan pertama dan kedua', '4'),
(9, 'Operator', '1'),
(9, 'Tipe Data', '2'),
(9, 'Ekspresi', '3'),
(9, 'Variabel', '4'),
(10, 'tipe data karakter ', '1'),
(10, 'bernilai true dan false ', '2'),
(10, 'bilangan desimal', '3'),
(10, 'bilangan bulat', '4'),
(2, 'Programmer', '1'),
(2, 'Pemrograman', '2'),
(2, 'Algoritma', '3'),
(2, 'Program', '4'),
(8, 'Proses ', '1'),
(8, 'Algoritma', '2'),
(8, 'Program', '3'),
(8, 'Diagram', '4'),
(11, 'Deklarasi>deskripsi> proses > output', '1'),
(11, 'Proses > output >deskripsi>deklarasi', '2'),
(11, 'Deskripsi> proses > output >deklarasi', '3'),
(11, 'Proses >deskripsi> output >deklarasi', '4'),
(12, 'PHP', '1'),
(12, 'Android', '2'),
(12, 'Pascal', '3'),
(12, 'Java', '4'),
(13, 'Bahasa Pemrograman', '1'),
(13, 'Bahasa Indonesia', '2'),
(13, 'Bahasa Tingkat Tinggi', '3'),
(13, 'Bahasa Mesin', '4');

-- --------------------------------------------------------

--
-- Table structure for table `soal_tabel`
--

CREATE TABLE `soal_tabel` (
  `id_soal` int(11) NOT NULL,
  `teks_soal` varchar(300) NOT NULL,
  `id_opsi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_tabel`
--

INSERT INTO `soal_tabel` (`id_soal`, `teks_soal`, `id_opsi`) VALUES
(1, 'Pekerjaan seorang programmer adalah sebagai berikut, kecuali . . . .\n\n', '4'),
(2, 'Proses menulis, menguji dan memperbaiki (debug), dan memelihara kode yang membangun sebuah program Komputer disebut . . . .', '2'),
(3, 'Aplikasi perangkat lunak yang digunakan programmer untuk menulis, mengompile, mencari kesalahan, dan menyebarkan program adalah . . . .', '3'),
(4, 'Dibawah ini yang bukan merupakan kerugian menggunakan metode flowchart adalah . . . .', '1'),
(5, 'Nama Flowchart yang berfungsi pada saat proses deklarasi atau pemberian nilai-nilai awal pada variable yang digunakan adalah . . . .', '3'),
(6, 'Nama lain dari flowchart adalah . . . .', '3'),
(7, 'Modulus pada operasi matematika berfungsi untuk', '2'),
(8, 'Sebuah prosedur langkah demi langkah yang pasti untuk menyelesaikan sebuah masalah di sebut', '1'),
(9, 'Suatu nama yang digunakan untuk menyimpan suatu nilai dari tipe data tertentu disebut juga . . . .\r\n\r\n', '4'),
(10, 'Yang dimaksud dengan tipe data Double adalah\r\n\r\n', '3'),
(11, 'Urutkan kode perintah pada Java dibawah ini', '1'),
(12, 'Berikut ini adalah bahasa pemrograman, kecuali . . . .', '2'),
(13, 'Perintah kepada komputer dengan memakai kode bahasa biner, contohnya 01100101100110 disebut dengan', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_acc`);

--
-- Indexes for table `soal_tabel`
--
ALTER TABLE `soal_tabel`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `soal_tabel`
--
ALTER TABLE `soal_tabel`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
