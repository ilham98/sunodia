-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for p002-sunodia
CREATE DATABASE IF NOT EXISTS `p002-sunodia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `p002-sunodia`;

-- Dumping structure for table p002-sunodia.album
CREATE TABLE IF NOT EXISTS `album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.album: ~1 rows (approximately)
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'Test Album 1', '2019-10-23 17:10:36', '2019-10-23 17:10:36');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.berita: ~4 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` (`id`, `judul`, `isi`, `tingkat`, `created_at`, `updated_at`) VALUES
	(24, 'Test Berita 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><br></p><p><img src="http://127.0.0.1:8000/uploads/files/5db0a43c93295.jpg" style="" width="711"></p>', 'sma', '2019-10-23 19:04:36', '2019-10-23 19:04:36'),
	(25, 'Test Berita 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><img src="http://127.0.0.1:8000/uploads/files/5db0a4b0b16fb.jpg" style="" width="606"></p><p><br></p>', 'sma', '2019-10-23 19:06:35', '2019-10-23 19:06:35'),
	(26, 'Test Berita 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><img src="http://127.0.0.1:8000/uploads/files/5db0a4e153674.jpeg"></p>', 'sma', '2019-10-23 19:07:15', '2019-10-23 19:07:15');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` bigint(20) NOT NULL,
  `jenis_dokumen_id` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_dokumen_registrasi_siswa` (`registrasi_siswa_id`),
  KEY `FK_dokumen_jenis_dokumen` (`jenis_dokumen_id`),
  CONSTRAINT `FK_dokumen_jenis_dokumen` FOREIGN KEY (`jenis_dokumen_id`) REFERENCES `jenis_dokumen` (`id`),
  CONSTRAINT `FK_dokumen_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.dokumen: ~6 rows (approximately)
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
INSERT INTO `dokumen` (`id`, `registrasi_siswa_id`, `jenis_dokumen_id`, `url`) VALUES
	(188, 8, 1, 'http://127.0.0.1:8000/uploads/dokumen/5dadb2afa562f.jpg'),
	(189, 8, 2, 'http://127.0.0.1:8000/uploads/dokumen/5dab7e589a8a8.png'),
	(190, 8, 3, 'http://127.0.0.1:8000/uploads/dokumen/5dab7e6b76839.jpeg'),
	(191, 8, 4, 'http://127.0.0.1:8000/uploads/dokumen/5dab7e71a1ca1.jpg'),
	(197, 8, 5, 'http://127.0.0.1:8000/uploads/dokumen/5dab7e77afd92.jpg'),
	(198, 8, 6, 'http://127.0.0.1:8000/uploads/dokumen/5dab7e869c3a1.jpg'),
	(211, 9, 1, 'http://127.0.0.1:8000/uploads/dokumen/5db0a7f7d7eb0.jpg'),
	(212, 9, 2, 'http://127.0.0.1:8000/uploads/dokumen/5db0a7feef544.jpg'),
	(213, 9, 3, 'http://127.0.0.1:8000/uploads/dokumen/5db0a80974dfa.jpg'),
	(214, 9, 4, 'http://127.0.0.1:8000/uploads/dokumen/5db0a80f13261.jpg'),
	(215, 9, 5, 'http://127.0.0.1:8000/uploads/dokumen/5db0a815eb6a2.jpg'),
	(216, 9, 6, 'http://127.0.0.1:8000/uploads/dokumen/5db0a81c0865d.jpg');
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.ekstrakulikuler
CREATE TABLE IF NOT EXISTS `ekstrakulikuler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.ekstrakulikuler: ~0 rows (approximately)
/*!40000 ALTER TABLE `ekstrakulikuler` DISABLE KEYS */;
/*!40000 ALTER TABLE `ekstrakulikuler` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.fasilitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.files: ~11 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 'http://127.0.0.1:8000/uploads/files/5daf1dee7029d.jpg', '2019-10-22 15:19:10', '2019-10-22 15:19:10'),
	(2, 'http://127.0.0.1:8000/uploads/files/5daf1e358c2f0.jpeg', '2019-10-22 15:20:21', '2019-10-22 15:20:21'),
	(3, 'http://127.0.0.1:8000/uploads/files/5daf1e4f30958.jpg', '2019-10-22 15:20:47', '2019-10-22 15:20:47'),
	(4, 'http://127.0.0.1:8000/uploads/files/5daf1ec33b3ea.jpg', '2019-10-22 15:22:43', '2019-10-22 15:22:43'),
	(5, 'http://127.0.0.1:8000/uploads/files/5daf2031c75fb.jpg', '2019-10-22 15:28:49', '2019-10-22 15:28:49'),
	(6, 'http://127.0.0.1:8000/uploads/files/5daf204f6579f.jpeg', '2019-10-22 15:29:19', '2019-10-22 15:29:19'),
	(7, 'http://127.0.0.1:8000/uploads/files/5daf207cab300.jpg', '2019-10-22 15:30:04', '2019-10-22 15:30:04'),
	(8, 'http://127.0.0.1:8000/uploads/files/5daf208da7ea1.jpeg', '2019-10-22 15:30:21', '2019-10-22 15:30:21'),
	(9, 'http://127.0.0.1:8000/uploads/files/5daf3822b08c5.jpg', '2019-10-22 17:10:58', '2019-10-22 17:10:58'),
	(10, 'http://127.0.0.1:8000/uploads/files/5daf383a4920d.jpg', '2019-10-22 17:11:22', '2019-10-22 17:11:22'),
	(11, 'http://127.0.0.1:8000/uploads/files/5daf3f088e098.jpg', '2019-10-22 17:40:24', '2019-10-22 17:40:24'),
	(12, 'http://127.0.0.1:8000/uploads/files/5db0a43c93295.jpg', '2019-10-23 19:04:28', '2019-10-23 19:04:28'),
	(13, 'http://127.0.0.1:8000/uploads/files/5db0a4b0b16fb.jpg', '2019-10-23 19:06:24', '2019-10-23 19:06:24'),
	(14, 'http://127.0.0.1:8000/uploads/files/5db0a4e153674.jpeg', '2019-10-23 19:07:13', '2019-10-23 19:07:13');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  `tingkat` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_guru_jabatan` (`jabatan_id`),
  CONSTRAINT `FK_guru_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.guru: ~0 rows (approximately)
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.highlights
CREATE TABLE IF NOT EXISTS `highlights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.highlights: ~0 rows (approximately)
/*!40000 ALTER TABLE `highlights` DISABLE KEYS */;
/*!40000 ALTER TABLE `highlights` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.jabatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.jenis_dokumen
CREATE TABLE IF NOT EXISTS `jenis_dokumen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.jenis_dokumen: ~15 rows (approximately)
/*!40000 ALTER TABLE `jenis_dokumen` DISABLE KEYS */;
INSERT INTO `jenis_dokumen` (`id`, `nama`) VALUES
	(1, 'Fotocopy Akte Kelahiran Calon Siswa'),
	(2, 'Kartu Keluarga'),
	(3, 'KTP'),
	(4, 'Foto Calon Siswa'),
	(5, 'Akta Kawin Orangtua / Wali Siswa'),
	(6, 'Surat Baptis'),
	(7, 'Fotocopy Ijazah yang sudah dilegalisir'),
	(8, 'Fotocopy SKHU yang sudah dilegalisir'),
	(9, 'Fotocopy Rapor Kelas 5'),
	(10, 'Fotocopy Rapor Kelas 6'),
	(11, 'Fotocopy Rapor Kelas 7'),
	(12, 'Fotocopy Rapor Kelas 8'),
	(13, 'Fotocopy Rapor Kelas 9'),
	(14, 'Fotocopy Akte Kelahiran Calon Siswa'),
	(15, 'Fotocopy Kartu Keluarga & KTP');
/*!40000 ALTER TABLE `jenis_dokumen` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.kegemaran_prestasi
CREATE TABLE IF NOT EXISTS `kegemaran_prestasi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jenis_` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kegemaran_prestasi_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `FK_kegemaran_prestasi_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.kegemaran_prestasi: ~3 rows (approximately)
/*!40000 ALTER TABLE `kegemaran_prestasi` DISABLE KEYS */;
INSERT INTO `kegemaran_prestasi` (`id`, `registrasi_siswa_id`, `nama`, `jenis`, `jenis_`) VALUES
	(5, 8, 'zdsfsd', 'Seni', 'seni'),
	(9, 8, 'dsfdsf', 'Olahraga', 'kegemaran'),
	(12, 8, 'keren', 'Olahraga', 'prestasi');
/*!40000 ALTER TABLE `kegemaran_prestasi` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_10_15_144040_create_berita_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.orang_tua
CREATE TABLE IF NOT EXISTS `orang_tua` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` bigint(20) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `pekerjaan_jabatan` varchar(50) DEFAULT NULL,
  `alamat_lengkap` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `penghasilan_perbulan` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orang_tua_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `FK_orang_tua_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.orang_tua: ~3 rows (approximately)
/*!40000 ALTER TABLE `orang_tua` DISABLE KEYS */;
INSERT INTO `orang_tua` (`id`, `registrasi_siswa_id`, `jenis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kewarganegaraan`, `pendidikan_terakhir`, `pekerjaan_jabatan`, `alamat_lengkap`, `no_telepon`, `keterangan`, `penghasilan_perbulan`) VALUES
	(1, 8, 'ayah', 'sfsdfsd', 'sdfsdf', '2019-10-28', 'Katolik', 'sdfsdf', 'sdfsdfds', 'sdfsdfs', 'sdfds', 'sdfsdf', 'Masih Hidup', 1),
	(2, 8, 'ibu', 'mantap mamangs', 'keren', '2019-10-14', 'Katolik', 'sdfds', 'SMA', 'mantap gan', 'sdfsdfs', '082254773858', 'Masih Hidup', 2);
/*!40000 ALTER TABLE `orang_tua` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `width` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `album_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_photos_album` (`album_id`),
  CONSTRAINT `FK_photos_album` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.photos: ~2 rows (approximately)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `url`, `width`, `height`, `album_id`) VALUES
	(8, 'http://127.0.0.1:8000/uploads/galeri/5db08fb0db075.jpg', 3465, 1657, 4),
	(9, 'http://127.0.0.1:8000/uploads/galeri/5db08fc1c7165.jpg', 3504, 2336, 4);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.prestasi
CREATE TABLE IF NOT EXISTS `prestasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.prestasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `prestasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestasi` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.profil
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL,
  `visi` longtext NOT NULL DEFAULT '',
  `misi` longtext NOT NULL DEFAULT '',
  `mars` longtext NOT NULL DEFAULT '',
  `sejarah` longtext NOT NULL DEFAULT '',
  `logo` longtext NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.profil: ~1 rows (approximately)
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` (`id`, `visi`, `misi`, `mars`, `sejarah`, `logo`) VALUES
	(1, '<p>Menjadi Sekolah Kristen yang memiliki Iman, Karakter dan Pengetahuan</p>', '<p>1. Menjadikan Yesus Kristus sebagai teladan bagi warga sekolah</p><p>2. Membentuk warga sekolah berkarakter Kristus</p><p>3. Menghasilkan sikap disiplin, mandiri dan bertanggung jawab</p><p>4. Mewujudkan pendidikan yang bermutu sesuai dengan tuntutan perkembangan zaman</p><p>5. Menghasilkan siswa-siswi :</p><ul><li>Yang takut dan beriman kepada Tuhan</li><li>Berilmu tinggi dan peduli pada keluarga, lingkungan dan sesama</li><li>Yang menghargai potensi diri dan talenta yang telah dikaruniakan oleh Tuhan, untuk diasah, dipakai dan dikembangkan bagi kemuliaan Tuhan</li></ul>', '<p>anjay mah ini gan</p>', '<p>Keberadaan Sekolah Kristen Sunodia yang terletak di jalan Kartini No. 112A adalah ikut memajukan dunia pendidikan di Samarinda sebagai wadah pembentukan manusia yang beriman dan berprestasi.Sekolah ini bermula dari jenjang TK di jalan Mulawarman No. 20 yang didirikan sejak tahun 1998. Dua tahun kemudian, pada tahun 2000/2001, dilanjutkan dengan membuka jenjang SD di tempat yang sama.</p>', '<p>Makna Logo:</p><p>BUKU dan PENA EMAS melambangkan pendidikan,</p><p>SALIB melambangkan pendidikan yang diajarkan berlandaskan kekristenan,</p><p>PITA bertulisan SUNODIA melambangkan semua siswa/siswi yang menggali ilmu akan diikat dengan tali kebersamaan,</p><p>PERISAI melambangkan semuanya ini (pendidikan, ajaran, kebersamaan, dll) akan ditopang dengan perisai iman yang kuat.</p>');
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.profil_persekolah
CREATE TABLE IF NOT EXISTS `profil_persekolah` (
  `id` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_sekolah` varchar(255) DEFAULT NULL,
  `status_akreditasi` varchar(255) DEFAULT NULL,
  `tahun_awal_akreditasi` year(4) DEFAULT NULL,
  `tahun_akhir_akreditasi` year(4) DEFAULT NULL,
  `tanggal_terakhir_akreditasi` date DEFAULT NULL,
  `pengelola` varchar(255) DEFAULT NULL,
  `nss` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `luas_tanah` varchar(255) DEFAULT NULL,
  `luas_bangunan_lantai_bawah` varchar(255) DEFAULT NULL,
  `status_tanah_bangunan` varchar(255) DEFAULT NULL,
  `jumlah _ruang_belajar` int(11) DEFAULT NULL,
  `waktu_mulai_belajar` time DEFAULT NULL,
  `waktu_selesai_belajar` time DEFAULT NULL,
  `jenis_muatan_lokal` varchar(50) DEFAULT NULL,
  `foto_struktur_organisasi_url` varchar(255) DEFAULT NULL,
  `foto_kalender_pendidikan` varchar(255) DEFAULT NULL,
  `foto_penerimaan_siswa_baru` varchar(255) DEFAULT NULL,
  `tingkat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.profil_persekolah: ~0 rows (approximately)
/*!40000 ALTER TABLE `profil_persekolah` DISABLE KEYS */;
/*!40000 ALTER TABLE `profil_persekolah` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.registrasi_siswa
CREATE TABLE IF NOT EXISTS `registrasi_siswa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `alamat_rumah` text DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `tinggal_dengan` varchar(50) DEFAULT NULL,
  `no_hp_calon_siswa` varchar(50) DEFAULT NULL,
  `email_calon_siswa` varchar(50) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `jarak_tempuh_sekolah` int(11) DEFAULT NULL,
  `waktu_tempuh_sekolah` int(11) DEFAULT NULL,
  `alat_tempuh_sekolah` varchar(50) DEFAULT NULL,
  `tingkat` int(11) DEFAULT NULL,
  `golongan_darah` varchar(2) DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `alamat_sekolah` varchar(255) DEFAULT NULL,
  `nomor_ijazah` varchar(255) DEFAULT NULL,
  `lama_belajar` int(11) DEFAULT NULL,
  `jumlah_nilai_ijazah` float DEFAULT NULL,
  `pernah_melakukan_donor` tinyint(1) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `penyakit_yang_pernah_diderita` varchar(255) DEFAULT NULL,
  `berkebutuhan_khusus` varchar(255) DEFAULT NULL,
  `ciri_khusus_lainnya` varchar(255) DEFAULT NULL,
  `tinggal_bersama` varchar(255) NOT NULL DEFAULT 'orang_tua',
  `last_step` int(11) DEFAULT NULL,
  `saved` tinyint(4) NOT NULL DEFAULT 0,
  `saved_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.registrasi_siswa: ~8 rows (approximately)
/*!40000 ALTER TABLE `registrasi_siswa` DISABLE KEYS */;
INSERT INTO `registrasi_siswa` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kewarganegaraan`, `alamat_rumah`, `kode_pos`, `telepon`, `tinggal_dengan`, `no_hp_calon_siswa`, `email_calon_siswa`, `anak_ke`, `jumlah_saudara`, `jarak_tempuh_sekolah`, `waktu_tempuh_sekolah`, `alat_tempuh_sekolah`, `tingkat`, `golongan_darah`, `asal_sekolah`, `alamat_sekolah`, `nomor_ijazah`, `lama_belajar`, `jumlah_nilai_ijazah`, `pernah_melakukan_donor`, `tinggi_badan`, `berat_badan`, `penyakit_yang_pernah_diderita`, `berkebutuhan_khusus`, `ciri_khusus_lainnya`, `tinggal_bersama`, `last_step`, `saved`, `saved_date`, `created_at`, `updated_at`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Orang Tua', 1, 0, '0000-00-00 00:00:00', '2019-10-16 06:05:08', '2019-10-16 06:05:08'),
	(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Orang Tua', 1, 0, '0000-00-00 00:00:00', '2019-10-16 06:05:52', '2019-10-16 06:05:52'),
	(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Orang Tua', 1, 0, '0000-00-00 00:00:00', '2019-10-16 06:06:09', '2019-10-16 06:06:09'),
	(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Orang Tua', 1, 0, '0000-00-00 00:00:00', '2019-10-16 06:06:18', '2019-10-16 06:06:18'),
	(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Orang Tua', 1, 0, '0000-00-00 00:00:00', '2019-10-16 06:06:34', '2019-10-16 06:06:34'),
	(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Orang Tua', 1, 0, '0000-00-00 00:00:00', '2019-10-16 06:07:00', '2019-10-16 06:07:00'),
	(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Orang Tua', 1, 0, '0000-00-00 00:00:00', '2019-10-16 06:07:21', '2019-10-16 06:07:21'),
	(8, 'dsfdsf', 'fsdfsdf', '2019-09-29', 'Kristen', 'sdfsdfsd', 'dsfdsfdsf', '12121', '12121212', 'Wali', 'fsdfsd', 'ilhamshinoahara@gmail.com', 3, 2, 12, 12, 'Sepeda Motor', 0, 'AB', 'sdfsdf', 'sdfdsf', '21', 13, 12, 1, 12, 1, 'dfdsf', 'dfds', 'mantap mamang', 'wali', 8, 1, '2019-10-23 19:01:04', '2019-10-16 06:07:38', '2019-10-23 19:01:04'),
	(9, 'ilham', 'bengalon', '2019-10-30', 'Kristen', 'sdfdsf', 'sdfsdfsdf', '12121', '2121212', 'Orang Tua', '213123123123', 'ilhamshinoahara@gmail.com', 3, 3, 5, 3, 'Sepeda', 0, 'A', 'mantap', 'keren', 'mantam', 1, 75.6, 1, 5, 3, 'fsd', 'fsdfsdf', 'keren', 'wali', 8, 1, '2019-10-23 19:21:12', '2019-10-23 19:12:59', '2019-10-23 19:21:12');
/*!40000 ALTER TABLE `registrasi_siswa` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.saudara
CREATE TABLE IF NOT EXISTS `saudara` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` bigint(20) NOT NULL,
  `saudara_nama` varchar(50) NOT NULL,
  `saudara_umur` int(11) NOT NULL,
  `saudara_pendidikan` varchar(50) NOT NULL,
  `saudara_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_saudara_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `FK_saudara_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.saudara: ~0 rows (approximately)
/*!40000 ALTER TABLE `saudara` DISABLE KEYS */;
INSERT INTO `saudara` (`id`, `registrasi_siswa_id`, `saudara_nama`, `saudara_umur`, `saudara_pendidikan`, `saudara_status`) VALUES
	(4, 8, 'mantap', 20, 'keren', 'Kakak');
/*!40000 ALTER TABLE `saudara` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.wali
CREATE TABLE IF NOT EXISTS `wali` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` bigint(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `pekerjaan_jabatan` varchar(50) DEFAULT NULL,
  `alamat_lengkap` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `penghasilan_perbulan` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orang_tua_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `wali_ibfk_1` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table p002-sunodia.wali: ~0 rows (approximately)
/*!40000 ALTER TABLE `wali` DISABLE KEYS */;
INSERT INTO `wali` (`id`, `registrasi_siswa_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kewarganegaraan`, `pendidikan_terakhir`, `pekerjaan_jabatan`, `alamat_lengkap`, `no_telepon`, `keterangan`, `penghasilan_perbulan`) VALUES
	(1, 8, 'fsdf', 'sdfdsf', '2019-10-29', 'Islam', 'Kristen', 'sdfdf', 'sdfsd', 'sdfsdfsfsd', 'sdfsdf', 'Masih Hidup', 3),
	(2, 9, 'sdfsd', 'sdfsdf', '2019-10-24', 'Kristen', 'sdfds', 'sdfsd', 'sdfsd', 'sdfsdf', 'sdfsdf', 'Masih Hidup', 1);
/*!40000 ALTER TABLE `wali` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
