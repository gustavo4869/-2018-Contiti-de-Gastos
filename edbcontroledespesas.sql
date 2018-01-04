-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 04-Jan-2018 às 00:32
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edbcontroledespesas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcategoria`
--

DROP TABLE IF EXISTS `tcategoria`;
CREATE TABLE IF NOT EXISTS `tcategoria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcategoria`
--

INSERT INTO `tcategoria` (`ID`, `Descricao`) VALUES
(1, 'Carro'),
(2, 'Comida'),
(3, 'Lazer'),
(4, 'Cainho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tcategoriaentrada`
--

DROP TABLE IF EXISTS `tcategoriaentrada`;
CREATE TABLE IF NOT EXISTS `tcategoriaentrada` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(256) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tcategoriaentrada`
--

INSERT INTO `tcategoriaentrada` (`ID`, `Descricao`) VALUES
(1, 'Adiantamento (Dia 30)'),
(2, 'HSI - SalÃ¡rio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tdespesas`
--

DROP TABLE IF EXISTS `tdespesas`;
CREATE TABLE IF NOT EXISTS `tdespesas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` varchar(15) NOT NULL,
  `Data` datetime NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Descricao` varchar(255) NOT NULL,
  `Valor` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tdespesas`
--

INSERT INTO `tdespesas` (`ID`, `CPF`, `Data`, `ID_Categoria`, `Descricao`, `Valor`) VALUES
(1, '40398306877', '2017-12-12 00:00:00', 1, 'Matiti', 120),
(2, '40398306877', '2018-01-06 00:00:00', 1, 'Estacionamento', 150);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentradas`
--

DROP TABLE IF EXISTS `tentradas`;
CREATE TABLE IF NOT EXISTS `tentradas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` varchar(15) NOT NULL,
  `Data` date NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Descricao` varchar(256) NOT NULL,
  `Valor` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tentradas`
--

INSERT INTO `tentradas` (`ID`, `CPF`, `Data`, `ID_Categoria`, `Descricao`, `Valor`) VALUES
(1, '40398306877', '2018-01-01', 2, 'SalÃ¡rio', 1130);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tusuarios`
--

DROP TABLE IF EXISTS `tusuarios`;
CREATE TABLE IF NOT EXISTS `tusuarios` (
  `CPF` varchar(15) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Senha` varchar(30) NOT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tusuarios`
--

INSERT INTO `tusuarios` (`CPF`, `Nome`, `DataNascimento`, `Usuario`, `Senha`) VALUES
('40398306877', 'Gustavo Ferreira', '1997-05-28', 'Gustavo4869', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
