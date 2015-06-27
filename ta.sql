/*
Navicat MySQL Data Transfer

Source Server         : data
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ta

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-06-26 13:02:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id_dosen` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL DEFAULT '',
  `nama` varchar(35) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES ('1', '199008172015022001', 'Satriyo, M. Kom');
INSERT INTO `dosen` VALUES ('2', '198004232008011004', 'Wendhi Yuniarto, ST., MT.');
INSERT INTO `dosen` VALUES ('3', '196507302007011002', 'Ir. Abu Bakar');
INSERT INTO `dosen` VALUES ('4', '197805032003121002', 'H. Irawan Suharto, ST,. MT.');
INSERT INTO `dosen` VALUES ('6', '196006161982021001', 'Yasir Arafat, S.St.');
INSERT INTO `dosen` VALUES ('7', '196312201987031003', 'Neni Firdyanti, MT');
INSERT INTO `dosen` VALUES ('8', '196305031983031006', 'Freska Rolensa, ST,. M.Cs');
INSERT INTO `dosen` VALUES ('9', '196109031982031001', 'Ramli, MT');
INSERT INTO `dosen` VALUES ('10', '197704122005021001', 'Tedy Rismawan, S.Kom, M.Cs');
INSERT INTO `dosen` VALUES ('11', '196307061982032001', 'Ferry Faisal, S.St,. MT.');
INSERT INTO `dosen` VALUES ('12', '198011282005021002', 'DR. Ardi Marwan S.Ss');
INSERT INTO `dosen` VALUES ('13', '199201252015021002', 'Wawan Heryawan, ST, MT');
INSERT INTO `dosen` VALUES ('14', '198301202006041005', 'Yunita, M.Eng.');
INSERT INTO `dosen` VALUES ('15', '196210051981031001', 'Muhammad Hasbi, MT');
INSERT INTO `dosen` VALUES ('16', '196706271986031001', 'M.Ilyas Hadikusuma., M.Eng');
INSERT INTO `dosen` VALUES ('17', '198208142006041005', 'Ikhwan Ruslianto, S. Kom . M. Cs');
INSERT INTO `dosen` VALUES ('18', '198506122008121001', 'Mariana Syamsudin., MT');
INSERT INTO `dosen` VALUES ('19', '3201216006', 'Diyan');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id_mhs` smallint(4) NOT NULL AUTO_INCREMENT,
  `id_dosen` tinyint(4) NOT NULL,
  `nim` varchar(10) NOT NULL DEFAULT '',
  `nama` varchar(25) NOT NULL,
  `judul` text NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('1', '1', '3201216006', 'Susi Susanti', 'Rancang bangun SIG Pariwisata Kota Singkawang berbasis web');
INSERT INTO `mahasiswa` VALUES ('2', '2', '3201216007', 'Bayu', 'Rancang Bangun SIG lokasi masjid di Pontianak berbasis web');
INSERT INTO `mahasiswa` VALUES ('3', '13', '3201216008', 'GERLIADI JULIONO ', 'PEMBUATAN WEB PROFILE PADA PT KALBAR LANCAR MANDIRI PONTIANAK');
INSERT INTO `mahasiswa` VALUES ('4', '3', '3201216009', 'Aprilianto', 'Rancang Bangun ');
INSERT INTO `mahasiswa` VALUES ('5', '4', '3201216010', 'Fitriadi', 'Rancang Bangung Webside Jurusan Teknik Elektro Politeknik Negeri Pontianak');
INSERT INTO `mahasiswa` VALUES ('6', '5', '3201216011', 'Mahyus S ', 'Aplikasi Penilaian Mentoring Pada UKM IMMSAH Politeknik Negeri Pontianak Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('7', '5', '3201216012', 'EKA LILIANINGSIH', 'Membangun Aplikasi Pengukuran Kinerja Pegawai Menggunakan PHP Dan MySql Di Program Studi Teknik Informatika Polnep');
INSERT INTO `mahasiswa` VALUES ('8', '14', '3201216013', 'Ikhsan Tri Yudha', 'Membangun game shoot the kuntilanak berbasis flash');
INSERT INTO `mahasiswa` VALUES ('9', '15', '3201216014', 'Reni Tryanti', 'RANCANG BANGUN WEBSITE PADA TOKO RIZKI COLLECTION DI KOTA PONTIANAK MENGGUNAKAN PHP DAN MYSQL');
INSERT INTO `mahasiswa` VALUES ('10', '16', '3201216015', 'Hasan As ari', 'Rancang Bangun Sistem Informasi Geografis Skate Spot berbasis Website pada AB Skatepark');
INSERT INTO `mahasiswa` VALUES ('11', '7', '3201216016', 'Oky Vidia Ningsih', 'Membangun Sistem Informasi klinik Gigi drg.Dian Tri Martina ,Sp.KG berbasis WEB');
INSERT INTO `mahasiswa` VALUES ('12', '1', '3201216017', 'Agustin Amerila', 'Membangun Aplikasi Informasi Akademik Bagi Mahasiswa Dan Orangtua Berbasis Mobile Android Di Prodi Teknik Informatika Polnep');
INSERT INTO `mahasiswa` VALUES ('13', '4', '3201216018', 'Yuliandi ', 'Sistem Informasi RSUD Pemangkat Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('14', '14', '3201216019', 'KRISTIANI SIMANJUNTAK ', 'Rancang Bangun Sistem Informasi Excellence English Studio Menggunakan PHP dan MySQ');
INSERT INTO `mahasiswa` VALUES ('15', '8', '3201216020', 'Dita Silvia', 'Membangun aplikasi inventaris barang pada kantor BKD Kab. Sambas');
INSERT INTO `mahasiswa` VALUES ('16', '16', '3201216021', 'M. FEBRI RAMADHAN', 'Rancang Bangun game pembelajaran matematika berbasis Android untuk anak usia dini');
INSERT INTO `mahasiswa` VALUES ('17', '17', '3201216022', 'Wilmar Rianly', 'Rancang Bangun Company Profile, Produk dan Info Layanan Berbasis Web Pada PT. Racomindo Jaya Jakarta');
INSERT INTO `mahasiswa` VALUES ('18', '1', '3201216023', 'Maimunah', 'Pembuatan aplikasi portal parkir berbasis client-server di Polnep menggunakan Java');
INSERT INTO `mahasiswa` VALUES ('19', '11', '3201216024', 'Febriandi Bahroni', 'Pengembangan Website Periklanan Berbasis PHP & SQL Untuk UMKM di Pontianak dan Sekitarnya Sebagai Wadah Promosi Online');
INSERT INTO `mahasiswa` VALUES ('20', '8', '3201216025', 'Bella Ayudha S', 'Aplikasi penentuan penerima beasiswa berbasis logika fuzzy');
INSERT INTO `mahasiswa` VALUES ('21', '10', '3201216026', 'Rizka Purnama', 'Rancang Bangun Sistem Informasi SMA PANCA BHAKTI berbasis WEB');
INSERT INTO `mahasiswa` VALUES ('22', '17', '3201216027', 'Roby Anggara', 'Rancang bangun sistem inventory gudang pada CV.Trijaya');
INSERT INTO `mahasiswa` VALUES ('23', '6', '3201216028', 'Korina Jami s', 'Pembuatan Media Pembelajaran Interaktif Matematika Kesebangunan dan Kekongruenan Jenjang pendidikan SMP Berbasis Multimedia');
INSERT INTO `mahasiswa` VALUES ('24', '10', '3201216029', 'Abdi Setiawan', 'Rancang Bangun Sistem Informasi Berbasis Web di Dinas Pendidikan Kabupaten Kubu Raya menggunakan PHP dan Mysql.');
INSERT INTO `mahasiswa` VALUES ('25', '18', '3201216030', 'KHAIRUL ANHAR.S', 'ISTEM INFORMASI PENJUALAN PAKAIAN JADI PADA DISTRO PATRIOT BERBASIS WEB DI KETAPANG ');
INSERT INTO `mahasiswa` VALUES ('26', '2', '3201216031', 'ACHMAD GUNAWAN', 'Membangun Sistem Informasi Hasil Studi Mahasiswa Berbasis Website Pada Layanan Portal Akademik Di Program Studi Teknik Informatika Politeknik Negeri Pontianak');
INSERT INTO `mahasiswa` VALUES ('27', '13', '3201216032', 'Siti Nurhayati', 'Membangun Aplikasi Edukasi Bahasa Inggris Tingkat SD Kelas 1 Menggunakan Macromedia Flash 8 di SDNegeri 31 Pontianak');
INSERT INTO `mahasiswa` VALUES ('28', '4', '3201216033', 'SY. AL ADNAN RAZI', 'Membangun website penyewaan bulutangkis  di gor bumi khatulistiwa ');
INSERT INTO `mahasiswa` VALUES ('29', '6', '3201216034', 'MUHAMMAD ARDANI', 'Rancang Bangun Sistem Informasi nilai siswa berbasis sms gateway pada MA Al Muttaqien Suhaid Kapuas Hulu');
INSERT INTO `mahasiswa` VALUES ('30', '7', '3201216035', 'Risky Raesah', 'Membangun Sistem Informasi Berbasis Web Pada Kantor Lurah Bansir Darat');
INSERT INTO `mahasiswa` VALUES ('31', '5', '3201216036', 'Andri Pratama P', 'Membangun Aplikasi Penjualan Online Pada Toko Adventure Dan Outdoor BerbasisWeb');
INSERT INTO `mahasiswa` VALUES ('32', '14', '3201216037', 'Budianto', 'RANCANG BANGUN SISTEM INFORMASI MTSN 1 SEMPARUK BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('33', '15', '3201216038', 'Redy Akbar Sumbara', 'Membangun Aplikasi Web Cafe dan Resto Katsu.Ya Pontianak Berbasis Client Server dengan Platform Android Menggunakan PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('34', '6', '3201216039', 'Supriyanto', 'Rancang bangun sistem penjualan online aneka kue dan aneka kerajingan tangan berbasis web');
INSERT INTO `mahasiswa` VALUES ('35', '13', '3201216040', 'ISWANDI', 'Membangun Website Helpdesk Ticketing Management System pada Politeknik Negeri Pontianak Berbasis PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('36', '9', '3201216041', 'Septia Anggraini', 'Rancang Bangun Aplikasi Penyusutan Aktiva Tetap Menggunakan Borland Delphi dan Xampp di BPJS Ketenagakerjaan Cabang Kalimantan Barat');
INSERT INTO `mahasiswa` VALUES ('37', '7', '3201216042', 'Dayang R', 'Membangun Sistem Informasi Nilai Raport Berbasis WEB di SMP Negeri 11 Pontianak');
INSERT INTO `mahasiswa` VALUES ('38', '10', '3201216043', 'Ediansyah', 'Rancang Bangun Sistem Informasi Organisasi Mahasiswa Politeknik Negeri Pontianak Menggunakan PHP dan MySql');
INSERT INTO `mahasiswa` VALUES ('39', '15', '3201216044', 'Akrilvalerat', 'Aplikasi Listing Object Market Share Berbasis Java dan MySQL pada Balai Riset Dan Standarisasi Industri Pontianak');
INSERT INTO `mahasiswa` VALUES ('40', '18', '3201216045', 'Ikhwan Aldy', 'MEMBANGUN SISTEM INFORMASI DINAS PEMUDA DAN OLAHRAGA PROVINSI KALIMANTAN BARAT BERBASIS WEBSITE');
INSERT INTO `mahasiswa` VALUES ('41', '8', '3201216046', 'DAHLIASARI', 'Aplikasi Manajemen Kepegawaian pada BKD Kab. Mempawah');
INSERT INTO `mahasiswa` VALUES ('42', '9', '3201216047', 'BUSTAMI ARDIANSYAH', 'Membangun Aplikasi SMS Center Berbasis Web dan SMS Gateway Di RRI Pontianak');
INSERT INTO `mahasiswa` VALUES ('43', '7', '3201216048', 'Reta Harviani', 'Membangun Website Sistem Informasi Perpustakaan pada SMP Negeri 11 Pontianak Menggunakan PHP 5.4.7 dan MySQL 5.5.27');
INSERT INTO `mahasiswa` VALUES ('44', '10', '3201216049', 'Muhammad Zuhri', 'Rancang Bangun Website Pemesanan Pengecatan Dan Modifikasi Motor Menggunakan Php Dan Mysql');
INSERT INTO `mahasiswa` VALUES ('45', '15', '3201216050', 'Septiana Pajar N', 'PERANCANGAN DAN PEMBANGUNAN APLIKASI DAFTAR INVENTARIS MASALAH UNIT PELAYANAN TEKNIS (UPT) PADA KANTOR WILAYAH KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA (KEMENKUMHAM) KALIMANTAN BARAT BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('46', '18', '3201216051', 'Rama Kadri', 'membangun sistem informasi rumah makan pak ndut Pontianak');
INSERT INTO `mahasiswa` VALUES ('47', '16', '3201216052', 'GIGIH KURNIADI', 'Aplikasi Billing Warnet dengan Delphi dan Mysql.');
INSERT INTO `mahasiswa` VALUES ('48', '5', '3201216053', 'Darwin', 'Perancangan Sistem Informasi Pada BKD Kabupaten Mempawah Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('49', '2', '3201216054', 'ANGGI DESTONI S', 'MEMBANGUN APLKASI SISTEM INFORMASI ADMINISTRASI DOKUMEN PADA PT. SINERGI KARYA UTAMA BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('50', '4', '3201216055', 'VANNY VIWANDA', 'Membangun Sistem Informasi Penyewaan Kapal untuk Sport Memancing Berbasis Web Di Kota Singkawang');
INSERT INTO `mahasiswa` VALUES ('51', '3', '3201216056', 'M. Ramdhani', 'Membangun Sistem Informasi Sekolah Berbasis Web Pada Madrasah Tsanawiyah Aswaja Menggunakan Php Dan My SQL');
INSERT INTO `mahasiswa` VALUES ('52', '11', '3201216057', 'Erwin Antonius', 'Rancang Bangun Aplikasi Pendataan Kepegawaian Menggunakan Delphi 7 di LPP TVRI Stasiun Kalimantan Barat');
INSERT INTO `mahasiswa` VALUES ('53', '8', '3201216058', 'Indah Juniarti', 'Media Pembelajaran Interaktif Sistem Tata Surya Jenjang Pendidikan SMP/MTS');
INSERT INTO `mahasiswa` VALUES ('54', '11', '3201216059', 'Mayelia Indah', 'Membangun Website Stand Up Comedy Pontianak Menggunakan PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('55', '16', '3201216060', 'WAHYU RINARNO', 'SISTEM INFORMASI BERBASIS WEB PADA SEKOLAH MENENGAH PERRTAMA (SMP) PERTIWI DI PONTIANAK');
INSERT INTO `mahasiswa` VALUES ('56', '18', '3201216061', 'FADLI ARWANI', 'website pengaduan kantor badan pemberdayaa perempuan keluarga berencana KOTA SINGKAWANG (BPPKB)');
INSERT INTO `mahasiswa` VALUES ('57', '14', '3201216062', 'IDWAR AKBAR', 'Rancang Bangun SIstem Informasi Geografis Lokasi Lapangan Futsal di Kota Pontianak');
INSERT INTO `mahasiswa` VALUES ('58', '7', '3201216063', 'Weni Safitri', 'embangun Sistem Informasi Lapangan Futsal di Graha Futsal Sungai Raya Dalam Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('59', '6', '3201216064', 'ARIIF RIFA II', 'Perancangan Aplikasi Multimedia Pada Kantor Sekretariat Daerah Kabupaten Sambas');
INSERT INTO `mahasiswa` VALUES ('60', '4', '3201216065', 'HERI SETIAWAN', 'Membangun Sistem Informasi Geografis Kependudukan Kota Pemangkat');
INSERT INTO `mahasiswa` VALUES ('61', '1', '3201216066', 'Rahmad Safari', ' RANCANG BANGUN SIG MENGENAI INFRASTRUKTUR KESEHATAN DI KOTA PONTIANAK BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('62', '13', '3201216067', 'FARIZ', 'Rancan Bangun Aplikasi E-Commerce Berbasis Web pada toko Abang Apple Menggunakan Payment Gateway Paypal');
INSERT INTO `mahasiswa` VALUES ('63', '3', '3201216068', 'Zultajudin', 'Rancang Bangun Sistem Informasi Perpustakaan Berbasis Web Diperpustakaan Kota Pontianak');
INSERT INTO `mahasiswa` VALUES ('64', '6', '3201216069', 'Triyanda', 'Membangun Aplikasi Website Oleh - Oleh Khas Kalimantan Barat Berbasis PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('65', '10', '3201216070', 'YOMA SOFWAN', 'Rancang Bangun Sistem Informasi Akademik Mahasiswa Menggunakan SMS Gateway Berbasis PHP dan MySQL Pada Program Studi Teknik Informatika Politeknik Negeri Pontianak.');
INSERT INTO `mahasiswa` VALUES ('66', '4', '3201216071', 'Ibnu Rasyid', 'rancang bangun website pada hazelia boutique hijab syari kota pontianak');
INSERT INTO `mahasiswa` VALUES ('67', '1', '3201216072', 'SONI SAPUTRA', 'Rancang Bangun Informasi Penjualan Alat Musik Dan Penyewaan Studio Berbasis WebDi Daun Musik Studio');
INSERT INTO `mahasiswa` VALUES ('68', '13', '3201216073', 'MALIKI', 'Rancang Bangun Aplikasi Perpustakaan Daerah Kabupaten Sambas menggunakan PHP dan MySq');
INSERT INTO `mahasiswa` VALUES ('69', '6', '3201216074', 'ANDRI NOVIANDY', 'Rancang Bangun sistem Informasi Dompet Uma');
INSERT INTO `mahasiswa` VALUES ('70', '11', '3201216075', 'Uray Nabila', 'Membangun website kantor Camat Pemangka');
INSERT INTO `mahasiswa` VALUES ('71', '14', '3201216076', 'RIDHO SAHPUTRA', 'Membangun Sistem Informasi dan penjuala batu permata di toko Ilyas Gems');
INSERT INTO `mahasiswa` VALUES ('72', '8', '3201216077', 'Joko Sukma Fazrie', 'Membangun aplikasi game interaktif memasak masakan khas Pontianak');
INSERT INTO `mahasiswa` VALUES ('73', '2', '3201216078', 'DANNY ORRY F', 'Rancang bangun SIG lalu lintas di Pontianak berbasis web');
INSERT INTO `mahasiswa` VALUES ('74', '13', '3201216079', 'RANI RAMADHIN', 'membangun aplikasi enkripsi dan dekripsi dengan algoritma kriptografi aes menggunakan delphi');
INSERT INTO `mahasiswa` VALUES ('75', '4', '3201216080', 'Bayu Ridho Prawiro', 'Website Online Store Revolution Toyz');
INSERT INTO `mahasiswa` VALUES ('76', '6', '3201216081', 'MONANDA TRIYANA SARI', ' Rancang Bangun Aplikasi Pengolahan Data pada Bisnis Laundry Berbasis Java dan MySQL');
INSERT INTO `mahasiswa` VALUES ('77', '15', '3201216082', 'RIZQI AULIA PUTRI', ' Sistem Informasi Pemilihan Suara Ketua Badan Eksekutif Mahasiswa (BEM) pada Politeknik Negeri Pontianak');
INSERT INTO `mahasiswa` VALUES ('78', '14', '3201216083', 'RIZKY NUR ISLAMI', 'rancang bangun sistem informasi koperasi abadi di SMPN 12 pontianak berbasis delphi dan mysql');
INSERT INTO `mahasiswa` VALUES ('79', '18', '3201216084', 'AMIRUL .M', 'MEMBANGUN APLIKASI PERKEMBANGAN PERKEBUNAN DI DINAS KEHUTANAN DAN PERKEBUNAN KABUPATEN SNGGAU BERBASIS DELPHI');
INSERT INTO `mahasiswa` VALUES ('80', '16', '3201216085', 'ADITYA TUNGGAL PRAKOSO', 'Membangun Portal Informasi Akademik Berbasis Web Menggunakan PHP dan MySQL Pada Prodi Teknik Elektronka Polnep');
INSERT INTO `mahasiswa` VALUES ('81', '11', '3201216086', 'Gilang Fajar M', 'Membangun Website Company Profile dan Pemesanan Produk pada Bengkel Aneka Besi di Pontiana');
INSERT INTO `mahasiswa` VALUES ('82', '2', '3201216087', 'HERLINA', 'Membangun Aplikasi Penjualan Pada Butik Shop Rita Berbasis Web Menggunakan PHP dan MySQl');
INSERT INTO `mahasiswa` VALUES ('83', '13', '3201216088', 'ANGGI YOHANES P. M.', 'Perancangan Website');
INSERT INTO `mahasiswa` VALUES ('84', '18', '3201216089', 'Redho Kurniawan', 'Pemetaan BTS di kot Pontianak berbasis GIS');
INSERT INTO `mahasiswa` VALUES ('85', '16', '3201216090', 'Agus Diyansyah', 'BimbOL');

-- ----------------------------
-- Table structure for meta
-- ----------------------------
DROP TABLE IF EXISTS `meta`;
CREATE TABLE `meta` (
  `meta_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `meta_key` varchar(10) NOT NULL COMMENT 'S_ : system, U_ : user',
  `meta_value` text NOT NULL,
  `meta_group` tinyint(4) NOT NULL COMMENT '1 = user',
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of meta
-- ----------------------------
INSERT INTO `meta` VALUES ('1', '1', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('2', '1', 'U_PASS', '18240', '1');
INSERT INTO `meta` VALUES ('3', '2', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('4', '2', 'U_PASS', '2a8bd', '1');
INSERT INTO `meta` VALUES ('5', '3', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('6', '3', 'U_PASS', '97374', '1');
INSERT INTO `meta` VALUES ('7', '4', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('8', '4', 'U_PASS', 'c1fec', '1');
INSERT INTO `meta` VALUES ('9', '5', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('10', '5', 'U_PASS', '2c693', '1');
INSERT INTO `meta` VALUES ('11', '6', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('12', '6', 'U_PASS', '5a933', '1');
INSERT INTO `meta` VALUES ('13', '7', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('14', '7', 'U_PASS', 'c6d00', '1');
INSERT INTO `meta` VALUES ('15', '8', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('16', '8', 'U_PASS', '8ab21', '1');
INSERT INTO `meta` VALUES ('17', '9', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('18', '9', 'U_PASS', '325a5', '1');
INSERT INTO `meta` VALUES ('19', '10', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('20', '10', 'U_PASS', '25c0f', '1');
INSERT INTO `meta` VALUES ('21', '11', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('22', '11', 'U_PASS', '67dc1', '1');
INSERT INTO `meta` VALUES ('23', '12', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('24', '12', 'U_PASS', '01d95', '1');
INSERT INTO `meta` VALUES ('25', '13', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('26', '13', 'U_PASS', '6ab73', '1');
INSERT INTO `meta` VALUES ('27', '14', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('28', '14', 'U_PASS', '8e4b5', '1');
INSERT INTO `meta` VALUES ('29', '15', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('30', '15', 'U_PASS', 'f32e0', '1');
INSERT INTO `meta` VALUES ('31', '16', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('32', '16', 'U_PASS', '63d54', '1');
INSERT INTO `meta` VALUES ('33', '17', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('34', '17', 'U_PASS', '3b740', '1');
INSERT INTO `meta` VALUES ('35', '18', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('36', '18', 'U_PASS', 'e6e10', '1');
INSERT INTO `meta` VALUES ('37', '19', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('38', '19', 'U_PASS', '584b6', '1');
INSERT INTO `meta` VALUES ('39', '20', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('40', '20', 'U_PASS', '27c92', '1');
INSERT INTO `meta` VALUES ('41', '21', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('42', '21', 'U_PASS', '90450', '1');
INSERT INTO `meta` VALUES ('43', '22', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('44', '22', 'U_PASS', '2bbad', '1');
INSERT INTO `meta` VALUES ('45', '23', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('46', '23', 'U_PASS', 'c4652', '1');
INSERT INTO `meta` VALUES ('47', '24', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('48', '24', 'U_PASS', '6d754', '1');
INSERT INTO `meta` VALUES ('49', '25', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('50', '25', 'U_PASS', '0a1b7', '1');
INSERT INTO `meta` VALUES ('51', '26', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('52', '26', 'U_PASS', '50f6d', '1');
INSERT INTO `meta` VALUES ('53', '27', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('54', '27', 'U_PASS', '52132', '1');
INSERT INTO `meta` VALUES ('55', '28', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('56', '28', 'U_PASS', 'b0891', '1');
INSERT INTO `meta` VALUES ('57', '29', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('58', '29', 'U_PASS', 'fc3ed', '1');
INSERT INTO `meta` VALUES ('59', '30', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('60', '30', 'U_PASS', '8ec5d', '1');
INSERT INTO `meta` VALUES ('61', '31', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('62', '31', 'U_PASS', '432fe', '1');
INSERT INTO `meta` VALUES ('63', '32', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('64', '32', 'U_PASS', 'f0cc0', '1');
INSERT INTO `meta` VALUES ('65', '33', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('66', '33', 'U_PASS', 'e5f8d', '1');
INSERT INTO `meta` VALUES ('67', '34', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('68', '34', 'U_PASS', 'a3cd8', '1');
INSERT INTO `meta` VALUES ('69', '35', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('70', '35', 'U_PASS', '5dfea', '1');
INSERT INTO `meta` VALUES ('71', '36', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('72', '36', 'U_PASS', '8b02a', '1');
INSERT INTO `meta` VALUES ('73', '37', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('74', '37', 'U_PASS', 'a84a6', '1');
INSERT INTO `meta` VALUES ('75', '38', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('76', '38', 'U_PASS', '53365', '1');
INSERT INTO `meta` VALUES ('77', '39', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('78', '39', 'U_PASS', 'ef7db', '1');
INSERT INTO `meta` VALUES ('79', '40', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('80', '40', 'U_PASS', 'ab99c', '1');
INSERT INTO `meta` VALUES ('81', '41', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('82', '41', 'U_PASS', '64c21', '1');
INSERT INTO `meta` VALUES ('83', '42', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('84', '42', 'U_PASS', '12b97', '1');
INSERT INTO `meta` VALUES ('85', '43', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('86', '43', 'U_PASS', '4249f', '1');
INSERT INTO `meta` VALUES ('87', '44', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('88', '44', 'U_PASS', '3ffd8', '1');
INSERT INTO `meta` VALUES ('89', '45', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('90', '45', 'U_PASS', '74949', '1');
INSERT INTO `meta` VALUES ('91', '46', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('92', '46', 'U_PASS', '01d2e', '1');
INSERT INTO `meta` VALUES ('93', '47', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('94', '47', 'U_PASS', '6451e', '1');
INSERT INTO `meta` VALUES ('95', '48', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('96', '48', 'U_PASS', 'ab2c5', '1');
INSERT INTO `meta` VALUES ('97', '49', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('98', '49', 'U_PASS', '96160', '1');
INSERT INTO `meta` VALUES ('99', '50', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('100', '50', 'U_PASS', '5c584', '1');
INSERT INTO `meta` VALUES ('101', '51', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('102', '51', 'U_PASS', '810c0', '1');
INSERT INTO `meta` VALUES ('103', '52', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('104', '52', 'U_PASS', '97818', '1');
INSERT INTO `meta` VALUES ('105', '53', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('106', '53', 'U_PASS', 'e9bda', '1');
INSERT INTO `meta` VALUES ('107', '54', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('108', '54', 'U_PASS', '8e2ad', '1');
INSERT INTO `meta` VALUES ('109', '55', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('110', '55', 'U_PASS', 'a4bd0', '1');
INSERT INTO `meta` VALUES ('111', '56', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('112', '56', 'U_PASS', 'e2aa0', '1');
INSERT INTO `meta` VALUES ('113', '57', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('114', '57', 'U_PASS', 'b2ec5', '1');
INSERT INTO `meta` VALUES ('115', '58', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('116', '58', 'U_PASS', '7183b', '1');
INSERT INTO `meta` VALUES ('117', '59', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('118', '59', 'U_PASS', 'f5dd8', '1');
INSERT INTO `meta` VALUES ('119', '60', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('120', '60', 'U_PASS', 'd43d7', '1');
INSERT INTO `meta` VALUES ('121', '61', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('122', '61', 'U_PASS', '35c09', '1');
INSERT INTO `meta` VALUES ('123', '62', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('124', '62', 'U_PASS', '6f652', '1');
INSERT INTO `meta` VALUES ('125', '63', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('126', '63', 'U_PASS', '0d28c', '1');
INSERT INTO `meta` VALUES ('127', '64', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('128', '64', 'U_PASS', '57a30', '1');
INSERT INTO `meta` VALUES ('129', '65', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('130', '65', 'U_PASS', 'e4764', '1');
INSERT INTO `meta` VALUES ('131', '66', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('132', '66', 'U_PASS', '964c2', '1');
INSERT INTO `meta` VALUES ('133', '67', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('134', '67', 'U_PASS', '98dbf', '1');
INSERT INTO `meta` VALUES ('135', '68', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('136', '68', 'U_PASS', 'ef339', '1');
INSERT INTO `meta` VALUES ('137', '69', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('138', '69', 'U_PASS', 'a3a7d', '1');
INSERT INTO `meta` VALUES ('139', '70', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('140', '70', 'U_PASS', '962fd', '1');
INSERT INTO `meta` VALUES ('141', '71', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('142', '71', 'U_PASS', 'e841d', '1');
INSERT INTO `meta` VALUES ('143', '72', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('144', '72', 'U_PASS', '3692a', '1');
INSERT INTO `meta` VALUES ('145', '73', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('146', '73', 'U_PASS', '6954d', '1');
INSERT INTO `meta` VALUES ('147', '74', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('148', '74', 'U_PASS', 'a2a28', '1');
INSERT INTO `meta` VALUES ('149', '75', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('150', '75', 'U_PASS', 'eb46d', '1');
INSERT INTO `meta` VALUES ('151', '76', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('152', '76', 'U_PASS', '5414c', '1');
INSERT INTO `meta` VALUES ('153', '77', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('154', '77', 'U_PASS', 'a1aa9', '1');
INSERT INTO `meta` VALUES ('155', '78', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('156', '78', 'U_PASS', '8b766', '1');
INSERT INTO `meta` VALUES ('157', '79', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('158', '79', 'U_PASS', '3f328', '1');
INSERT INTO `meta` VALUES ('159', '80', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('160', '80', 'U_PASS', 'edfee', '1');
INSERT INTO `meta` VALUES ('161', '81', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('162', '81', 'U_PASS', '3c2bb', '1');
INSERT INTO `meta` VALUES ('163', '82', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('164', '82', 'U_PASS', 'c4632', '1');
INSERT INTO `meta` VALUES ('165', '83', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('166', '83', 'U_PASS', 'ab47f', '1');
INSERT INTO `meta` VALUES ('167', '84', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('168', '84', 'U_PASS', '929ed', '1');
INSERT INTO `meta` VALUES ('169', '85', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('170', '85', 'U_PASS', '2495c', '1');
INSERT INTO `meta` VALUES ('171', '86', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('172', '86', 'U_PASS', '5520d', '1');
INSERT INTO `meta` VALUES ('173', '87', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('174', '87', 'U_PASS', 'd355b', '1');
INSERT INTO `meta` VALUES ('175', '88', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('176', '88', 'U_PASS', '99a49', '1');
INSERT INTO `meta` VALUES ('177', '89', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('178', '89', 'U_PASS', '05dc1', '1');
INSERT INTO `meta` VALUES ('179', '90', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('180', '90', 'U_PASS', 'ed65c', '1');
INSERT INTO `meta` VALUES ('181', '91', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('182', '91', 'U_PASS', 'bd585', '1');
INSERT INTO `meta` VALUES ('183', '92', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('184', '92', 'U_PASS', '6b8b8', '1');
INSERT INTO `meta` VALUES ('185', '93', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('186', '93', 'U_PASS', '82d51', '1');
INSERT INTO `meta` VALUES ('187', '94', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('188', '94', 'U_PASS', 'fc7d7', '1');
INSERT INTO `meta` VALUES ('189', '95', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('190', '95', 'U_PASS', '97722', '1');
INSERT INTO `meta` VALUES ('191', '96', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('192', '96', 'U_PASS', '40a08', '1');
INSERT INTO `meta` VALUES ('193', '97', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('194', '97', 'U_PASS', 'f039f', '1');
INSERT INTO `meta` VALUES ('195', '98', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('196', '98', 'U_PASS', '49072', '1');
INSERT INTO `meta` VALUES ('197', '99', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('198', '99', 'U_PASS', '7d1d4', '1');
INSERT INTO `meta` VALUES ('199', '100', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('200', '100', 'U_PASS', '0b148', '1');
INSERT INTO `meta` VALUES ('201', '101', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('202', '101', 'U_PASS', 'd0c6a', '1');
INSERT INTO `meta` VALUES ('203', '102', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('204', '102', 'U_PASS', 'c6e25', '1');
INSERT INTO `meta` VALUES ('205', '103', 'U_LOG', '0', '1');
INSERT INTO `meta` VALUES ('206', '103', 'U_PASS', '02168', '1');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `p_type` enum('3','2','1') DEFAULT NULL COMMENT '1 = file, 2 = revisi, 3 = comment',
  `p_name` text,
  `p_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post
-- ----------------------------

-- ----------------------------
-- Table structure for taxonomy
-- ----------------------------
DROP TABLE IF EXISTS `taxonomy`;
CREATE TABLE `taxonomy` (
  `TID` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `t_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1 = cat_lap',
  `t_name` text,
  `t_slug` varchar(30) NOT NULL DEFAULT '',
  `t_parent_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `t_count` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`TID`),
  UNIQUE KEY `type_slug` (`t_type`,`t_slug`),
  KEY `type` (`t_type`),
  KEY `slug` (`t_slug`),
  KEY `c_parent_ID` (`t_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxonomy
-- ----------------------------
INSERT INTO `taxonomy` VALUES ('1', '1', '{\"title\":\"Uncategories\",\"content\":\"uncategories\"}', 'uc', '0', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `u_nicename` varchar(50) NOT NULL,
  `u_level` enum('0','1','2','3') NOT NULL COMMENT '0 = super admin, 1 = admin, 2 = dosen, 3 = mahasiswa',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '18', '198506122008121001', '0', 'Mariana Syamsudin., MT', '2');
INSERT INTO `user` VALUES ('2', '17', '198208142006041005', '0', 'Ikhwan Ruslianto, S. Kom . M. Cs', '2');
INSERT INTO `user` VALUES ('3', '16', '196706271986031001', '0', 'M.Ilyas Hadikusuma., M.Eng', '2');
INSERT INTO `user` VALUES ('4', '15', '196210051981031001', '0', 'Muhammad Hasbi, MT', '2');
INSERT INTO `user` VALUES ('5', '14', '198301202006041005', '0', 'Yunita, M.Eng.', '2');
INSERT INTO `user` VALUES ('6', '13', '199201252015021002', '0', 'Wawan Heryawan, ST, MT', '2');
INSERT INTO `user` VALUES ('7', '12', '198011282005021002', '0', 'DR. Ardi Marwan S.Ss', '2');
INSERT INTO `user` VALUES ('8', '11', '196307061982032001', '0', 'Ferry Faisal, S.St,. MT.', '2');
INSERT INTO `user` VALUES ('9', '10', '197704122005021001', '0', 'Tedy Rismawan, S.Kom, M.Cs', '2');
INSERT INTO `user` VALUES ('10', '9', '196109031982031001', '0', 'Ramli, MT', '2');
INSERT INTO `user` VALUES ('11', '8', '196305031983031006', '0', 'Freska Rolensa, ST,. M.Cs', '2');
INSERT INTO `user` VALUES ('12', '7', '196312201987031003', '0', 'Neni Firdyanti, MT', '2');
INSERT INTO `user` VALUES ('13', '6', '196006161982021001', '0', 'Yasir Arafat, S.St.', '2');
INSERT INTO `user` VALUES ('14', '4', '197805032003121002', '0', 'H. Irawan Suharto, ST,. MT.', '2');
INSERT INTO `user` VALUES ('15', '3', '196507302007011002', '0', 'Ir. Abu Bakar', '2');
INSERT INTO `user` VALUES ('16', '2', '198004232008011004', '0', 'Wendhi Yuniarto, ST., MT.', '2');
INSERT INTO `user` VALUES ('17', '1', '199008172015022001', '0', 'Satriyo, M. Kom', '2');
INSERT INTO `user` VALUES ('18', '85', '3201216090', '0', 'Agus Diyansyah', '3');
INSERT INTO `user` VALUES ('19', '84', '3201216089', '0', 'Redho Kurniawan', '3');
INSERT INTO `user` VALUES ('20', '83', '3201216088', '0', 'ANGGI YOHANES P. M.', '3');
INSERT INTO `user` VALUES ('21', '82', '3201216087', '0', 'HERLINA', '3');
INSERT INTO `user` VALUES ('22', '81', '3201216086', '0', 'Gilang Fajar M', '3');
INSERT INTO `user` VALUES ('23', '80', '3201216085', '0', 'ADITYA TUNGGAL PRAKOSO', '3');
INSERT INTO `user` VALUES ('24', '79', '3201216084', '0', 'AMIRUL .M', '3');
INSERT INTO `user` VALUES ('25', '78', '3201216083', '0', 'RIZKY NUR ISLAMI', '3');
INSERT INTO `user` VALUES ('26', '77', '3201216082', '0', 'RIZQI AULIA PUTRI', '3');
INSERT INTO `user` VALUES ('27', '76', '3201216081', '0', 'MONANDA TRIYANA SARI', '3');
INSERT INTO `user` VALUES ('28', '75', '3201216080', '0', 'Bayu Ridho Prawiro', '3');
INSERT INTO `user` VALUES ('29', '74', '3201216079', '0', 'RANI RAMADHIN', '3');
INSERT INTO `user` VALUES ('30', '73', '3201216078', '0', 'DANNY ORRY F', '3');
INSERT INTO `user` VALUES ('31', '72', '3201216077', '0', 'Joko Sukma Fazrie', '3');
INSERT INTO `user` VALUES ('32', '71', '3201216076', '0', 'RIDHO SAHPUTRA', '3');
INSERT INTO `user` VALUES ('33', '70', '3201216075', '0', 'Uray Nabila', '3');
INSERT INTO `user` VALUES ('34', '69', '3201216074', '0', 'ANDRI NOVIANDY', '3');
INSERT INTO `user` VALUES ('35', '68', '3201216073', '0', 'MALIKI', '3');
INSERT INTO `user` VALUES ('36', '67', '3201216072', '0', 'SONI SAPUTRA', '3');
INSERT INTO `user` VALUES ('37', '66', '3201216071', '0', 'Ibnu Rasyid', '3');
INSERT INTO `user` VALUES ('38', '65', '3201216070', '0', 'YOMA SOFWAN', '3');
INSERT INTO `user` VALUES ('39', '64', '3201216069', '0', 'Triyanda', '3');
INSERT INTO `user` VALUES ('40', '63', '3201216068', '0', 'Zultajudin', '3');
INSERT INTO `user` VALUES ('41', '62', '3201216067', '0', 'FARIZ', '3');
INSERT INTO `user` VALUES ('42', '61', '3201216066', '0', 'Rahmad Safari', '3');
INSERT INTO `user` VALUES ('43', '60', '3201216065', '0', 'HERI SETIAWAN', '3');
INSERT INTO `user` VALUES ('44', '59', '3201216064', '0', 'ARIIF RIFA II', '3');
INSERT INTO `user` VALUES ('45', '58', '3201216063', '0', 'Weni Safitri', '3');
INSERT INTO `user` VALUES ('46', '57', '3201216062', '0', 'IDWAR AKBAR', '3');
INSERT INTO `user` VALUES ('47', '56', '3201216061', '0', 'FADLI ARWANI', '3');
INSERT INTO `user` VALUES ('48', '55', '3201216060', '0', 'WAHYU RINARNO', '3');
INSERT INTO `user` VALUES ('49', '54', '3201216059', '0', 'Mayelia Indah', '3');
INSERT INTO `user` VALUES ('50', '53', '3201216058', '0', 'Indah Juniarti', '3');
INSERT INTO `user` VALUES ('51', '52', '3201216057', '0', 'Erwin Antonius', '3');
INSERT INTO `user` VALUES ('52', '51', '3201216056', '0', 'M. Ramdhani', '3');
INSERT INTO `user` VALUES ('53', '50', '3201216055', '0', 'VANNY VIWANDA', '3');
INSERT INTO `user` VALUES ('54', '49', '3201216054', '0', 'ANGGI DESTONI S', '3');
INSERT INTO `user` VALUES ('55', '48', '3201216053', '0', 'Darwin', '3');
INSERT INTO `user` VALUES ('56', '47', '3201216052', '0', 'GIGIH KURNIADI', '3');
INSERT INTO `user` VALUES ('57', '46', '3201216051', '0', 'Rama Kadri', '3');
INSERT INTO `user` VALUES ('58', '45', '3201216050', '0', 'Septiana Pajar N', '3');
INSERT INTO `user` VALUES ('59', '44', '3201216049', '0', 'Muhammad Zuhri', '3');
INSERT INTO `user` VALUES ('60', '43', '3201216048', '0', 'Reta Harviani', '3');
INSERT INTO `user` VALUES ('61', '42', '3201216047', '0', 'BUSTAMI ARDIANSYAH', '3');
INSERT INTO `user` VALUES ('62', '41', '3201216046', '0', 'DAHLIASARI', '3');
INSERT INTO `user` VALUES ('63', '40', '3201216045', '0', 'Ikhwan Aldy', '3');
INSERT INTO `user` VALUES ('64', '39', '3201216044', '0', 'Akrilvalerat', '3');
INSERT INTO `user` VALUES ('65', '38', '3201216043', '0', 'Ediansyah', '3');
INSERT INTO `user` VALUES ('66', '37', '3201216042', '0', 'Dayang R', '3');
INSERT INTO `user` VALUES ('67', '36', '3201216041', '0', 'Septia Anggraini', '3');
INSERT INTO `user` VALUES ('68', '35', '3201216040', '0', 'ISWANDI', '3');
INSERT INTO `user` VALUES ('69', '34', '3201216039', '0', 'Supriyanto', '3');
INSERT INTO `user` VALUES ('70', '33', '3201216038', '0', 'Redy Akbar Sumbara', '3');
INSERT INTO `user` VALUES ('71', '32', '3201216037', '0', 'Budianto', '3');
INSERT INTO `user` VALUES ('72', '31', '3201216036', '0', 'Andri Pratama P', '3');
INSERT INTO `user` VALUES ('73', '30', '3201216035', '0', 'Risky Raesah', '3');
INSERT INTO `user` VALUES ('74', '29', '3201216034', '0', 'MUHAMMAD ARDANI', '3');
INSERT INTO `user` VALUES ('75', '28', '3201216033', '0', 'SY. AL ADNAN RAZI', '3');
INSERT INTO `user` VALUES ('76', '27', '3201216032', '0', 'Siti Nurhayati', '3');
INSERT INTO `user` VALUES ('77', '26', '3201216031', '0', 'ACHMAD GUNAWAN', '3');
INSERT INTO `user` VALUES ('78', '25', '3201216030', '0', 'KHAIRUL ANHAR.S', '3');
INSERT INTO `user` VALUES ('79', '24', '3201216029', '0', 'Abdi Setiawan', '3');
INSERT INTO `user` VALUES ('80', '23', '3201216028', '0', 'Korina Jami s', '3');
INSERT INTO `user` VALUES ('81', '22', '3201216027', '0', 'Roby Anggara', '3');
INSERT INTO `user` VALUES ('82', '21', '3201216026', '0', 'Rizka Purnama', '3');
INSERT INTO `user` VALUES ('83', '20', '3201216025', '0', 'Bella Ayudha S', '3');
INSERT INTO `user` VALUES ('84', '19', '3201216024', '0', 'Febriandi Bahroni', '3');
INSERT INTO `user` VALUES ('85', '18', '3201216023', '0', 'Maimunah', '3');
INSERT INTO `user` VALUES ('86', '17', '3201216022', '0', 'Wilmar Rianly', '3');
INSERT INTO `user` VALUES ('87', '16', '3201216021', '0', 'M. FEBRI RAMADHAN', '3');
INSERT INTO `user` VALUES ('88', '15', '3201216020', '0', 'Dita Silvia', '3');
INSERT INTO `user` VALUES ('89', '14', '3201216019', '0', 'KRISTIANI SIMANJUNTAK ', '3');
INSERT INTO `user` VALUES ('90', '13', '3201216018', '0', 'Yuliandi ', '3');
INSERT INTO `user` VALUES ('91', '12', '3201216017', '0', 'Agustin Amerila', '3');
INSERT INTO `user` VALUES ('92', '11', '3201216016', '0', 'Oky Vidia Ningsih', '3');
INSERT INTO `user` VALUES ('93', '10', '3201216015', '0', 'Hasan As ari', '3');
INSERT INTO `user` VALUES ('94', '9', '3201216014', '0', 'Reni Tryanti', '3');
INSERT INTO `user` VALUES ('95', '8', '3201216013', '0', 'Ikhsan Tri Yudha', '3');
INSERT INTO `user` VALUES ('96', '7', '3201216012', '0', 'EKA LILIANINGSIH', '3');
INSERT INTO `user` VALUES ('97', '6', '3201216011', '0', 'Mahyus S ', '3');
INSERT INTO `user` VALUES ('98', '5', '3201216010', '0', 'Fitriadi', '3');
INSERT INTO `user` VALUES ('99', '4', '3201216009', '0', 'Aprilianto', '3');
INSERT INTO `user` VALUES ('100', '3', '3201216008', '0', 'GERLIADI JULIONO ', '3');
INSERT INTO `user` VALUES ('101', '2', '3201216007', '0', 'Bayu', '3');
INSERT INTO `user` VALUES ('102', '1', '3201216006', '0', 'Susi Susanti', '3');
INSERT INTO `user` VALUES ('103', '19', '3201216006', '0', 'Diyan', '2');
