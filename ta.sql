/*
Navicat MySQL Data Transfer

Source Server         : data
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ta

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-06-08 23:16:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id_dosen` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES ('1', 'Satriyo, M. Kom');
INSERT INTO `dosen` VALUES ('2', 'Wendhi Yuniarto, ST., MT.');
INSERT INTO `dosen` VALUES ('3', 'Ir. Abu Bakar');
INSERT INTO `dosen` VALUES ('4', 'H. Irawan Suharto, ST,. MT.');
INSERT INTO `dosen` VALUES ('5', 'Budianingsih, ST,. MT.');
INSERT INTO `dosen` VALUES ('6', 'Yasir Arafat, S.St.');
INSERT INTO `dosen` VALUES ('7', 'Neni Firdyanti, MT');
INSERT INTO `dosen` VALUES ('8', 'Freska Rolensa, ST,. M.Cs');
INSERT INTO `dosen` VALUES ('9', 'Ramli, MT');
INSERT INTO `dosen` VALUES ('10', 'Tedy Rismawan, S.Kom, M.Cs');
INSERT INTO `dosen` VALUES ('11', 'Ferry Faisal, S.St,. MT.');
INSERT INTO `dosen` VALUES ('12', 'DR. Ardi Marwan S.Ss');
INSERT INTO `dosen` VALUES ('13', 'Wawan Heryawan, ST, MT');
INSERT INTO `dosen` VALUES ('14', 'Yunita, M.Eng.');
INSERT INTO `dosen` VALUES ('15', 'Muhammad Hasbi, MT');
INSERT INTO `dosen` VALUES ('16', 'M.Ilyas Hadikusuma., M.Eng');
INSERT INTO `dosen` VALUES ('17', 'Ikhwan Ruslianto, S. Kom . M. Cs');
INSERT INTO `dosen` VALUES ('20', 'Mariana Syamsudin., MT');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id_mhs` smallint(4) NOT NULL AUTO_INCREMENT,
  `id_dosen` tinyint(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `judul` text NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('1', '1', 'Susi Susanti', 'Rancang bangun SIG Pariwisata Kota Singkawang berbasis web');
INSERT INTO `mahasiswa` VALUES ('2', '2', 'Bayu', 'Rancang Bangun SIG lokasi masjid di Pontianak berbasis web');
INSERT INTO `mahasiswa` VALUES ('3', '13', 'GERLIADI JULIONO ', 'PEMBUATAN WEB PROFILE PADA PT KALBAR LANCAR MANDIRI PONTIANAK');
INSERT INTO `mahasiswa` VALUES ('5', '4', 'Fitriadi', 'Rancang Bangung Webside Jurusan Teknik Elektro Politeknik Negeri Pontianak');
INSERT INTO `mahasiswa` VALUES ('6', '5', 'Mahyus S ', 'Aplikasi Penilaian Mentoring Pada UKM IMMSAH Politeknik Negeri Pontianak Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('7', '5', 'EKA LILIANINGSIH', 'Membangun Aplikasi Pengukuran Kinerja Pegawai Menggunakan PHP Dan MySql Di Program Studi Teknik Informatika Polnep');
INSERT INTO `mahasiswa` VALUES ('8', '14', 'Ikhsan Tri Yudha', 'Membangun game shoot the kuntilanak berbasis flash');
INSERT INTO `mahasiswa` VALUES ('9', '15', 'Reni Tryanti', 'RANCANG BANGUN WEBSITE PADA TOKO RIZKI COLLECTION DI KOTA PONTIANAK MENGGUNAKAN PHP DAN MYSQL');
INSERT INTO `mahasiswa` VALUES ('10', '16', 'Hasan As ari', 'Rancang Bangun Sistem Informasi Geografis Skate Spot berbasis Website pada AB Skatepark');
INSERT INTO `mahasiswa` VALUES ('11', '7', 'Oky Vidia Ningsih', 'Membangun Sistem Informasi klinik Gigi drg.Dian Tri Martina ,Sp.KG berbasis WEB');
INSERT INTO `mahasiswa` VALUES ('12', '1', 'Agustin Amerila', 'Membangun Aplikasi Informasi Akademik Bagi Mahasiswa Dan Orangtua Berbasis Mobile Android Di Prodi Teknik Informatika Polnep');
INSERT INTO `mahasiswa` VALUES ('13', '4', 'Yuliandi ', 'Sistem Informasi RSUD Pemangkat Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('14', '14', 'KRISTIANI SIMANJUNTAK ', 'Rancang Bangun Sistem Informasi Excellence English Studio Menggunakan PHP dan MySQ');
INSERT INTO `mahasiswa` VALUES ('15', '8', 'Dita Silvia', 'Membangun aplikasi inventaris barang pada kantor BKD Kab. Sambas');
INSERT INTO `mahasiswa` VALUES ('16', '16', 'M. FEBRI RAMADHAN', 'Rancang Bangun game pembelajaran matematika berbasis Android untuk anak usia dini');
INSERT INTO `mahasiswa` VALUES ('17', '17', 'Wilmar Rianly', 'Rancang Bangun Company Profile, Produk dan Info Layanan Berbasis Web Pada PT. Racomindo Jaya Jakarta');
INSERT INTO `mahasiswa` VALUES ('18', '1', 'Maimunah', 'Pembuatan aplikasi portal parkir berbasis client-server di Polnep menggunakan Java');
INSERT INTO `mahasiswa` VALUES ('20', '11', 'Febriandi Bahroni', 'Pengembangan Website Periklanan Berbasis PHP & SQL Untuk UMKM di Pontianak dan Sekitarnya Sebagai Wadah Promosi Online');
INSERT INTO `mahasiswa` VALUES ('21', '8', 'Bella Ayudha S', 'Aplikasi penentuan penerima beasiswa berbasis logika fuzzy');
INSERT INTO `mahasiswa` VALUES ('22', '10', 'Rizka Purnama', 'Rancang Bangun Sistem Informasi SMA PANCA BHAKTI berbasis WEB');
INSERT INTO `mahasiswa` VALUES ('23', '17', 'Roby Anggara', 'Rancang bangun sistem inventory gudang pada CV.Trijaya');
INSERT INTO `mahasiswa` VALUES ('24', '6', 'Korina Jami s', 'Pembuatan Media Pembelajaran Interaktif Matematika Kesebangunan dan Kekongruenan Jenjang pendidikan SMP Berbasis Multimedia');
INSERT INTO `mahasiswa` VALUES ('25', '10', 'Abdi Setiawan', 'Rancang Bangun Sistem Informasi Berbasis Web di Dinas Pendidikan Kabupaten Kubu Raya menggunakan PHP dan Mysql.');
INSERT INTO `mahasiswa` VALUES ('26', '18', 'KHAIRUL ANHAR.S', 'ISTEM INFORMASI PENJUALAN PAKAIAN JADI PADA DISTRO PATRIOT BERBASIS WEB DI KETAPANG ');
INSERT INTO `mahasiswa` VALUES ('27', '2', 'ACHMAD GUNAWAN', 'Membangun Sistem Informasi Hasil Studi Mahasiswa Berbasis Website Pada Layanan Portal Akademik Di Program Studi Teknik Informatika Politeknik Negeri Pontianak');
INSERT INTO `mahasiswa` VALUES ('28', '13', 'Siti Nurhayati', 'Membangun Aplikasi Edukasi Bahasa Inggris Tingkat SD Kelas 1 Menggunakan Macromedia Flash 8 di SDNegeri 31 Pontianak');
INSERT INTO `mahasiswa` VALUES ('29', '4', 'SY. AL ADNAN RAZI', 'Membangun website penyewaan bulutangkis  di gor bumi khatulistiwa ');
INSERT INTO `mahasiswa` VALUES ('30', '6', 'MUHAMMAD ARDANI', 'Rancang Bangun Sistem Informasi nilai siswa berbasis sms gateway pada MA Al Muttaqien Suhaid Kapuas Hulu');
INSERT INTO `mahasiswa` VALUES ('31', '7', 'Risky Raesah', 'Membangun Sistem Informasi Berbasis Web Pada Kantor Lurah Bansir Darat');
INSERT INTO `mahasiswa` VALUES ('32', '5', 'Andri Pratama P', 'Membangun Aplikasi Penjualan Online Pada Toko Adventure Dan Outdoor BerbasisWeb');
INSERT INTO `mahasiswa` VALUES ('33', '14', 'Budianto', 'RANCANG BANGUN SISTEM INFORMASI MTSN 1 SEMPARUK BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('34', '15', 'Redy Akbar Sumbara', 'Membangun Aplikasi Web Cafe dan Resto Katsu.Ya Pontianak Berbasis Client Server dengan Platform Android Menggunakan PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('35', '6', 'Supriyanto', 'Rancang bangun sistem penjualan online aneka kue dan aneka kerajingan tangan berbasis web');
INSERT INTO `mahasiswa` VALUES ('36', '13', 'ISWANDI', 'Membangun Website Helpdesk Ticketing Management System pada Politeknik Negeri Pontianak Berbasis PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('37', '9', 'Septia Anggraini', 'Rancang Bangun Aplikasi Penyusutan Aktiva Tetap Menggunakan Borland Delphi dan Xampp di BPJS Ketenagakerjaan Cabang Kalimantan Barat');
INSERT INTO `mahasiswa` VALUES ('38', '7', 'Dayang R', 'Membangun Sistem Informasi Nilai Raport Berbasis WEB di SMP Negeri 11 Pontianak');
INSERT INTO `mahasiswa` VALUES ('39', '10', 'Ediansyah', 'Rancang Bangun Sistem Informasi Organisasi Mahasiswa Politeknik Negeri Pontianak Menggunakan PHP dan MySql');
INSERT INTO `mahasiswa` VALUES ('40', '15', 'Akrilvalerat', 'Aplikasi Listing Object Market Share Berbasis Java dan MySQL pada Balai Riset Dan Standarisasi Industri Pontianak');
INSERT INTO `mahasiswa` VALUES ('41', '18', 'Ikhwan Aldy', 'MEMBANGUN SISTEM INFORMASI DINAS PEMUDA DAN OLAHRAGA PROVINSI KALIMANTAN BARAT BERBASIS WEBSITE');
INSERT INTO `mahasiswa` VALUES ('42', '8', 'DAHLIASARI', 'Aplikasi Manajemen Kepegawaian pada BKD Kab. Mempawah');
INSERT INTO `mahasiswa` VALUES ('43', '9', 'BUSTAMI ARDIANSYAH', 'Membangun Aplikasi SMS Center Berbasis Web dan SMS Gateway Di RRI Pontianak');
INSERT INTO `mahasiswa` VALUES ('44', '7', 'Reta Harviani', 'Membangun Website Sistem Informasi Perpustakaan pada SMP Negeri 11 Pontianak Menggunakan PHP 5.4.7 dan MySQL 5.5.27');
INSERT INTO `mahasiswa` VALUES ('45', '10', 'Muhammad Zuhri', 'Rancang Bangun Website Pemesanan Pengecatan Dan Modifikasi Motor Menggunakan Php Dan Mysql');
INSERT INTO `mahasiswa` VALUES ('46', '15', 'Septiana Pajar N', 'PERANCANGAN DAN PEMBANGUNAN APLIKASI DAFTAR INVENTARIS MASALAH UNIT PELAYANAN TEKNIS (UPT) PADA KANTOR WILAYAH KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA (KEMENKUMHAM) KALIMANTAN BARAT BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('47', '18', 'Rama Kadri', 'membangun sistem informasi rumah makan pak ndut Pontianak');
INSERT INTO `mahasiswa` VALUES ('48', '16', 'GIGIH KURNIADI', 'Aplikasi Billing Warnet dengan Delphi dan Mysql.');
INSERT INTO `mahasiswa` VALUES ('49', '5', 'Darwin', 'Perancangan Sistem Informasi Pada BKD Kabupaten Mempawah Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('50', '2', 'ANGGI DESTONI S', 'MEMBANGUN APLKASI SISTEM INFORMASI ADMINISTRASI DOKUMEN PADA PT. SINERGI KARYA UTAMA BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('51', '4', 'VANNY VIWANDA', 'Membangun Sistem Informasi Penyewaan Kapal untuk Sport Memancing Berbasis Web Di Kota Singkawang');
INSERT INTO `mahasiswa` VALUES ('52', '3', 'M. Ramdhani', 'Membangun Sistem Informasi Sekolah Berbasis Web Pada Madrasah Tsanawiyah Aswaja Menggunakan Php Dan My SQL');
INSERT INTO `mahasiswa` VALUES ('53', '11', 'Erwin Antonius', 'Rancang Bangun Aplikasi Pendataan Kepegawaian Menggunakan Delphi 7 di LPP TVRI Stasiun Kalimantan Barat');
INSERT INTO `mahasiswa` VALUES ('54', '8', 'Indah Juniarti', 'Media Pembelajaran Interaktif Sistem Tata Surya Jenjang Pendidikan SMP/MTS');
INSERT INTO `mahasiswa` VALUES ('55', '11', 'Mayelia Indah', 'Membangun Website Stand Up Comedy Pontianak Menggunakan PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('56', '16', 'WAHYU RINARNO', 'SISTEM INFORMASI BERBASIS WEB PADA SEKOLAH MENENGAH PERRTAMA (SMP) PERTIWI DI PONTIANAK');
INSERT INTO `mahasiswa` VALUES ('57', '18', 'FADLI ARWANI', 'website pengaduan kantor badan pemberdayaa perempuan keluarga berencana KOTA SINGKAWANG (BPPKB)');
INSERT INTO `mahasiswa` VALUES ('58', '14', 'IDWAR AKBAR', 'Rancang Bangun SIstem Informasi Geografis Lokasi Lapangan Futsal di Kota Pontianak');
INSERT INTO `mahasiswa` VALUES ('59', '7', 'Weni Safitri', 'embangun Sistem Informasi Lapangan Futsal di Graha Futsal Sungai Raya Dalam Berbasis Web');
INSERT INTO `mahasiswa` VALUES ('60', '6', 'ARIIF RIFA II', 'Perancangan Aplikasi Multimedia Pada Kantor Sekretariat Daerah Kabupaten Sambas');
INSERT INTO `mahasiswa` VALUES ('61', '4', 'HERI SETIAWAN', 'Membangun Sistem Informasi Geografis Kependudukan Kota Pemangkat');
INSERT INTO `mahasiswa` VALUES ('62', '1', 'Rahmad Safari', ' RANCANG BANGUN SIG MENGENAI INFRASTRUKTUR KESEHATAN DI KOTA PONTIANAK BERBASIS WEB');
INSERT INTO `mahasiswa` VALUES ('63', '13', 'FARIZ', 'Rancan Bangun Aplikasi E-Commerce Berbasis Web pada toko Abang Apple Menggunakan Payment Gateway Paypal');
INSERT INTO `mahasiswa` VALUES ('64', '3', 'Zultajudin', 'Rancang Bangun Sistem Informasi Perpustakaan Berbasis Web Diperpustakaan Kota Pontianak');
INSERT INTO `mahasiswa` VALUES ('65', '6', 'Triyanda', 'Membangun Aplikasi Website Oleh - Oleh Khas Kalimantan Barat Berbasis PHP dan MySQL');
INSERT INTO `mahasiswa` VALUES ('66', '10', 'YOMA SOFWAN', 'Rancang Bangun Sistem Informasi Akademik Mahasiswa Menggunakan SMS Gateway Berbasis PHP dan MySQL Pada Program Studi Teknik Informatika Politeknik Negeri Pontianak.');
INSERT INTO `mahasiswa` VALUES ('67', '4', 'Ibnu Rasyid', 'rancang bangun website pada hazelia boutique hijab syari kota pontianak');
INSERT INTO `mahasiswa` VALUES ('68', '1', 'SONI SAPUTRA', 'Rancang Bangun Informasi Penjualan Alat Musik Dan Penyewaan Studio Berbasis WebDi Daun Musik Studio');
INSERT INTO `mahasiswa` VALUES ('69', '13', 'MALIKI', 'Rancang Bangun Aplikasi Perpustakaan Daerah Kabupaten Sambas menggunakan PHP dan MySq');
INSERT INTO `mahasiswa` VALUES ('70', '6', 'ANDRI NOVIANDY', 'Rancang Bangun sistem Informasi Dompet Uma');
INSERT INTO `mahasiswa` VALUES ('71', '11', 'Uray Nabila', 'Membangun website kantor Camat Pemangka');
INSERT INTO `mahasiswa` VALUES ('72', '14', 'RIDHO SAHPUTRA', 'Membangun Sistem Informasi dan penjuala batu permata di toko Ilyas Gems');
INSERT INTO `mahasiswa` VALUES ('73', '8', 'Joko Sukma Fazrie', 'Membangun aplikasi game interaktif memasak masakan khas Pontianak');
INSERT INTO `mahasiswa` VALUES ('74', '2', 'DANNY ORRY F', 'Rancang bangun SIG lalu lintas di Pontianak berbasis web');
INSERT INTO `mahasiswa` VALUES ('75', '13', 'RANI RAMADHIN', 'membangun aplikasi enkripsi dan dekripsi dengan algoritma kriptografi aes menggunakan delphi');
INSERT INTO `mahasiswa` VALUES ('76', '4', 'Bayu Ridho Prawiro', 'Website Online Store Revolution Toyz');
INSERT INTO `mahasiswa` VALUES ('77', '6', 'MONANDA TRIYANA SARI', ' Rancang Bangun Aplikasi Pengolahan Data pada Bisnis Laundry Berbasis Java dan MySQL');
INSERT INTO `mahasiswa` VALUES ('78', '15', 'RIZQI AULIA PUTRI', ' Sistem Informasi Pemilihan Suara Ketua Badan Eksekutif Mahasiswa (BEM) pada Politeknik Negeri Pontianak');
INSERT INTO `mahasiswa` VALUES ('79', '14', 'RIZKY NUR ISLAMI', 'rancang bangun sistem informasi koperasi abadi di SMPN 12 pontianak berbasis delphi dan mysql');
INSERT INTO `mahasiswa` VALUES ('80', '18', 'AMIRUL .M', 'MEMBANGUN APLIKASI PERKEMBANGAN PERKEBUNAN DI DINAS KEHUTANAN DAN PERKEBUNAN KABUPATEN SNGGAU BERBASIS DELPHI');
INSERT INTO `mahasiswa` VALUES ('81', '16', 'ADITYA TUNGGAL PRAKOSO', 'Membangun Portal Informasi Akademik Berbasis Web Menggunakan PHP dan MySQL Pada Prodi Teknik Elektronka Polnep');
INSERT INTO `mahasiswa` VALUES ('82', '11', 'Gilang Fajar M', 'Membangun Website Company Profile dan Pemesanan Produk pada Bengkel Aneka Besi di Pontiana');
INSERT INTO `mahasiswa` VALUES ('83', '2', 'HERLINA', ' Membangun Aplikasi Penjualan Pada Butik Shop Rita Berbasis Web Menggunakan PHP dan MySQ');
INSERT INTO `mahasiswa` VALUES ('84', '13', 'ANGGI YOHANES P. M.', 'Perancangan Website');
INSERT INTO `mahasiswa` VALUES ('85', '18', 'Redho Kurniawan', 'Pemetaan BTS di kot Pontianak berbasis GIS');
INSERT INTO `mahasiswa` VALUES ('179', '5', 'Agus Diyansyah', 'berhasil');
