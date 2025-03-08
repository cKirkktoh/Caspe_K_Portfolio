-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2025 at 01:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: portfolio_d
--

-- --------------------------------------------------------

--
-- Table structure for table contacts
--

CREATE TABLE contacts (
  ContactID int NOT NULL,
  fname varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
 NOT NULL,
  lname varchar(255) NOT NULL,
  email varchar(300) NOT NULL,
  number varchar(255) NOT NULL,
  message text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
;

--
-- Dumping data for table contacts
--

INSERT INTO contacts (ContactID, fname, lname, email, number, message) VALUES
(1, 'Kirk Caspe', '', 'k_caspe185622@fanshaweonline.ca', '', 'I love this! Lets Work together!');

-- --------------------------------------------------------

--
-- Table structure for table media
--

CREATE TABLE media (
  media_id int NOT NULL,
  project_id int DEFAULT NULL,
  media_type enum('image','video','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
 DEFAULT NULL,
  media_url varchar(255) DEFAULT NULL,
  caption text,
  upload_date timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
;

--
-- Dumping data for table media
--

INSERT INTO media (media_id, project_id, media_type, media_url, caption, upload_date) VALUES
(1, 1, 'image', 'project_a_image.jpg', 'Image for Project A', '2022-01-10 08:00:00'),
(2, 2, 'video', 'project_b_video.mp4', 'Video for Project B', '2022-02-15 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table projects
--

CREATE TABLE projects (
  ProjectID int NOT NULL,
  proj_title varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
 NOT NULL,
  proj_desc text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
 NOT NULL,
  URL varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
 NOT NULL,
  date_started date NOT NULL,
  date_completed date NOT NULL,
  UserID int NOT NULL,
  CategoryID int NOT NULL,
  client varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
;

--
-- Dumping data for table projects
--

INSERT INTO projects (ProjectID, proj_title, proj_desc, URL, date_started, date_completed, UserID, CategoryID, client) VALUES
(1, 'Portfolio Website', 'Designed and developed my personal portfolio website.', '', '0000-00-00', '0000-00-00', 1, 1, ''),
(2, 'Quatro', 'Quatro Rebrand by Nikolai Meijer and Kirk Caspe\r\n\r\nQuatro is back! A blast from the past, this drink from the 80\'s is here to blow your minds. The brand isn\'t the only thing refreshed, you will be too when you have a sip and lay your eyes on our beautiful new appearance. But that\'s not all that has changed... We have developed four unique new flavours with stunning colours and graphics to match.\r\n\r\nThe goal of this website is to sell the most Quatro we possibly can, and to provide users on all platforms and devices a seamless and comfortable experience. Users will be able to find anything they need on our site with ease.\r\n\r\nThere were a few bumps along the way, but it is finally complete and we look ofrward to sharing Quatro\'s new and improved website and brand with you and our customers!', 'project_a_url', '2023-04-01', '2023-04-10', 1, 1, 'Client A'),
(3, 'Earbuds Project', ' This assignment is designed to inspire students to delve into the world of innovative earbud design. The primary objective is for students to employ Cinema 4D to create 3D models, apply textures, lighting, and animations to bring their designs to life. These digital assets will serve as essential resources for a promotional website, showcasing their creative ideas to the world.', 'https://github.com/cKirkktoh/Caspe_Kirk_Earbuds_Sub2.git', '2023-10-23', '2023-11-12', 2, 2, 'Client B'),
(4, 'Sports Motion Graphic', 'The Sports Motion Graphics project was an exciting exploration into the fusion\r\nof sports and visual storytelling through dynamic motion graphics.\r\nThis project shows a promotional match between two of the biggest\r\nEnglish Premiere League teams in the country. Tottenham Hotspur Vs Chelsea', 'project_c_url', '2023-12-07', '2023-12-09', 3, 1, 'Client C'),
(6, 'Foundation Sixty6', 'Our FIP this term', 'something.jpg', '0000-00-00', '0000-00-00', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE `user` (
  UserID int NOT NULL,
  username varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
 NOT NULL,
  password varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
;

--
-- Dumping data for table user
--

INSERT INTO user (UserID, username, password) VALUES
(1, 'kirkcsp', 'caspe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table contacts
--
ALTER TABLE contacts
  ADD PRIMARY KEY (ContactID);

--
-- Indexes for table media
--
ALTER TABLE media
  ADD PRIMARY KEY (media_id),
  ADD KEY project_id (project_id);

--
-- Indexes for table projects
--
ALTER TABLE projects
  ADD PRIMARY KEY (ProjectID),
  ADD KEY UserID (UserID),
  ADD KEY CategoryID (CategoryID);

--
-- Indexes for table user
--
ALTER TABLE user
  ADD PRIMARY KEY (UserID);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table contacts
--
ALTER TABLE contacts
  MODIFY ContactID int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table media
--
ALTER TABLE media
  MODIFY media_id int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table projects
--
ALTER TABLE projects
  MODIFY ProjectID int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table user
--
ALTER TABLE user
  MODIFY UserID int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
