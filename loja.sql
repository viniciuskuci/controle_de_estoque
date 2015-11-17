-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Nov-2015 às 11:32
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `loja`
--
CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'vinicius', 'vini@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `valor` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `validade` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `nome`, `valor`, `quantidade`, `validade`) VALUES
(1, 'Faca', 29.9, 10, '20/11/2050'),
(3, 'Papel de Parede', 500, 15, ''),
(4, 'Pote', 9.5, 80, '08/02/2060'),
(5, 'cocô', 50.5, 2, '29/08/2005'),
(6, 'batata chips', 8.5, 50, '20/05/2016'),
(7, 'mouse', 15.5, 20, ''),
(8, 'fgbngfbr', 0, 0, 'rtgbfdbhre'),
(9, 'faca', 26, 25, '25/02/2007'),
(10, 'tesoura', 6, 80, ''),
(11, 'celular', 5, 50, '25/02/2050'),
(12, 'jonatã', 5, 266, '2'),
(13, 'kjdchsjakcsbajdcbufw', 127, 2, '2'),
(14, '2omjkmjimjmjmjum', 127, 62562525, '3'),
(15, '1', 1, 1, '54645645645'),
(18, 'mouse', 25, 6, ''),
(19, 'milho', 3, 25, '25/06/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginadd`
--

CREATE TABLE IF NOT EXISTS `loginadd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `loginadd`
--

INSERT INTO `loginadd` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'administrador', 'adm@hotmail.com', 2525);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `valor` tinyint(1) NOT NULL,
  `quantidade` int(100) NOT NULL,
  `validade` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `quantidade`, `validade`) VALUES
(15, 'faca', 25, 25, '05/05/2050'),
(16, 'refrigerante', 3, 25, '02/05/2050'),
(17, 'faqueiro', 127, 5, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'su', 'su@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vereditar`
--

CREATE TABLE IF NOT EXISTS `vereditar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `vereditar`
--

INSERT INTO `vereditar` (`id`, `nome`, `email`, `senha`) VALUES
(1, '2222', '2222@hotmail.com', '2222');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
