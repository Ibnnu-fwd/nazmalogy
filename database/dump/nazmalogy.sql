-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Sep 2023 pada 09.01
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nazmalogy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `language` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `publish_status` tinyint(1) NOT NULL DEFAULT 0,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `course_category_id`, `name`, `thumbnail`, `price`, `description`, `language`, `level`, `phone`, `is_active`, `publish_status`, `author_id`, `created_at`, `updated_at`, `discount`) VALUES
(1, 1, 'Memulai Strategi Bisnis Digital', '6500c09e95b2d.jpg', 750000, 'Dalam era digital yang terus berkembang, e-bisnis menjadi landasan bagi pertumbuhan dan keberlanjutan usaha. Kursus E-Bisnis kami membuka pintu untuk memahami dunia bisnis online yang dinamis dan memberikan Anda alat yang Anda butuhkan untuk meraih kesuksesan.\r\n\r\nDalam kursus ini, Anda akan mempelajari konsep-konsep kunci e-bisnis, termasuk strategi pemasaran digital, manajemen toko online, analisis data, dan inovasi teknologi. Kami akan membantu Anda memahami bagaimana membangun dan mengelola bisnis online yang menguntungkan serta menghadapi persaingan dalam dunia digital.', 'Indonesia', 'beginner', '6287834671064', 1, 0, 1, '2023-09-12 12:46:35', '2023-09-12 21:41:44', 700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `icon_color` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `description`, `icon`, `icon_color`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bisnis', 'Menggali potensi bisnis online Anda dengan kursus bisnis kami yang komprehensif. Temukan strategi terbaru untuk sukses dalam dunia e-commerce', 'flag-outline', '#800080', 1, '2023-09-12 12:45:03', '2023-09-12 21:34:00'),
(2, 'E-Business', 'Kursus E-Bisnis kami akan membantu Anda memahami dinamika bisnis online, mulai dari pemasaran digital hingga manajemen sumber daya. Tingkatkan keahlian Anda dan sukses dalam dunia digital.', 'wallet-outline', '#5AA54C', 1, '2023-09-12 21:26:24', '2023-09-12 21:34:08'),
(3, 'Manajemen Proyek', 'Sukses dalam bisnis membutuhkan manajemen proyek yang efektif. Temukan teknik terbaru dalam kursus Manajemen Proyek kami dan tingkatkan kemampuan Anda dalam menghadapi proyek-proyek yang kompleks', 'archive-outline', '#EA5A32', 1, '2023-09-12 21:27:43', '2023-09-12 21:34:14'),
(4, 'Entrepreneurship', 'Pelajari seni dan ilmu menjadi seorang pengusaha sukses. Temukan kursus kewirausahaan kami yang akan membimbing Anda melalui langkah-langkah penting dalam memulai dan mengelola bisnis Anda sendiri', 'bag-check-outline', '#2D3275', 1, '2023-09-12 21:28:56', '2023-09-12 21:34:21'),
(5, 'Marketing', 'Bergabunglah dengan kursus pemasaran kami dan pelajari bagaimana membangun merek yang kuat dan mengembangkan strategi pemasaran yang efektif. Tingkatkan kemampuan Anda dalam memasarkan produk atau layanan dengan baik.', 'bag-outline', '#E94543', 1, '2023-09-12 21:30:30', '2023-09-12 21:34:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_chapters`
--

CREATE TABLE `course_chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `playlist_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `description` longtext DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `course_chapters`
--

INSERT INTO `course_chapters` (`id`, `playlist_id`, `title`, `is_active`, `description`, `video_url`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'LU LAGI - Pengantar E-Business | PART 1', 1, 'Kali ini kita akan belajar tentang Pengantar E-Business,\r\nIkuti terus yah :)\r\nJangan lupa like, comment & share video ini ke teman2 kalian :)\r\n..........\r\nSilahkan kunjungi Sosial Media Kami di :\r\n📸 Wiwit Ab          : https://www.instagram.com/wiwit_ab/\r\n📸 NaZMa Office : https://www.instagram.com/nazma_office/\r\n..........', 'https://www.youtube.com/watch?v=qYgONN4EyGg&list=PLfZkg3CNjsF8OVmGdj55V_TWYHCTsNiNZ&index=1&pp=iAQB', 498, '2023-09-12 23:48:10', '2023-09-12 23:48:10'),
(2, 1, 'LU LAGI - Pengantar E-Business | PART 2', 1, 'Kali ini kita akan belajar tentang Pengantar E-Business,\r\nIkuti terus yah :)\r\nJangan lupa like, comment & share video ini ke teman2 kalian :)\r\n..........\r\nSilahkan kunjungi Sosial Media Kami di :\r\n📸 Wiwit Ab          : https://www.instagram.com/wiwit_ab/\r\n📸 NaZMa Office : https://www.instagram.com/nazma_office/\r\n..........', 'https://www.youtube.com/watch?v=pIybk5waJ_Y&list=PLfZkg3CNjsF8OVmGdj55V_TWYHCTsNiNZ&index=2&pp=iAQB', 462, '2023-09-12 23:48:18', '2023-09-12 23:48:18'),
(3, 2, 'LU LAGI - Digital Payment', 1, 'Kali ini kita akan belajar tentang Digital Payment,\r\nIkuti terus yah :)\r\nJangan lupa like, comment & share video ini ke teman2 kalian :)\r\n..........\r\nSilahkan kunjungi Sosial Media Kami di :\r\n📸 Wiwit Ab          : https://www.instagram.com/wiwit_ab/\r\n📸 NaZMa Office : https://www.instagram.com/nazma_office/\r\n..........', 'https://www.youtube.com/watch?v=NvWGND42HpQ&list=PLfZkg3CNjsF8OVmGdj55V_TWYHCTsNiNZ&index=3&pp=iAQB', 494, '2023-09-12 23:48:31', '2023-09-12 23:48:31'),
(4, 2, 'LU LAGI - Analisis Bisnis | PART 1', 1, 'Kali ini kita akan belajar tentang Analisis Bisnis,\r\nIkuti terus yah :)\r\nJangan lupa like, comment & share video ini ke teman2 kalian :)\r\n..........\r\nSilahkan kunjungi Sosial Media Kami di :\r\n📸 Wiwit Ab          : https://www.instagram.com/wiwit_ab/\r\n📸 NaZMa Office : https://www.instagram.com/nazma_office/\r\n..........', 'https://www.youtube.com/watch?v=gMygNGcW_jE&list=PLfZkg3CNjsF8OVmGdj55V_TWYHCTsNiNZ&index=4&pp=iAQB', 385, '2023-09-12 23:48:42', '2023-09-12 23:48:42'),
(5, 2, 'LU LAGI - Analisis Bisnis | PART 2', 1, 'Kali ini kita akan belajar tentang Analisis Bisnis,\r\nIkuti terus yah :)\r\nJangan lupa like, comment & share video ini ke teman2 kalian :)\r\n..........\r\nSilahkan kunjungi Sosial Media Kami di :\r\n📸 Wiwit Ab          : https://www.instagram.com/wiwit_ab/\r\n📸 NaZMa Office : https://www.instagram.com/nazma_office/\r\n..........', 'https://www.youtube.com/watch?v=6k8rzYjghA4&list=PLfZkg3CNjsF8OVmGdj55V_TWYHCTsNiNZ&index=5&pp=iAQB', 324, '2023-09-12 23:48:52', '2023-09-12 23:48:52'),
(6, 3, 'LU LAGI - Pengaruh E-Business', 1, 'Kali ini kita akan belajar tentang Apa saja yang dipengaruhi E-business dalam proses-proses bisnis yang terjadi ?\r\nIkuti terus yah :)\r\nJangan lupa like, comment & share video ini ke teman2 kalian :)\r\n..........\r\nSilahkan kunjungi Sosial Media Kami di :\r\n📸 Wiwit Ab          : https://www.instagram.com/wiwit_ab/\r\n📸 NaZMa Office : https://www.instagram.com/nazma_office/\r\n..........', 'https://www.youtube.com/watch?v=uMsau7hjbfc&list=PLfZkg3CNjsF8OVmGdj55V_TWYHCTsNiNZ&index=6&pp=iAQB', 508, '2023-09-12 23:49:05', '2023-09-12 23:49:05'),
(7, 3, 'LU LAGI - Strategi E-Business', 1, 'Kali ini kita akan belajar tentang Strategi E-Business,\r\nIkuti terus yah :)\r\nJangan lupa like, comment & share video ini ke teman2 kalian :)\r\n..........\r\nSilahkan kunjungi Sosial Media Kami di :\r\n📸 Wiwit Ab          : https://www.instagram.com/wiwit_ab/\r\n📸 NaZMa Office : https://www.instagram.com/nazma_office/\r\n..........', 'https://www.youtube.com/watch?v=_Mfnz5Itg8c&list=PLfZkg3CNjsF8OVmGdj55V_TWYHCTsNiNZ&index=7&pp=iAQB', 519, '2023-09-12 23:49:14', '2023-09-12 23:49:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_chapter_reviews`
--

CREATE TABLE `course_chapter_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_testimonials`
--

CREATE TABLE `general_testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_11_013516_create_general_testimonials_table', 1),
(6, '2023_09_11_013759_create_course_categories_table', 1),
(7, '2023_09_11_014006_create_courses_table', 1),
(8, '2023_09_11_014257_create_playlists_table', 1),
(9, '2023_09_11_014907_create_course_chapters_table', 1),
(10, '2023_09_11_015223_create_course_chapter_reviews_table', 1),
(11, '2023_09_11_015329_create_quizzes_table', 1),
(12, '2023_09_11_015448_create_questions_table', 1),
(13, '2023_09_11_015751_create_user_course_chapter_logs_table', 1),
(14, '2023_09_11_020007_create_user_quiz_logs_table', 1),
(15, '2023_09_11_020136_create_transactions_table', 1),
(16, '2023_09_12_133249_add_discount_course', 1),
(17, '2023_09_12_185944_change_duration_course_chapters', 1),
(18, '2023_09_12_194129_change_foreign_quiz', 1),
(19, '2023_09_13_015350_create_point_types_table', 2),
(20, '2023_09_13_015522_create_points_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `playlists`
--

INSERT INTO `playlists` (`id`, `course_id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pengantar', 1, '2023-09-12 12:47:40', '2023-09-12 12:47:40'),
(2, 1, 'Bisnis Analisis', 1, '2023-09-12 12:47:51', '2023-09-12 12:47:51'),
(3, 1, 'Penutup', 1, '2023-09-12 12:47:55', '2023-09-12 12:47:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `point_type_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `point_types`
--

CREATE TABLE `point_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `point_types`
--

INSERT INTO `point_types` (`id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(2, 'Registrasi', 10, '2023-09-12 19:14:44', '2023-09-12 19:14:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `description` longtext DEFAULT NULL,
  `option_1` varchar(255) NOT NULL,
  `option_2` varchar(255) NOT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `title`, `is_active`, `description`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `created_at`, `updated_at`) VALUES
(2, 1, 'Qui corrupti perspi', 1, 'Ratione dolore fugia', 'Est saepe excepturi', 'Quis exercitation ea', 'Ducimus iusto aperi', 'Officia dolore vero', 'B', '2023-09-12 13:43:55', '2023-09-12 13:43:55'),
(3, 1, 'Tenetur commodo ipsu', 1, 'Velit qui unde repud', 'Sapiente repellendus', 'Omnis porro quod qui', 'Ipsum aliqua Digni', 'In id optio deseru', 'C', '2023-09-12 13:44:00', '2023-09-12 13:44:00'),
(4, 1, 'Similique adipisicin', 1, 'Blanditiis et sunt a', 'Cupidatat omnis quis', 'Voluptatem qui nihil', 'Reiciendis asperiore', 'Ipsum voluptatum fug', 'A', '2023-09-12 13:44:05', '2023-09-12 13:44:05'),
(5, 1, 'Fugiat est qui beata', 1, 'Autem est voluptas i', 'Eius incididunt quae', 'Recusandae Optio e', 'Voluptates voluptati', 'Quis facere veniam', 'C', '2023-09-12 13:44:11', '2023-09-12 13:44:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `playlist_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `is_active`, `description`, `created_at`, `updated_at`, `playlist_id`) VALUES
(1, 'Contoh', 1, 'contoh', '2023-09-12 13:14:35', '2023-09-12 13:14:35', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `status` enum('pending','paid','confirm','cancel') NOT NULL DEFAULT 'pending',
  `payment_proof_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `avatar` longtext DEFAULT NULL,
  `role` enum('admin','user','facilitator') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `email_verified_at`, `password`, `gender`, `phone`, `birth`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$6Gek6lgaafrOVRHR7L09JOZwUtsdk4XedLy8k6M4vk2RZ4xuykkTC', NULL, NULL, NULL, NULL, 'admin', NULL, '2023-09-12 12:43:25', '2023-09-12 12:43:25'),
(2, 'Moh Ibnu Abdurrohman Jhon', 'ibnu@mail.com', NULL, '$2y$10$JLeKCG1fnwVn/d52Auv7BOqsUTTs0IQfgPpfODYjaobfj2tdqDuH2', 'L', '6287834671064', '2002-04-22', '65013772c59c9.jpg', 'user', NULL, '2023-09-12 19:56:33', '2023-09-12 21:18:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_course_chapter_logs`
--

CREATE TABLE `user_course_chapter_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_chapter_id` bigint(20) UNSIGNED NOT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_quiz_logs`
--

CREATE TABLE `user_quiz_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `correct_answers` int(11) NOT NULL DEFAULT 0,
  `finished_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_course_category_id_foreign` (`course_category_id`),
  ADD KEY `courses_author_id_foreign` (`author_id`);

--
-- Indeks untuk tabel `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_chapters`
--
ALTER TABLE `course_chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_chapters_playlist_id_foreign` (`playlist_id`);

--
-- Indeks untuk tabel `course_chapter_reviews`
--
ALTER TABLE `course_chapter_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `general_testimonials`
--
ALTER TABLE `general_testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_testimonials_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlists_course_id_foreign` (`course_id`);

--
-- Indeks untuk tabel `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_user_id_foreign` (`user_id`),
  ADD KEY `points_point_type_id_foreign` (`point_type_id`);

--
-- Indeks untuk tabel `point_types`
--
ALTER TABLE `point_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indeks untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_playlist_id_foreign` (`playlist_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_course_id_foreign` (`course_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_course_chapter_logs`
--
ALTER TABLE `user_course_chapter_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_course_chapter_logs_user_id_foreign` (`user_id`),
  ADD KEY `user_course_chapter_logs_course_chapter_id_foreign` (`course_chapter_id`);

--
-- Indeks untuk tabel `user_quiz_logs`
--
ALTER TABLE `user_quiz_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_quiz_logs_user_id_foreign` (`user_id`),
  ADD KEY `user_quiz_logs_quiz_id_foreign` (`quiz_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `course_chapters`
--
ALTER TABLE `course_chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `course_chapter_reviews`
--
ALTER TABLE `course_chapter_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `general_testimonials`
--
ALTER TABLE `general_testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `point_types`
--
ALTER TABLE `point_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_course_chapter_logs`
--
ALTER TABLE `user_course_chapter_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_quiz_logs`
--
ALTER TABLE `user_quiz_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `courses_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_chapters`
--
ALTER TABLE `course_chapters`
  ADD CONSTRAINT `course_chapters_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`);

--
-- Ketidakleluasaan untuk tabel `general_testimonials`
--
ALTER TABLE `general_testimonials`
  ADD CONSTRAINT `general_testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Ketidakleluasaan untuk tabel `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_point_type_id_foreign` FOREIGN KEY (`point_type_id`) REFERENCES `point_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `points_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_course_chapter_logs`
--
ALTER TABLE `user_course_chapter_logs`
  ADD CONSTRAINT `user_course_chapter_logs_course_chapter_id_foreign` FOREIGN KEY (`course_chapter_id`) REFERENCES `course_chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_course_chapter_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_quiz_logs`
--
ALTER TABLE `user_quiz_logs`
  ADD CONSTRAINT `user_quiz_logs_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `user_quiz_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
