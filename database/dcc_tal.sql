-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 10:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcc_tal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2a$12$l4ubeQD4tOjaG7oeMetTlO76J4NpOENhBq6egzUO5.OoY04uKksW2', '2025-06-05 12:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `tableName` varchar(50) NOT NULL,
  `pageName` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `fk_id`, `tableName`, `pageName`, `action`, `created_at`) VALUES
(1, 1, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-09 06:52:43'),
(2, 3, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-09 07:15:14'),
(3, 1, 'buildings', 'Academics Buildings', 'Delete', '2025-06-10 02:02:41'),
(4, 1, 'buildings', 'Academics Buildings', 'Delete', '2025-06-10 02:07:26'),
(5, 3, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-10 03:05:48'),
(6, 2, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-10 03:06:51'),
(7, 2, 'buildings', 'Academic Buildings', 'Delete', '2025-06-10 03:16:23'),
(8, 3, 'buildings', 'Academic Buildings', 'Delete', '2025-06-10 06:08:53'),
(9, 12, 'facilities_img', 'Facilities Images', 'Delete', '2025-06-10 06:51:43'),
(10, 11, 'facilities_img', 'Facilities Images', 'Delete', '2025-06-10 06:51:49'),
(11, 5, 'buildings', 'Library Facility', 'Delete', '2025-06-10 07:07:04'),
(12, 5, 'buildings', 'Library Facility', 'Delete', '2025-06-10 07:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `building_type` varchar(50) NOT NULL,
  `is_structured` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isAccessable` tinyint(4) NOT NULL DEFAULT 0,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `building_type`, `is_structured`, `created_at`, `isAccessable`, `latitude`, `longitude`, `status`) VALUES
(1, 'LSAB Building', 'Academic', 1, '2025-06-07 10:46:07', 0, '10.743192046688', '122.97027551195', 1),
(2, 'test', 'Academic', 1, '2025-06-10 02:42:53', 0, '10.7433933', '122.9698434', 1),
(3, 'tes', 'Academic', 1, '2025-06-10 06:05:33', 0, '10.743398', '122.9697923', 1),
(4, 'Admin Building', 'Administrative', 1, '2025-06-10 07:14:31', 0, '10.7434269', '122.969785', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buildings_img`
--

CREATE TABLE `buildings_img` (
  `id` int(11) NOT NULL,
  `buildings_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings_img`
--

INSERT INTO `buildings_img` (`id`, `buildings_id`, `img`, `status`) VALUES
(1, 1, './assets/img/buildings/lsab2.jpg', 1),
(2, 1, './assets/img/buildings/lsab1.jpg', 1),
(3, 1, './assets/img/buildings/IMG_20250602_154109_871.jpg', 0),
(4, 2, './assets/img/buildings/IMG_20250602_154109_871.jpg', 1),
(5, 2, './assets/img/buildings/IMG_20250602_154055_107.jpg', 1),
(6, 3, './assets/img/buildings/IMG_20250602_154055_107.jpg', 1),
(7, 4, './assets/img/buildings/5d438796-108c-4134-8d3f-2ebb3fb86b34.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `facilityName` varchar(100) NOT NULL,
  `floorNumber` varchar(25) NOT NULL,
  `roomNumber` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `building_id`, `facilityName`, `floorNumber`, `roomNumber`, `description`, `created_at`, `latitude`, `longitude`, `status`) VALUES
(1, 1, 'LSAB', '3rd', '311', 'LSAB Room 311 is a dedicated computer laboratory that serves as a learning hub for programming and other BSIS (Bachelor of Science in Information Systems) related courses. Equipped with essential hardware and software for hands-on training, it supports students in developing technical skills in coding, system design, and IT applications. Additionally, the room has hosted several Capstone project defenses, making it a key space for academic presentations and collaborative research in the program asdasdasd', '2025-06-08 00:31:10', '10.743401575996', '122.96982303346', 1),
(2, 1, 'LSAB', '3rd', '312', 'LSAB Room 312 is a dedicated computer laboratory that serves as a learning hub for programming and other BSIS (Bachelor of Science in Information Systems) related courses. Equipped with essential hardware and software for hands-on training, it supports students in developing technical skills in coding, system design, and IT applications. Additionally, the room has hosted several Capstone project defenses, making it a key space for academic presentations and collaborative research in the program', '2025-06-08 11:44:53', '10.743360089461', '122.96993303927', 1),
(5, 1, 'Library', '2nd', '', 'test', '2025-06-10 03:31:00', '10.7434126', '122.9697626', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facilities_img`
--

CREATE TABLE `facilities_img` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities_img`
--

INSERT INTO `facilities_img` (`id`, `facility_id`, `img`, `status`) VALUES
(1, 1, './assets/img/facilities/311-3.jpg', 1),
(2, 1, './assets/img/facilities/311-2.jpg', 1),
(3, 1, './assets/img/facilities/311-1.jpg', 1),
(4, 1, './assets/img/facilities/lsab-room-311.jpg', 1),
(5, 2, './assets/img/facilities/312-3.jpg', 1),
(6, 2, './assets/img/facilities/312-2.jpg', 1),
(7, 2, './assets/img/facilities/312-1.jpg', 1),
(8, 2, './assets/img/facilities/lsab-room-312.jpg', 1),
(9, 5, './assets/img/facilities/IMG_20250602_154055_107.jpg', 1),
(10, 5, './assets/img/facilities/IMG_20250602_154034_810.jpg', 1),
(11, 1, './assets/img/buildings/IMG_20250602_153933_623.jpg', 0),
(12, 1, './assets/img/buildings/IMG_20250602_153917_313.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone_num` int(11) NOT NULL,
  `visitor_type` varchar(25) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `street` text NOT NULL,
  `purpose` text NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings_img`
--
ALTER TABLE `buildings_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buildings_id` (`buildings_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `facilities_img`
--
ALTER TABLE `facilities_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_id` (`facility_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buildings_img`
--
ALTER TABLE `buildings_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facilities_img`
--
ALTER TABLE `facilities_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buildings_img`
--
ALTER TABLE `buildings_img`
  ADD CONSTRAINT `buildings_img_ibfk_1` FOREIGN KEY (`buildings_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilities_img`
--
ALTER TABLE `facilities_img`
  ADD CONSTRAINT `facilities_img_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
