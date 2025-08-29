-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/07/2024 às 14:43
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_etec`
--
CREATE DATABASE IF NOT EXISTS `banco_etec` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `banco_etec`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(8) NOT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome`, `login`, `senha`) VALUES
(1, 'samuel', 'samukahen2020@gmail.com', '123456'),
(2, 'samuel', 'samukahen2020@gmail.com', '123456'),
(3, 'samuel', 'samukahen2020@gmail.com', '123456'),
(13, 'samuka', 'fafa@gmail.com', 'dadada'),
(14, 'samuka', 'fafa@gmail.com', 'dadada'),
(15, 'samuka', 'fafa@gmail.com', 'dadada'),
(16, 'samuka', 'fafa@gmail.com', 'dadada'),
(17, 'samuka', 'fafa@gmail.com', 'dadada'),
(18, 'samuka', 'fafa@gmail.com', 'dadada'),
(19, 'samuka', 'fafa@gmail.com', 'dadada'),
(20, 'samuka', 'fafa@gmail.com', 'dadada'),
(21, 'samuka', 'fafa@gmail.com', 'dadada'),
(22, 'samuka', 'fafa@gmail.com', 'dadada'),
(23, 'samuka', 'fafa@gmail.com', 'dadada'),
(24, 'samuka', 'fafa@gmail.com', 'dadada'),
(25, 'samuka', 'fafa@gmail.com', 'dadada'),
(26, 'samuka', 'fafa@gmail.com', 'dadada'),
(27, 'samuka', 'fafa@gmail.com', 'dadada'),
(28, 'samuka', 'fafa@gmail.com', 'dadada'),
(29, 'samuka', 'fafa@gmail.com', 'dadada'),
(30, 'samuka', 'fafa@gmail.com', 'dadada'),
(31, 'samuka', 'fafa@gmail.com', 'dadada'),
(32, 'samuka', 'fafa@gmail.com', 'dadada'),
(33, 'samuka', 'fafa@gmail.com', 'dadada'),
(34, 'samuka', 'fafa@gmail.com', 'dadada');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
