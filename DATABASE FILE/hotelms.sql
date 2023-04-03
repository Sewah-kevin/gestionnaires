-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 avr. 2023 à 16:56
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotelms`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdmin` int(4) NOT NULL,
  `nomAdmin` varchar(20) NOT NULL,
  `usernameAdmin` varchar(30) NOT NULL,
  `emailAdmin` varchar(30) NOT NULL,
  `mdpAdmin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdmin`, `nomAdmin`, `usernameAdmin`, `emailAdmin`, `mdpAdmin`) VALUES
(1, 'test', 'test', 'test@gmail.com', 'test'),
(2, 'admin', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `total_price`, `remaining_price`, `payment_status`) VALUES
(1, 1, 5, '2017-11-13 05:45:17', '13-11-2017', '15-11-2017', 3000, 3000, 0),
(2, 2, 2, '2017-11-13 05:46:04', '13-11-2017', '16-11-2017', 6000, 0, 1),
(3, 3, 2, '2017-11-11 06:49:19', '11-11-2017', '14-11-2017', 6000, 0, 1),
(4, 4, 7, '2017-11-09 06:50:24', '11-11-2017', '15-11-2017', 10000, 10000, 0),
(5, 5, 13, '2017-11-17 06:59:10', '17-11-2017', '20-11-2017', 12000, 0, 1),
(6, 6, 9, '2021-04-08 09:45:56', '08-04-2021', '10-04-2021', 3000, 3000, 0),
(7, 7, 14, '2021-04-08 17:56:41', '08-04-2021', '10-04-2021', 16500, 0, 1),
(8, 8, 22, '2021-04-09 08:32:57', '09-04-2021', '13-04-2021', 34500, 0, 1),
(9, 9, 27, '2023-03-07 21:50:40', '14-03-2023', '16-03-2023', 3000, 0, 0),
(10, 10, 10, '2023-03-08 18:25:38', '15-03-2023', '24-03-2023', 15000, 5000, 0),
(11, 11, 3, '2023-03-10 22:54:14', '15-03-2023', '24-03-2023', 20000, 20000, 0),
(12, 12, 15, '2023-03-10 22:56:09', '14-03-2023', '22-03-2023', 49500, 49500, 0),
(13, 13, 14, '2023-03-24 21:40:33', '25-03-2023', '28-03-2023', 22000, 22000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(100) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resolve_status` tinyint(1) NOT NULL,
  `resolve_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `complaint`
--

INSERT INTO `complaint` (`id`, `complainant_name`, `complaint_type`, `complaint`, `created_at`, `resolve_status`, `resolve_date`, `budget`) VALUES
(6, 'test', 'test', 'clkdxjhfxsreuj', '2023-03-10 15:06:57', 1, '2023-03-10 15:16:08', 12),
(7, 'ama', 'ama', 'dewefdsfsfwe', '2023-03-22 15:59:41', 0, '2023-03-22 15:59:41', NULL),
(8, 'test', 'test', 'test', '2023-03-24 22:28:31', 0, '2023-03-24 22:28:31', NULL),
(9, 'fdf', 'fegrreg', 'regte', '2023-03-24 22:30:05', 1, '2023-03-25 01:31:47', 2000),
(10, 'METO', 'fsdfgrerg', 'retreg', '2023-03-24 22:32:32', 0, '2023-03-24 22:32:32', NULL),
(11, 'KODJO Koffi', 'Bug régulier', 'gseferg4t5ergsgdetgrgerfgerg', '2023-03-25 00:18:01', 0, '2023-03-25 00:18:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_card_type_id` int(10) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `contact_no`, `email`, `id_card_type_id`, `id_card_no`, `address`) VALUES
(1, 'Billy S. Burke', 7540001240, 'billyb9@gmail.com', 1, '422510099122', '3166 Rockford Road'),
(2, 'John Mitchell', 2870214970, 'johnm@gmail.com', 2, '422510099122', '1954 Armory Road'),
(3, 'Beatriz M. Matthews', 1247778460, 'matthews@gmail.com', 1, '422510099122', '4879 Shearwood Forest Drive'),
(4, 'Kevin Johnson', 1478546500, 'kevin@gmail.com', 3, '0', '926 Richland Avenue\n'),
(5, 'Dwayne Scott', 2671249780, 'scottdway@gmail.com', 1, '422510099122', '4698 Columbia Road\n'),
(6, 'Bruno Denn', 1245554780, 'denbru@gmail.com', 4, 'AASS 12454784541', '4764 Warner Street\n'),
(7, 'Ric Austin', 2450006974, 'austinric@gmail.com', 1, '457896000002', '1680  Brownton Road'),
(8, 'Andrew Stuartt', 2457778450, 'andrew@gmail.com', 1, '147000245810', '766  Lodgeville Road'),
(9, 'test test', 10203040506, 'test@gmail.com', 1, '01020200320030', 'Lomé'),
(10, ' ', 0, '', 0, '', ''),
(11, 'Test Test', 1020297, 'test@gmail.com', 1, '8765439876587', 'Lomé'),
(12, 'Test Test', 233213232434, 'test@gmail.com', 1, '31245432564346', 'Lomé'),
(13, 'Giovanni IDOH', 304050607, 'Giovanni@gmail.com', 4, '544353543656543434', 'Lomé');

-- --------------------------------------------------------

--
-- Structure de la table `emp_history`
--

CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `to_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emp_history`
--

INSERT INTO `emp_history` (`id`, `emp_id`, `shift_id`, `from_date`, `to_date`, `created_at`) VALUES
(1, 1, 1, '2017-11-13 05:39:06', '2017-11-15 02:22:26', '2017-11-13 05:39:06'),
(2, 2, 3, '2017-11-13 05:39:39', '2017-11-15 02:22:43', '2017-11-13 05:39:39'),
(3, 3, 1, '2017-11-13 05:40:18', '2017-11-15 02:22:49', '2017-11-13 05:40:18'),
(4, 4, 1, '2017-11-13 05:40:56', '2017-11-15 02:22:35', '2017-11-13 05:40:56'),
(5, 5, 1, '2017-11-13 05:41:31', NULL, '2017-11-13 05:41:31'),
(6, 6, 3, '2017-11-13 05:42:03', NULL, '2017-11-13 05:42:03'),
(7, 7, 4, '2017-11-13 05:42:35', '2017-11-18 02:35:02', '2017-11-13 05:42:35'),
(8, 8, 3, '2017-11-13 05:43:13', '2017-11-18 02:32:26', '2017-11-13 05:43:13'),
(9, 9, 2, '2017-11-13 05:43:49', NULL, '2017-11-13 05:43:49'),
(10, 10, 1, '2017-11-13 06:30:45', '2017-11-18 02:34:28', '2017-11-13 06:30:45'),
(11, 1, 2, '2017-11-15 06:52:26', '2017-11-17 02:23:05', '2017-11-15 06:52:26'),
(12, 4, 3, '2017-11-15 06:52:35', NULL, '2017-11-15 06:52:35'),
(13, 2, 3, '2017-11-15 06:52:43', NULL, '2017-11-15 06:52:43'),
(14, 3, 3, '2017-11-15 06:52:49', NULL, '2017-11-15 06:52:49'),
(15, 1, 3, '2017-11-17 06:53:05', '2023-03-07 23:43:45', '2017-11-17 06:53:05'),
(16, 8, 1, '2017-11-18 07:02:26', NULL, '2017-11-18 07:02:26'),
(17, 11, 2, '2017-11-18 07:04:03', NULL, '2017-11-18 07:04:03'),
(18, 10, 2, '2017-11-18 07:04:28', NULL, '2017-11-18 07:04:28'),
(19, 7, 2, '2017-11-18 07:05:02', NULL, '2017-11-18 07:05:02'),
(20, 12, 1, '2021-04-08 17:54:22', NULL, '2021-04-08 17:54:22'),
(21, 13, 2, '2021-04-09 08:35:27', NULL, '2021-04-09 08:35:27'),
(22, 1, 2, '2023-03-07 22:43:45', '2023-03-10 23:57:15', '2023-03-07 22:43:45'),
(23, 1, 2, '2023-03-10 22:57:15', NULL, '2023-03-10 22:57:15'),
(24, 14, 0, '2023-03-24 19:40:34', NULL, '2023-03-24 19:40:34'),
(25, 15, 0, '2023-03-24 19:40:35', NULL, '2023-03-24 19:40:35'),
(26, 16, 0, '2023-03-24 19:42:32', NULL, '2023-03-24 19:42:32');

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `idGest` int(4) NOT NULL,
  `nomGest` varchar(20) NOT NULL,
  `prenomGest` varchar(30) NOT NULL,
  `sexeGest` char(15) NOT NULL,
  `adrGest` varchar(255) NOT NULL,
  `mdpGest` varchar(20) NOT NULL,
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`idGest`, `nomGest`, `prenomGest`, `sexeGest`, `adrGest`, `mdpGest`, `id_hotel`) VALUES
(1, 'ADJETI', 'Josué', 'M', '32 Rue des Cocotiers', 'admin', 3),
(12, 'AMAVI', 'Adjo', 'F', 'Agoè', 'admin', 6),
(13, 'KITSO', 'Floridette', 'F', 'Bè', 'admin', 3);

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `name_hotel` varchar(100) NOT NULL,
  `adress_hotel` varchar(15) NOT NULL,
  `telephone_hotel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `name_hotel`, `adress_hotel`, `telephone_hotel`) VALUES
(3, 'DELICE HOTEL', 'Kpalimé', '02030405'),
(4, 'PALM BEACH', 'Lomé', '01020304'),
(5, 'IBIS', 'Accra', '934227228'),
(6, 'ONOMO', 'Lomé', '01020304'),
(7, 'Test', 'test', '01020304'),
(8, 'KRIMAS', 'Lomé', '04050607');

-- --------------------------------------------------------

--
-- Structure de la table `id_card_type`
--

CREATE TABLE `id_card_type` (
  `id_card_type_id` int(10) NOT NULL,
  `id_card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `id_card_type`
--

INSERT INTO `id_card_type` (`id_card_type_id`, `id_card_type`) VALUES
(1, 'Carte Nationale d\'identité'),
(2, 'Carte législative'),
(4, 'Permis de conduire');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`, `deleteStatus`) VALUES
(1, 2, 'A-101', NULL, 0, 0, 1),
(2, 2, 'A-102', NULL, 0, 1, 1),
(3, 3, 'A-103', 1, 0, 0, 0),
(4, 4, 'A-104', NULL, 0, 0, 1),
(5, 1, 'B-101', 1, 0, 0, 0),
(6, 2, 'B-102', NULL, 0, 0, 1),
(7, 3, 'B-103', 1, 0, 0, 0),
(8, 4, 'B-104', NULL, 0, 0, 1),
(9, 1, 'C-101', 1, 0, 0, 0),
(10, 2, 'C-102', 1, 1, 0, 0),
(11, 3, 'C-103', NULL, 0, 0, 1),
(13, 4, 'D-101', NULL, 0, 1, 1),
(14, 5, 'K-699', 1, 0, 1, 0),
(15, 5, 'K-799', 1, 0, 0, 0),
(16, 5, 'K-899', NULL, 0, 0, 1),
(21, 10, 'M-966', NULL, 0, 0, 0),
(22, 10, 'M-869', NULL, 0, 1, 0),
(27, 1, 'test', 1, 1, 0, 0),
(30, 6, 'Z-200', NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`) VALUES
(1, 'Seul', 1000, 1),
(2, 'À deux', 1500, 2),
(3, 'À trois', 2000, 3),
(4, 'Famille', 3000, 2),
(5, 'Royale', 5500, 4),
(6, 'Master Suite', 6500, 6),
(7, 'Mini-Suite', 3600, 3),
(8, 'Chambres communicantes', 8000, 6),
(9, 'Suite Présidentielle', 21000, 4);

-- --------------------------------------------------------

--
-- Structure de la table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(10) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `shift_timing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift`, `shift_timing`) VALUES
(1, 'Matin', '5:00 AM - 10:00 AM'),
(2, 'Day', '10:00 AM - 4:00PM'),
(3, 'Après-Midi', '4:00 PM - 10:00 PM'),
(4, 'Nuit', '10:00PM - 5:00AM');

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `id_card_type` int(11) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`emp_id`, `emp_name`, `staff_type_id`, `shift_id`, `id_card_type`, `id_card_no`, `address`, `contact_no`, `salary`, `joining_date`, `updated_at`) VALUES
(6, 'Alain M.', 3, 3, 1, '0', 'Ap #897-1459 Quam Avenue', 8520000000, 40000, '0000-00-00 00:00:00', '2023-03-11 15:05:54'),
(7, 'Clement L. Brainerd\n', 2, 2, 1, '422510099122', '4381 Gateway Road\n', 4547778450, 40000, '2017-11-13 05:42:35', '2021-04-08 17:36:51'),
(8, 'Randall Leclair', 1, 1, 4, '0', '1724 Round Table Drive\n', 1457845554, 15000, '2020-11-13 05:43:13', '2021-04-08 17:36:56'),
(9, 'Fredrick A. Wile', 3, 2, 4, '0', '3431 Joyce Street\n', 7145554500, 20000, '2020-11-13 05:43:49', '2021-04-08 17:36:59'),
(10, 'Brent Tatro', 5, 2, 1, '422510099122', '1616 Coventry Court\n', 3475468569, 24000, '2019-11-13 06:30:45', '2021-04-08 17:37:07'),
(11, 'Charles Miller', 3, 2, 1, '0', '382 Byers Lane\n', 7869696969, 20000, '2019-11-18 07:04:03', '2021-04-08 17:37:10'),
(12, 'John Doe', 2, 1, 4, 'AD69 14579500002', '3714  Duffy Street', 1475550036, 13500, '2021-04-08 17:54:22', '2021-04-08 17:54:22'),
(13, 'Brent Dixon', 9, 2, 1, '457854555012', '1821 Harry Place', 7457778560, 65500, '2021-04-09 08:35:27', '2021-04-09 08:35:27'),
(14, 'ama fdf', 5, 0, 0, '', '', 0, 0, '2023-03-24 19:40:34', '2023-03-24 19:40:34'),
(15, 'ama fdf', 5, 0, 0, '', '', 0, 0, '2023-03-24 19:40:35', '2023-03-24 19:40:35'),
(16, 'test2 test2', 6, 0, 0, '', '', 0, 0, '2023-03-24 19:42:32', '2023-03-24 19:42:32');

-- --------------------------------------------------------

--
-- Structure de la table `staff_type`
--

CREATE TABLE `staff_type` (
  `staff_type_id` int(10) NOT NULL,
  `staff_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type`) VALUES
(1, 'Manager'),
(2, 'Housekeeping Manager'),
(3, 'Front Desk Receptionist'),
(4, 'Cheif'),
(5, 'Waiter'),
(6, 'Room Attendant'),
(7, 'Concierge'),
(8, 'Hotel Maintenance Engineer'),
(9, 'Hotel Sales Manager');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `created_at`) VALUES
(4, 'kevin', 'kevin', 'kevin@gmail.com', 'kevin10', '2023-03-07 21:02:20'),
(5, 'Administrateur', 'admin', 'admin@gmail.com', 'admin', '2023-03-11 14:38:26'),
(6, 'Aristide', 'Aristide', 'Aristide@gmail.com', 'Aristide', '2023-03-22 23:54:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Index pour la table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id_type` (`id_card_type_id`);

--
-- Index pour la table `emp_history`
--
ALTER TABLE `emp_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Index pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`idGest`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Index pour la table `id_card_type`
--
ALTER TABLE `id_card_type`
  ADD PRIMARY KEY (`id_card_type_id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Index pour la table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Index pour la table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`emp_id`);

--
-- Index pour la table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdmin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `idGest` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `id_card_type`
--
ALTER TABLE `id_card_type`
  MODIFY `id_card_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `staff_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Contraintes pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD CONSTRAINT `gestionnaire_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
