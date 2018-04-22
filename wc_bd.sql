-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jan-2015 às 00:02
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wc_bd`
--
CREATE DATABASE IF NOT EXISTS `wc_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wc_bd`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

CREATE TABLE IF NOT EXISTS `calendario` (
  `id` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `inicio_evento` date NOT NULL,
  `fim_evento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `calendario`
--

INSERT INTO `calendario` (`id`, `inicio_evento`, `fim_evento`) VALUES
('FifaWc_2018', '2015-01-06', '2015-04-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE IF NOT EXISTS `cartao` (
`id_cartao` int(11) NOT NULL,
  `minuto` int(11) NOT NULL,
  `tipoCartao` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `id_jogo` int(11) NOT NULL,
  `id_jogador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `delegado_pais`
--

CREATE TABLE IF NOT EXISTS `delegado_pais` (
  `username` varchar(45) COLLATE utf8_bin NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `selecao` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `sexo` varchar(10) COLLATE utf8_bin NOT NULL,
  `nr_acessos` int(1) NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `nivel_acesso` int(11) NOT NULL DEFAULT '2',
  `endereco` varchar(40) COLLATE utf8_bin NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `delegado_pais`
--

INSERT INTO `delegado_pais` (`username`, `nome`, `selecao`, `email`, `sexo`, `nr_acessos`, `password`, `nivel_acesso`, `endereco`, `data_nascimento`) VALUES
('J', '', 'J', '', '', 0, '15f0cfc75b4afb683da6c0fa14efadff', 2, '', '0000-00-00'),
('JJJJJJJJJJJ', '', 'JJJJJJJJJ', '', '', 0, 'fc01c408e19180cb25d31a667abcd3fb', 2, '', '0000-00-00'),
('Sabelli', '', 'ARG', '', '', 0, '61dd86c2dc75c3f569ec619bd283a33f', 2, '', '0000-00-00'),
('jj', '', 'j', 'joaopedropeixotosilva1994@gmail.com', '', 0, 'af14021c3a00f39d1b167a409c27832f', 2, '', '0000-00-00'),
('joooo', '', 'jkkkkkkkkkkkkkk', '', '', 0, 'c903942509efde1c922068f3b5660c76', 2, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadio`
--

CREATE TABLE IF NOT EXISTS `estadio` (
`id_estadio` int(11) NOT NULL,
  `localizacao` varchar(45) COLLATE utf8_bin NOT NULL,
  `capacidade` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `estadio`
--

INSERT INTO `estadio` (`id_estadio`, `localizacao`, `capacidade`, `nome`) VALUES
(1, 'Lisboa', 0, 'Alvalade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
`ID` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `conteudo` varchar(1000) NOT NULL,
  `link` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `envio` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `feed`
--

INSERT INTO `feed` (`ID`, `titulo`, `conteudo`, `link`, `date`, `envio`) VALUES
(1, 'nbnn', 'hhhhhhhhhhhh', '', '2015-01-01', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `f_pergunta`
--

CREATE TABLE IF NOT EXISTS `f_pergunta` (
`id` int(4) NOT NULL,
  `topico` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `descricao` longtext COLLATE utf8_bin NOT NULL,
  `nome` varchar(65) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(65) COLLATE utf8_bin NOT NULL DEFAULT '',
  `data_h` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `f_pergunta`
--

INSERT INTO `f_pergunta` (`id`, `topico`, `descricao`, `nome`, `email`, `data_h`, `view`, `reply`) VALUES
(1, 'Ola', 'olala', 'ksk', 'joaopedrof@fj', '24/01/15 07:40:15', 32, 7),
(2, 'tht', 'gg', 'grgr', 'bgth', '25/01/15 12:31:14', 1, 0),
(3, 'TOpico', 'j', 'j', 'j', '26/01/15 06:37:28', 1, 0),
(4, 'TOpico', 'j', 'j', 'j', '26/01/15 06:37:48', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `f_resposta`
--

CREATE TABLE IF NOT EXISTS `f_resposta` (
  `id_pergunta` int(4) NOT NULL,
  `r_id` int(4) NOT NULL DEFAULT '0',
  `r_nome` varchar(65) COLLATE utf8_bin NOT NULL DEFAULT '',
  `r_email` varchar(65) COLLATE utf8_bin NOT NULL DEFAULT '',
  `resposta` longtext COLLATE utf8_bin NOT NULL,
  `r_data_h` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `f_resposta`
--

INSERT INTO `f_resposta` (`id_pergunta`, `r_id`, `r_nome`, `r_email`, `resposta`, `r_data_h`) VALUES
(1, 1, 'fmj', 'jf', 'jj\r\n', '25/01/15 12:21:51'),
(1, 2, 'kj', '', 'kk\r\n', '26/01/15 06:47:14'),
(1, 3, 'k', '', 'k\r\n', '26/01/15 06:58:33'),
(1, 4, 'k', 'k', 'j', '26/01/15 06:59:10'),
(1, 5, 'kk', 'k', 'k', '26/01/15 07:00:55'),
(1, 6, 'k', '', 'k\r\n', '26/01/15 07:01:44'),
(1, 7, 'mm', '', 'jjj', '26/01/15 08:49:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `golo`
--

CREATE TABLE IF NOT EXISTS `golo` (
`id_golo` int(11) NOT NULL,
  `id_jogador` int(11) NOT NULL,
  `id_jogo` int(11) NOT NULL,
  `minuto` int(11) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'S',
  `designacao` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `designacao`) VALUES
('A', 'Grupo A'),
('B', 'Grupo B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE IF NOT EXISTS `jogador` (
`id_jogador` int(11) NOT NULL,
  `nrGolos` int(11) NOT NULL,
  `id_selecao` varchar(45) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `num_camisola` int(11) NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `g_sanguineo` char(45) COLLATE utf8_bin NOT NULL,
  `internacionalizacao` int(11) NOT NULL,
  `c_amarelo` int(11) NOT NULL,
  `c_vermelho` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`id_jogador`, `nrGolos`, `id_selecao`, `data`, `nome`, `num_camisola`, `peso`, `altura`, `g_sanguineo`, `internacionalizacao`, `c_amarelo`, `c_vermelho`) VALUES
(1, 0, 'j', '0000-00-00', 'Joao', 2, 90, 172, 'A', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE IF NOT EXISTS `jogo` (
`id_jogo` int(200) NOT NULL,
  `fase` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `nome_arbitro` varchar(11) COLLATE utf8_bin NOT NULL,
  `nome_estadio` varchar(30) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `nr_cartoesAmarelos` int(11) NOT NULL,
  `golo_Ecasa` int(11) DEFAULT NULL,
  `golo_Evisitante` int(11) DEFAULT NULL,
  `equipaCasa` varchar(45) COLLATE utf8_bin NOT NULL,
  `equipaVisitante` varchar(45) COLLATE utf8_bin NOT NULL,
  `hora` time NOT NULL,
  `status` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'Agendado',
  `nrCartoesVermelhos` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `fase`, `nome_arbitro`, `nome_estadio`, `data`, `nr_cartoesAmarelos`, `golo_Ecasa`, `golo_Evisitante`, `equipaCasa`, `equipaVisitante`, `hora`, `status`, `nrCartoesVermelhos`) VALUES
(1, 'A', 'k', 'Alvalade', '2015-01-12', 0, 0, 0, 'J', 'J', '00:00:00', 'Realizado', 0),
(2, 'A', 'jjj', 'Alvalade', '0000-00-00', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(3, 'A', 'jj', 'Alvalade', '2015-01-13', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(4, 'A', 'mj', 'Alvalade', '0000-00-00', 0, 0, 0, 'J', 'J', '00:00:00', 'Realizado', 0),
(5, 'A', 'kkk', 'Alvalade', '0000-00-00', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(6, 'A', 'k', 'Alvalade', '2015-01-07', 0, 0, 0, 'J', 'J', '00:00:00', 'Realizado', 0),
(7, 'A', '', 'Alvalade', '0000-00-00', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(8, 'A', 'jjj', 'Alvalade', '2015-01-14', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(9, 'A', 'k', 'Alvalade', '0000-00-00', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(10, 'A', 'jj', 'Alvalade', '2015-01-19', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(11, 'A', 'kf', 'Alvalade', '2015-01-20', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(12, 'A', 'kk', 'Alvalade', '2015-01-07', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(13, 'A', 'lkk', 'Alvalade', '0000-00-00', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(14, 'A', 'kk', 'Alvalade', '2015-01-12', 0, 0, 0, 'J', 'JJJJJJJJJ', '00:00:00', 'Realizado', 0),
(15, 'A', '', '', '2015-01-06', 0, 0, 0, '', '', '00:00:00', 'Agendado', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela ` selecao`
--

CREATE TABLE IF NOT EXISTS ` selecao` (
  `id_selecao` varchar(40) COLLATE utf8_bin NOT NULL,
  `vitorias` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `user_responsavel` varchar(11) COLLATE utf8_bin NOT NULL,
  `pontos` int(11) NOT NULL,
  `id_grupo` char(1) COLLATE utf8_bin DEFAULT NULL,
  `progresso` varchar(45) COLLATE utf8_bin NOT NULL,
  `golosMarcado` int(11) NOT NULL,
  `golosSofridos` int(11) NOT NULL,
  `empates` int(11) NOT NULL,
  `derrotas` int(11) NOT NULL,
  `totalGolosMarcados` int(11) NOT NULL,
  `totalGolosSofridos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela ` selecao`
--

INSERT INTO ` selecao` (`id_selecao`, `vitorias`, `nome`, `user_responsavel`, `pontos`, `id_grupo`, `progresso`, `golosMarcado`, `golosSofridos`, `empates`, `derrotas`, `totalGolosMarcados`, `totalGolosSofridos`) VALUES
('J', 0, 'J', 'J', 17, 'A', 'A', 0, 0, 17, 0, 0, 0),
('JJJJJJJJJ', 0, 'JJJJJJJ', 'JJJJJJJJJJJ', 11, 'A', 'A', 0, 0, 11, 0, 0, 0),
('j', 0, 'j', 'jj', 0, NULL, '', 0, 0, 0, 0, 0, 0),
('jkkkkkkkkkkkkkk', 0, 'jjjjjjjjjjjjjjjjjjj', 'joooo', 0, NULL, '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `staff/eqtecnica`
--

CREATE TABLE IF NOT EXISTS `staff/eqtecnica` (
  `id_staff` int(11) NOT NULL,
  `nome` varchar(11) COLLATE utf8_bin NOT NULL,
  `sexo` varchar(11) COLLATE utf8_bin NOT NULL,
  `data_nasc` date NOT NULL,
  `id_selecao` varchar(45) COLLATE utf8_bin NOT NULL,
  `g_sanguineo` varchar(45) COLLATE utf8_bin NOT NULL,
  `funcao` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `staff/eqtecnica`
--

INSERT INTO `staff/eqtecnica` (`id_staff`, `nome`, `sexo`, `data_nasc`, `id_selecao`, `g_sanguineo`, `funcao`) VALUES
(0, 'Tengarinha', 'feminino', '1996-09-19', 'POR', 'A', 'Fisioterapeuta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE IF NOT EXISTS `utilizador` (
  `username` varchar(45) COLLATE utf8_bin NOT NULL,
  `nivel_acesso` int(1) DEFAULT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `sexo` varchar(45) COLLATE utf8_bin NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nr_acessos` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`username`, `nivel_acesso`, `nome`, `password`, `email`, `sexo`, `data_nascimento`, `endereco`, `nr_acessos`) VALUES
('admin', 0, 'MÃ¡rio', '662eaa47199461d01a623884080934ab', 'mario27cv@hotmail.com', 'masculino', '1994-01-27', 'GuimarÃ£es', 1),
('jj', 2, 'joaopedropeixotosilva1994@gmail.com', 'c599e0a12d459c8c43ccf2a3615e5e6c', '', '', '0000-00-00', '', 1),
('joao', 0, '', '2404a8131f636d6a0fc29008d9b6fe4f', 'joaopedropeixotosilva1994@gmail.com', 'masculino', '2015-01-21', 'joao', 0),
('kkkkkkkkk', 0, '', '5cafad0ec991ceb4d9cdf2207765a4b1', 'joaopedropeixotosilva1994@gmail.com', 'masculino', '0000-00-00', 'kk', 0),
('nuno', 0, '', 'adcbc3a85b593a8f651b4b396d3046e8', 'nuno_escaleira@portugalmail.com', 'masculino', '2015-01-14', 'nuno', 0),
('ole', 0, '', '7214dce354acbff06c81f66c4cd00081', 'joaopedropeixotosilva@gmail.com', 'masculino', '0000-00-00', 'ole', 0),
('peixoto', 0, '', 'c599e0a12d459c8c43ccf2a3615e5e6c', 'joaopedropeixotosilva1994@gmail.com', 'masculino', '0000-00-00', '', 1),
('tu', 0, '', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', 'joaopedropeixotosilva@gmail.com', 'masculino', '0000-00-00', 'tu', 0),
('ze', 1, '', '98b456a0723fa616284a632d9d31821b', 'joaopedropeixotosilva1994@gmail.com', 'masculino', '2015-01-15', 'ze', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartao`
--
ALTER TABLE `cartao`
 ADD PRIMARY KEY (`id_cartao`);

--
-- Indexes for table `delegado_pais`
--
ALTER TABLE `delegado_pais`
 ADD PRIMARY KEY (`username`), ADD KEY `selecao` (`selecao`), ADD KEY `selecao_2` (`selecao`);

--
-- Indexes for table `estadio`
--
ALTER TABLE `estadio`
 ADD PRIMARY KEY (`id_estadio`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `f_pergunta`
--
ALTER TABLE `f_pergunta`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `f_resposta`
--
ALTER TABLE `f_resposta`
 ADD PRIMARY KEY (`r_id`), ADD KEY `a_id` (`r_id`), ADD KEY `question_id` (`id_pergunta`), ADD KEY `question_id_2` (`id_pergunta`), ADD KEY `question_id_3` (`id_pergunta`), ADD KEY `a_id_2` (`r_id`), ADD KEY `question_id_4` (`id_pergunta`), ADD KEY `question_id_5` (`id_pergunta`);

--
-- Indexes for table `golo`
--
ALTER TABLE `golo`
 ADD PRIMARY KEY (`id_golo`), ADD KEY `id_jogador` (`id_jogador`), ADD KEY `id_jogo` (`id_jogo`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `jogador`
--
ALTER TABLE `jogador`
 ADD PRIMARY KEY (`id_jogador`), ADD UNIQUE KEY `id_jogador` (`id_jogador`), ADD KEY `id_selecao` (`id_selecao`);

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
 ADD PRIMARY KEY (`id_jogo`), ADD KEY `id_arbitro` (`nome_arbitro`), ADD KEY `id_estadio` (`nome_estadio`), ADD KEY `id_cartao` (`nr_cartoesAmarelos`);

--
-- Indexes for table ` selecao`
--
ALTER TABLE ` selecao`
 ADD PRIMARY KEY (`id_selecao`), ADD KEY `grupo` (`id_grupo`), ADD KEY `nome` (`nome`), ADD KEY `userResponsav` (`nome`), ADD KEY `userResponsav_2` (`nome`), ADD KEY `user_responsavel` (`user_responsavel`), ADD KEY `user_responsavel_2` (`user_responsavel`), ADD KEY `nome_2` (`nome`), ADD KEY `nome_3` (`nome`);

--
-- Indexes for table `staff/eqtecnica`
--
ALTER TABLE `staff/eqtecnica`
 ADD PRIMARY KEY (`id_staff`), ADD KEY `id_selecao` (`id_selecao`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartao`
--
ALTER TABLE `cartao`
MODIFY `id_cartao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estadio`
--
ALTER TABLE `estadio`
MODIFY `id_estadio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `f_pergunta`
--
ALTER TABLE `f_pergunta`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `golo`
--
ALTER TABLE `golo`
MODIFY `id_golo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jogador`
--
ALTER TABLE `jogador`
MODIFY `id_jogador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
MODIFY `id_jogo` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
