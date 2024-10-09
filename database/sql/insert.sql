-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 juil. 2024 à 11:05
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

--
-- Déchargement des données de la table `liens`
--

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`pro_id`, `pro_nom`, `pro_date`, `pro_presentation`, `pro_image`, `pro_nbImage`, `ens_id`, `created_at`, `updated_at`) VALUES
	                                                                                                                                              (1, 'P\'tit cuisto', '2023-01-01',
        'Un projet universitaire, réalisé par moi ainsi que 3 autres collègues. Il s\'inspire du site Marmiton où l\'on peut partager des recettes de cuisine et poster des commentaires.',
        1, 5, NULL, '2024-06-21 21:00:24', '2024-07-10 06:36:11'),
       (2, 'Pomodoro', '2023-01-01',
        'J\'ai réalisé un pomodoro permettant de gérer votre temps de travail et de pause,
        afin de travailler plus efficacement.', 1, 2, NULL, '2024-06-21 21:00:24', '2024-07-09 09:17:05'),
	                                                                                                                                              (3, 'Gobblet Gobblers (Langage C)', '2022-01-01', 'Cette première version est une application console développée par une équipe de 2 en langage C lors d\'un projet universitaire en première année de BUT informatique.',
        1, 3, NULL, '2024-06-21 21:00:24', '2024-07-09 09:17:19'),
       (4, 'Gobblet Gobblers (Web)', '2023-01-01',
        'J\'ai par la suite décidé de recommencer ce projet en le faisant en JavaScript en utilisant HTML et CSS pour l\'interface utilisateur ainsi que pour la gestion de la partie.',
        1, 3, NULL, '2024-06-21 21:00:24', '2024-07-09 09:17:31'),
       (5, 'Instant Weather', '2023-01-01',
        'C\'est une application web pour connaître la météo des 7 prochains jours dans une ville sélectionnée. Je l\'ai développée au sein d\'une équipe de 4 personnes et j\'ai utilisé des API.',
        1, 2, NULL, '2024-06-21 21:00:24', '2024-07-09 09:17:45');

INSERT INTO `liens` (`lien_id`, `lien_nom`, `lien_destination`, `pro_id`, `created_at`, `updated_at`)
VALUES (1, 'répertoire GitHub', 'https://github.com/aixzair/gobblet-gobblers', 4,
        '2024-07-08 07:13:16', '2024-07-08 07:13:16'),
       (3, 'jouer au jeu', 'https://aixzair.github.io/gobblet-gobblers/', 4, '2024-07-08 07:21:33',
        '2024-07-08 07:21:33'),
       (4, 'Répertoire GitHub', 'https://github.com/tomleblais/TD2_ECTA_PtiCuisto', 1,
        '2024-07-08 07:29:24', '2024-07-08 07:29:24');

--
-- Déchargement des données de la table `point_travailles`
--

INSERT INTO `point_travailles` (`poi_id`, `poi_nom`, `poi_definition`, `pro_id`, `created_at`,
                                `updated_at`)
VALUES (11, 'Utilisation des modules JavaScript', 'Séparation en plusieurs fichiers du code source',
        4, '2024-07-06 07:01:29', '2024-07-09 06:51:19'),
       (12,
        'Utilisation d\'un modèle MVC', 'Séparation des responsabilités', 4, '2024-07-09 06:51:19', '2024-07-09 06:51:31');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
