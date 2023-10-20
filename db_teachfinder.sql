-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2023 pada 18.54
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_teachfinder`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_gurus`
--

CREATE TABLE `alamat_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamat_gurus`
--

INSERT INTO `alamat_gurus` (`id`, `guru_id`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tegalsari Nomor 1', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(2, 1, 'Tegalsari Nomor 2', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(3, 2, 'Simokerto Nomor 1', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(4, 2, 'Simokerto Nomor 2', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(5, 3, 'Genteng Nomor 1', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(6, 3, 'Genteng Nomor 2', '2023-10-20 09:08:15', '2023-10-20 09:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `lokasi_id` bigint(20) UNSIGNED NOT NULL,
  `skl_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `name`, `email`, `phone`, `is_active`, `lokasi_id`, `skl_ijazah`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Guru1', 'guru1@gmail.com', '6283193049563', 0, 1, 'uploads/guru/ijazah1.jpg', 2, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(2, 'Guru2', 'guru2@gmail.com', '6283193394201', 0, 2, 'uploads/guru/ijazah2.jpg', 3, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(3, 'Guru3', 'guru3@gmail.com', '6283193192831', 0, 3, 'uploads/guru/ijazah3.jpg', 4, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(4, 'jskjak', 'ksjshar@admin.com', '082182889218921', 0, 3, 'C:\\Users\\Wahid\\AppData\\Local\\Temp\\php43C.tmp', 8, '2023-10-20 09:08:56', '2023-10-20 09:08:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haris`
--

CREATE TABLE `haris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `haris`
--

INSERT INTO `haris` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Senin', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(2, 'Selasa', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(3, 'Rabu', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(4, 'Kamis', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(5, 'Jumat', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(6, 'Sabtu', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(7, 'Minggu', '2023-10-20 09:08:14', '2023-10-20 09:08:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `hari_id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `jenjang_id` bigint(20) UNSIGNED NOT NULL,
  `waktu_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `name`, `guru_id`, `hari_id`, `mata_pelajaran_id`, `jenjang_id`, `waktu_mulai`, `waktu_akhir`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Bimbel Privat SD', 1, 1, 1, 1, '08:00', '09:30', 85000, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(2, 'Bimbel Privat SD', 1, 2, 1, 1, '13:00', '14:30', 75000, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(3, 'Bimbel Privat SMP', 2, 1, 2, 2, '08:00', '09:30', 85000, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(4, 'Bimbel Privat SMP', 2, 2, 2, 2, '13:00', '14:30', 75000, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(5, 'Bimbel Privat SMA', 3, 1, 3, 3, '08:00', '09:30', 85000, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(6, 'Bimbel Privat SMA', 3, 2, 3, 3, '13:00', '14:30', 75000, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(7, 'aku', 3, 3, 1, 2, '18:00 - ', '18:30', 0, NULL, NULL),
(8, 'aku', 3, 3, 1, 2, '18:00 - ', '18:30', 50000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjangs`
--

CREATE TABLE `jenjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenjangs`
--

INSERT INTO `jenjangs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SD', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(2, 'SMP', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(3, 'SMA', '2023-10-20 09:08:14', '2023-10-20 09:08:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasis`
--

CREATE TABLE `lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasis`
--

INSERT INTO `lokasis` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tegalsari', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(2, 'Simokerto', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(3, 'Genteng', '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(4, 'Bubutan', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(5, 'Gubeng', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(6, 'Gunung Anyar', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(7, 'Sukolilo', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(8, 'Tambaksari', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(9, 'Mulyorejo', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(10, 'Rungkut', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(11, 'Tenggilis Mejoyo', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(12, 'Benowo', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(13, 'Pakal', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(14, 'Asemrowo', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(15, 'Sukomanunggal', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(16, 'Tandes', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(17, 'Sambikecep', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(18, 'Lakarsantri', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(19, 'Bulak', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(20, 'Kenjeran', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(21, 'Semampir', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(22, 'Pabean Cantian', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(23, 'Krembangan', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(24, 'Wonokromo', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(25, 'Wonocolo', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(26, 'Wiyung', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(27, 'Karang Pilang', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(28, 'Jambangan', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(29, 'Gayungan', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(30, 'Dukuh Pakis', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(31, 'Sawahan', '2023-10-20 09:08:15', '2023-10-20 09:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajarans`
--

INSERT INTO `mata_pelajarans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Indonesia', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(2, 'Matematika', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(3, 'Bahasa Inggris', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(4, 'Ilmu Pengetahuan Alam (IPA)', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(5, 'Ilmu Pengetahuan Sosial (IPS)', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(6, 'Pendidikan Kewarganegaraan (PKn)', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(7, 'Pendidikan Agama', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(8, 'Seni dan Budaya', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(9, 'Pendidikan Jasmani', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(10, 'Fisika', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(11, 'Kimia', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(12, 'Biologi', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(13, 'Sejarah', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(14, 'Geografi', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(15, 'Ekonomi', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(16, 'Prakarya', '2023-10-20 09:08:15', '2023-10-20 09:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_19_045545_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_19_062939_create_mata_pelajarans_table', 1),
(7, '2023_10_19_063740_create_jenjangs_table', 1),
(8, '2023_10_19_064503_create_lokasis_table', 1),
(9, '2023_10_19_065003_create_haris_table', 1),
(10, '2023_10_19_070214_create_murids_table', 1),
(11, '2023_10_19_071129_create_gurus_table', 1),
(12, '2023_10_19_073955_create_alamat_gurus_table', 1),
(13, '2023_10_19_075433_create_jadwals_table', 1),
(14, '2023_10_19_080200_create_pesanans_table', 1),
(15, '2023_10_19_081801_create_testimonials_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murids`
--

CREATE TABLE `murids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` int(11) NOT NULL,
  `jenjang_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `murids`
--

INSERT INTO `murids` (`id`, `name`, `email`, `phone`, `pin`, `jenjang_id`, `alamat`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Murid1', 'murid1@gmail.com', '6283193049563', 710412, 1, 'Tegalsari Nomor 1', 5, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(2, 'Murid2', 'murid2@gmail.com', '6283193049563', 710412, 2, 'Simokerto Nomor 1', 6, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(3, 'Murid3', 'murid3@gmail.com', '6283193049563', 710412, 3, 'Genteng Nomor 1', 7, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(4, 'jskjak', 'jshar@admin.com', '028128172122', 112244, 3, 'SPR', 9, '2023-10-20 09:12:22', '2023-10-20 09:12:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `murid_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `murid_id`, `guru_id`, `jadwal_id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Okee. Berang berang makan coklat. Brangkatt...', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(2, 2, 2, 2, 0, 'Lokasi?', '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(3, 3, 3, 3, 1, 'Okee. Berang berang makan coklat. Brangkatt...', '2023-10-20 09:08:15', '2023-10-20 09:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-10-20 09:08:13', '2023-10-20 09:08:13'),
(2, 'Guru', '2023-10-20 09:08:13', '2023-10-20 09:08:13'),
(3, 'Murid', '2023-10-20 09:08:13', '2023-10-20 09:08:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengirim_id` bigint(20) UNSIGNED NOT NULL,
  `penerima_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id`, `pengirim_id`, `penerima_id`, `description`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 'Mantapppp', 5, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(2, 5, 2, '⭐⭐⭐⭐⭐', 5, '2023-10-20 09:08:15', '2023-10-20 09:08:15'),
(3, 5, 2, 'okeeee', 5, '2023-10-20 09:08:15', '2023-10-20 09:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_logout` timestamp NULL DEFAULT NULL,
  `secret_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_at` timestamp NULL DEFAULT NULL,
  `secret_is_used` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified`, `email_verified_at`, `password`, `role_id`, `image`, `secret_token`, `visible_token`, `last_login`, `last_logout`, `secret_link`, `secret_at`, `secret_is_used`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 0, NULL, '$2y$10$ypXBbewJxEfR3M9eoCRE1etyTk6c6kGpruXLMsekJk19HF/HDNO2i', 1, NULL, '1hN5kQH1fT9N8I09F17ar4I7NjY8uwUjfZLK5L4Y', NULL, '2023-10-18 20:47:27', '2023-10-19 06:47:27', 'JBGiOJ1z8Vw2WBj5xbQPywqCHY3cr33U62lsx7t6', '2023-10-18 20:47:27', 0, NULL, '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(2, 'Guru1', 'guru1@gmail.com', 0, NULL, '$2y$10$4fRmmS3utaXaokrwLMs8uu3Ylf6wZZMNhZTa4AA4YusnD9fHT2bD.', 2, NULL, 'P5uo1eOImz7iIM795L4zgZlaMMJ1C77RYn65ie29', NULL, '2023-10-18 20:47:27', '2023-10-19 06:47:27', '53eI2Y4YE60uGsGzuQdxA1ovTIC0TDiRtZvQu761', '2023-10-18 20:47:27', 0, NULL, '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(3, 'Guru2', 'guru2@gmail.com', 0, NULL, '$2y$10$UIWGU76juuxTOJDopCtYS.Z026xp5MzNworJjo2HRIrnUkn7fBcuu', 2, NULL, 'P5uo1eOImz7iIM795L4zgZlaMMJ1C77RYn65ie29', NULL, '2023-10-18 20:47:27', '2023-10-19 06:47:27', '53eI2Y4YE60uGsGzuQdxA1ovTIC0TDiRtZvQu761', '2023-10-18 20:47:27', 0, NULL, '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(4, 'Guru3', 'guru3@gmail.com', 0, NULL, '$2y$10$T6SRVL4H0kxpexFpxpio1OC.gQxmaEFHxIttfT2xjxTpo4KtmZxs2', 2, NULL, 'P5uo1eOImz7iIM795L4zgZlaMMJ1C77RYn65ie29', NULL, '2023-10-18 20:47:27', '2023-10-19 06:47:27', '53eI2Y4YE60uGsGzuQdxA1ovTIC0TDiRtZvQu761', '2023-10-18 20:47:27', 0, NULL, '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(5, 'Murid1', 'murid1@gmail.com', 0, NULL, '$2y$10$9A0d4WCBkFRaiDomIx2lx.GAValQGj4ihURjUA8GaLDJDdGUbRLzi', 3, NULL, 'm4Bsf3Rb9XGqHKI4623KPl4Kr12x72SOQ92hpKdZ', NULL, '2023-10-18 20:47:27', '2023-10-19 06:47:27', 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7', '2023-10-18 20:47:27', 0, NULL, '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(6, 'Murid2', 'murid2@gmail.com', 0, NULL, '$2y$10$ENCo5KquUaHl.F8NcxFnSOlyeGH7TRISNpwl2vbf8kU.wYUc3N3h.', 3, NULL, 'm4Bsf3Rb9XGqHKI4623KPl4Kr12x72SOQ92hpKdZ', NULL, '2023-10-18 20:47:27', '2023-10-19 06:47:27', 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7', '2023-10-18 20:47:27', 0, NULL, '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(7, 'Murid3', 'murid3@gmail.com', 0, NULL, '$2y$10$g0vGZhhQzBe1RR5EQtHT7OWy8fb2cB0wn/79cpGjQRRyNbbjyPg7e', 3, NULL, 'm4Bsf3Rb9XGqHKI4623KPl4Kr12x72SOQ92hpKdZ', NULL, '2023-10-18 20:47:27', '2023-10-19 06:47:27', 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7', '2023-10-18 20:47:27', 0, NULL, '2023-10-20 09:08:14', '2023-10-20 09:08:14'),
(8, 'jskjak', 'ksjshar@admin.com', 0, NULL, '$2y$10$1K.jLF0hkkp2ON4UWzaWjum1GnetrwWs1e8U76P1SZABD8goxVD8i', 2, 'C:\\laragon\\www\\TeachFinder\\public\\uploads/users/1697818136.jpeg', 'TCFGhwi5snjaO6L7iRgi1cuQWk2seYQhyDAB5xUcydo', NULL, NULL, NULL, 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7', NULL, 0, NULL, '2023-10-20 09:08:56', '2023-10-20 09:08:56'),
(9, 'jskjak', 'jshar@admin.com', 0, NULL, '$2y$10$3iJ9Nd4vRoUi2/NU06f6buKU4gSVEYkIpB5aQfyWFMrjDmDeBGFoK', 3, 'C:\\laragon\\www\\TeachFinder\\public\\uploads/users/1697818342.jpeg', 'TCFd9LUsJv8u8FmkHFcSlBY5VX3viNlmHwhtqaOd8Lx', NULL, NULL, NULL, 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7', NULL, 0, NULL, '2023-10-20 09:12:22', '2023-10-20 09:12:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat_gurus`
--
ALTER TABLE `alamat_gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_gurus_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_lokasi_id_foreign` (`lokasi_id`),
  ADD KEY `gurus_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `haris`
--
ALTER TABLE `haris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_guru_id_foreign` (`guru_id`),
  ADD KEY `jadwals_hari_id_foreign` (`hari_id`),
  ADD KEY `jadwals_mata_pelajaran_id_foreign` (`mata_pelajaran_id`),
  ADD KEY `jadwals_jenjang_id_foreign` (`jenjang_id`);

--
-- Indeks untuk tabel `jenjangs`
--
ALTER TABLE `jenjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murids`
--
ALTER TABLE `murids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `murids_jenjang_id_foreign` (`jenjang_id`),
  ADD KEY `murids_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_murid_id_foreign` (`murid_id`),
  ADD KEY `pesanans_guru_id_foreign` (`guru_id`),
  ADD KEY `pesanans_jadwal_id_foreign` (`jadwal_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_pengirim_id_foreign` (`pengirim_id`),
  ADD KEY `testimonials_penerima_id_foreign` (`penerima_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat_gurus`
--
ALTER TABLE `alamat_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `haris`
--
ALTER TABLE `haris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenjangs`
--
ALTER TABLE `jenjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `murids`
--
ALTER TABLE `murids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_gurus`
--
ALTER TABLE `alamat_gurus`
  ADD CONSTRAINT `alamat_gurus_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_hari_id_foreign` FOREIGN KEY (`hari_id`) REFERENCES `haris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `jenjangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajarans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `murids`
--
ALTER TABLE `murids`
  ADD CONSTRAINT `murids_jenjang_id_foreign` FOREIGN KEY (`jenjang_id`) REFERENCES `jenjangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `murids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanans_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanans_murid_id_foreign` FOREIGN KEY (`murid_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testimonials_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
