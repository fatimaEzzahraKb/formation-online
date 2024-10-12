-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 12 oct. 2024 à 14:03
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
(1, 'informatique', 'La catégorie Informatique couvre un large éventail de sujets liés aux technologies de l\'information et de la communication. Elle inclut des formations sur les langages de programmation, le développement web, la cybersécurité, l\'intelligence artificielle, et les bases de données.', NULL, '2024-10-11 10:06:10'),
(3, 'Commerciale', 'La catégorie commerciale englobe l\'ensemble des activités liées à la vente, à la distribution et à la promotion de produits et services. Elle implique une compréhension approfondie des marchés, des consommateurs et des stratégies de vente. Les professionnels du commerce doivent maîtriser des compétences telles que la négociation, la gestion de la relation client, et l\'analyse des tendances du marché.', NULL, '2024-09-30 14:15:24'),
(4, 'Enregirstrement Vocale', 'L\'enregistrement vocal est une méthode de capture et de stockage de sons, généralement utilisée pour conserver des voix humaines, des sons ambiants ou des instruments. Cette catégorie englobe divers formats et technologies, allant des dictaphones traditionnels aux applications modernes sur smartphones et ordinateurs.', '2024-09-30 12:58:58', '2024-09-30 12:58:58'),
(12, 'Comptabilité', 'Comptabilité', '2024-10-05 07:55:36', '2024-10-05 07:55:36');

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
(40, 43, 25, '2024-10-11 13:32:49', '2024-10-11 13:32:49');

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
(23, 'Formation Référencement', 'Déscription', 'images/4baCTBpW2UOE3yxpNNdTmuOvc1dwOLs6aKNkUz8B.jpg', '2024-09-30 15:58:13', '2024-10-11 10:05:38', 4, 10, 'vidéo'),
(25, 'Formation Comptabilité', 'Formation Comptabilité', 'images/qvpZNgF5VeRhIc7dDHJKlD3N17P8nW9fCyBU8IWj.png', '2024-10-05 07:58:25', '2024-10-08 12:37:05', 12, 21, 'vidéo'),
(34, 'Formation  Backlinks', 'Formation  Backlinks', 'images/Ww5wN4es0Py9anT6GMX0irtQ1IouR30ChyLLw3wa.jpg', '2024-10-09 13:31:03', '2024-10-09 14:16:07', 1, 34, 'vidéo'),
(40, 'Formation AUdio Test', 'azeazeaz', 'images/tUf8cwRAyplqmJvKVpQoIggrO9yu4POjMOyZcJ7J.jpg', '2024-10-12 10:59:21', '2024-10-12 10:59:21', 1, 36, 'audio');

-- --------------------------------------------------------

--
-- Structure de la table `formation_audio`
--

CREATE TABLE `formation_audio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `audio` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `lien_video` varchar(255) NOT NULL,
  `ordre` int(11) NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_audio`
--

INSERT INTO `formation_audio` (`id`, `created_at`, `updated_at`, `audio`, `titre`, `lien_video`, `ordre`, `formation_id`) VALUES
(2, '2024-10-12 10:59:21', '2024-10-12 10:59:21', 'videos/08qHK0nuazxTvT2qsx16Lk3i6s2L1IaYcFvQyUkT.mp3', 'Google Docs', 'https://formations.fiduciairebrighten.com/storage/videos/Eei4iweGxGhRIvjBHn500W4kxyujIo0JZQvRO1Yx.mp4', 1, 40);

-- --------------------------------------------------------

--
-- Structure de la table `formation_videos`
--

CREATE TABLE `formation_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titre` varchar(90) NOT NULL DEFAULT 'introduction',
  `ordre` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_videos`
--

INSERT INTO `formation_videos` (`id`, `video_path`, `formation_id`, `created_at`, `updated_at`, `titre`, `ordre`) VALUES
(25, 'videos/bDWd1cM6rM0O1dpy0RRJ7tPCD5SXL1OzeO8KgcRG.mp4', 34, '2024-10-10 10:33:09', '2024-10-10 10:33:09', 'Google Sites', 2),
(26, 'videos/E2TshZNKRixddq9tzerkYLD0hhbG1Qm5B9C2ZuV9.mp4', 34, '2024-10-10 10:43:12', '2024-10-10 10:43:12', 'Google Docs', 1),
(28, 'videos/NFRnFHc6XTDzyZbzBbQljRaB29vxGZUfbsJxkHU8.mp4', 25, '2024-10-10 13:33:47', '2024-10-10 14:11:05', 'Formation Comptabilité', 1),
(29, 'videos/dJfffjSSmoX2FyH00qKRUG69UPo7cxd8DyKRV98Q.mp4', 25, '2024-10-10 13:34:02', '2024-10-10 14:14:22', 'Formation Comptabilité', 2),
(34, 'videos/TyXGiwHWJ6gAmTpvc64REE8O506j546HF6izyP7q.mp4', 25, '2024-10-10 14:19:00', '2024-10-10 14:19:00', 'Formation Comptabilité', 3);

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
(36, '2024_10_12_101600_create_formation_audios_table', 19);

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
(141, 'App\\Models\\User', 43, 'auth_token', '32cdcb8c3b79123adc2d73a598b7163c91987c79761a9994a91fc7ea154bfe33', '[\"*\"]', NULL, NULL, '2024-10-11 15:54:38', '2024-10-11 15:54:38'),
(142, 'App\\Models\\User', 22, 'auth_token', '7cd29c82df1c75b1f6ea194f20ae8810b9546d008a7a8074aed9bb9293d69d17', '[\"*\"]', NULL, NULL, '2024-10-12 07:37:59', '2024-10-12 07:37:59'),
(143, 'App\\Models\\User', 55, 'auth_token', '71323eaa049304bd73145bb5a79d55c76a312e7f0a8f37855188bbdfde416e1e', '[\"*\"]', NULL, NULL, '2024-10-12 08:10:48', '2024-10-12 08:10:48');

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
(2, 'réseaux', 'le réseaux permet d\'assuerer la securité des données', NULL, '2024-10-01 13:39:54', 1),
(3, 'développement', 'Le développement est le processus de création, de conception et de maintenance de logiciels et d\'applications. Il englobe une variété de disciplines, y compris le développement web, le développement d\'applications mobiles, le développement de logiciels et bien plus encore. Cette sous-catégorie couvre les compétences essentielles.', NULL, NULL, 1),
(4, 'commerciale téléphonique', 'La commerciale téléphonique consiste à promouvoir et vendre des produits ou services par le biais d\'appels téléphoniques. Ce domaine requiert des compétences spécifiques en communication, en écoute active et en persuasion. Les professionnels de la vente par téléphone doivent savoir établir rapidement un rapport avec leurs interlocuteurs, comprendre leurs besoins et proposer des solutions adaptées. Cette sous-catégorie couvre les techniques de prospection, les stratégies de suivi client et les meilleures pratiques pour maximiser les ventes par téléphone. Que vous soyez débutant ou expérimenté, vous trouverez ici des outils et des conseils pour améliorer vos compétences en vente téléphonique et optimiser vos résultats.', NULL, NULL, 3),
(5, 'Référencement', 'Déscription simple sur la sous catégorie', '2024-09-30 12:20:37', '2024-10-08 12:29:55', 1),
(6, 'Commerciale terrain', 'Déscription', '2024-09-30 12:21:23', '2024-09-30 12:21:23', 3),
(9, 'Facebook', 'Enregorstrement des vocale pour l\'application Facebook', '2024-09-30 13:02:50', '2024-09-30 13:02:50', 4),
(10, 'WhatsApp', 'La sous-catégorie \"WhatsApp\" dans le domaine de l\'enregistrement vocal concerne l\'utilisation de l\'application de messagerie pour envoyer et recevoir des messages audio.', '2024-09-30 13:04:19', '2024-09-30 13:04:19', 4),
(21, 'Base SAGE', 'Sage format base Sage Formation', '2024-10-05 07:56:05', '2024-10-05 07:56:05', 12),
(34, 'BackLinks Vidéos', 'Ajout des backlinks', '2024-10-09 10:47:46', '2024-10-11 15:58:41', 1),
(36, 'Backlinks audios', 'dsdsqd', '2024-10-11 15:59:28', '2024-10-11 15:59:28', 1);

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
(24, 'Marwa', 'marwa@example.com', '$2y$12$zmLCQOgt890fhe2l0r8tPezVJmaTLtQ2YiB9nhxKKEMt5BqRCKrQW', 'stagiaire', 3, NULL, NULL, '2024-10-01 08:08:32', '2024-10-01 08:08:32'),
(26, 'Douaa Mori', 'douaa@email.com', '$2y$12$0baJ6.g6FWRup8rfdQTfLer/c5RCumY1JzoZekd/RNLR2V4qQsc5O', 'stagiaire', 1, NULL, NULL, '2024-10-02 14:33:16', '2024-10-08 12:36:35'),
(29, 'Ghizlane', 'ghizlane@gmail.com', '$2y$12$OFMgmlJm84LQkFnXqGrK8ubFsJHoIqDlDkwCdNiAGmCN0irGCXGG.', 'stagiaire', 3, NULL, NULL, '2024-10-03 13:23:42', '2024-10-04 14:09:17'),
(32, 'Alaui', 'alaui@gm.com', '$2y$12$ZvBF4uuQM3AqMBrkojqGR.oe0GFYea7a9yYdNTRqi2fGEmTXGv3mG', 'stagiaire', 1, NULL, NULL, '2024-10-03 13:30:39', '2024-10-03 13:30:39'),
(43, 'Rya', 'rya@gmail.com', '$2y$12$c77IiV84QXFgxEnuHIjxzuIanrw7ds88R093KEuOJM2VqfXYmyf3a', 'stagiaire', 12, NULL, NULL, '2024-10-05 08:00:14', '2024-10-11 10:05:18'),
(51, 'Admin N', 'admin@example.com', '$2y$12$Lb9RmKtc3RNvog7CvBWJouwe8NKQrlowLaE6Id8M0C5lWqTU.iMA2', 'admin', NULL, NULL, NULL, '2024-10-07 15:48:03', '2024-10-11 10:04:47'),
(55, 'Trainee 5', 'trainee5@gmail.com', '$2y$12$p8LFVXNUMWVxzx7kdNb37e2ABtrqj8RpG2TDvtv1D8A84LjqhSaaq', 'stagiaire', 1, NULL, NULL, '2024-10-12 08:10:00', '2024-10-12 08:10:00');

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

--
-- Index pour les tables déchargées
--

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
-- Index pour la table `formation_audio`
--
ALTER TABLE `formation_audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_audio_formation_id_foreign` (`formation_id`);

--
-- Index pour la table `formation_videos`
--
ALTER TABLE `formation_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_videos_formation_id_foreign` (`formation_id`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `formation_audio`
--
ALTER TABLE `formation_audio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formation_videos`
--
ALTER TABLE `formation_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `user_subcategories`
--
ALTER TABLE `user_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Contraintes pour la table `formation_audio`
--
ALTER TABLE `formation_audio`
  ADD CONSTRAINT `formation_audio_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formation_videos`
--
ALTER TABLE `formation_videos`
  ADD CONSTRAINT `formation_videos_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`);

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
