-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Nov-2023 às 00:45
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reciclagem`
--
CREATE DATABASE IF NOT EXISTS `reciclagem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `reciclagem`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `rua` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `CEP` varchar(40) NOT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `situacao` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `senha`, `cpf`, `data_nasc`, `telefone`, `rua`, `numero`, `complemento`, `referencia`, `bairro`, `CEP`, `cidade`, `tipo`, `estado`, `situacao`) VALUES
(6, 'Administrador', 'adm@gmail.com', '$2y$10$4SefTRiNPVMN6r5fcOXJreMcJ7zI3i4S14QPbQUKm.OcIhQelvQdS', '33333', '2006-03-14', '1', 'a', '1', 'a', 'a', 'a', '1', 'a', 'administrador', 'a', 1),
(4, 'Rafael José', 'catador@gmail.com', '$2y$10$8pv/TN4U0PRuTyBvmF4QWegAGSNQmcemnW7E5kMUDuSn4TYgxmFuy', '27867754421', '2023-09-05', '19998276675', 'Rua Maria das Flores', '189', '', 'Próximo ao cimitério', 'Vila Maravilha', '13720000', 'São José do Rio Pardo', 'catador', 'SP', 1),
(16, 'Lucas Gil', 'cliente@gmail.com', '$2y$10$C8RQ5WPYEzAEjUM3FnsZPudomscYi77BvLRPP0UcFiv04XbeG1pFq', '24005115861', '2006-03-14', '19992355091', 'Rua Coronel Fonseca', '563', '', 'Próximo ao Tiro de Guerra', 'Vila Formosa', '13720000', 'São José do Rio Pardo', 'cliente', 'SP', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coleta`
--

DROP TABLE IF EXISTS `coleta`;
CREATE TABLE IF NOT EXISTS `coleta` (
  `id_coleta` int NOT NULL AUTO_INCREMENT,
  `data_cadastro` date NOT NULL,
  `data_coleta` date DEFAULT NULL,
  `status` int DEFAULT '1',
  `id_cliente` int NOT NULL,
  `info_adicionais` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hr_disp_inicial` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_catador` int DEFAULT NULL,
  `hr_disp_final` varchar(30) NOT NULL,
  `plastico` varchar(55) NOT NULL,
  `vidro` varchar(55) NOT NULL,
  `madeira` varchar(55) NOT NULL,
  `metal` varchar(55) NOT NULL,
  `papel` varchar(55) NOT NULL,
  `papelao` varchar(55) NOT NULL,
  `rua` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numero` varchar(100) NOT NULL,
  `bairro` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cidade` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estado` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `referencia` varchar(55) NOT NULL,
  `nome` varchar(55) NOT NULL,
  `telefone` varchar(55) NOT NULL,
  PRIMARY KEY (`id_coleta`),
  KEY `fk_cliente_coleta` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `coleta`
--

INSERT INTO `coleta` (`id_coleta`, `data_cadastro`, `data_coleta`, `status`, `id_cliente`, `info_adicionais`, `hr_disp_inicial`, `id_catador`, `hr_disp_final`, `plastico`, `vidro`, `madeira`, `metal`, `papel`, `papelao`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `referencia`, `nome`, `telefone`) VALUES
(37, '2023-12-12', NULL, 2, 16, 'ligar ao chegar ', '12:00', 4, '22:00', 'Plástico', 'Vidro', 'Madeira', '', '', '', 'Rua Coronel Fonseca', '563', 'Vila Formosa', 'São José do Rio Pardo', 'SP', 'Próximo ao Tiro de Guerra', 'Lucas Gil', '19992355091'),
(38, '2023-11-28', '2023-11-23', 3, 16, 'Tocar a campainha', '17:00', 4, '19:00', 'Plástico', 'Vidro', '', 'Metal', '', '', 'Rua Coronel Fonseca', '563', 'Vila Formosa', 'São José do Rio Pardo', 'SP', 'Próximo ao Tiro de Guerra', 'Lucas Gil', '19992355091'),
(39, '2023-07-15', NULL, 1, 4, 'Tenho 1 saco de garrafa Pet', '11:11', NULL, '19:00', 'Plástico', '', '', '', '', '', 'Rua Maria das Flores', '189', 'Vila Maravilha', 'São José do Rio Pardo', 'SP', 'Próximo ao cimitério', 'Rafael José', '19998276675');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coleta_material`
--

DROP TABLE IF EXISTS `coleta_material`;
CREATE TABLE IF NOT EXISTS `coleta_material` (
  `id_coleta` int NOT NULL,
  `id_material` int NOT NULL,
  PRIMARY KEY (`id_coleta`,`id_material`),
  KEY `id_material` (`id_material`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

DROP TABLE IF EXISTS `conteudo`;
CREATE TABLE IF NOT EXISTS `conteudo` (
  `id_conteudo` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `conteudo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pagina` varchar(50) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `caminho_img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_conteudo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `conteudo`
--

INSERT INTO `conteudo` (`id_conteudo`, `titulo`, `conteudo`, `pagina`, `imagem`, `caminho_img`) VALUES
(1, 'Plásticos e Papéis', 'Separar plásticos dos papéis é fundamental para garantir uma reciclagem eficaz. Os plásticos incluem garrafas, recipientes de alimentos e embalagens, enquanto os papéis abrangem jornais, revistas, papel de escritório e caixas de papelão. Essa separação evita a contaminação dos materiais e facilita o processamento em diferentes instalações de reciclagem.', 'Index e Como separar', NULL, '../src/imagens/plastico.jfif'),
(2, 'Vidro e Metal', 'O vidro e o metal devem ser separados para garantir a qualidade dos materiais reciclados. O vidro inclui garrafas, potes e frascos, enquanto o metal abrange latas de alumínio e de aço. Esses materiais, quando reciclados separadamente, são fundidos em temperaturas específicas para produzir novos itens, reduzindo o desperdício e a necessidade de matéria-prima virgem.', 'Como separar', NULL, '../src/imagens/coisas_recicla.jpg'),
(3, 'Limpeza Adequada', 'Enxaguar ou limpar os materiais recicláveis, como latas, garrafas e embalagens, antes de descartá-los é importante. Isso remove resíduos e evita contaminação, mantendo a qualidade dos materiais reciclados. Resíduos de alimentos podem dificultar o processamento dos materiais e comprometer a qualidade do produto final.', 'Index e Como separar', NULL, '../src/imagens/coleta.jpg'),
(4, 'Identificação de Tipos de Plástico', 'Reconhecer os tipos de plástico é crucial para separá-los corretamente. Os diferentes tipos de plástico, identificados por símbolos de reciclagem, como PET, PVC, PEAD, PP, entre outros, requerem processos de reciclagem distintos. Separá-los facilita a reciclagem e ajuda a evitar a contaminação de lotes de materiais.', 'Como separar', NULL, '../src/imagens/coisas_recicla.jpg'),
(5, 'Separação por Cores', 'Em algumas regiões, separar plásticos por cores é importante para a reciclagem. Plásticos transparentes, como garrafas de água, e plásticos coloridos, como embalagens de detergentes, são processados de maneira diferente. Essa separação auxilia na obtenção de materiais reciclados de alta qualidade.', 'Index e Como separar', NULL, '../src/imagens/descarte.jpg'),
(6, 'Consciência sobre Eletrônicos', 'A separação adequada de eletrônicos é vital para prevenir danos ambientais. Dispositivos eletrônicos contêm metais pesados e componentes tóxicos, e a disposição inadequada pode contaminar o solo e a água. Encontre locais de coleta específicos para reciclagem de eletrônicos e baterias para um descarte responsável.', 'Index e Como separar', NULL, '../src/imagens/lixoeletronico.jfif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `id_material` int NOT NULL AUTO_INCREMENT,
  `material` varchar(30) NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id_material`, `material`) VALUES
(1, 'Plástico'),
(2, 'Vidro'),
(3, 'Madeira'),
(4, 'Metal'),
(5, 'Papel'),
(6, 'Papelão');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
