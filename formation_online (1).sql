-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 oct. 2024 à 18:52
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formation_online`
--

-- --------------------------------------------------------

--
-- Structure de la table `audios`
--

CREATE TABLE `audios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `audio_path` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `lien_video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `audios`
--

INSERT INTO `audios` (`id`, `audio_path`, `titre`, `lien_video`, `created_at`, `updated_at`) VALUES
(1, 'audios/zpF4ouHlLEKosaKlvsXrxaxNYLyfBQWVVRBYXLks.mp3', 'Google Dse', NULL, '2024-10-18 09:01:16', '2024-10-18 09:01:16'),
(2, 'audios/NrrPYKczpKR4qaZZDmTjY6yUIeUra2P3p7b39Y9H.mp3', 'Google Docs', NULL, '2024-10-18 12:56:58', '2024-10-18 12:56:58'),
(6, 'audios/iiMpC8CLorwVN93mIgbD0jCAf9vCzXDLJegITIyj.mp3', 'BASE SAGE Audio 1', NULL, '2024-10-18 13:20:18', '2024-10-18 13:31:33');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Informatique', 'La catégorie Informatique couvre un large éventail de sujets liés aux technologies de l\'information et de la communication. Elle inclut des formations sur les langages de programmation, le développement web, la cybersécurité, l\'intelligence artificielle, et les bases de données.', NULL, '2024-10-14 07:45:37'),
(3, 'Commerciale', 'La catégorie commerciale englobe l\'ensemble des activités liées à la vente, à la distribution et à la promotion de produits et services. Elle implique une compréhension approfondie des marchés, des consommateurs et des stratégies de vente. Les professionnels du commerce doivent maîtriser des compétences telles que la négociation, la gestion de la relation client, et l\'analyse des tendances du marché.', NULL, '2024-09-30 14:15:24'),
(12, 'Comptabilité', 'Comptabilité', '2024-10-05 07:55:36', '2024-10-05 07:55:36'),
(18, 'Enregsitrement Vocale', 'Cette sous-catégorie se concentre sur l\'art et la technique de l\'enregistrement vocal. Que vous soyez un chanteur, un narrateur ou un podcaster, vous trouverez ici des ressources et des outils pour améliorer vos compétences d\'enregistrement. Découvrez des techniques de capture sonore, des conseils sur le choix du matériel, ainsi que des astuces pour le traitement audio. Plongez dans le monde de l\'enregistrement vocal et apprenez à produire des enregistrements de haute qualité qui capturent pleinement l\'émotion et la clarté de votre voix.', '2024-10-18 15:51:09', '2024-10-18 15:51:09');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `user_id`, `formation_id`, `created_at`, `updated_at`) VALUES
(22, 26, 20, '2024-10-02 14:43:48', '2024-10-02 14:43:48'),
(28, 23, 20, '2024-10-04 14:29:08', '2024-10-04 14:29:08'),
(42, 24, 52, '2024-10-15 07:53:18', '2024-10-15 07:53:18'),
(43, 55, 20, '2024-10-15 08:22:44', '2024-10-15 08:22:44');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `souscategory_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'vidéo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `description`, `image_url`, `created_at`, `updated_at`, `category_id`, `souscategory_id`, `type`) VALUES
(20, 'Python : La Formation Complète 2', 'We\'ve put together this series of Getting Started guides to help you learn the Vimeo API. Fully functional scripts in multiple languages await you. If you\'ve worked with APIs in general before, or if you\'ve already dipped your toe into ours, you might want to skip to the guide of your choice. You can explore them in any order. They\'re like a choose-your-own-adventure story, only every branch leads to the best-case ending.', 'images/vNH9Aquhak0YKIpk9D8EqCxZWV3zllNLhy0lf5LY.jpg', '2024-09-27 08:29:26', '2024-10-04 14:45:21', 1, 2, 'vidéo'),
(25, 'Formation Comptabilité', 'Formation Comptabilité', 'images/qvpZNgF5VeRhIc7dDHJKlD3N17P8nW9fCyBU8IWj.png', '2024-10-05 07:58:25', '2024-10-08 12:37:05', 12, 21, 'vidéo'),
(34, 'Formation  Backlinks', 'Formation  Backlinks', 'images/SSu6JBp6DARvj62nuseVEwRctwHCd50l2x19PqRH.jpg', '2024-10-09 13:31:03', '2024-10-14 12:46:46', 1, 34, 'vidéo'),
(50, 'Formation Comtabilité audio', 'Formation Sur BASE SAGE pour mieux comprendre l\'utilisation', 'images/A2Mm0dOqKeuHq620LftVTgZclLpb0BeYBoTwaRZG.png', '2024-10-14 09:04:40', '2024-10-14 09:04:40', 12, 21, 'audio'),
(52, 'Test Audio', 'test', 'images/3s0F96rKB2qXwrcVrDRHYb4BEjDtYAXuQNHxqiYg.jpg', '2024-10-14 13:00:31', '2024-10-14 13:00:31', 3, 6, 'audio'),
(63, 'Formation BackLinks Essai', 'Desctiption', 'images/WXI6dDB4vAmuPIcLoI3D9wktHsqMDgd2L8tj6Fkc.webp', '2024-10-18 08:34:05', '2024-10-18 08:34:05', 1, 5, 'vidéo'),
(65, 'Formation BackLinks Essai2', 'zaeazea', 'images/W88T7GHtFX7TLJT4Hl5rKqPwF1laLTAs03Xrna4y.png', '2024-10-18 08:42:33', '2024-10-18 08:42:33', 3, 6, 'vidéo'),
(67, 'Formation BackLinks Essa selecct 4', 'tggg', 'images/HTNpQpXhdNzhH5M24yzH8SgLbGOYJiYOcpaHDKn9.png', '2024-10-18 08:44:47', '2024-10-18 08:44:47', 1, 3, 'vidéo'),
(68, 'Audio Formation essai', 'ddd', 'images/egPv38KBEx1axZBptHeFvfpJg8cyOUsRr76knUbU.jpg', '2024-10-18 08:58:16', '2024-10-18 08:58:16', 1, 3, 'audio'),
(70, 'Backlinks (Audio)', 'Comment créer, ajouter des backlinks dans votre site web', 'images/z2DWJfpIKRYm7b6ZWBypGS0qIMghf8d5XYjMGThd.png', '2024-10-18 09:01:16', '2024-10-18 09:12:19', 1, 36, 'audio'),
(73, 'Example Formation', 'Example Formation', 'images/ZRrN5MeXleamdKcEjbyRT4ws15olrlLrSmuvRKuc.png', '2024-10-18 15:28:28', '2024-10-18 15:28:28', 1, 2, 'vidéo');

-- --------------------------------------------------------

--
-- Structure de la table `formation_audios`
--

CREATE TABLE `formation_audios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ordre` int(11) NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `audio_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_audios`
--

INSERT INTO `formation_audios` (`id`, `ordre`, `formation_id`, `audio_id`, `created_at`, `updated_at`) VALUES
(8, 1, 50, 6, '2024-10-18 13:20:18', '2024-10-18 13:31:13');

-- --------------------------------------------------------

--
-- Structure de la table `formation_video`
--

CREATE TABLE `formation_video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_video`
--

INSERT INTO `formation_video` (`id`, `order`, `formation_id`, `video_id`, `created_at`, `updated_at`) VALUES
(11, 2, 25, 14, '2024-10-18 13:35:26', '2024-10-18 13:35:26'),
(12, 2, 73, 15, '2024-10-18 15:28:28', '2024-10-18 15:28:28'),
(13, 1, 73, 14, '2024-10-18 15:28:28', '2024-10-18 15:28:28');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2024_09_13_161225_create_categories_table', 1),
(11, '2024_09_13_161238_create_souscategories_table', 2),
(12, '2014_10_12_000000_create_users_table', 3),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(14, '2019_08_19_000000_create_failed_jobs_table', 3),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(16, '2024_09_13_161439_create_favoris_table', 4),
(17, '2024_09_17_172257_create_histories_table', 5),
(18, '2024_09_18_091518_update_users_table', 6),
(19, '2024_09_18_094728_update_categories_table', 7),
(20, '2024_09_18_113121_update_formations_table', 8),
(22, '2024_09_18_113750_create_formation_videos_table', 9),
(23, '2024_09_18_145807_create_blocked_formation_users_table', 10),
(24, '2024_09_18_153000_update_histories_table', 11),
(25, '2024_09_19_112923_update_souscategories_table', 12),
(27, '2024_09_19_113811_add_column_to_souscategories_table', 13),
(28, '2024_09_19_115948_add_column_to_categories_table', 14),
(30, '2024_09_24_094035_user_subcategories_table', 15),
(31, '2024_09_24_094218_modify_users_table', 16),
(32, '2024_09_25_112414_add_column_to_formations_table', 17),
(35, '2024_10_12_101248_add_column_to_formations_table', 18),
(36, '2024_10_12_101600_create_formation_audios_table', 19),
(37, '2024_10_17_111545_create_videos_table', 20),
(38, '2024_10_17_111538_create_audio_table', 21),
(39, '2024_10_17_114006_create_formation_video_table', 22);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(32, 'App\\Models\\User', 16, 'auth_token', 'f5f155b92e063aad250aaa5bb7af6483fd56cf9b430a067f523970ba984e78a9', '[\"*\"]', NULL, NULL, '2024-09-24 13:49:43', '2024-09-24 13:49:43'),
(87, 'App\\Models\\User', 26, 'auth_token', '5f40707c7484de10554c289f00626b62c01442a919eed1c8ffe1ebf2d43df51a', '[\"*\"]', NULL, NULL, '2024-10-02 14:33:40', '2024-10-02 14:33:40'),
(152, 'App\\Models\\User', 43, 'auth_token', '4393d0e05216f62b50a8e289963709268bc22314d8aadf39ba6f86c04f5b1d24', '[\"*\"]', NULL, NULL, '2024-10-14 15:58:28', '2024-10-14 15:58:28'),
(159, 'App\\Models\\User', 43, 'auth_token', '51f539b64599efcef71326c28baf827c7294cf6299a0f897b2bb4254247eb504', '[\"*\"]', NULL, NULL, '2024-10-15 09:25:37', '2024-10-15 09:25:37'),
(161, 'App\\Models\\User', 24, 'auth_token', '05defbaf3bde62cc860b76dceec8395b4fe3cdf32df25161c0f789f9e3893d36', '[\"*\"]', NULL, NULL, '2024-10-15 13:47:01', '2024-10-15 13:47:01'),
(164, 'App\\Models\\User', 43, 'auth_token', '644cf48710a652126aee1bfcfb67e8797e17af1436e6c8ff92909f8c35b3ed35', '[\"*\"]', NULL, NULL, '2024-10-16 15:53:58', '2024-10-16 15:53:58'),
(165, 'App\\Models\\User', 22, 'auth_token', 'd74ad93dee5da20f22b0e7c36e885c179c85c6f0d1aa2239a101dd6cddbfb103', '[\"*\"]', NULL, NULL, '2024-10-17 09:51:43', '2024-10-17 09:51:43'),
(166, 'App\\Models\\User', 22, 'auth_token', '6f781400319b6db9a8fbf58d27528451078ce55a8894ff7fd6d4830818d3dfc1', '[\"*\"]', NULL, NULL, '2024-10-17 12:41:58', '2024-10-17 12:41:58'),
(167, 'App\\Models\\User', 22, 'auth_token', '2bc6598087a3ec83de6405c2c015d4bd9795201f90fb81ddca9fda825013b8fa', '[\"*\"]', NULL, NULL, '2024-10-18 07:48:21', '2024-10-18 07:48:21'),
(168, 'App\\Models\\User', 43, 'auth_token', '3fa6610b3d8d359db5cd21312d151178d9d66612451201d3fddfcf1db24b648e', '[\"*\"]', NULL, NULL, '2024-10-18 13:34:00', '2024-10-18 13:34:00');

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

CREATE TABLE `souscategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `souscategories`
--

INSERT INTO `souscategories` (`id`, `nom`, `description`, `created_at`, `updated_at`, `category_id`) VALUES
(2, 'Réseaux', 'le réseaux permet d\'assuerer la securité des données', NULL, '2024-10-14 07:45:27', 1),
(3, 'développement', 'Le développement est le processus de création, de conception et de maintenance de logiciels et d\'applications. Il englobe une variété de disciplines, y compris le développement web, le développement d\'applications mobiles, le développement de logiciels et bien plus encore. Cette sous-catégorie couvre les compétences essentielles.', NULL, NULL, 1),
(4, 'commerciale téléphonique', 'La commerciale téléphonique consiste à promouvoir et vendre des produits ou services par le biais d\'appels téléphoniques. Ce domaine requiert des compétences spécifiques en communication, en écoute active et en persuasion. Les professionnels de la vente par téléphone doivent savoir établir rapidement un rapport avec leurs interlocuteurs, comprendre leurs besoins et proposer des solutions adaptées. Cette sous-catégorie couvre les techniques de prospection, les stratégies de suivi client et les meilleures pratiques pour maximiser les ventes par téléphone. Que vous soyez débutant ou expérimenté, vous trouverez ici des outils et des conseils pour améliorer vos compétences en vente téléphonique et optimiser vos résultats.', NULL, NULL, 3),
(5, 'Référencement', 'Déscription simple sur la sous catégorie', '2024-09-30 12:20:37', '2024-10-08 12:29:55', 1),
(6, 'Commerciale terrain', 'Déscription', '2024-09-30 12:21:23', '2024-09-30 12:21:23', 3),
(21, 'Base SAGE', 'Sage format base Sage Formation', '2024-10-05 07:56:05', '2024-10-05 07:56:05', 12),
(34, 'BackLinks Vidéos', 'Ajout des backlinks', '2024-10-09 10:47:46', '2024-10-11 15:58:41', 1),
(36, 'Backlinks audios', 'dsdsqd', '2024-10-11 15:59:28', '2024-10-11 15:59:28', 1),
(39, 'Facebook', 'Cette sous-catégorie se concentre sur l\'art et la technique de l\'enregistrement vocal. Que vous soyez un chanteur, un narrateur ou un podcaster, vous trouverez ici des ressources et des outils pour améliorer vos compétences d\'enregistrement. Découvrez des techniques de capture sonore, des conseils sur le choix du matériel, ainsi que des astuces pour le traitement audio. Plongez dans le monde de l\'enregistrement vocal et apprenez à produire des enregistrements de haute qualité qui capturent pleinement l\'émotion et la clarté de votre voix.', '2024-10-18 15:52:06', '2024-10-18 15:52:06', 18),
(40, 'WhatsApp', 'Cette sous-catégorie se concentre sur l\'art et la technique de l\'enregistrement vocal. Que vous soyez un chanteur, un narrateur ou un podcaster, vous trouverez ici des ressources et des outils pour améliorer vos compétences d\'enregistrement. Découvrez des techniques de capture sonore, des conseils sur le choix du matériel, ainsi que des astuces pour le traitement audio. Plongez dans le monde de l\'enregistrement vocal et apprenez à produire des enregistrements de haute qualité qui capturent pleinement l\'émotion et la clarté de votre voix.', '2024-10-18 15:52:17', '2024-10-18 15:52:17', 18);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` enum('admin','super_admin','stagiaire') NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `permission`, `category_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Admin 2', 'admin55@example.com', '$2y$12$a3McKy8yj14kMKZg3DAVRuu2h8uH/G3v97hx/UxoKhywJ/zeErzw.', 'admin', NULL, NULL, NULL, '2024-09-24 08:16:57', '2024-10-08 12:38:57'),
(21, 'TRainee 44', 'trainee44@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'stagiaire', 1, NULL, NULL, '2024-09-24 13:08:52', '2024-09-24 13:08:52'),
(22, 'Fatima ezzahra', 'superadmin@example.com', '$2y$12$oxJcSZMlOeOltWEKbahOKO0FzFEobvMtllpse3XhNqu.KONLUIyaC', 'super_admin', NULL, NULL, NULL, '2024-09-25 08:53:55', '2024-10-08 12:37:21'),
(23, 'utilisateurM1', 'utilisateur1@gmail.com', '$2y$12$5Vzz2OtzDzyZYyzXp5cIf.upVUmYD9qVEA5epMHl4pPVNF2POWfga', 'stagiaire', 1, NULL, NULL, '2024-09-28 10:35:48', '2024-09-28 10:35:48'),
(24, 'Marwa', 'marwa@example.com', '$2y$12$zmLCQOgt890fhe2l0r8tPezVJmaTLtQ2YiB9nhxKKEMt5BqRCKrQW', 'stagiaire', 12, NULL, NULL, '2024-10-01 08:08:32', '2024-10-15 07:43:44'),
(26, 'Douaa Mori', 'douaa@email.com', '$2y$12$0baJ6.g6FWRup8rfdQTfLer/c5RCumY1JzoZekd/RNLR2V4qQsc5O', 'stagiaire', 1, NULL, NULL, '2024-10-02 14:33:16', '2024-10-08 12:36:35'),
(29, 'Ghizlane', 'ghizlane@gmail.com', '$2y$12$OFMgmlJm84LQkFnXqGrK8ubFsJHoIqDlDkwCdNiAGmCN0irGCXGG.', 'stagiaire', 3, NULL, NULL, '2024-10-03 13:23:42', '2024-10-04 14:09:17'),
(32, 'Alaui', 'alaui@gm.com', '$2y$12$ZvBF4uuQM3AqMBrkojqGR.oe0GFYea7a9yYdNTRqi2fGEmTXGv3mG', 'stagiaire', 1, NULL, NULL, '2024-10-03 13:30:39', '2024-10-03 13:30:39'),
(43, 'Rya', 'rya@gmail.com', '$2y$12$c77IiV84QXFgxEnuHIjxzuIanrw7ds88R093KEuOJM2VqfXYmyf3a', 'stagiaire', 12, NULL, NULL, '2024-10-05 08:00:14', '2024-10-11 10:05:18'),
(51, 'Admin N', 'admin@example.com', '$2y$12$Lb9RmKtc3RNvog7CvBWJouwe8NKQrlowLaE6Id8M0C5lWqTU.iMA2', 'admin', NULL, NULL, NULL, '2024-10-07 15:48:03', '2024-10-11 10:04:47'),
(55, 'Trainee 5', 'trainee5@gmail.com', '$2y$12$p8LFVXNUMWVxzx7kdNb37e2ABtrqj8RpG2TDvtv1D8A84LjqhSaaq', 'stagiaire', 1, NULL, NULL, '2024-10-12 08:10:00', '2024-10-12 08:10:00'),
(56, 'ess', 'ess@example.com', '$2y$12$ePj99.hFaw7ChMFD6HhWA.7GiapJkweE7WSMWDFTmX8XWxXEySkve', 'stagiaire', NULL, NULL, NULL, '2024-10-17 09:55:50', '2024-10-17 09:55:50');

-- --------------------------------------------------------

--
-- Structure de la table `user_subcategories`
--

CREATE TABLE `user_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `souscategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_subcategories`
--

INSERT INTO `user_subcategories` (`id`, `user_id`, `souscategory_id`, `created_at`, `updated_at`) VALUES
(4, 21, 2, '2024-09-24 13:08:52', '2024-09-24 13:08:52'),
(5, 23, 2, '2024-09-28 10:35:48', '2024-09-28 10:35:48'),
(6, 24, 4, '2024-10-01 08:08:32', '2024-10-01 08:08:32'),
(7, 24, 6, '2024-10-01 08:08:32', '2024-10-01 08:08:32'),
(9, 26, 2, '2024-10-02 14:33:16', '2024-10-02 14:33:16'),
(10, 26, 3, '2024-10-02 14:33:16', '2024-10-02 14:33:16'),
(11, 26, 5, '2024-10-02 14:33:16', '2024-10-02 14:33:16'),
(18, 29, 4, '2024-10-03 13:23:42', '2024-10-03 13:23:42'),
(19, 29, 6, '2024-10-03 13:23:43', '2024-10-03 13:23:43'),
(21, 32, 2, '2024-10-03 13:30:40', '2024-10-03 13:30:40'),
(22, 32, 3, '2024-10-03 13:30:40', '2024-10-03 13:30:40'),
(27, 43, 21, '2024-10-05 08:00:14', '2024-10-05 08:00:14'),
(29, 55, 2, '2024-10-12 08:10:00', '2024-10-12 08:10:00'),
(30, 55, 3, '2024-10-12 08:10:00', '2024-10-12 08:10:00'),
(31, 55, 5, '2024-10-12 08:10:00', '2024-10-12 08:10:00'),
(32, 55, 34, '2024-10-12 08:10:00', '2024-10-12 08:10:00'),
(33, 55, 36, '2024-10-12 08:10:01', '2024-10-12 08:10:01');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `video_path`, `titre`, `created_at`, `updated_at`) VALUES
(1, 'videos/A86diwRPLJv95IMjlilzBrxKa9VPcaukyIIsTWoH.mp4', 'intro', '2024-10-17 13:11:59', '2024-10-17 13:11:59'),
(3, 'videos/5ZHm0wIYpGeNjKGkltsDgPkjWVkD3YRlTc89R54p.mp4', 'introEE', '2024-10-17 13:24:37', '2024-10-17 13:24:37'),
(4, 'videos/5yTUcmiMkItsd0H8whHOXNzZrfTRz2MMbok5gbJF.mp4', 'video 1', '2024-10-17 13:33:12', '2024-10-17 13:33:12'),
(5, 'videos/ccZM6DKta2uFl5s4mv4ppKJPx4dCFgKzETvVZHrX.mp4', 'dd', '2024-10-17 13:35:45', '2024-10-17 13:35:45'),
(6, 'videos/rZJwgWsEgG43heUuwiyTYL4hSwS9LRxr6t0QWLYO.mp4', 'Mediuma', '2024-10-18 08:34:05', '2024-10-18 08:34:05'),
(7, 'videos/oueq5ARqqm82xwY31LU0vlScw7D8fXrOiD1WGMlU.mp4', 'Mediuma1', '2024-10-18 08:36:13', '2024-10-18 08:36:13'),
(10, 'videos/tkxGfSpRHlQvkIxswmVokNyyaNHfurhgcfx66DEP.mp4', 'Mediuma1d', '2024-10-18 09:32:45', '2024-10-18 09:32:45'),
(14, 'videos/0yaievyA0EZiKSFRn6tMISgCaRkplrwOuCChonNL.mp4', 'Jimdo2', '2024-10-18 13:35:26', '2024-10-18 13:35:26'),
(15, 'videos/oz5tgnmiesmcUh4rd714L2kPXmd3rWZPi31YXy45.mp4', 'video 2', '2024-10-18 15:28:28', '2024-10-18 15:28:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `audios_titre_unique` (`titre`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_nom_unique` (`nom`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favoris_user_id_foreign` (`user_id`),
  ADD KEY `favoris_formation_id_foreign` (`formation_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formations_category_id_foreign` (`category_id`),
  ADD KEY `formations_souscategory_id_foreign` (`souscategory_id`);

--
-- Index pour la table `formation_audios`
--
ALTER TABLE `formation_audios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_audios_formation_id_foreign` (`formation_id`),
  ADD KEY `formation_audios_audio_id_foreign` (`audio_id`);

--
-- Index pour la table `formation_video`
--
ALTER TABLE `formation_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_video_formation_id_foreign` (`formation_id`),
  ADD KEY `formation_video_video_id_foreign` (`video_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `souscategories_category_id_foreign` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_category_id_foreign` (`category_id`);

--
-- Index pour la table `user_subcategories`
--
ALTER TABLE `user_subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_subcategories_user_id_foreign` (`user_id`),
  ADD KEY `user_subcategories_souscategory_id_foreign` (`souscategory_id`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_titre_unique` (`titre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `audios`
--
ALTER TABLE `audios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `formation_audios`
--
ALTER TABLE `formation_audios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `formation_video`
--
ALTER TABLE `formation_video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `user_subcategories`
--
ALTER TABLE `user_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `formations_souscategory_id_foreign` FOREIGN KEY (`souscategory_id`) REFERENCES `souscategories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formation_audios`
--
ALTER TABLE `formation_audios`
  ADD CONSTRAINT `formation_audios_audio_id_foreign` FOREIGN KEY (`audio_id`) REFERENCES `audios` (`id`),
  ADD CONSTRAINT `formation_audios_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formation_video`
--
ALTER TABLE `formation_video`
  ADD CONSTRAINT `formation_video_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `formation_video_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD CONSTRAINT `souscategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `user_subcategories`
--
ALTER TABLE `user_subcategories`
  ADD CONSTRAINT `user_subcategories_souscategory_id_foreign` FOREIGN KEY (`souscategory_id`) REFERENCES `souscategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_subcategories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
