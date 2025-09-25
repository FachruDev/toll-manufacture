-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Sep 2025 pada 08.22
-- Versi server: 8.0.30
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tolldb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-mail_settings.active', 'O:22:\"App\\Models\\MailSetting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"mail_settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:13:{s:2:\"id\";i:1;s:6:\"mailer\";s:4:\"smtp\";s:4:\"host\";s:17:\"mail.galenium.com\";s:4:\"port\";i:465;s:10:\"encryption\";s:3:\"ssl\";s:8:\"username\";s:20:\"support@galenium.com\";s:8:\"password\";s:200:\"eyJpdiI6IkI1UGF0b283RnMybUh2MXBlanE3NGc9PSIsInZhbHVlIjoiUE5xQUUvaHlEdnZjZ29VWjIvcU5hdz09IiwibWFjIjoiOTA5ZmU1ZjJiMjU5NDFmNDJlMGZiM2JhNjQ1NGU5NDliNjE4NGM2MTFhYjMwZjk3YjJmZWJjNDg0ZTM2MDM3MCIsInRhZyI6IiJ9\";s:12:\"from_address\";s:20:\"support@galenium.com\";s:9:\"from_name\";s:7:\"Toll-in\";s:7:\"timeout\";i:60;s:6:\"active\";i:1;s:10:\"created_at\";s:19:\"2025-09-25 07:13:36\";s:10:\"updated_at\";s:19:\"2025-09-25 07:19:30\";}s:11:\"\0*\0original\";a:13:{s:2:\"id\";i:1;s:6:\"mailer\";s:4:\"smtp\";s:4:\"host\";s:17:\"mail.galenium.com\";s:4:\"port\";i:465;s:10:\"encryption\";s:3:\"ssl\";s:8:\"username\";s:20:\"support@galenium.com\";s:8:\"password\";s:200:\"eyJpdiI6IkI1UGF0b283RnMybUh2MXBlanE3NGc9PSIsInZhbHVlIjoiUE5xQUUvaHlEdnZjZ29VWjIvcU5hdz09IiwibWFjIjoiOTA5ZmU1ZjJiMjU5NDFmNDJlMGZiM2JhNjQ1NGU5NDliNjE4NGM2MTFhYjMwZjk3YjJmZWJjNDg0ZTM2MDM3MCIsInRhZyI6IiJ9\";s:12:\"from_address\";s:20:\"support@galenium.com\";s:9:\"from_name\";s:7:\"Toll-in\";s:7:\"timeout\";i:60;s:6:\"active\";i:1;s:10:\"created_at\";s:19:\"2025-09-25 07:13:36\";s:10:\"updated_at\";s:19:\"2025-09-25 07:19:30\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:6:\"active\";s:7:\"boolean\";s:8:\"password\";s:9:\"encrypted\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:6:\"mailer\";i:1;s:4:\"host\";i:2;s:4:\"port\";i:3;s:10:\"encryption\";i:4;s:8:\"username\";i:5;s:8:\"password\";i:6;s:12:\"from_address\";i:7;s:9:\"from_name\";i:8;s:7:\"timeout\";i:9;s:6:\"active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1758788518),
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:49:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"view-users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"create-users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:10:\"edit-users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:12:\"delete-users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:24:\"send-verifications-users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"view-departments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"create-departments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:16:\"edit-departments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:18:\"delete-departments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:26:\"view-permission-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:28:\"create-permission-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:26:\"edit-permission-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:28:\"delete-permission-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:16:\"view-permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:18:\"create-permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:16:\"edit-permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:18:\"delete-permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:14:\"view-customers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:16:\"create-customers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:14:\"edit-customers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:16:\"delete-customers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:28:\"send-verifications-customers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:10:\"view-roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:12:\"create-roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:10:\"edit-roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:12:\"delete-roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:9:\"view-mail\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:9:\"edit-mail\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:17:\"change-status-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:17:\"create-invite-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:15:\"edit-invite-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:17:\"delete-invite-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:15:\"view-invite-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:8:\"view-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:10:\"create-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:8:\"edit-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"delete-tmr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:20:\"view-technical-mades\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:22:\"create-technical-mades\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:20:\"edit-technical-mades\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:22:\"delete-technical-mades\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:24:\"view-product-char-groups\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:26:\"create-product-char-groups\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:24:\"edit-product-char-groups\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:26:\"delete-product-char-groups\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:25:\"view-product-char-details\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:27:\"create-product-char-details\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:25:\"edit-product-char-details\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:27:\"delete-product-char-details\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"superadmin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1758873175);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'R&D', '2025-09-24 19:57:58', '2025-09-24 19:57:58'),
(2, 'PR', '2025-09-24 19:57:58', '2025-09-24 19:57:58'),
(3, 'QC', '2025-09-24 19:57:58', '2025-09-24 19:57:58'),
(4, 'DSP', '2025-09-24 19:57:58', '2025-09-24 19:57:58'),
(5, 'QA', '2025-09-24 19:57:58', '2025-09-24 19:57:58'),
(6, 'ENG', '2025-09-24 19:57:58', '2025-09-24 19:57:58'),
(7, 'FA', '2025-09-24 19:57:58', '2025-09-24 19:57:58'),
(8, 'HR', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(9, 'IT', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(10, 'Management', '2025-09-24 19:57:59', '2025-09-24 19:57:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desired_format_detail_entries`
--

CREATE TABLE `desired_format_detail_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `desired_format_entry_id` bigint UNSIGNED NOT NULL,
  `product_char_detail_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desired_format_entries`
--

CREATE TABLE `desired_format_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `product_name_entry_id` bigint UNSIGNED DEFAULT NULL,
  `product_char_group_id` bigint UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desired_packaging_detail_entries`
--

CREATE TABLE `desired_packaging_detail_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `desired_packaging_entry_id` bigint UNSIGNED NOT NULL,
  `pack_type_detail_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desired_packaging_entries`
--

CREATE TABLE `desired_packaging_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `pack_type_group_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desired_product_shelf_life_entries`
--

CREATE TABLE `desired_product_shelf_life_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_configs`
--

CREATE TABLE `email_configs` (
  `id` bigint UNSIGNED NOT NULL,
  `event_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_to_roles` json DEFAULT NULL,
  `send_to_users` json DEFAULT NULL,
  `send_to_emails` json DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `email_configs`
--

INSERT INTO `email_configs` (`id`, `event_key`, `send_to_roles`, `send_to_users`, `send_to_emails`, `active`, `created_at`, `updated_at`) VALUES
(1, 'tmr.submitted', '[\"superadmin\", \"admin\", \"dephead\", \"supervisor\"]', '[]', '[]', 1, '2025-09-24 19:57:59', '2025-09-24 19:57:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulation_entries`
--

CREATE TABLE `formulation_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `actives_formulation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulation_technical_information_entries`
--

CREATE TABLE `formulation_technical_information_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `technical_made_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `getting_toll_information_details`
--

CREATE TABLE `getting_toll_information_details` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `getting_toll_information_entries`
--

CREATE TABLE `getting_toll_information_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `getting_toll_information_detail_id` bigint UNSIGNED NOT NULL,
  `other_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `indication_entries`
--

CREATE TABLE `indication_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `indication` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `information_contact_tmr_entries`
--

CREATE TABLE `information_contact_tmr_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'smtp',
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` int UNSIGNED NOT NULL DEFAULT '587',
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeout` int UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `mailer`, `host`, `port`, `encryption`, `username`, `password`, `from_address`, `from_name`, `timeout`, `active`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'mail.galenium.com', 465, 'ssl', 'support@galenium.com', 'eyJpdiI6IkI1UGF0b283RnMybUh2MXBlanE3NGc9PSIsInZhbHVlIjoiUE5xQUUvaHlEdnZjZ29VWjIvcU5hdz09IiwibWFjIjoiOTA5ZmU1ZjJiMjU5NDFmNDJlMGZiM2JhNjQ1NGU5NDliNjE4NGM2MTFhYjMwZjk3YjJmZWJjNDg0ZTM2MDM3MCIsInRhZyI6IiJ9', 'support@galenium.com', 'Toll-in', 60, 1, '2025-09-25 00:13:36', '2025-09-25 00:19:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_19_025809_create_permission_tables', 1),
(5, '2025_09_19_100001_create_customers_table', 1),
(6, '2025_09_19_100100_create_email_configs_table', 1),
(7, '2025_09_19_100400_create_mail_settings_table', 1),
(8, '2025_09_19_110000_create_departments_table', 1),
(9, '2025_09_19_110100_alter_users_add_profile_fields', 1),
(10, '2025_09_19_130000_create_permission_categories_tables', 1),
(11, '2025_09_19_140000_alter_customers_detach_user_and_add_identity', 1),
(12, '2025_09_19_200000_create_tmr_core_tables', 1),
(13, '2025_09_19_200100_create_tmr_master_tables', 1),
(14, '2025_09_19_200200_create_tmr_entry_detail_tables', 1),
(15, '2025_09_19_210000_create_tmr_drafts_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `other_services_inquiry_entries`
--

CREATE TABLE `other_services_inquiry_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pack_type_details`
--

CREATE TABLE `pack_type_details` (
  `id` bigint UNSIGNED NOT NULL,
  `pack_type_group_id` bigint UNSIGNED NOT NULL,
  `field_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pack_type_groups`
--

CREATE TABLE `pack_type_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-users', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(2, 'create-users', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(3, 'edit-users', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(4, 'delete-users', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(5, 'send-verifications-users', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(6, 'view-departments', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(7, 'create-departments', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(8, 'edit-departments', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(9, 'delete-departments', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(10, 'view-permission-categories', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(11, 'create-permission-categories', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(12, 'edit-permission-categories', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(13, 'delete-permission-categories', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(14, 'view-permissions', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(15, 'create-permissions', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(16, 'edit-permissions', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(17, 'delete-permissions', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(18, 'view-customers', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(19, 'create-customers', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(20, 'edit-customers', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(21, 'delete-customers', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(22, 'send-verifications-customers', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(23, 'view-roles', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(24, 'create-roles', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(25, 'edit-roles', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(26, 'delete-roles', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(27, 'view-mail', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(28, 'edit-mail', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(29, 'change-status-tmr', 'web', '2025-09-24 20:20:25', '2025-09-24 20:20:25'),
(30, 'create-invite-tmr', 'web', '2025-09-24 20:54:42', '2025-09-24 20:54:42'),
(31, 'edit-invite-tmr', 'web', '2025-09-24 20:54:51', '2025-09-24 20:54:51'),
(32, 'delete-invite-tmr', 'web', '2025-09-24 20:55:01', '2025-09-24 20:55:01'),
(33, 'view-invite-tmr', 'web', '2025-09-24 20:55:35', '2025-09-24 20:55:35'),
(34, 'view-tmr', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(35, 'create-tmr', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(36, 'edit-tmr', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(37, 'delete-tmr', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(38, 'view-technical-mades', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(39, 'create-technical-mades', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(40, 'edit-technical-mades', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(41, 'delete-technical-mades', 'web', '2025-09-24 23:11:20', '2025-09-24 23:11:20'),
(42, 'view-product-char-groups', 'web', '2025-09-25 00:27:57', '2025-09-25 00:27:57'),
(43, 'create-product-char-groups', 'web', '2025-09-25 00:27:57', '2025-09-25 00:27:57'),
(44, 'edit-product-char-groups', 'web', '2025-09-25 00:27:57', '2025-09-25 00:27:57'),
(45, 'delete-product-char-groups', 'web', '2025-09-25 00:27:57', '2025-09-25 00:27:57'),
(46, 'view-product-char-details', 'web', '2025-09-25 00:40:10', '2025-09-25 00:40:10'),
(47, 'create-product-char-details', 'web', '2025-09-25 00:40:10', '2025-09-25 00:40:10'),
(48, 'edit-product-char-details', 'web', '2025-09-25 00:40:10', '2025-09-25 00:40:10'),
(49, 'delete-product-char-details', 'web', '2025-09-25 00:40:10', '2025-09-25 00:40:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_categories`
--

CREATE TABLE `permission_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_categories`
--

INSERT INTO `permission_categories` (`id`, `name`, `description`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Permission Crud User', 'Semua permission untuk manajemen user', 10, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(2, 'Permission Crud Department', 'Semua permission untuk manajemen department', 15, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(3, 'Permission Permission Category', 'Semua permission untuk manajemen permission category', 18, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(4, 'Permission Crud Permission', 'Semua permission untuk manajemen permission', 20, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(5, 'Permission Customer', 'Semua permission untuk manajemen customer', 30, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(6, 'Permission Role', 'Semua permission untuk manajemen role', 40, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(7, 'Permissions Mail Settings', 'Pengaturan mail (view/edit)', 50, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(8, 'Permissions TMR Invites', 'Semua permission untuk manajemen TMR Invites', 60, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(9, 'Permissions TMR', 'Semua permission untuk manajemen TMR', 70, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(10, 'Permissions Technical Mades', 'Semua permission untuk manajemen Technical Mades', 80, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(11, 'Permissions Product Char Groups', 'Semua permission untuk manajemen Product Char Groups', 90, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(12, 'Permissions Product Char Details', 'Semua permission untuk manajemen Product Char Details', 100, '2025-09-25 00:40:21', '2025-09-25 00:40:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_category_permission`
--

CREATE TABLE `permission_category_permission` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_category_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_category_permission`
--

INSERT INTO `permission_category_permission` (`id`, `permission_category_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(2, 1, 4, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(3, 1, 3, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(4, 1, 5, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(5, 1, 1, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(6, 2, 7, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(7, 2, 9, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(8, 2, 8, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(9, 2, 6, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(10, 3, 11, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(11, 3, 13, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(12, 3, 12, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(13, 3, 10, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(14, 4, 15, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(15, 4, 17, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(16, 4, 16, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(17, 4, 14, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(18, 5, 19, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(19, 5, 21, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(20, 5, 20, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(21, 5, 22, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(22, 5, 18, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(23, 6, 24, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(24, 6, 26, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(25, 6, 25, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(26, 6, 23, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(27, 7, 28, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(28, 7, 27, '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(29, 8, 30, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(30, 8, 32, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(31, 8, 33, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(32, 9, 29, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(33, 9, 35, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(34, 9, 37, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(35, 9, 36, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(36, 9, 34, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(37, 10, 39, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(38, 10, 41, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(39, 10, 40, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(40, 10, 38, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(41, 11, 43, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(42, 11, 45, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(43, 11, 44, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(44, 11, 42, '2025-09-25 00:28:47', '2025-09-25 00:28:47'),
(45, 12, 47, '2025-09-25 00:40:21', '2025-09-25 00:40:21'),
(46, 12, 49, '2025-09-25 00:40:21', '2025-09-25 00:40:21'),
(47, 12, 48, '2025-09-25 00:40:21', '2025-09-25 00:40:21'),
(48, 12, 46, '2025-09-25 00:40:21', '2025-09-25 00:40:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category_entries`
--

CREATE TABLE `product_category_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_char_details`
--

CREATE TABLE `product_char_details` (
  `id` bigint UNSIGNED NOT NULL,
  `product_char_group_id` bigint UNSIGNED NOT NULL,
  `field_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_char_details`
--

INSERT INTO `product_char_details` (`id`, `product_char_group_id`, `field_title`, `input_type`, `is_required`, `created_at`, `updated_at`) VALUES
(1, 2, 'Appearance & Color', 'text', 1, '2025-09-25 00:44:53', '2025-09-25 00:44:53'),
(2, 1, 'Type of tablet plain', 'checkbox', 1, '2025-09-25 00:45:59', '2025-09-25 00:46:29'),
(3, 2, 'Dimension diameter', 'text', 1, '2025-09-25 00:47:18', '2025-09-25 00:47:18'),
(4, 1, 'Type of tablet film coated', 'radio', 1, '2025-09-25 00:48:30', '2025-09-25 00:48:30'),
(6, 1, 'Appearance & Color', 'text', 1, '2025-09-25 01:11:10', '2025-09-25 01:11:10'),
(7, 2, 'Type of tablet film', 'checkbox', 0, '2025-09-25 01:15:20', '2025-09-25 01:16:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_char_groups`
--

CREATE TABLE `product_char_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_char_groups`
--

INSERT INTO `product_char_groups` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 1, '2025-09-25 00:34:49', '2025-09-25 00:36:09'),
(2, 'Caplet', 1, '2025-09-25 00:35:32', '2025-09-25 00:35:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_name_entries`
--

CREATE TABLE `product_name_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_registration_bpom_entries`
--

CREATE TABLE `product_registration_bpom_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `title` enum('galenium','principal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `regist_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_registration_halal_entries`
--

CREATE TABLE `product_registration_halal_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `halal` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `regist_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_materials_details`
--

CREATE TABLE `raw_materials_details` (
  `id` bigint UNSIGNED NOT NULL,
  `raw_materials_group_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_materials_entries`
--

CREATE TABLE `raw_materials_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `raw_materials_group_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_materials_groups`
--

CREATE TABLE `raw_materials_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(2, 'admin', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(3, 'dephead', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59'),
(4, 'supervisor', 'web', '2025-09-24 19:57:59', '2025-09-24 19:57:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(1, 2),
(6, 2),
(10, 2),
(14, 2),
(18, 2),
(23, 2),
(27, 2),
(33, 2),
(34, 2),
(38, 2),
(42, 2),
(46, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `scope_toll_details`
--

CREATE TABLE `scope_toll_details` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `scope_toll_manufacture_entries`
--

CREATE TABLE `scope_toll_manufacture_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `scope_toll_detail_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6Dcn5twikf20MK0owZSsnF1V6GYfzmrxGaRdleJq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDRzY0VHOThpMzV0Y3lRSlhPa05PVWhkbGQ1ZFFsOXNaME1BZDU3bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90bXIvaW52aXRlLzM2ODUxOTJmLTdjZDQtNDU2Yy05MmYzLTlmNGQxODJiMGQ2MS9kcmFmdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758781401),
('Pmg84t5wtDqsmNlqdYFMvbu9scnZUCQyvvUlAwDH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicEFuY2hNQnprTXFzVUNJbHhKUkJHT3RObG9PR1BmWE9GczVWbThUbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lci9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758784845),
('qMhvOojEbTkst5OsQaQxeCfsLvpB1JaXQ5MN9dRz', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidllPWnJmZ2lYU29YTkp1ckZyODM2bzhtTnBZaldNU2MwVzZzaUpwRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1758788510);

-- --------------------------------------------------------

--
-- Struktur dari tabel `technical_mades`
--

CREATE TABLE `technical_mades` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `technical_mades`
--

INSERT INTO `technical_mades` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Galenium', 1, '2025-09-24 23:21:43', '2025-09-24 23:23:36'),
(2, 'Principal', 1, '2025-09-24 23:23:43', '2025-09-24 23:23:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_approvals`
--

CREATE TABLE `tmr_approvals` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `step` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approver_id` bigint UNSIGNED DEFAULT NULL,
  `approver_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decision` enum('approved','rejected','request_changes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `decided_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_attachments`
--

CREATE TABLE `tmr_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_drafts`
--

CREATE TABLE `tmr_drafts` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_invite_id` bigint UNSIGNED NOT NULL,
  `payload` json DEFAULT NULL,
  `status` enum('in_progress','finalized') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_progress',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tmr_drafts`
--

INSERT INTO `tmr_drafts` (`id`, `tmr_invite_id`, `payload`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'in_progress', '2025-09-24 21:44:22', '2025-09-24 21:44:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_entries`
--

CREATE TABLE `tmr_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `public_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('draft','submitted','in_review','approved','rejected','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'submitted',
  `submitted_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_histories`
--

CREATE TABLE `tmr_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `actor_id` bigint UNSIGNED DEFAULT NULL,
  `actor_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_invites`
--

CREATE TABLE `tmr_invites` (
  `id` bigint UNSIGNED NOT NULL,
  `token` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `used_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `tmr_entry_id` bigint UNSIGNED DEFAULT NULL,
  `meta` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tmr_invites`
--

INSERT INTO `tmr_invites` (`id`, `token`, `email`, `expires_at`, `used_at`, `created_by`, `tmr_entry_id`, `meta`, `created_at`, `updated_at`) VALUES
(1, '3685192f-7cd4-456c-92f3-9f4d182b0d61', 'fachru2006@gmail.com', '2025-09-26 20:49:40', NULL, 1, NULL, '[]', '2025-09-24 20:49:40', '2025-09-24 20:49:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_numbers`
--

CREATE TABLE `tmr_numbers` (
  `id` bigint UNSIGNED NOT NULL,
  `year` smallint UNSIGNED NOT NULL,
  `month` tinyint UNSIGNED NOT NULL,
  `last_no` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_signature_entries`
--

CREATE TABLE `tmr_signature_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `tmr_signature_role_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmr_signature_roles`
--

CREATE TABLE `tmr_signature_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `employee_id`, `phone`, `image_path`, `remember_token`, `created_at`, `updated_at`, `department_id`) VALUES
(1, 'Super Admin', 'fachru2006@gmail.com', '2025-09-24 20:02:26', '$2y$12$vD8axshjjDgr9T2IMxm7fe9tN98xRbCkFHH6Ah7/NvF4i.DnIjhUi', NULL, NULL, NULL, NULL, '2025-09-24 19:57:59', '2025-09-25 00:55:29', NULL),
(2, 'admin', 'fachrucoder.dev@gmail.com', '2025-09-25 00:19:57', '$2y$12$LvrE.et9S.A/Yka49.Hw7eQSzZpA9SH1OY4GTDe5Gc8yOPApqnDqW', '2131312', '54353535345', NULL, NULL, '2025-09-25 00:14:23', '2025-09-25 00:19:57', 10),
(3, 'admin', 'admin@example.com', NULL, '$2y$12$eh1jVRnxAfimTRh568xuQ.VAmq.6xqOD4uJaNjMnaOvtSLU7RWg5.', '42432423', '32432432', NULL, NULL, '2025-09-25 01:21:24', '2025-09-25 01:21:24', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `year_forecast_details`
--

CREATE TABLE `year_forecast_details` (
  `id` bigint UNSIGNED NOT NULL,
  `year_forecast_order_entry_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `year_forecast_order_entries`
--

CREATE TABLE `year_forecast_order_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `tmr_entry_id` bigint UNSIGNED NOT NULL,
  `desired_format_entry_id` bigint UNSIGNED DEFAULT NULL,
  `targeted_launch` date DEFAULT NULL,
  `targeted_price` decimal(12,2) DEFAULT NULL,
  `expectation_price` decimal(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indeks untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indeks untuk tabel `desired_format_detail_entries`
--
ALTER TABLE `desired_format_detail_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dfde_dfe` (`desired_format_entry_id`),
  ADD KEY `fk_dfde_pcd` (`product_char_detail_id`);

--
-- Indeks untuk tabel `desired_format_entries`
--
ALTER TABLE `desired_format_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dfe_tmr` (`tmr_entry_id`),
  ADD KEY `fk_dfe_pne` (`product_name_entry_id`),
  ADD KEY `fk_dfe_pcg` (`product_char_group_id`);

--
-- Indeks untuk tabel `desired_packaging_detail_entries`
--
ALTER TABLE `desired_packaging_detail_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dpde_dpe` (`desired_packaging_entry_id`),
  ADD KEY `fk_dpde_ptd` (`pack_type_detail_id`);

--
-- Indeks untuk tabel `desired_packaging_entries`
--
ALTER TABLE `desired_packaging_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dpe_tmr` (`tmr_entry_id`),
  ADD KEY `fk_dpe_ptg` (`pack_type_group_id`);

--
-- Indeks untuk tabel `desired_product_shelf_life_entries`
--
ALTER TABLE `desired_product_shelf_life_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dpsle_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `email_configs`
--
ALTER TABLE `email_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_configs_event_key_active_index` (`event_key`,`active`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `formulation_entries`
--
ALTER TABLE `formulation_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fe_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `formulation_technical_information_entries`
--
ALTER TABLE `formulation_technical_information_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ftie_tmr` (`tmr_entry_id`),
  ADD KEY `fk_ftie_tm` (`technical_made_id`);

--
-- Indeks untuk tabel `getting_toll_information_details`
--
ALTER TABLE `getting_toll_information_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `getting_toll_information_details_title_unique` (`title`);

--
-- Indeks untuk tabel `getting_toll_information_entries`
--
ALTER TABLE `getting_toll_information_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gtie_tmr` (`tmr_entry_id`),
  ADD KEY `fk_gtie_gti` (`getting_toll_information_detail_id`);

--
-- Indeks untuk tabel `indication_entries`
--
ALTER TABLE `indication_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ie_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `information_contact_tmr_entries`
--
ALTER TABLE `information_contact_tmr_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_icte_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `other_services_inquiry_entries`
--
ALTER TABLE `other_services_inquiry_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_osie_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `pack_type_details`
--
ALTER TABLE `pack_type_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pack_type_details_pack_type_group_id_foreign` (`pack_type_group_id`);

--
-- Indeks untuk tabel `pack_type_groups`
--
ALTER TABLE `pack_type_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pack_type_groups_title_unique` (`title`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `permission_categories`
--
ALTER TABLE `permission_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_categories_name_unique` (`name`);

--
-- Indeks untuk tabel `permission_category_permission`
--
ALTER TABLE `permission_category_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pc_permission_unique` (`permission_category_id`,`permission_id`),
  ADD KEY `permission_category_permission_permission_id_foreign` (`permission_id`);

--
-- Indeks untuk tabel `product_category_entries`
--
ALTER TABLE `product_category_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pce_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `product_char_details`
--
ALTER TABLE `product_char_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_char_details_product_char_group_id_foreign` (`product_char_group_id`);

--
-- Indeks untuk tabel `product_char_groups`
--
ALTER TABLE `product_char_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_char_groups_title_unique` (`title`);

--
-- Indeks untuk tabel `product_name_entries`
--
ALTER TABLE `product_name_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pne_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `product_registration_bpom_entries`
--
ALTER TABLE `product_registration_bpom_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prbe_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `product_registration_halal_entries`
--
ALTER TABLE `product_registration_halal_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prhe_tmr` (`tmr_entry_id`);

--
-- Indeks untuk tabel `raw_materials_details`
--
ALTER TABLE `raw_materials_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raw_materials_details_raw_materials_group_id_foreign` (`raw_materials_group_id`);

--
-- Indeks untuk tabel `raw_materials_entries`
--
ALTER TABLE `raw_materials_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rme_tmr` (`tmr_entry_id`),
  ADD KEY `fk_rme_rmg` (`raw_materials_group_id`);

--
-- Indeks untuk tabel `raw_materials_groups`
--
ALTER TABLE `raw_materials_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `raw_materials_groups_title_unique` (`title`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `scope_toll_details`
--
ALTER TABLE `scope_toll_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scope_toll_details_title_unique` (`title`);

--
-- Indeks untuk tabel `scope_toll_manufacture_entries`
--
ALTER TABLE `scope_toll_manufacture_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stme_tmr` (`tmr_entry_id`),
  ADD KEY `fk_stme_std` (`scope_toll_detail_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `technical_mades`
--
ALTER TABLE `technical_mades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `technical_mades_title_unique` (`title`);

--
-- Indeks untuk tabel `tmr_approvals`
--
ALTER TABLE `tmr_approvals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmr_approvals_tmr_entry_id_step_unique` (`tmr_entry_id`,`step`),
  ADD KEY `tmr_approvals_approver_id_foreign` (`approver_id`),
  ADD KEY `tmr_approvals_step_index` (`step`);

--
-- Indeks untuk tabel `tmr_attachments`
--
ALTER TABLE `tmr_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tmr_attachments_tmr_entry_id_foreign` (`tmr_entry_id`),
  ADD KEY `tmr_attachments_uploaded_by_foreign` (`uploaded_by`);

--
-- Indeks untuk tabel `tmr_drafts`
--
ALTER TABLE `tmr_drafts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmr_drafts_tmr_invite_id_unique` (`tmr_invite_id`);

--
-- Indeks untuk tabel `tmr_entries`
--
ALTER TABLE `tmr_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmr_entries_public_uuid_unique` (`public_uuid`),
  ADD KEY `tmr_entries_customer_id_foreign` (`customer_id`),
  ADD KEY `tmr_entries_number_index` (`number`),
  ADD KEY `tmr_entries_status_index` (`status`);

--
-- Indeks untuk tabel `tmr_histories`
--
ALTER TABLE `tmr_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tmr_histories_tmr_entry_id_foreign` (`tmr_entry_id`),
  ADD KEY `tmr_histories_actor_id_foreign` (`actor_id`);

--
-- Indeks untuk tabel `tmr_invites`
--
ALTER TABLE `tmr_invites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmr_invites_token_unique` (`token`),
  ADD KEY `tmr_invites_created_by_foreign` (`created_by`),
  ADD KEY `tmr_invites_tmr_entry_id_foreign` (`tmr_entry_id`),
  ADD KEY `tmr_invites_email_index` (`email`),
  ADD KEY `tmr_invites_expires_at_index` (`expires_at`);

--
-- Indeks untuk tabel `tmr_numbers`
--
ALTER TABLE `tmr_numbers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmr_numbers_year_month_unique` (`year`,`month`);

--
-- Indeks untuk tabel `tmr_signature_entries`
--
ALTER TABLE `tmr_signature_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tmrs_tmr` (`tmr_entry_id`),
  ADD KEY `fk_tmrs_role` (`tmr_signature_role_id`);

--
-- Indeks untuk tabel `tmr_signature_roles`
--
ALTER TABLE `tmr_signature_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmr_signature_roles_title_unique` (`title`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_employee_id_unique` (`employee_id`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- Indeks untuk tabel `year_forecast_details`
--
ALTER TABLE `year_forecast_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_yfd_yfoe` (`year_forecast_order_entry_id`);

--
-- Indeks untuk tabel `year_forecast_order_entries`
--
ALTER TABLE `year_forecast_order_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_yfoe_tmr` (`tmr_entry_id`),
  ADD KEY `fk_yfoe_dfe` (`desired_format_entry_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `desired_format_detail_entries`
--
ALTER TABLE `desired_format_detail_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `desired_format_entries`
--
ALTER TABLE `desired_format_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `desired_packaging_detail_entries`
--
ALTER TABLE `desired_packaging_detail_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `desired_packaging_entries`
--
ALTER TABLE `desired_packaging_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `desired_product_shelf_life_entries`
--
ALTER TABLE `desired_product_shelf_life_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `email_configs`
--
ALTER TABLE `email_configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `formulation_entries`
--
ALTER TABLE `formulation_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `formulation_technical_information_entries`
--
ALTER TABLE `formulation_technical_information_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `getting_toll_information_details`
--
ALTER TABLE `getting_toll_information_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `getting_toll_information_entries`
--
ALTER TABLE `getting_toll_information_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `indication_entries`
--
ALTER TABLE `indication_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `information_contact_tmr_entries`
--
ALTER TABLE `information_contact_tmr_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `other_services_inquiry_entries`
--
ALTER TABLE `other_services_inquiry_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pack_type_details`
--
ALTER TABLE `pack_type_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pack_type_groups`
--
ALTER TABLE `pack_type_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `permission_categories`
--
ALTER TABLE `permission_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `permission_category_permission`
--
ALTER TABLE `permission_category_permission`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `product_category_entries`
--
ALTER TABLE `product_category_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_char_details`
--
ALTER TABLE `product_char_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `product_char_groups`
--
ALTER TABLE `product_char_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `product_name_entries`
--
ALTER TABLE `product_name_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_registration_bpom_entries`
--
ALTER TABLE `product_registration_bpom_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_registration_halal_entries`
--
ALTER TABLE `product_registration_halal_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raw_materials_details`
--
ALTER TABLE `raw_materials_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raw_materials_entries`
--
ALTER TABLE `raw_materials_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raw_materials_groups`
--
ALTER TABLE `raw_materials_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `scope_toll_details`
--
ALTER TABLE `scope_toll_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `scope_toll_manufacture_entries`
--
ALTER TABLE `scope_toll_manufacture_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `technical_mades`
--
ALTER TABLE `technical_mades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tmr_approvals`
--
ALTER TABLE `tmr_approvals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tmr_attachments`
--
ALTER TABLE `tmr_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tmr_drafts`
--
ALTER TABLE `tmr_drafts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tmr_entries`
--
ALTER TABLE `tmr_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tmr_histories`
--
ALTER TABLE `tmr_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tmr_invites`
--
ALTER TABLE `tmr_invites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tmr_numbers`
--
ALTER TABLE `tmr_numbers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tmr_signature_entries`
--
ALTER TABLE `tmr_signature_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tmr_signature_roles`
--
ALTER TABLE `tmr_signature_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `year_forecast_details`
--
ALTER TABLE `year_forecast_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `year_forecast_order_entries`
--
ALTER TABLE `year_forecast_order_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `desired_format_detail_entries`
--
ALTER TABLE `desired_format_detail_entries`
  ADD CONSTRAINT `fk_dfde_dfe` FOREIGN KEY (`desired_format_entry_id`) REFERENCES `desired_format_entries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dfde_pcd` FOREIGN KEY (`product_char_detail_id`) REFERENCES `product_char_details` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desired_format_entries`
--
ALTER TABLE `desired_format_entries`
  ADD CONSTRAINT `fk_dfe_pcg` FOREIGN KEY (`product_char_group_id`) REFERENCES `product_char_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dfe_pne` FOREIGN KEY (`product_name_entry_id`) REFERENCES `product_name_entries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_dfe_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desired_packaging_detail_entries`
--
ALTER TABLE `desired_packaging_detail_entries`
  ADD CONSTRAINT `fk_dpde_dpe` FOREIGN KEY (`desired_packaging_entry_id`) REFERENCES `desired_packaging_entries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dpde_ptd` FOREIGN KEY (`pack_type_detail_id`) REFERENCES `pack_type_details` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desired_packaging_entries`
--
ALTER TABLE `desired_packaging_entries`
  ADD CONSTRAINT `fk_dpe_ptg` FOREIGN KEY (`pack_type_group_id`) REFERENCES `pack_type_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dpe_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `desired_product_shelf_life_entries`
--
ALTER TABLE `desired_product_shelf_life_entries`
  ADD CONSTRAINT `fk_dpsle_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `formulation_entries`
--
ALTER TABLE `formulation_entries`
  ADD CONSTRAINT `fk_fe_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `formulation_technical_information_entries`
--
ALTER TABLE `formulation_technical_information_entries`
  ADD CONSTRAINT `fk_ftie_tm` FOREIGN KEY (`technical_made_id`) REFERENCES `technical_mades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ftie_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `getting_toll_information_entries`
--
ALTER TABLE `getting_toll_information_entries`
  ADD CONSTRAINT `fk_gtie_gti` FOREIGN KEY (`getting_toll_information_detail_id`) REFERENCES `getting_toll_information_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_gtie_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `indication_entries`
--
ALTER TABLE `indication_entries`
  ADD CONSTRAINT `fk_ie_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `information_contact_tmr_entries`
--
ALTER TABLE `information_contact_tmr_entries`
  ADD CONSTRAINT `fk_icte_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `other_services_inquiry_entries`
--
ALTER TABLE `other_services_inquiry_entries`
  ADD CONSTRAINT `fk_osie_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pack_type_details`
--
ALTER TABLE `pack_type_details`
  ADD CONSTRAINT `pack_type_details_pack_type_group_id_foreign` FOREIGN KEY (`pack_type_group_id`) REFERENCES `pack_type_groups` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_category_permission`
--
ALTER TABLE `permission_category_permission`
  ADD CONSTRAINT `permission_category_permission_permission_category_id_foreign` FOREIGN KEY (`permission_category_id`) REFERENCES `permission_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_category_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_category_entries`
--
ALTER TABLE `product_category_entries`
  ADD CONSTRAINT `fk_pce_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_char_details`
--
ALTER TABLE `product_char_details`
  ADD CONSTRAINT `product_char_details_product_char_group_id_foreign` FOREIGN KEY (`product_char_group_id`) REFERENCES `product_char_groups` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_name_entries`
--
ALTER TABLE `product_name_entries`
  ADD CONSTRAINT `fk_pne_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_registration_bpom_entries`
--
ALTER TABLE `product_registration_bpom_entries`
  ADD CONSTRAINT `fk_prbe_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_registration_halal_entries`
--
ALTER TABLE `product_registration_halal_entries`
  ADD CONSTRAINT `fk_prhe_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `raw_materials_details`
--
ALTER TABLE `raw_materials_details`
  ADD CONSTRAINT `raw_materials_details_raw_materials_group_id_foreign` FOREIGN KEY (`raw_materials_group_id`) REFERENCES `raw_materials_groups` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `raw_materials_entries`
--
ALTER TABLE `raw_materials_entries`
  ADD CONSTRAINT `fk_rme_rmg` FOREIGN KEY (`raw_materials_group_id`) REFERENCES `raw_materials_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rme_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `scope_toll_manufacture_entries`
--
ALTER TABLE `scope_toll_manufacture_entries`
  ADD CONSTRAINT `fk_stme_std` FOREIGN KEY (`scope_toll_detail_id`) REFERENCES `scope_toll_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_stme_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmr_approvals`
--
ALTER TABLE `tmr_approvals`
  ADD CONSTRAINT `tmr_approvals_approver_id_foreign` FOREIGN KEY (`approver_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tmr_approvals_tmr_entry_id_foreign` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmr_attachments`
--
ALTER TABLE `tmr_attachments`
  ADD CONSTRAINT `tmr_attachments_tmr_entry_id_foreign` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tmr_attachments_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `tmr_drafts`
--
ALTER TABLE `tmr_drafts`
  ADD CONSTRAINT `tmr_drafts_tmr_invite_id_foreign` FOREIGN KEY (`tmr_invite_id`) REFERENCES `tmr_invites` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmr_entries`
--
ALTER TABLE `tmr_entries`
  ADD CONSTRAINT `tmr_entries_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `tmr_histories`
--
ALTER TABLE `tmr_histories`
  ADD CONSTRAINT `tmr_histories_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tmr_histories_tmr_entry_id_foreign` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmr_invites`
--
ALTER TABLE `tmr_invites`
  ADD CONSTRAINT `tmr_invites_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tmr_invites_tmr_entry_id_foreign` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `tmr_signature_entries`
--
ALTER TABLE `tmr_signature_entries`
  ADD CONSTRAINT `fk_tmrs_role` FOREIGN KEY (`tmr_signature_role_id`) REFERENCES `tmr_signature_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tmrs_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `year_forecast_details`
--
ALTER TABLE `year_forecast_details`
  ADD CONSTRAINT `fk_yfd_yfoe` FOREIGN KEY (`year_forecast_order_entry_id`) REFERENCES `year_forecast_order_entries` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `year_forecast_order_entries`
--
ALTER TABLE `year_forecast_order_entries`
  ADD CONSTRAINT `fk_yfoe_dfe` FOREIGN KEY (`desired_format_entry_id`) REFERENCES `desired_format_entries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_yfoe_tmr` FOREIGN KEY (`tmr_entry_id`) REFERENCES `tmr_entries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
