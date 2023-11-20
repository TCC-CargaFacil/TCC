-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2023 às 03:33
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nardy`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contratante`
--

CREATE TABLE `contratante` (
  `idContratante` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `ConfSenha` varchar(50) NOT NULL,
  `Perfil` int(11) NOT NULL DEFAULT 1,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contratante`
--

INSERT INTO `contratante` (`idContratante`, `Nome`, `CPF`, `Email`, `Senha`, `ConfSenha`, `Perfil`, `telefone`) VALUES
(2, 'testep', '123', 'teste@contratante', '123', '123', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `frete`
--

CREATE TABLE `frete` (
  `id` int(11) NOT NULL,
  `data_limite_entrega` date DEFAULT NULL,
  `horario_limite_entrega` time DEFAULT NULL,
  `local_saida_carga` varchar(255) DEFAULT NULL,
  `local_destino_entrega` varchar(255) DEFAULT NULL,
  `nome_responsavel_envio` varchar(255) DEFAULT NULL,
  `nome_responsavel_admissao` varchar(255) DEFAULT NULL,
  `preco_entrega` decimal(10,2) DEFAULT NULL,
  `peso_entrega` decimal(10,2) DEFAULT NULL,
  `tipo_carga` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `motorista`
--

CREATE TABLE `motorista` (
  `idMotorista` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `ConfSenha` varchar(50) NOT NULL,
  `Perfil` int(11) NOT NULL DEFAULT 0,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `motorista`
--

INSERT INTO `motorista` (`idMotorista`, `Nome`, `CPF`, `Email`, `Senha`, `ConfSenha`, `Perfil`, `telefone`) VALUES
(7, 'teste', '123', 'teste@motorista', '123', '123', 0, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contratante`
--
ALTER TABLE `contratante`
  ADD PRIMARY KEY (`idContratante`);

--
-- Índices de tabela `frete`
--
ALTER TABLE `frete`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`idMotorista`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contratante`
--
ALTER TABLE `contratante`
  MODIFY `idContratante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `frete`
--
ALTER TABLE `frete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `motorista`
--
ALTER TABLE `motorista`
  MODIFY `idMotorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
