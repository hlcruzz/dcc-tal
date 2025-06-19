-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 08:25 AM
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
(12, 5, 'buildings', 'Library Facility', 'Delete', '2025-06-10 07:07:52'),
(13, 4, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-11 04:39:53'),
(14, 5, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-11 04:40:08'),
(15, 6, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-11 04:41:49'),
(16, 7, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-11 07:04:48'),
(17, 7, 'buildings', 'LSAB Facility', 'Delete', '2025-06-13 06:46:59'),
(18, 7, 'buildings', ' Buildings', 'Delete', '2025-06-13 06:47:41'),
(19, 7, 'buildings', ' Buildings', 'Delete', '2025-06-13 06:48:45'),
(20, 7, 'buildings', 'Buildings', 'Delete', '2025-06-13 06:50:03'),
(21, 7, 'buildings', 'Buildings', 'Delete', '2025-06-13 06:50:28'),
(22, 1, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-14 11:16:52'),
(23, 1, 'buildings', 'Buildings', 'Delete', '2025-06-14 11:18:09'),
(24, 12, 'buildings_img', 'Buildings Images', 'Delete', '2025-06-17 08:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `building_desc` text DEFAULT NULL,
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

INSERT INTO `buildings` (`id`, `building_name`, `building_desc`, `is_structured`, `created_at`, `isAccessable`, `latitude`, `longitude`, `status`) VALUES
(1, 'LSAB Building', 'The Library, Science, and Academic Building (LSAB) at Carlos Hilado Memorial State University (CHMSU) in Talisay City, Negros Occidental, serves as a central hub for various academic and student support services. Strategically located within the main campus, LSAB houses essential facilities that cater to the needs of students, faculty, and staff.', 1, '2025-06-07 10:46:07', 1, '10.743192046688', '122.97027551195', 1),
(2, 'Teachers Education Building (TEB)', 'The Technology Extension Building (TEB) of CHMSU Talisay Campus is a modern two-story facility that serves as the center for research, innovation, and community extension. It houses offices for research and development, intellectual property, and community engagement, along with a Technology Business Incubation (TBI) Center to support startups and innovation projects. The building is designed to promote collaboration and knowledge sharing among students, faculty, and partner communities.', 1, '2025-06-10 02:42:53', 1, '10.742372528149', '122.97118479932', 1),
(3, 'Student Center', 'The Student Center at CHMSU Talisay (also known as the Student Affairs and Services hub) is located along Mabini Street within the main campus. It functions as a central spot where students gather for meetings, activities, and casual hangouts a place to relax, socialize, and access student services', 1, '2025-06-10 06:05:33', 1, '10.741858449769', '122.96881020512', 1),
(4, 'Admin Building', 'The Administration Building at CHMSU Talisay Campus is a key hub for leadership and academic coordination. A multi‑storey structure located along Mabini Street, it accommodates essential central offices such as the President’s and Vice Presidents’ offices, the Registrar, the Finance and Planning divisions, Admissions, and the Bids & Awards Committee', 1, '2025-06-10 07:14:31', 1, '10.742904434677', '122.96944506072', 1),
(5, 'Technology Green Building', NULL, 1, '2025-06-11 04:45:46', 1, '10.742554253257', '122.96928610715', 1),
(6, 'Engineering Building', NULL, 1, '2025-06-11 04:46:21', 1, '10.742137657729', '122.96949135399', 1),
(7, 'Gym', NULL, 0, '2025-06-13 04:13:39', 1, '10.742027008394', '122.96894005147', 1),
(8, 'test', NULL, 1, '2025-06-14 11:22:14', 1, '10.7201501', '122.5621063', 1);

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
(4, 2, './assets/img/buildings/IMG_20250602_154109_871.jpg', 0),
(5, 2, './assets/img/buildings/IMG_20250602_154055_107.jpg', 0),
(6, 3, './assets/img/buildings/IMG_20250602_154055_107.jpg', 0),
(7, 4, './assets/img/buildings/5d438796-108c-4134-8d3f-2ebb3fb86b34.jpg', 0),
(8, 2, './assets/img/buildings/chmsu-teb.jpg', 1),
(9, 3, './assets/img/buildings/chmsu-teb.jpg', 1),
(10, 5, './assets/img/buildings/chmsu-teb.jpg', 1),
(11, 6, './assets/img/buildings/chmsu-teb.jpg', 1),
(12, 4, './assets/img/buildings/chmsu-teb.jpg', 0),
(13, 7, './assets/img/buildings/chmsu-teb.jpg', 1),
(14, 8, './assets/img/buildings/chmsu-tal.jpg', 1),
(15, 8, './assets/img/buildings/312-3.jpg', 1),
(16, 8, './assets/img/buildings/312-2.jpg', 1),
(17, 4, './assets/img/buildings/chmsu-tal.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `building_route`
--

CREATE TABLE `building_route` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building_route`
--

INSERT INTO `building_route` (`id`, `building_id`, `latitude`, `longitude`, `img`, `created_at`) VALUES
(1, 1, '10.742538146367577', '122.96894043524786', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 01:57:48'),
(2, 1, '10.742437755168194', '122.96923707680624', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 01:58:33'),
(3, 1, '10.742752917263102', '122.96936041739556', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:42:36'),
(4, 1, '10.742792089750678', '122.96942261658232', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:43:08'),
(5, 1, '10.74345276349377', '122.96968114509771', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:44:34'),
(6, 1, '10.74321032550784', '122.9702906770871', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:45:06'),
(7, 7, '10.742537372680758', '122.96894483423843', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-14 10:33:13'),
(8, 7, '10.742468857410566', '122.96910777842398', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-14 10:34:52'),
(9, 7, '10.742043927749869', '122.96891126405716', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-14 10:35:34'),
(10, 4, '10.742540763581536', '122.96894368560498', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:38:50'),
(11, 4, '10.742480437898353', '122.96910875267214', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:39:16'),
(12, 4, '10.742921520218143', '122.96930810904509', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:40:03'),
(13, 4, '10.742912902275012', '122.96939263614229', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:40:28'),
(14, 3, '10.742541435075978', '122.96893983259027', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:41:25'),
(15, 3, '10.742475555009625', '122.96910478843104', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:41:48'),
(16, 3, '10.74217645932764', '122.96898811234855', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:42:13'),
(17, 3, '10.74215801288822', '122.96895592584302', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:42:32'),
(18, 3, '10.741870775328975', '122.96881913319459', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:42:58');

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
(5, 1, 'Library', '2nd', '', 'test', '2025-06-10 03:31:00', '10.7434126', '122.9697626', 0),
(6, 1, 'Campus Library', '2nd', '', 'The CHMSU Talisay Campus Library is a modern and well-equipped learning hub designed to support the academic needs of students and faculty. It offers a wide collection of books, journals, e-resources, and reference materials across various disciplines. With its quiet study areas, computer stations, and helpful staff, the library provides a conducive environment for research, study, and intellectual growth', '2025-06-11 02:52:28', '10.74337307999', '122.969664522', 1),
(7, 1, 'LSAB', '3rd', '313', 'test', '2025-06-13 06:45:56', '10.747904', '122.978304', 0),
(8, 1, 'test', '', '', 'test', '2025-06-14 11:19:02', '10.7201501', '122.5621063', 1);

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
(12, 1, './assets/img/buildings/IMG_20250602_153917_313.jpg', 0),
(13, 6, './assets/img/facilities/library.jpg', 1),
(14, 7, './assets/img/facilities/chmsu-teb.jpg', 1),
(15, 8, './assets/img/facilities/chmsu-tal.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `street` varchar(150) NOT NULL,
  `visit_purpose` varchar(250) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `building_id`, `fname`, `lname`, `phone_num`, `province`, `city`, `brgy`, `street`, `visit_purpose`, `destination`, `visited_at`) VALUES
(1, 4, 'Juan', 'Dela Cruz', '09123456789', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 1 (POB.)', 'test', 'test', 'Admin Building', '2025-06-17 10:11:38'),
(2, 4, 'Juan', 'Dela Cruz', '09123456789', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 1 (POB.)', 'test', 'test', 'Admin Building', '2025-06-17 10:15:15'),
(3, 1, 'Juan', 'Dela Cruz', '09123456789', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 1 (POB.)', 'test', 'test', 'LSAB Building', '2025-06-17 10:16:17'),
(4, 1, 'Juan', 'Dela Cruz', '09123456789', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 1 (POB.)', 'test', 'test', 'LSAB Building', '2025-06-17 10:20:38'),
(5, 1, 'Juan', 'Dela Cruz', '09123456789', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 1 (POB.)', 'test', 'test', 'LSAB Building', '2025-06-17 10:22:44'),
(6, 1, 'as', 'dasda', '324234', 'SULTAN KUDARAT', 'KALAMANSIG', 'OBIAL', 'adasdas', 'test', 'LSAB Building', '2025-06-19 05:37:01'),
(7, 4, 'as', 'dasda', '324234', 'SULTAN KUDARAT', 'KALAMANSIG', 'OBIAL', 'adasdas', 'asd', 'Admin Building', '2025-06-19 05:40:43'),
(8, 3, 'as', 'dasda', '324234', 'SULTAN KUDARAT', 'KALAMANSIG', 'OBIAL', 'adasdas', 'test', 'Student Center', '2025-06-19 05:43:14'),
(9, 1, 'asdasd', 'asdasd', '32432432423', 'AGUSAN DEL NORTE', 'NASIPIT', 'KINABJANGAN', 'adasd', 'test', 'LSAB Building', '2025-06-19 05:57:15');

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
-- Indexes for table `building_route`
--
ALTER TABLE `building_route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buildings_img`
--
ALTER TABLE `buildings_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `building_route`
--
ALTER TABLE `building_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facilities_img`
--
ALTER TABLE `facilities_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buildings_img`
--
ALTER TABLE `buildings_img`
  ADD CONSTRAINT `buildings_img_ibfk_1` FOREIGN KEY (`buildings_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `building_route`
--
ALTER TABLE `building_route`
  ADD CONSTRAINT `building_route_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
