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

-- Dumping structure for table p002-sunodia.agenda_kegiatan
CREATE TABLE IF NOT EXISTS `agenda_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal_mulai_pelaksanaan` varchar(255) DEFAULT NULL,
  `tanggal_selesai_pelaksanaan` varchar(255) DEFAULT NULL,
  `pelaksana` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.agenda_kegiatan: ~3 rows (approximately)
/*!40000 ALTER TABLE `agenda_kegiatan` DISABLE KEYS */;
INSERT INTO `agenda_kegiatan` (`id`, `tingkat`, `nama`, `tanggal_mulai_pelaksanaan`, `tanggal_selesai_pelaksanaan`, `pelaksana`) VALUES
	(5, 'tk-kb', 'sfd', '2019-10-09', '2019-10-02', 'sdfsdf'),
	(6, 'tk-kb', 'keren', '2019-10-03', '2019-10-15', 'ilham'),
	(8, 'sd', 'keren', '2019-10-29', '2019-10-30', 'mantap');
/*!40000 ALTER TABLE `agenda_kegiatan` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.agenda_sekolah
CREATE TABLE IF NOT EXISTS `agenda_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_poster_penerimaan_siswa_baru` varchar(255) DEFAULT NULL,
  `url_kalender_pendidikan` varchar(255) DEFAULT NULL,
  `tingkat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.agenda_sekolah: ~4 rows (approximately)
/*!40000 ALTER TABLE `agenda_sekolah` DISABLE KEYS */;
INSERT INTO `agenda_sekolah` (`id`, `url_poster_penerimaan_siswa_baru`, `url_kalender_pendidikan`, `tingkat`) VALUES
	(1, 'http://127.0.0.1:8000/uploads/agenda/5dbb3203232fa.png', 'http://127.0.0.1:8000/uploads/kalender-pendidikan/5dbb327a32435.png', 'tk-kb'),
	(2, 'http://127.0.0.1:8000/uploads/agenda/5db5e935c1737.png', 'http://127.0.0.1:8000/uploads/agenda/5db5e894daa79.png', 'sd'),
	(3, NULL, NULL, 'smp'),
	(4, NULL, NULL, 'sma');
/*!40000 ALTER TABLE `agenda_sekolah` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.album
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) unsigned NOT NULL DEFAULT 0,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.album: ~2 rows (approximately)
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` (`id`, `nama`, `tingkat`, `created_at`, `updated_at`) VALUES
	(2, 'kren', '', '2019-10-27 13:24:12', '2019-10-27 13:24:12'),
	(3, 'keren', '', '2019-10-27 13:27:32', '2019-10-27 13:27:32');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.berita: ~5 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` (`id`, `judul`, `isi`, `tingkat`, `created_at`, `updated_at`) VALUES
	(1, 'Berita 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><img src="http://127.0.0.1:8000/uploads/_test-files/5db0a4b0b16fb.jpg" style="" width="606"></p><p><br></p>', NULL, NULL, NULL),
	(2, 'Berita 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><img src="http://127.0.0.1:8000/uploads/_test-files/5db0a4e153674.jpeg"></p>', NULL, NULL, NULL),
	(3, 'Berita 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p><br></p><p><img src="http://127.0.0.1:8000/uploads/_test-files/5db0a43c93295.jpg" style="" width="711"></p>', NULL, NULL, NULL),
	(4, 'keren keren', '<p>haha mantap</p><p><br></p><p><img src="https://picsum.photos/200/300"></p><p><br></p>', 'tk-kb', '2019-10-27 13:07:06', '2019-10-27 17:02:36'),
	(5, 'test berita tk 1', '<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><br></p>', 'tk-kb', '2019-10-27 17:03:24', '2019-11-01 01:57:37');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` int(10) unsigned NOT NULL DEFAULT 0,
  `jenis_dokumen_id` bigint(20) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_dokumen_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `FK_dokumen_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.dokumen: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.fasilitas: ~4 rows (approximately)
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
INSERT INTO `fasilitas` (`id`, `text`, `tingkat`) VALUES
	(1, NULL, 'tk-kb'),
	(2, '<p>keren gan</p>', 'sd'),
	(3, NULL, 'smp'),
	(4, 'keren', 'sma');
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.files: ~7 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `url`, `created_at`, `updated_at`) VALUES
	(1, 'http://127.0.0.1:8000/uploads/files/5db5d30e6a633.png', '2019-10-27 10:25:34', '2019-10-27 10:25:34'),
	(2, 'http://127.0.0.1:8000/uploads/files/5db5d316ac94d.png', '2019-10-27 10:25:42', '2019-10-27 10:25:42'),
	(3, 'https://www.sunodia.sch.id/uploads/files/5dbb49bf6b59b.png', '2019-10-31 21:53:19', '2019-10-31 21:53:19'),
	(4, 'https://www.sunodia.sch.id/uploads/files/5dbb49c8c4d07.jpg', '2019-10-31 21:53:28', '2019-10-31 21:53:28'),
	(5, 'https://www.sunodia.sch.id/uploads/files/5dbb4a0ae291d.jpg', '2019-10-31 21:54:34', '2019-10-31 21:54:34'),
	(6, 'https://www.sunodia.sch.id/uploads/files/5dbb4a25df45b.jpg', '2019-10-31 21:55:01', '2019-10-31 21:55:01'),
	(7, 'https://www.sunodia.sch.id/uploads/files/5dbb4a3ff0937.png', '2019-10-31 21:55:27', '2019-10-31 21:55:27');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengampu_mata_pelajaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.guru: ~0 rows (approximately)
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` (`id`, `nama`, `tingkat`, `jabatan`, `pengampu_mata_pelajaran`, `created_at`, `updated_at`) VALUES
	(2, 'sfsdf', 'tk-kb', 'sdfsdf', 'sfsdf', NULL, NULL);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.highlights
CREATE TABLE IF NOT EXISTS `highlights` (
  `id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.highlights: ~2 rows (approximately)
/*!40000 ALTER TABLE `highlights` DISABLE KEYS */;
INSERT INTO `highlights` (`id`, `url`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'https://www.sunodia.sch.id/uploads/highlights/5dbb6d8d3403c.jpg', 'Mantap', '2019-11-01 00:26:05', '2019-11-01 00:26:05'),
	(2, 'https://sunodia.sch.id/uploads/highlights/5dbb975689a90.jpg', 'Hightlight 2', '2019-11-01 03:24:22', '2019-11-01 03:24:22');
/*!40000 ALTER TABLE `highlights` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.jenis_dokumen
CREATE TABLE IF NOT EXISTS `jenis_dokumen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` int(10) unsigned NOT NULL DEFAULT 0,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kegemaran_prestasi_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `FK_kegemaran_prestasi_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.kegemaran_prestasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `kegemaran_prestasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegemaran_prestasi` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.konfigurasi
CREATE TABLE IF NOT EXISTS `konfigurasi` (
  `id` int(11) NOT NULL,
  `tahun_pembelajaran` varchar(50) DEFAULT NULL,
  `registrasi_open` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.konfigurasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `konfigurasi` DISABLE KEYS */;
INSERT INTO `konfigurasi` (`id`, `tahun_pembelajaran`, `registrasi_open`) VALUES
	(1, '2019', 1);
/*!40000 ALTER TABLE `konfigurasi` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.migrations: ~18 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_10_24_104334_create_album_table', 1),
	(5, '2019_10_24_104413_create_photos_table', 1),
	(6, '2019_10_24_104447_create_berita_table', 1),
	(7, '2019_10_24_104539_create_jenis_dokumen_table', 1),
	(8, '2019_10_24_104616_create_registrasi_siswa_table', 1),
	(9, '2019_10_24_104643_create_dokumen_table', 1),
	(10, '2019_10_24_104706_create_guru_table', 1),
	(11, '2019_10_24_104727_create_highlights_table', 1),
	(12, '2019_10_24_104757_create_kegemaran_prestasi_table', 1),
	(13, '2019_10_24_104907_create_prestasi_table', 1),
	(14, '2019_10_24_104930_create_profil_table', 1),
	(15, '2019_10_24_104950_create_profil_sekolah_table', 1),
	(16, '2019_10_24_105112_create_orang_tua_table', 1),
	(17, '2019_10_24_105133_create_saudara_table', 1),
	(18, '2019_10_24_121240_create_wali_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.orang_tua
CREATE TABLE IF NOT EXISTS `orang_tua` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` int(10) unsigned NOT NULL DEFAULT 0,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_perbulan` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orang_tua_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `FK_orang_tua_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.orang_tua: ~0 rows (approximately)
/*!40000 ALTER TABLE `orang_tua` DISABLE KEYS */;
/*!40000 ALTER TABLE `orang_tua` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` double(8,2) NOT NULL,
  `height` double(8,2) NOT NULL,
  `album_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_album_id_foreign` (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.photos: ~0 rows (approximately)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.prestasi
CREATE TABLE IF NOT EXISTS `prestasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `juara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_lomba` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.prestasi: ~3 rows (approximately)
/*!40000 ALTER TABLE `prestasi` DISABLE KEYS */;
INSERT INTO `prestasi` (`id`, `nama`, `juara`, `nama_lomba`, `tingkat_lomba`, `tingkat`, `url`, `created_at`, `updated_at`) VALUES
	(3, 'Riska', '1', 'Matematika', 'Kota Samarinda', 'tk-kb', 'https://www.sunodia.sch.id/uploads/prestasi/5dbb83f43b0e6.jpg', '2019-10-28 22:36:56', '2019-11-01 02:01:40'),
	(4, 'Ilham, Gunawan', '2', 'Lomba Bahasa Indonesia', 'Indonesia', 'tk-kb', 'https://www.sunodia.sch.id/uploads/prestasi/5dbb8439dab6b.jpg', '2019-11-01 02:02:49', '2019-11-01 02:02:49'),
	(5, 'Rilo', '1', 'Robot Pintar', 'Internasional', 'tk-kb', 'https://www.sunodia.sch.id/uploads/prestasi/5dbb847c10310.jpg', '2019-11-01 02:03:56', '2019-11-01 02:03:56');
/*!40000 ALTER TABLE `prestasi` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.profil
CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mars` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.profil: ~0 rows (approximately)
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` (`id`, `visi`, `misi`, `mars`, `sejarah`, `logo`) VALUES
	(1, '<p>Menjadi Sekolah Kristen yang memiliki Iman, Karakter dan Pengetahuan</p>', '<p>1. Menjadikan Yesus Kristus sebagai teladan bagi warga sekolah</p><p>2. Membentuk warga sekolah berkarakter Kristus</p><p>3. Menghasilkan sikap disiplin, mandiri dan bertanggung jawab</p><p>4. Mewujudkan pendidikan yang bermutu sesuai dengan tuntutan perkembangan zaman</p><p>5. Menghasilkan siswa-siswi :</p><ul><li>Yang takut dan beriman kepada Tuhan</li><li>Berilmu tinggi dan peduli pada keluarga, lingkungan dan sesama</li><li>Yang menghargai potensi diri dan talenta yang telah dikaruniakan oleh Tuhan, untuk diasah, dipakai dan dikembangkan bagi kemuliaan Tuhan</li></ul>', '<p>Test Mars</p>', '<p>Keberadaan Sekolah Kristen Sunodia yang terletak di jalan Kartini No. 112A adalah ikut memajukan dunia pendidikan di Samarinda sebagai wadah pembentukan manusia yang beriman dan berprestasi.Sekolah ini bermula dari jenjang TK di jalan Mulawarman No. 20 yang didirikan sejak tahun 1998. Dua tahun kemudian, pada tahun 2000/2001, dilanjutkan dengan membuka jenjang SD di tempat yang sama.</p>', '<p>Makna Logo:</p><p>BUKU dan PENA EMAS melambangkan pendidikan,</p><p>SALIB melambangkan pendidikan yang diajarkan berlandaskan kekristenan,</p><p>PITA bertulisan SUNODIA melambangkan semua siswa/siswi yang menggali ilmu akan diikat dengan tali kebersamaan,</p><p>PERISAI melambangkan semuanya ini (pendidikan, ajaran, kebersamaan, dll) akan ditopang dengan perisai iman yang kuat.</p>');
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.profil_sekolah
CREATE TABLE IF NOT EXISTS `profil_sekolah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.profil_sekolah: ~4 rows (approximately)
/*!40000 ALTER TABLE `profil_sekolah` DISABLE KEYS */;
INSERT INTO `profil_sekolah` (`id`, `text`, `tingkat`) VALUES
	(1, '<p><img src="http://127.0.0.1:8000/uploads/files/5db5d316ac94d.png" style="" width="233"></p><p><br></p><p>Marilah seluruh rakyat indonesia</p><p><br></p><p><br></p>', 'tk-kb'),
	(2, '0', 'sd'),
	(3, '0', 'smp'),
	(4, '0', 'sma');
/*!40000 ALTER TABLE `profil_sekolah` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.registrasi_siswa
CREATE TABLE IF NOT EXISTS `registrasi_siswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bergereja_di` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif_pelayan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggal_dengan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp_calon_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_calon_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `jarak_tempuh_sekolah` int(11) DEFAULT NULL,
  `waktu_tempuh_sekolah` int(11) DEFAULT NULL,
  `alat_tempuh_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat` int(11) DEFAULT NULL,
  `golongan_darah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rhesus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_belajar` int(11) DEFAULT NULL,
  `jumlah_nilai_ijazah` double(8,2) DEFAULT NULL,
  `pernah_melakukan_donor` int(11) DEFAULT NULL,
  `tinggi_badan` double(8,2) DEFAULT NULL,
  `berat_badan` double(8,2) DEFAULT NULL,
  `penyakit_yang_pernah_diderita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkebutuhan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciri_khusus_lainnya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggal_bersama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_step` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saved` int(11) NOT NULL DEFAULT 0,
  `nomor_registrasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_pembelajaran` year(4) DEFAULT NULL,
  `tahun_registrasi` year(4) DEFAULT NULL,
  `saved_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.registrasi_siswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `registrasi_siswa` DISABLE KEYS */;
INSERT INTO `registrasi_siswa` (`id`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kewarganegaraan`, `bergereja_di`, `aktif_pelayan`, `alamat_rumah`, `kode_pos`, `telepon`, `tinggal_dengan`, `no_hp_calon_siswa`, `email_calon_siswa`, `anak_ke`, `jumlah_saudara`, `jarak_tempuh_sekolah`, `waktu_tempuh_sekolah`, `alat_tempuh_sekolah`, `tingkat`, `golongan_darah`, `rhesus`, `asal_sekolah`, `alamat_sekolah`, `nomor_ijazah`, `lama_belajar`, `jumlah_nilai_ijazah`, `pernah_melakukan_donor`, `tinggi_badan`, `berat_badan`, `penyakit_yang_pernah_diderita`, `berkebutuhan_khusus`, `ciri_khusus_lainnya`, `tinggal_bersama`, `last_step`, `saved`, `nomor_registrasi`, `tahun_pembelajaran`, `tahun_registrasi`, `saved_date`, `created_at`, `updated_at`) VALUES
	(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, '2019', NULL, NULL, '2019-11-02 18:23:21', '2019-11-02 18:23:21');
/*!40000 ALTER TABLE `registrasi_siswa` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.saudara
CREATE TABLE IF NOT EXISTS `saudara` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` int(10) unsigned NOT NULL DEFAULT 0,
  `saudara_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saudara_umur` int(11) NOT NULL,
  `saudara_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saudara_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_saudara_registrasi_siswa` (`registrasi_siswa_id`),
  CONSTRAINT `FK_saudara_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.saudara: ~0 rows (approximately)
/*!40000 ALTER TABLE `saudara` DISABLE KEYS */;
/*!40000 ALTER TABLE `saudara` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.struktur_organisasi
CREATE TABLE IF NOT EXISTS `struktur_organisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table p002-sunodia.struktur_organisasi: ~4 rows (approximately)
/*!40000 ALTER TABLE `struktur_organisasi` DISABLE KEYS */;
INSERT INTO `struktur_organisasi` (`id`, `url`, `tingkat`) VALUES
	(1, 'http://127.0.0.1:8000/uploads/struktur_organisasi/5dbb313b54f4b.png', 'tk-kb'),
	(2, NULL, 'sd'),
	(3, NULL, 'smp'),
	(4, NULL, 'sma');
/*!40000 ALTER TABLE `struktur_organisasi` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table p002-sunodia.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin@admin.com', '$2y$10$ZP6e6Tx0VVnXcCHupuyZX.2sYM3cdqFOQ3KCxlY8UbUNAPSRiOoZa', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table p002-sunodia.wali
CREATE TABLE IF NOT EXISTS `wali` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registrasi_siswa_id` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_perbulan` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wali_registrasi_siswa_id_foreign` (`registrasi_siswa_id`),
  CONSTRAINT `FK_wali_registrasi_siswa` FOREIGN KEY (`registrasi_siswa_id`) REFERENCES `registrasi_siswa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table p002-sunodia.wali: ~0 rows (approximately)
/*!40000 ALTER TABLE `wali` DISABLE KEYS */;
/*!40000 ALTER TABLE `wali` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
