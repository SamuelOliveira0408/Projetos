-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 02:53 AM
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
-- Database: `loginclientes`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'samuel', 'samuel@gmail.com', '$2y$10$9m.DwcjAQHUX9/wfo.RbN.SLDTrpCrXcOCY529Com1kSNsVN8ntm.'),
(2, 'teste', 'teste@gmail.con', '$2y$10$iBx.zaW/nOs0wmriR53zhOoJop8vZUCtaEakIHwG5k6yrrC.sIHIG'),
(3, '', '', '$2y$10$y8OdNs8FFyhlh/hGCo0ohuU7cve62KTfp.NIs4CcQ2QCSy8CqfGg2'),
(4, 'teste2', 'teste@teste', '$2y$10$EYXbnqRu2AYcqxyvqIE9/uvp62wcT37AdTsKHZlxnMsJrJEiHvWxK'),
(5, '', '', '$2y$10$2uulzmsr9/T9zgtzI3zBQOBCcM6D/RVLEcm4Kf.3LWzx.sYA.vHFC'),
(6, '', '', '$2y$10$gDOh.yNyYJse/7DoLznig./dCv.Kac0cacDYwXut9gbh4D0L/.X.S'),
(7, '', '', '$2y$10$w1P8HjnBM26VYtMGc0LcWuIjSZlDl30osZqnF.RxJLLEPO9.zFRdq'),
(8, '', '', '$2y$10$NmAZLSL.e9DxuSNOQovl0ul213vzw8h1OsswEbLuYvOHrYqT2ztMG'),
(9, 'teste2', 'teste@gmail.com', '$2y$10$t9cmmHLfVQwrwfsX.m8PreaFT/j1xZMsDl2fEVloRgw8ErMnNgzwa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
