-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jul-2020 às 16:41
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `radio`
--

CREATE TABLE `radio` (
  `id` int(11) NOT NULL,
  `radionuclideo` varchar(50) NOT NULL,
  `radionuclide` varchar(50) NOT NULL,
  `liquid` float NOT NULL,
  `gas` float NOT NULL,
  `sol` float NOT NULL,
  `hl` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `radio`
--

INSERT INTO `radio` (`id`, `radionuclideo`, `radionuclide`, `liquid`, `gas`, `sol`, `hl`) VALUES
(1, 'Amerício-241', 'Americium-241', 370, 0.00037, 1, 157899),
(2, 'Antimônio-125', 'Antimony-125', 560000, 13, 100, 1006.87),
(5, 'Arsênio-76', 'Arsenic-76', 190000, 37, 100, 1.09333),
(7, 'Bário-131', 'Barium-131', 740000, 190, 100, 11.505),
(8, 'Bário-133', 'Barium-133', 370000, 17, 100, 3854.17),
(9, 'Hidrogênio-3', 'Hydrogen-3', 19000000, 1900, 1000000, 4502.31),
(10, 'Carbono-14', 'Carbon-14', 560000, 56, 10000, 2083330),
(11, 'Fósoforo-32', 'Phosphor', 170000, 9.3, 1000, 14.268),
(12, 'Cálcio-45', 'Calcium-45', 370000, 19, 10000, 162.61),
(13, 'Íodo-125', 'Iodine-125', 37000, 5.6, 1000, 59.407),
(14, 'Césio-137', 'Cesium-137', 19000, 37, 10, 10983.8),
(15, 'Ferro-59', 'iron-59', 190000, 9.3, 10, 44.49),
(16, 'Zinco-65', 'Zinc-65', 93000, 7.4, 100, 243.93),
(17, 'Estrôncio-90', 'Strontium-90', 9300, 0.11, 100, 10508.3),
(18, 'Iodo-131', 'Iodine-131', 19000, 3.7, 100, 8.0252);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id_reg` int(11) NOT NULL,
  `registro` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `radionucl` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `ativinic` float NOT NULL,
  `datamed` varchar(50) NOT NULL,
  `atividesc` float NOT NULL,
  `hl` float NOT NULL,
  `ndias` int(50) NOT NULL,
  `datadesc` varchar(50) NOT NULL,
  `estatus` varchar(5) NOT NULL,
  `ocultar` varchar(5) NOT NULL,
  `marcar` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`id_reg`, `registro`, `user`, `radionucl`, `estado`, `ativinic`, `datamed`, `atividesc`, `hl`, `ndias`, `datadesc`, `estatus`, `ocultar`, `marcar`) VALUES
(14, '123', 'Ary', 'Amerício-241', 'Liquido', 372, '25/03/2020', 370, 157899, 1228, '05/08/2023', 'Não', '', ''),
(15, '456', 'Ary', 'Amerício-241', 'Gasoso', 0.00038, '25/03/2020', 0.00037, 157899, 6075, '11/11/2036', 'Não', '', ''),
(16, '789', 'Ary', 'Amerício-241', 'Sólido', 1.1, '25/03/2020', 1, 157899, 21712, '04/09/2079', 'Não', '', ''),
(17, '321', 'Ary', 'Antimônio-125', 'Liquido', 580000, '25/03/2020', 560000, 1006.87, 51, '15/05/2020', 'Não', '', ''),
(18, '654', 'Ary', 'Antimônio-125', 'Gasoso', 25, '25/03/2020', 13, 1006.87, 950, '31/10/2022', 'Não', '', ''),
(19, '987', 'Ary', 'Antimônio-125', 'Sólido', 150, '25/03/2020', 100, 1006.87, 589, '04/11/2021', 'Não', '', ''),
(25, '963', 'Aline', 'Bário-131', 'Sólido', 600, '25/03/2020', 100, 11.505, 30, '24/04/2020', 'Não', '', ''),
(26, '357', 'Aline', 'Bário-133', 'Liquido', 370500, '25/03/2020', 370000, 3854.17, 8, '02/04/2020', 'Sim', '', ''),
(34, '7894', 'teste', 'Amerício-241', 'Liquido', 400, '31/03/2020', 370, 157899, 17760, '14/11/2068', 'Não', '', ''),
(36, '7532', 'teste', 'Amerício-241', 'Sólido', 1.5, '03/05/2000', 1, 157899, 92365, '23/03/2253', 'Sim', '', ''),
(38, '7852', 'teste', 'Antimônio-125', 'Sólido', 200, '24/03/2020', 100, 1006.87, 1007, '26/12/2022', 'Sim', 'X', ''),
(40, '54321', 'Aline', 'Bário-131', 'Liquido', 1000000, '03/04/2020', 740000, 11.505, 5, '08/04/2020', 'Não', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `admin` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usu`, `login`, `senha`, `admin`) VALUES
(1, 'teste', 'teste', NULL),
(2, 'admin', 'admin', 'A'),
(3, 'teste', 'teste', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
