-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Dez-2017 às 15:47
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- tdespesas
--CREATE TABLE `edbcontroledespesas`.`tdespesas` ( `ID` INT NOT NULL AUTO_INCREMENT , `CPF` VARCHAR(15) NOT NULL , `Data` DATE NOT NULL , `ID_Categoria` INT NOT NULL , `Descricao` VARCHAR(256) NOT NULL , `Valor` DOUBLE NOT NULL , PRIMARY KEY (`ID`)) ENGINE = MyISAM;

--//tusuarios
--CREATE TABLE `edbcontroledespesas`.`tusuarios` ( `CPF` VARCHAR(15) NOT NULL , `Nome` VARCHAR(256) NOT NULL , `DataNascimento` DATE NOT NULL , `Usuario` VARCHAR(256) NOT NULL , `Senha` VARCHAR(20) NOT NULL , PRIMARY KEY (`CPF`))



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edbcontroledespesas`
--

--
-- Extraindo dados da tabela `tcategoria`
--

INSERT INTO `tcategoria` (`ID`, `Descricao`) VALUES
(1, 'Carro'),
(2, 'Comida'),
(3, 'Lazer'),
(4, 'Cainho');

--
-- Extraindo dados da tabela `tdespesas`
--

INSERT INTO `tdespesas` (`ID`, `CPF`, `Data`, `ID_Categoria`, `Descricao`, `Valor`) VALUES
(1, '40398306877', '2017-12-12 00:00:00', 1, 'Matiti', 120);

--
-- Extraindo dados da tabela `tusuarios`
--

INSERT INTO `tusuarios` (`CPF`, `Nome`, `DataNascimento`, `Usuario`, `Senha`) VALUES
('40398306877', 'Gustavo Ferreira', '1997-05-28', 'Gustavo4869', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
