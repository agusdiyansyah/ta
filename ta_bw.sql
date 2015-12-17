-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2015 at 11:33 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta`
--
CREATE DATABASE IF NOT EXISTS `ta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ta`;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
`id_dosen` int(4) NOT NULL,
  `nip` varchar(20) NOT NULL DEFAULT '',
  `nama` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama`) VALUES
(1, '199008172015022001', 'Satriyo, M. Kom'),
(2, '198004232008011004', 'Wendhi Yuniarto, ST., MT.'),
(3, '196507302007011002', 'Ir. Abu Bakar'),
(4, '197805032003121002', 'H. Irawan Suharto, ST,. MT.'),
(6, '196006161982021001', 'Yasir Arafat, S.St.'),
(7, '196312201987031003', 'Neni Firdyanti, MT'),
(8, '196305031983031006', 'Freska Rolensa, ST,. M.Cs'),
(9, '196109031982031001', 'Ramli, MT'),
(10, '198011022012122003', 'Budianingsih, ST., MT'),
(11, '196307061982032001', 'Ferry Faisal, S.ST., MT.'),
(12, '198011282005021002', 'Dr. Ardi Marwan M.Ed'),
(13, '199201252015021002', 'Wawan Heryawan, ST, MT'),
(14, '198301202006041005', 'Yunita, M.Eng.'),
(15, '196210051981031001', 'Muhammad Hasbi, MT'),
(16, '196706271986031001', 'M.Ilyas Hadikusuma., M.Eng'),
(18, '198506122008121001', 'Mariana Syamsudin., MT'),
(21, '19851228205041002', 'Fitri Wibowo, S.ST., MT'),
(22, '198211052008012014', 'Nurul Fadilah, M.Ed TESOL');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
`id_mhs` smallint(4) NOT NULL,
  `id_dosen` tinyint(4) NOT NULL,
  `nim` varchar(10) NOT NULL DEFAULT '',
  `nama` varchar(25) NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `id_dosen`, `nim`, `nama`, `judul`) VALUES
(86, 1, '3201316005', 'Desi Wulandari', 'Judul TA Desi Wulandari'),
(87, 1, '3201316007', 'Aulia Silmi', 'Judul TA Aulia Silmi'),
(88, 1, '3201316009', 'Risang Nur Bagas B', 'Judul TA Risang Nur Bagas B'),
(89, 1, '3201316013', 'Tri Wahyuningsih', 'Judul TA Tri Wahyuningsih'),
(90, 1, '3201316023', 'Andrio', 'Judul TA Andrio'),
(91, 2, '3201316025', 'YENI RAHMAWATI', 'TA YENI RAHMAWATI'),
(92, 2, '3201316026', 'M. AL FAIYUMI', 'Judul TA M. AL FAIYUMI'),
(93, 2, '3201316027', 'ANTONIUS APONG', 'TA ANTONIUS APONG'),
(94, 2, '3201316031', 'REGINA MILAN', 'TA REGINA MILAN'),
(95, 3, '3201316035', 'M.RENDI HIDAYAT', 'TA M.RENDI HIDAYAT'),
(96, 3, '3201316036', 'SYARIFAH JUMRATUL AINI', 'TA SYARIFAH JUMRATUL AINI'),
(97, 3, '3201316037', 'EKO PURIYUANTO', 'TA EKO PURIYUANTO'),
(98, 4, '3201316042', 'SORAYA', 'TA SORAYA'),
(99, 4, '3201316044', 'NIAKARDILLA', 'TA NIAKARDILLA'),
(100, 6, '3201316047', 'AFRIANSYAH AKBAR', 'TA AFRIANSYAH AKBAR'),
(101, 6, '3201316046', 'YOLLA DWI ANDINI', 'TA YOLLA DWI ANDINI'),
(102, 6, '3201316049', 'NOVI KURNIASARI', 'TA NOVI KURNIASARI'),
(103, 6, '3201316051', 'NADYA AIDAYANTI.R', 'TA NADYA AIDAYANTI.R'),
(104, 6, '3201316052', 'BAMBANG.W', 'TA BAMBANG.W'),
(105, 7, '3201316058', 'KASIANUS ASAU', 'TA KASIANUS ASAU'),
(106, 7, '3201316062', 'ZULFIAN', 'TA ZULFIAN'),
(107, 7, '3201316064', 'FITRI ANDRIANI', 'TA FITRI ANDRIANI'),
(108, 7, '3201316066', 'AURORA IFADA', 'TA AURORA IFADA'),
(109, 7, '3201316068', 'FAISAL HAKIKI', 'TA FAISAL HAKIKI'),
(110, 8, '3201316090', 'SANDY NOVERNANDA', 'TA SANDY NOVERNANDA'),
(111, 8, '3201216030', 'IMAM AKBAR', 'TA IMAM AKBAR'),
(112, 8, '3201316003', 'RETNO PUTRI YUNITA', 'TA RETNO PUTRI YUNITA'),
(113, 8, '3201316004', 'MELI ELFINA', 'TA MELI ELFINA'),
(114, 8, '3201316006', 'AGUNG SAMUDRA', 'TA AGUNG SAMUDRA'),
(115, 9, '3201316008', 'NIDA.UL ULFA RABBANIYAH', 'TA NIDA.UL ULFA RABBANIYAH'),
(116, 9, '3201316014', 'AGUNG NUR HIDAYAT', 'TA AGUNG NUR HIDAYAT'),
(117, 10, '3201316017', 'RUSTAM CATUR PAMUNGKAS', 'TA RUSTAM CATUR PAMUNGKAS'),
(118, 10, '3201316022', 'KIKI DELLA NOVIANTI', 'TA KIKI DELLA NOVIANTI'),
(119, 10, '3201316030', 'BESIRUN', 'TA BESIRUN'),
(120, 10, '3201316032', 'DONI ALIAN.S', 'TA DONI ALIAN.S'),
(121, 10, '3201316038', 'JAMIL SETIAWAN', 'TA JAMIL SETIAWAN'),
(122, 11, '3201316050', 'ANDI DEVITA.K', 'TA ANDI DEVITA.K'),
(123, 11, '3201316056', 'LUSIANA.A', 'TA LUSIANA.A'),
(124, 11, '3201316063', 'DILLA MUNIARTY', 'TA DILLA MUNIARTY'),
(125, 11, '3201316065', 'DESI ELITA SARI', 'TA DESI ELITA SARI'),
(126, 11, '3201316048', 'ROISUL UMAM', 'TA ROISUL UMAM'),
(127, 11, '3201316055', 'DWI CAHYONO', 'TA DWI CAHYONO'),
(128, 12, '3201316057', 'FITRI MARYANI', 'TA FITRI MARYANI'),
(129, 12, '3201316059', 'IRYANDY ASFI.P', 'TA IRYANDY ASFI.P'),
(130, 13, '3201316074', 'SARI AFRIYANTI', 'TA SARI AFRIYANTI'),
(131, 13, '3201316075', 'QHURIS SYHAB', 'TA QHURIS SYHAB'),
(132, 14, '3201316080', 'VINA SARI', 'TA VINA SARI'),
(133, 14, '3201316082', 'ERWIN', 'TA ERWIN'),
(134, 14, '3201316087', 'APRI CAHYONO', 'TA APRI CAHYONO'),
(135, 14, '3201316001', 'NUR HAFIZA RASYADA', 'TA NUR HAFIZA RASYADA'),
(136, 14, '3201316002', 'LISA NOVITA SARI', 'TA LISA NOVITA SARI'),
(137, 15, '3201316010', 'FEYZAR ADITYA F', 'TA FEYZAR ADITYA F'),
(138, 15, '3201316012', 'GALIH RAMADHAN', 'TA GALIH RAMADHAN'),
(139, 15, '3201316015', 'IRFAN SUPARMAN PUTRA', 'TA IRFAN SUPARMAN PUTRA'),
(140, 15, '3201316019', 'KAMILUS ARMIN', 'TA KAMILUS ARMIN'),
(141, 15, '3201316020', 'WINNY WIDIYANTI', 'TA WINNY WIDIYANTI'),
(142, 16, '3201316021', 'MARLENI', 'TA MARLENI'),
(143, 16, '3201316028', 'IQLIMA RIANTI', 'TA IQLIMA RIANTI'),
(144, 18, '3201316033', 'WAHYUDI', 'TA WAHYUDI'),
(145, 18, '3201316034', 'Mohlis', 'TA Mohlis'),
(146, 18, '3201316040', 'ANI SYAHPUTRI', 'TA ANI SYAHPUTRI'),
(147, 18, '3201316041', 'ARIF RACHMAN', 'TA ARIF RACHMAN'),
(148, 18, '3201316043', 'Liza', 'TA LIZA'),
(149, 21, '3201316069', 'HENDRA DARMAWAN', 'TA HENDRA DARMAWAN'),
(150, 21, '3201316073', 'HAFIZ APRILIZAR', 'TA HAFIZ APRILIZAR'),
(151, 21, '3201316076', 'WURI AMANDA .P', 'TA WURI AMANDA .P'),
(152, 21, '3201316077', 'R.DANI HENDARYANTO', 'TA R.DANI HENDARYANTO'),
(153, 21, '3201316078', 'SUCI MAYANG SARI', 'TA SUCI MAYANG SARI'),
(154, 21, '3201316083', 'NYEMAS HASTI.W', 'TA NYEMAS HASTI.W'),
(155, 22, '3201316084', 'ABANG REZKY.F.A', 'TA ABANG REZKY.F.A'),
(156, 22, '3201316085', 'YOSUA WIRATAMA', 'TA YOSUA WIRATAMA'),
(157, 8, '3201316088', 'RAHMAT INDRAWAN', 'TA RAHMAT INDRAWAN'),
(158, 16, '3201316089', 'SEPTIAJI PUTRA', 'TA SEPTIAJI PUTRA');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

DROP TABLE IF EXISTS `meta`;
CREATE TABLE `meta` (
`meta_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `meta_key` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'S_ : system, U_ : user',
  `meta_value` text NOT NULL,
  `meta_group` tinyint(4) NOT NULL COMMENT '1 = user'
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`meta_id`, `id`, `meta_key`, `meta_value`, `meta_group`) VALUES
(210, 0, 0, '{"title":"<p>JADWAL SEMINAR PROPOSAL TUGAS AKHIR (TA)<\\/p>\\r\\n<p>PROGRAM STUDI TEKNIK INFORMATIKA\\u00a0JURUSAN TEKNIK ELEKTRO<\\/p>\\r\\n<p>POLITEKNIK NEGERI PONTIANAK T.A. 2015<\\/p>","tgl_ujian":"03-08-2015","jam_mulai":"07:00","kondisi":"<","jam_selesai":"11:30","jam_istirahat":"00:05","jam_ujian":"00:45","tgl_jadwal":"29-07-2015","nama":"agus diyansyah","nip":"3201216006"}', 0),
(215, 0, 2, '[["Muhammad Hasbi, MT","Satriyo, M. Kom","H. Irawan Suharto, ST,. MT.","Tedy Rismawan, S.Kom, M.Cs","Ikhwan Ruslianto, S. Kom . M. Cs","Ir. Abu Bakar","agus diyansyah","Yasir Arafat, S.St.","Ramli, MT","Neni Firdyanti, MT","DR. Ardi Marwan S.Ss","Freska Rolensa, ST,. M.Cs"],["Ikhwan Ruslianto, S. Kom . M. Cs","Satriyo, M. Kom","Tedy Rismawan, S.Kom, M.Cs","Freska Rolensa, ST,. M.Cs","Yunita, M.Eng.","agus diyansyah","Neni Firdyanti, MT","Ramli, MT","Wendhi Yuniarto, ST., MT.","Ferry Faisal, S.St,. MT.","DR. Ardi Marwan S.Ss","Ir. Abu Bakar"],["Tedy Rismawan, S.Kom, M.Cs","Satriyo, M. Kom","Ir. Abu Bakar","Neni Firdyanti, MT","agus diyansyah","Ramli, MT","M.Ilyas Hadikusuma., M.Eng","H. Irawan Suharto, ST,. MT.","Ikhwan Ruslianto, S. Kom . M. Cs","DR. Ardi Marwan S.Ss","Mariana Syamsudin., MT","Muhammad Hasbi, MT"],["DR. Ardi Marwan S.Ss","agus diyansyah","Ramli, MT","Mariana Syamsudin., MT","Muhammad Hasbi, MT","Neni Firdyanti, MT","Ferry Faisal, S.St,. MT.","M.Ilyas Hadikusuma., M.Eng","Yunita, M.Eng.","Wendhi Yuniarto, ST., MT.","Freska Rolensa, ST,. M.Cs","Ikhwan Ruslianto, S. Kom . M. Cs"],["Freska Rolensa, ST,. M.Cs","Wendhi Yuniarto, ST., MT.","DR. Ardi Marwan S.Ss","Tedy Rismawan, S.Kom, M.Cs","Muhammad Hasbi, MT","Ferry Faisal, S.St,. MT.","Ikhwan Ruslianto, S. Kom . M. Cs","Ir. Abu Bakar","agus diyansyah","Ramli, MT","Wawan Heryawan, ST, MT","M.Ilyas Hadikusuma., M.Eng"],["DR. Ardi Marwan S.Ss","Mariana Syamsudin., MT","Satriyo, M. Kom","Neni Firdyanti, MT","Yunita, M.Eng.","Ikhwan Ruslianto, S. Kom . M. Cs","agus diyansyah","Tedy Rismawan, S.Kom, M.Cs","Yasir Arafat, S.St.","Ramli, MT","Wawan Heryawan, ST, MT","Muhammad Hasbi, MT"],["Wendhi Yuniarto, ST., MT.","Yunita, M.Eng.","agus diyansyah","Ikhwan Ruslianto, S. Kom . M. Cs","Yasir Arafat, S.St.","Wawan Heryawan, ST, MT","DR. Ardi Marwan S.Ss","Ir. Abu Bakar","Ramli, MT","H. Irawan Suharto, ST,. MT.","Freska Rolensa, ST,. M.Cs","Satriyo, M. Kom"],["Yasir Arafat, S.St.","Satriyo, M. Kom","agus diyansyah","M.Ilyas Hadikusuma., M.Eng","Ferry Faisal, S.St,. MT.","Ir. Abu Bakar","Ikhwan Ruslianto, S. Kom . M. Cs","Wawan Heryawan, ST, MT","H. Irawan Suharto, ST,. MT.","Wendhi Yuniarto, ST., MT.","DR. Ardi Marwan S.Ss","Yunita, M.Eng."],["H. Irawan Suharto, ST,. MT.","Wendhi Yuniarto, ST., MT.","Freska Rolensa, ST,. M.Cs","M.Ilyas Hadikusuma., M.Eng","agus diyansyah","Mariana Syamsudin., MT","DR. Ardi Marwan S.Ss","Satriyo, M. Kom","Tedy Rismawan, S.Kom, M.Cs","Ferry Faisal, S.St,. MT.","Ir. Abu Bakar","Ikhwan Ruslianto, S. Kom . M. Cs"],["Neni Firdyanti, MT","Muhammad Hasbi, MT","Ir. Abu Bakar","Satriyo, M. Kom","M.Ilyas Hadikusuma., M.Eng","Yunita, M.Eng.","Freska Rolensa, ST,. M.Cs","DR. Ardi Marwan S.Ss","Ramli, MT","agus diyansyah","Ikhwan Ruslianto, S. Kom . M. Cs","Ferry Faisal, S.St,. MT."],["DR. Ardi Marwan S.Ss","Ramli, MT","Neni Firdyanti, MT","Wawan Heryawan, ST, MT","Mariana Syamsudin., MT","agus diyansyah","Yunita, M.Eng.","M.Ilyas Hadikusuma., M.Eng","Muhammad Hasbi, MT","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT."],["agus diyansyah","Wawan Heryawan, ST, MT","Muhammad Hasbi, MT","Yasir Arafat, S.St.","Tedy Rismawan, S.Kom, M.Cs","Ramli, MT","Ferry Faisal, S.St,. MT.","DR. Ardi Marwan S.Ss","Mariana Syamsudin., MT","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Neni Firdyanti, MT"],["agus diyansyah","DR. Ardi Marwan S.Ss","Wawan Heryawan, ST, MT","Yasir Arafat, S.St.","Mariana Syamsudin., MT","Ikhwan Ruslianto, S. Kom . M. Cs","Wendhi Yuniarto, ST., MT.","Ferry Faisal, S.St,. MT.","Tedy Rismawan, S.Kom, M.Cs","Ramli, MT","Satriyo, M. Kom","Freska Rolensa, ST,. M.Cs"],["Yasir Arafat, S.St.","Mariana Syamsudin., MT","H. Irawan Suharto, ST,. MT.","Muhammad Hasbi, MT","Freska Rolensa, ST,. M.Cs","M.Ilyas Hadikusuma., M.Eng","Neni Firdyanti, MT","Yunita, M.Eng.","agus diyansyah","Tedy Rismawan, S.Kom, M.Cs","DR. Ardi Marwan S.Ss","Ikhwan Ruslianto, S. Kom . M. Cs","Ramli, MT","Ir. Abu Bakar","Ferry Faisal, S.St,. MT."]]', 0),
(216, 0, 1, '[["Yunita, M.Eng.","Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","Ferry Faisal, S.ST., MT.","Budianingsih, ST., MT","Ramli, MT","Neni Firdyanti, MT","Yasir Arafat, S.St.","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","Ferry Faisal, S.ST., MT.","Budianingsih, ST., MT","Ramli, MT","Freska Rolensa, ST,. M.Cs","Neni Firdyanti, MT","Yasir Arafat, S.St.","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","Dr. Ardi Marwan M.Ed","Ferry Faisal, S.ST., MT.","Budianingsih, ST., MT","Ramli, MT","Freska Rolensa, ST,. M.Cs","Neni Firdyanti, MT","Yasir Arafat, S.St.","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","M.Ilyas Hadikusuma., M.Eng","Ferry Faisal, S.ST., MT.","Budianingsih, ST., MT","Ramli, MT","Freska Rolensa, ST,. M.Cs","Neni Firdyanti, MT","Yasir Arafat, S.St.","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","M.Ilyas Hadikusuma., M.Eng","Wawan Heryawan, ST, MT","Budianingsih, ST., MT","Ramli, MT","Freska Rolensa, ST,. M.Cs","Neni Firdyanti, MT","Yasir Arafat, S.St.","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","Mariana Syamsudin., MT","M.Ilyas Hadikusuma., M.Eng","Muhammad Hasbi, MT","Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","Neni Firdyanti, MT","Yasir Arafat, S.St.","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","Fitri Wibowo, S.ST., MT","Mariana Syamsudin., MT","M.Ilyas Hadikusuma., M.Eng","Muhammad Hasbi, MT","Yunita, M.Eng.","Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","H. Irawan Suharto, ST,. MT.","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","Fitri Wibowo, S.ST., MT","Mariana Syamsudin., MT","M.Ilyas Hadikusuma., M.Eng","Muhammad Hasbi, MT","Yunita, M.Eng.","Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","Ramli, MT","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","Fitri Wibowo, S.ST., MT","Mariana Syamsudin., MT","M.Ilyas Hadikusuma., M.Eng","Muhammad Hasbi, MT","Yunita, M.Eng.","Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","Ramli, MT","Ir. Abu Bakar","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","Fitri Wibowo, S.ST., MT","Mariana Syamsudin., MT","M.Ilyas Hadikusuma., M.Eng","Muhammad Hasbi, MT","Yunita, M.Eng.","Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","Ramli, MT","H. Irawan Suharto, ST,. MT.","Wendhi Yuniarto, ST., MT.","Satriyo, M. Kom"],["Nurul Fadilah, M.Ed TESOL","Fitri Wibowo, S.ST., MT","Mariana Syamsudin., MT","M.Ilyas Hadikusuma., M.Eng","Muhammad Hasbi, MT","Yunita, M.Eng.","Wawan Heryawan, ST, MT","Dr. Ardi Marwan M.Ed","Ferry Faisal, S.ST., MT.","Budianingsih, ST., MT","Ramli, MT","Freska Rolensa, ST,. M.Cs","H. Irawan Suharto, ST,. MT."]]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
`pid` int(11) NOT NULL,
  `TID` int(4) DEFAULT NULL,
  `uid` int(11) DEFAULT '0' COMMENT '0',
  `p_type` enum('4','3','2','5','1') DEFAULT NULL COMMENT '1 = file, 2 = pengumuman, 3 = pm, 4 = komen file',
  `p_name` text,
  `p_parent_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `TID`, `uid`, `p_type`, `p_name`, `p_parent_id`, `date`) VALUES
(1, 6, 78, '1', '{"file_name":"2_Daftar.docx","file_name_enc":"4db6e9681c63481033e056f314d31ce1.docx","file_date":"03-09-2015 16:41:58"}', NULL, NULL),
(2, 1, 78, '1', '{"file_name":"Doc01-SKPL.docx","file_name_enc":"1075b0d76ff1b06d2f4741deb7e5dd4b.docx","file_date":"04-09-2015 08:08:37"}', NULL, NULL),
(28, 25, 1, '3', '{"level":"2","sender":"Mariana Syamsudin., MT (Pembimbing) ","tanggal":" 04-09-2015 05:50:48 ","wasiat":"ye asis berhasil"}', NULL, NULL),
(32, 1, 0, '5', 'perbaiki penomoran halaman', 1, '2015-09-06 22:55:36'),
(33, 1, 0, '5', 'asdadasdasd', 1, '2015-09-06 22:56:44'),
(34, 2, 0, '5', 'Daftar isi harap di perbaiki', 1, '2015-09-06 22:55:32'),
(35, 34, 1, '4', '{"level":"2","sender":"Mariana Syamsudin., MT (Pembimbing) ","tanggal":" 04-09-2015 06:40:38 ","wasiat":"ASasSsASsSsASas"}', NULL, NULL),
(36, 25, 78, '4', '{"level":"3","sender":"KHAIRUL ANHAR.S","tanggal":" 04-09-2015 07:48:56 ","wasiat":"asistensi"}', NULL, NULL),
(37, 2, 0, '5', 'asaas', 1, '2015-09-06 22:55:33'),
(38, 2, 0, '5', 'baru', 1, '2015-09-06 22:39:07'),
(39, 2, 0, '5', 'baru lagi', 1, '2015-09-06 22:39:20'),
(40, 1, 0, '5', 'asis', 1, '2015-09-06 22:39:25'),
(41, 1, 0, '5', 'asasas', 1, '2015-09-06 22:55:36'),
(42, 2, 0, '5', 'buat baru', NULL, NULL),
(43, 2, 0, '5', 'asistensi di perbaharui', 1, '2015-09-06 22:39:22'),
(44, 2, 0, '5', 'japri', 1, '2015-09-06 22:56:46'),
(45, 44, 1, '4', '{"level":"2","sender":"Mariana Syamsudin., MT (Pembimbing) ","tanggal":" 06-09-2015 20:50:43 ","wasiat":"japri adalah jalur pribadi :D"}', NULL, NULL),
(46, 2, 0, '5', 'asdasdasd', 1, '2015-09-06 22:56:45'),
(50, 34, 1, '4', '{"level":"2","sender":"Mariana Syamsudin., MT (Pembimbing) ","tanggal":" 06-09-2015 22:56:35 ","wasiat":"sip"}', NULL, NULL),
(51, 1, 18, '1', '{"file_name":"ta.pdf","file_name_enc":"612c977b34072c344374b35d22c6416f.pdf","file_date":"08-09-2015 14:06:35"}', NULL, NULL),
(52, 85, 18, '3', '{"level":"3","sender":"Agus Diyansyah","tanggal":" 08-09-2015 09:07:03 ","wasiat":"Laporan sudah saya kirim harap di asistensi"}', NULL, NULL),
(53, 85, 3, '3', '{"level":"2","sender":"M.Ilyas Hadikusuma., M.Eng (Pembimbing) ","tanggal":" 08-09-2015 09:07:23 ","wasiat":"sip"}', NULL, NULL),
(54, 51, 0, '5', 'marginnya tolong diperhatikan', NULL, NULL),
(55, 51, 0, '5', 'perbaikan jarak antara paragraf', 1, '2015-09-08 09:08:40'),
(56, 51, 0, '5', 'penomoran halamannya diperbaiki', NULL, NULL),
(57, 42, 1, '4', '{"level":"2","sender":"Mariana Syamsudin., MT (Pembimbing) ","tanggal":" 09-09-2015 04:39:47 ","wasiat":"uhguh"}', NULL, NULL),
(58, 1, 78, '1', '{"file_name":"BAB III.docx","file_name_enc":"972d4f9ec2a772819ad3fccfd739a430.docx","file_date":"15-09-2015 13:12:37"}', NULL, NULL),
(59, 58, 0, '5', 'woi apaan nih', NULL, NULL),
(60, 59, 1, '4', '{"level":"2","sender":"Mariana Syamsudin., MT (Pembimbing) ","tanggal":" 15-09-2015 08:14:06 ","wasiat":"saya gx ngerti ini apaan, tolong jelasin"}', NULL, NULL),
(61, 59, 78, '4', '{"level":"3","sender":"KHAIRUL ANHAR.S","tanggal":" 15-09-2015 08:14:19 ","wasiat":"iye iye"}', NULL, NULL),
(62, 0, 105, '2', '{"level":"1","sender":"agus Diyansyah (Admin) ","tanggal":" 20-10-2015 18:24:04 ","wasiat":"coba"}', NULL, NULL),
(63, 18, 78, '2', '{"level":"3","sender":"KHAIRUL ANHAR.S","tanggal":" 20-10-2015 18:29:40 ","wasiat":"uji coba"}', NULL, NULL),
(64, 16, 18, '2', '{"level":"3","sender":"Agus Diyansyah","tanggal":" 28-10-2015 19:51:04 ","wasiat":"coba kirim dari pengumuman mahasiswa"}', NULL, NULL),
(65, 55, 18, '4', '{"level":"3","sender":"Agus Diyansyah","tanggal":" 28-10-2015 19:52:06 ","wasiat":"jarak antar paragraf sudah saya perbaiki pak\\/bu"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxonomy`
--

DROP TABLE IF EXISTS `taxonomy`;
CREATE TABLE `taxonomy` (
`TID` int(11) NOT NULL,
  `t_name` varchar(30) DEFAULT NULL,
  `t_content` text,
  `t_parent_id` tinyint(3) NOT NULL DEFAULT '0',
  `t_type` int(3) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxonomy`
--

INSERT INTO `taxonomy` (`TID`, `t_name`, `t_content`, `t_parent_id`, `t_type`) VALUES
(1, 'Uncategories', NULL, 0, 1),
(2, 'bab 2', '<ol>\r\n<li>ksjkjasd</li>\r\n<li>asd</li>\r\n<li>asd</li>\r\n<li>a</li>\r\n<li>sd</li>\r\n<li>asd</li>\r\n</ol>', 0, 1),
(5, 'bab 3', '<p>sdfjsidfjsid sidihf usidfhusdihf &nbsp;sfisuhf sdf</p>', 0, 1),
(6, 'bab 1', '<p>ini bab 1</p>', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`uid` int(11) NOT NULL,
  `rel_id` int(11) NOT NULL COMMENT '0',
  `u_name` varchar(50) NOT NULL COMMENT '''0''',
  `u_pass` varchar(50) NOT NULL COMMENT '''0''',
  `u_nicename` varchar(50) NOT NULL,
  `u_level` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '0 = super admin, 1 = admin, 2 = dosen, 3 = mahasiswa',
  `u_reg` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = blm, 1 = udah',
  `u_log` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `rel_id`, `u_name`, `u_pass`, `u_nicename`, `u_level`, `u_reg`, `u_log`) VALUES
(1, 18, 'mar', '444bcb3a3fcf8389296c49467f27e1d6', 'Mariana Syamsudin., MT', '2', '1', 0),
(3, 16, 'ilyas', '444bcb3a3fcf8389296c49467f27e1d6', 'M.Ilyas Hadikusuma., M.Eng', '2', '1', 0),
(4, 15, '196210051981031001', '3013a', 'Muhammad Hasbi, MT', '2', '0', 0),
(5, 14, '198301202006041005', '85da3', 'Yunita, M.Eng.', '2', '0', 0),
(6, 13, '199201252015021002', '9c7de', 'Wawan Heryawan, ST, MT', '2', '0', 0),
(7, 12, '198011282005021002', '17e72', 'DR. Ardi Marwan S.Ss', '2', '0', 0),
(8, 11, '196307061982032001', '94416', 'Ferry Faisal, S.St,. MT.', '2', '0', 0),
(9, 10, '197704122005021001', 'c283b', 'Tedy Rismawan, S.Kom, M.Cs', '2', '0', 0),
(10, 9, '196109031982031001', '33941', 'Ramli, MT', '2', '0', 0),
(11, 8, '196305031983031006', 'c6ddd', 'Freska Rolensa, ST,. M.Cs', '2', '0', 0),
(12, 7, '196312201987031003', 'b63c2', 'Neni Firdyanti, MT', '2', '0', 0),
(13, 6, '196006161982021001', 'd512b', 'Yasir Arafat, S.St.', '2', '0', 0),
(14, 4, '197805032003121002', '90aae', 'H. Irawan Suharto, ST,. MT.', '2', '0', 0),
(15, 3, '196507302007011002', 'ba25f', 'Ir. Abu Bakar', '2', '0', 0),
(16, 2, '198004232008011004', '367de', 'Wendhi Yuniarto, ST., MT.', '2', '0', 0),
(17, 1, '199008172015022001', 'fabe2', 'Satriyo, M. Kom', '2', '0', 0),
(105, 0, 'admin', '444bcb3a3fcf8389296c49467f27e1d6', 'Fitri Wibowo', '1', '1', 0),
(106, 21, '19851228205041002', 'd0a31', 'Fitri Wibowo, S.ST.,MT', '2', '0', 0),
(107, 22, '198211052008012014', 'c599b', 'Nurul Fadilah, M.Ed TESOL', '2', '0', 0),
(108, 86, '3201316005', 'bad26', 'Desi Wulandari', '3', '0', 0),
(109, 87, '3201316007', 'e3909', 'Aulia Silmi', '3', '0', 0),
(110, 88, '3201316009', 'f5037', 'Risang Nur Bagas B', '3', '0', 0),
(111, 89, '3201316013', '48dc6', 'Tri Wahyuningsih', '3', '0', 0),
(112, 90, '3201316023', '1bd05', 'Andrio', '3', '0', 0),
(113, 91, '3201316025', '8d91c', 'YENI RAHMAWATI', '3', '0', 0),
(114, 92, '3201316026', '661e0', 'M. AL FAIYUMI', '3', '0', 0),
(115, 93, '3201316027', '77be6', 'ANTONIUS APONG', '3', '0', 0),
(116, 94, '3201316031', '43603', 'REGINA MILAN', '3', '0', 0),
(117, 95, '3201316035', '9efd6', 'M.RENDI HIDAYAT', '3', '0', 0),
(118, 96, '3201316036', 'c7f1c', 'SYARIFAH JUMRATUL AINI', '3', '0', 0),
(119, 97, '3201316037', '3dbea', 'EKO PURIYUANTO', '3', '0', 0),
(120, 98, '3201316042', '557c4', 'SORAYA', '3', '0', 0),
(121, 99, '3201316044', '09013', 'NIAKARDILLA', '3', '0', 0),
(122, 100, '3201316047', '36cf4', 'AFRIANSYAH AKBAR', '3', '0', 0),
(123, 101, '3201316046', '847d4', 'YOLLA DWI ANDINI', '3', '0', 0),
(124, 102, '3201316049', '69221', 'NOVI KURNIASARI', '3', '0', 0),
(125, 103, '3201316051', 'a21f5', 'NADYA AIDAYANTI.R', '3', '0', 0),
(126, 104, '3201316052', 'dc732', 'BAMBANG.W', '3', '0', 0),
(127, 105, '3201316058', 'c070c', 'KASIANUS ASAU', '3', '0', 0),
(128, 106, '3201316062', '3db3c', 'ZULFIAN', '3', '0', 0),
(129, 107, '3201316064', 'd205f', 'FITRI ANDRIANI', '3', '0', 0),
(130, 108, '3201316066', '2054c', 'AURORA IFADA', '3', '0', 0),
(131, 109, '3201316068', '10fda', 'FAISAL HAKIKI', '3', '0', 0),
(132, 110, '3201316090', '02af1', 'SANDY NOVERNANDA', '3', '0', 0),
(133, 111, '3201216030', '7dd4a', 'IMAM AKBAR', '3', '0', 0),
(134, 112, '3201316003', '329da', 'RETNO PUTRI YUNITA', '3', '0', 0),
(135, 113, '3201316004', 'b9a8c', 'MELI ELFINA', '3', '0', 0),
(136, 114, '3201316006', '9cd16', 'AGUNG SAMUDRA', '3', '0', 0),
(137, 115, '3201316008', '33938', 'NIDA.UL ULFA RABBANIYAH', '3', '0', 0),
(138, 116, '3201316014', 'd91c8', 'AGUNG NUR HIDAYAT', '3', '0', 0),
(139, 117, '3201316017', '776da', 'RUSTAM CATUR PAMUNGKAS', '3', '0', 0),
(140, 118, '3201316022', 'cde74', 'KIKI DELLA NOVIANTI', '3', '0', 0),
(141, 119, '3201316030', 'e637d', 'BESIRUN', '3', '0', 0),
(142, 120, '3201316032', 'b7022', 'DONI ALIAN.S', '3', '0', 0),
(143, 121, '3201316038', '440e5', 'JAMIL SETIAWAN', '3', '0', 0),
(144, 122, '3201316050', 'b9191', 'ANDI DEVITA.K', '3', '0', 0),
(145, 123, '3201316056', 'd4ce9', 'LUSIANA.A', '3', '0', 0),
(146, 124, '3201316063', 'eac3d', 'DILLA MUNIARTY', '3', '0', 0),
(147, 125, '3201316065', '0f64b', 'DESI ELITA SARI', '3', '0', 0),
(148, 126, '3201316048', 'dca13', 'ROISUL UMAM', '3', '0', 0),
(149, 127, '3201316055', '0b229', 'DWI CAHYONO', '3', '0', 0),
(150, 128, '3201316057', 'c8345', 'FITRI MARYANI', '3', '0', 0),
(151, 129, '3201316059', 'bd206', 'IRYANDY ASFI.P', '3', '0', 0),
(152, 130, '3201316074', 'bf086', 'SARI AFRIYANTI', '3', '0', 0),
(153, 131, '3201316075', '67c96', 'QHURIS SYHAB', '3', '0', 0),
(154, 132, '3201316080', '8a965', 'VINA SARI', '3', '0', 0),
(155, 133, '3201316082', '45423', 'ERWIN', '3', '0', 0),
(156, 134, '3201316087', '27748', 'APRI CAHYONO', '3', '0', 0),
(157, 135, '3201316001', '4870c', 'NUR HAFIZA RASYADA', '3', '0', 0),
(158, 136, '3201316002', 'c6f3b', 'LISA NOVITA SARI', '3', '0', 0),
(159, 137, '3201316010', 'b4d55', 'FEYZAR ADITYA F', '3', '0', 0),
(160, 138, '3201316012', 'ebb0c', 'GALIH RAMADHAN', '3', '0', 0),
(161, 139, '3201316015', '76d20', 'IRFAN SUPARMAN PUTRA', '3', '0', 0),
(162, 140, '3201316019', '8b26a', 'KAMILUS ARMIN', '3', '0', 0),
(163, 141, '3201316020', '3e861', 'WINNY WIDIYANTI', '3', '0', 0),
(164, 142, '3201316021', 'fe65b', 'MARLENI', '3', '0', 0),
(165, 143, '3201316028', '43488', 'IQLIMA RIANTI', '3', '0', 0),
(166, 144, '3201316033', '9009b', 'WAHYUDI', '3', '0', 0),
(167, 145, '3201316034', '233ec', 'Mohlis', '3', '0', 0),
(168, 146, '3201316040', '61543', 'ANI SYAHPUTRI', '3', '0', 0),
(169, 147, '3201316041', '9ca4e', 'ARIF RACHMAN', '3', '0', 0),
(170, 148, '3201316043', 'd1e7f', 'Liza', '3', '0', 0),
(171, 149, '3201316069', '4c558', 'HENDRA DARMAWAN', '3', '0', 0),
(172, 150, '3201316073', '6f31c', 'HAFIZ APRILIZAR', '3', '0', 0),
(173, 151, '3201316076', '63877', 'WURI AMANDA .P', '3', '0', 0),
(174, 152, '3201316077', '33641', 'R.DANI HENDARYANTO', '3', '0', 0),
(175, 153, '3201316078', '10e49', 'SUCI MAYANG SARI', '3', '0', 0),
(176, 154, '3201316083', '1824f', 'NYEMAS HASTI.W', '3', '0', 0),
(177, 155, '3201316084', 'dde53', 'ABANG REZKY.F.A', '3', '0', 0),
(178, 156, '3201316085', '2cfe3', 'YOSUA WIRATAMA', '3', '0', 0),
(179, 157, '3201316088', '25bf9', 'RAHMAT INDRAWAN', '3', '0', 0),
(180, 158, '3201316089', 'c1ed7', 'SEPTIAJI PUTRA', '3', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
 ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `taxonomy`
--
ALTER TABLE `taxonomy`
 ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
MODIFY `id_dosen` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
MODIFY `id_mhs` smallint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `taxonomy`
--
ALTER TABLE `taxonomy`
MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=181;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
