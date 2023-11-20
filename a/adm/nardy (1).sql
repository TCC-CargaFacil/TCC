-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2023 às 10:07
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
(3, 'Rafael Pereira da Silveira', '14032122601', 'teste@contratante', 'a', 'a', 1, '37998701360');

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
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mot` int(11) DEFAULT NULL,
  `id_cont` int(11) DEFAULT NULL,
  `telefonecam` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `frete`
--

INSERT INTO `frete` (`id`, `data_limite_entrega`, `horario_limite_entrega`, `local_saida_carga`, `local_destino_entrega`, `nome_responsavel_envio`, `nome_responsavel_admissao`, `preco_entrega`, `peso_entrega`, `tipo_carga`, `telefone`, `id_mot`, `id_cont`, `telefonecam`) VALUES
(4, '2024-01-26', '10:23:00', 'Rua Monte Belo', 'Rua Guatemala', 'Carlos Manuel', 'Cristiano Ronaldo', 10.00, 65.00, 'Alimentício ', '37998701360', 8, 3, '37998701360'),
(5, '2024-01-24', '08:45:00', 'Rua Havava', 'Rua Marco Polo', 'Julio Cesar', 'Lionel Messi', 164.00, 40.00, 'Movel', '37998701360', NULL, 3, NULL),
(6, '2024-02-15', '10:23:00', 'Rua Macacos me Mordam', 'Rua Me Ajuda Yodão', 'Jukes', 'Mucalol', 10000.00, 96.00, 'Segredo', '37998701360', 8, 3, '37998701360');

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
(9, 'Rafael Pereira da Silveira', '14032122601', 'teste@motorista', 'a', 'a', 0, NULL);

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
  MODIFY `idContratante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `frete`
--
ALTER TABLE `frete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `motorista`
--
ALTER TABLE `motorista`
  MODIFY `idMotorista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
