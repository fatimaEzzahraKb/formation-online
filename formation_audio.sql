-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 oct. 2024 à 16:32
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
-- Structure de la table `formation_audio`
--

CREATE TABLE `formation_audio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `audio` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `lien_video` varchar(255) DEFAULT NULL,
  `ordre` int(11) NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_audio`
--

INSERT INTO `formation_audio` (`id`, `created_at`, `updated_at`, `audio`, `titre`, `lien_video`, `ordre`, `formation_id`) VALUES
(24, '2024-10-14 10:15:52', '2024-10-14 10:15:58', 'audios/dYXhQYNJ0oDHt2N1WaFTibvJ9gAbQjKrCIPfCT07.mp3', 'BASE SAGE partie 1', 'http://127.0.0.1:8000/storage/videos/bDWd1cM6rM0O1dpy0RRJ7tPCD5SXL1OzeO8KgcRG.mp4', 1, 50),
(29, '2024-10-14 13:00:31', '2024-10-14 13:00:31', 'audios/3cYUEhPIDZKD7vHGWXmHWPbigniR2hM4HVsp0FZK.mp3', 'test 1', NULL, 1, 52);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formation_audio`
--
ALTER TABLE `formation_audio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_audio_formation_id_foreign` (`formation_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formation_audio`
--
ALTER TABLE `formation_audio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation_audio`
--
ALTER TABLE `formation_audio`
  ADD CONSTRAINT `formation_audio_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
