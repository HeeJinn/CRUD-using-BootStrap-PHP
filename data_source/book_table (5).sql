-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 08:50 PM
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
-- Database: `bookstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_published` varchar(20) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `wiki` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`_id`, `name`, `author`, `image`, `date_published`, `publisher`, `genre`, `price`, `is_deleted`, `deleted_at`, `wiki`) VALUES
(13, 'Beyond The Boundary', 'Nagomu Torii', 'https://m.media-amazon.com/images/M/MV5BZjFiNWMzMTQtOWE5NC00NWI3LWFhZGUtNTJjMzBhOTM2MzIxXkEyXkFqcGc@._V1_.jpg', '2012-06-09', 'Kyoto Animation', 'Fantasy', 900, 0, NULL, 'https://en.wikipedia.org/wiki/Beyond_the_Boundary'),
(14, 'Wuthering Waves', 'Kenley Russel Benitez', 'https://static0.thegamerimages.com/wordpress/wp-content/uploads/sharedimages/2024/12/mixcollage-25-dec-2024-03-54-am-8390.jpg', '2024-05-23', 'Kuro Games', 'Adventure', 1199, 0, NULL, 'https://wutheringwaves.fandom.com/wiki/Wuthering_Waves_Wiki'),
(15, 'Lord of the niga', 'Christian', 'https://m.media-amazon.com/images/M/MV5BNzIxMDQ2YTctNDY4MC00ZTRhLTk4ODQtMTVlOWY4NTdiYmMwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', '2025-07-28', 'Soberano Inst.', 'History', 1200, 0, NULL, 'https://en.wikipedia.org/wiki/The_Lord_of_the_Rings'),
(16, 'Demon Slayer', 'Jeano Genuino', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYKYAkuOMTaDKhMy0kmL91-6W-nSbAUkyrTw&amp;amp;s', '2017-02-07', 'Soberano Inst.', 'Action &amp; Adventure', 1200, 0, NULL, 'https://en.wikipedia.org/wiki/Demon_Slayer:_Kimetsu_no_Yaiba'),
(17, 'Nano Machine', 'Jilbert Alos', 'https://static.tvtropes.org/pmwiki/pub/images/n_7.jpg', '2015-10-27', 'MarLoafer Inc.', 'Action &amp; Adventure', 1600, 0, NULL, 'https://nano-mashine.fandom.com/wiki/Nano_Machine'),
(18, 'Rebirth of Heavenly Demon', 'Jeano Genuino', 'https://manhuaus.com/wp-content/uploads/2024/03/Reborn-As-The-Heavenly-Demon-1-175x238.webp', '2021-01-12', 'Kyoto Animation', 'History', 1399, 0, NULL, 'https://hwansaengcheonma.fandom.com/wiki/Rebirth_of_the_Heavenly_Demon'),
(19, 'Myst Might Mayhem', 'Jilbert Alos', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1726111518i/218728008.jpg', '2021-06-23', 'MarLoafer Inc.', 'Horror', 1800, 0, NULL, 'https://myst-might-mayhem.fandom.com/wiki/Myst,_Might,_Mayhem_Wiki'),
(22, 'Secret Class Vol. 4', 'Jeano Genuino', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1628862939i/58761106.jpg', '2021-08-20', 'Soberano Inst.', 'Romance', 2000, 0, NULL, 'https://en.namu.wiki/w/%EB%B9%84%EB%B0%80%EC%88%98%EC%97%85'),
(23, 'ORV', 'Jilbert Alos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkNcmdF0yOlzgNVU70KigAJd3WzVcZyctY8A&amp;amp;s', '2025-08-01', 'MarLoafer Inc.', 'Mystery', 1234, 0, NULL, 'https://en.wikipedia.org/wiki/Omniscient_Reader%27s_Viewpoint');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_table`
--
ALTER TABLE `book_table`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
