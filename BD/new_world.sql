-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2018 às 21:47
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_world`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `situacao` varchar(40) NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `idProduto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`dataInicio`, `dataFim`, `situacao`, `idCliente`, `idProduto`) VALUES
('2018-10-09', '2018-10-30', 'Ativo', 3, 3),
('2018-10-17', '2018-10-31', 'Ativo', 3, 4),
(NULL, NULL, 'Ativo', 3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ator`
--

CREATE TABLE `ator` (
  `idAtor` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `gameography` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(10) UNSIGNED NOT NULL,
  `pontos` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `idJogo` int(10) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(10) UNSIGNED NOT NULL,
  `nick` varchar(25) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `rua` varchar(60) NOT NULL,
  `numero` int(10) UNSIGNED NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `idGamer` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nick`, `telefone`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `foto`, `idGamer`, `updated_at`, `created_at`) VALUES
(3, 'DeRezen313', '(99) 99999-9999', 'Bairro São Sebastião', 195, 'São Sebastião', 'Matozinhos', 'mg', '35720-000', '1539111904.jpg', 7, '2018-10-09 19:05:04', '2018-10-09 19:05:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `elenco`
--

CREATE TABLE `elenco` (
  `idElenco` int(10) UNSIGNED NOT NULL,
  `idJogo` int(10) UNSIGNED NOT NULL,
  `idAtor` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gamer`
--

CREATE TABLE `gamer` (
  `idGamer` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `gamer`
--

INSERT INTO `gamer` (`idGamer`, `nome`, `email`, `senha`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Daniel Vargas', 'megustagames33@gmail.com', '12345678', 'Qb0upeQAS9kACCPdrvlxARIvXjCJM6QEsKHLGOEEiAw990Hoc0n7R5jAfxK5', '2018-10-09 22:02:59', '2018-10-09 22:02:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `idJogo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `plataforma` varchar(30) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dataLancamento` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `desenvolvedora` varchar(30) NOT NULL,
  `modoJogo` varchar(60) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livestream`
--

CREATE TABLE `livestream` (
  `idLivestream` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `streamer` varchar(60) NOT NULL,
  `transmissao` varchar(255) NOT NULL,
  `idJogo` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_09_27_212638_user_gamer', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(60) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tiponegocio` varchar(40) NOT NULL,
  `preco` double UNSIGNED DEFAULT NULL,
  `taxa` double UNSIGNED DEFAULT NULL,
  `status` varchar(40) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `idTipoProduto` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `tiponegocio`, `preco`, `taxa`, `status`, `foto`, `idTipoProduto`, `updated_at`, `created_at`) VALUES
(3, 'WarGod', 'Um jogo incrivel de ação, aventura, emoção e magia.', 'Venda', 100, 5, 'am', '1539122306.png', 3, '2018-10-09 21:58:26', '2018-10-09 21:58:26'),
(4, 'Dota', 'Moba desenvolvido pela Valve', 'Troca', 286, 14.3, 'seminovo', '1539786661.jpg', 3, '2018-10-17 14:31:01', '2018-10-17 14:31:01'),
(5, 'Dead Cells', 'Um jogo rogue-like que desafia seus reflexos e habilidades ao máximo.', 'Troca', NULL, 0, 'Novo', '1540289787.jpg', 3, '2018-10-23 10:16:27', '2018-10-23 10:16:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE `tipoproduto` (
  `idTipo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (`idTipo`, `nome`, `descricao`) VALUES
(3, 'Jogo', 'Videogame'),
(4, 'Manete', 'Componente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`idCliente`,`idProduto`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `ator`
--
ALTER TABLE `ator`
  ADD PRIMARY KEY (`idAtor`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `idJogo` (`idJogo`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idGamer` (`idGamer`);

--
-- Indexes for table `elenco`
--
ALTER TABLE `elenco`
  ADD PRIMARY KEY (`idElenco`),
  ADD KEY `idJogo` (`idJogo`),
  ADD KEY `idAtor` (`idAtor`);

--
-- Indexes for table `gamer`
--
ALTER TABLE `gamer`
  ADD PRIMARY KEY (`idGamer`);

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`idJogo`);

--
-- Indexes for table `livestream`
--
ALTER TABLE `livestream`
  ADD PRIMARY KEY (`idLivestream`),
  ADD KEY `idJogo` (`idJogo`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `idTipoProduto` (`idTipoProduto`);

--
-- Indexes for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ator`
--
ALTER TABLE `ator`
  MODIFY `idAtor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `elenco`
--
ALTER TABLE `elenco`
  MODIFY `idElenco` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gamer`
--
ALTER TABLE `gamer`
  MODIFY `idGamer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
  MODIFY `idJogo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livestream`
--
ALTER TABLE `livestream`
  MODIFY `idLivestream` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  MODIFY `idTipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  ADD CONSTRAINT `anuncio_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`idJogo`) REFERENCES `jogo` (`idJogo`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idGamer`) REFERENCES `gamer` (`idGamer`);

--
-- Limitadores para a tabela `elenco`
--
ALTER TABLE `elenco`
  ADD CONSTRAINT `elenco_ibfk_1` FOREIGN KEY (`idJogo`) REFERENCES `jogo` (`idJogo`),
  ADD CONSTRAINT `elenco_ibfk_2` FOREIGN KEY (`idAtor`) REFERENCES `ator` (`idAtor`);

--
-- Limitadores para a tabela `livestream`
--
ALTER TABLE `livestream`
  ADD CONSTRAINT `livestream_ibfk_1` FOREIGN KEY (`idJogo`) REFERENCES `jogo` (`idJogo`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idTipoProduto`) REFERENCES `tipoproduto` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
