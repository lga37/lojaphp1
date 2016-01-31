-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Ago-2015 às 03:51
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--
create database loja;

use loja;



CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'eletrônicos'),
(2, 'Informática'),
(3, 'Vestuário'),
(4, 'Diversos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `categ_id` int(11) NOT NULL,
  `preco` float NOT NULL,
  `peso` float NOT NULL DEFAULT '0',
  `prazo` varchar(12) NOT NULL DEFAULT 'E',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `img` varchar(50) DEFAULT NULL,
  `desc` text,
  `estoque` int(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categ_id`, `preco`, `peso`, `prazo`, `status`, `img`, `desc`, `estoque`) VALUES
(1, 'Calculadora Cientifica', 1, 300, 0.5, 'E', 1, 'calculadora.jpg', 'Desc', 3),
(2, 'Aparelho GPS Geolocalizacao', 1, 1300.5, 1, '3', 1, 'gps.jpg', 'Desc', 2),
(3, 'Relogio de parede', 1, 110.5, 2, 'E', 1, 'relogio.jpg', 'Desc', 3),
(4, 'Aparelho DVD automotivo', 1, 1330.5, 3, 'E', 1, 'dvdautomotivo.jpg', 'Desc', 0),
(5, 'Computador de mesa', 2, 2300.5, 4, '3', 1, 'computador.jpg', 'Desc', 3),
(6, 'Roupa para vestuario', 3, 130.5, 0, '1', 1, 'roupa1.jpg', 'Desc', 0),
(7, 'Roupa para vestuario', 3, 90.5, 0, '1', 1, 'roupa2.jpg', 'Desc', 3),
(8, 'Roupa para vestuario', 3, 90.5, 0, '1', 1, 'roupa3.jpg', 'Desc', 3),
(9, 'Roupa para vestuario', 3, 8.5, 0, '1', 1, 'roupa4.jpg', 'Desc', 3),
(10, 'Roupa para vestuario', 3, 8.5, 0, '1', 1, 'roupa5.jpg', 'Desc', 3),
(11, 'Roupa para vestuario', 3, 18.5, 0, '1', 1, 'roupa6.jpg', 'Desc', 3),
(12, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa7.jpg', 'Desc', 3),
(13, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa8.jpg', 'Desc', 3),
(14, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa9.jpg', 'Desc', 3),
(15, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa10.jpg', 'Desc', 3),
(16, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa11.jpg', 'Desc', 3),
(17, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa12.jpg', 'Desc', 3),
(18, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa13.jpg', 'Desc', 3),
(19, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa14.jpg', 'Desc', 3),
(20, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa15.jpg', 'Desc', 3),
(21, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa16.jpg', 'Desc', 3),
(22, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa17.jpg', 'Desc', 3),
(23, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa18.jpg', 'Desc', 3),
(24, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa19.jpg', 'Desc', 3),
(25, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa20.jpg', 'Desc', 3),
(26, 'Roupa para vestuario', 3, 28.5, 0, '1', 1, 'roupa21.jpg', 'Desc', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Criando o usuario com permissao somente de select.
GRANT select ON loja.* TO lga@localhost IDENTIFIED BY '123' WITH GRANT OPTION

