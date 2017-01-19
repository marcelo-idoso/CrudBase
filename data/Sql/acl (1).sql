-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jan-2017 às 17:09
-- Versão do servidor: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) unsigned NOT NULL,
  `NOME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `NOME`, `date_create`, `date_update`) VALUES
(1, 'teste', '2017-01-18 15:34:14', NULL),
(5, 'teste 2 ', '2017-01-18 15:37:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `controlador`
--

CREATE TABLE IF NOT EXISTS `controlador` (
  `id` int(10) unsigned NOT NULL,
  `idmodule` int(10) unsigned NOT NULL,
  `dsControlador` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `controlador`
--

INSERT INTO `controlador` (`id`, `idmodule`, `dsControlador`, `date_create`, `date_update`) VALUES
(1, 1, 'Controlador', '2016-12-21 14:06:29', '2016-12-27 10:43:19'),
(7, 1, 'Menu', '2016-12-27 14:29:22', NULL),
(8, 1, 'Module', '2016-12-27 14:29:30', NULL),
(9, 2, 'IndexSite', '2017-01-12 11:13:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(10) unsigned NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logoIco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mimiDescrEmpre` text COLLATE utf8_unicode_ci,
  `googleMaps` text COLLATE utf8_unicode_ci,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `logo`, `logoIco`, `mimiDescrEmpre`, `googleMaps`, `date_create`, `date_update`, `nome`, `contato`, `telefone`) VALUES
(4, 'logo', 'icone logo', 'Quando definimos um Pageem nosso Navigationnão pode simplesmente dizer ao seu desciption, URI, etc. Podemos incluir como muitas propriedades que desejamos, como uma espécie de um ícone que acompanha a descrição. E até mesmo ultrapassar podemos incorporar informações relevantes para cada página, como Title, Keywords, Descriptions, etc. único para cada. Aqui está um exemplo mais elaborado:\r\nAgora podemos ver possibilidades de utilização do Bootstrap CSS que é capaz de exibir ícones ao lado de cada uma das descrições. Agora, se nós simplesmente passar os valores de exibição personalizado como titletemos definidos anteriormente simplesmente temos que localizar a página ativa e recuperar esses dados para atribuir isso a uma variável na view e pode usá -lo .\r\nQuando definimos um Pageem nosso Navigationnão pode simplesmente dizer ao seu desciption, URI, etc. Podemos incluir como muitas propriedades que desejamos, como uma espécie de um ícone que acompanha a descrição. E até mesmo ultrapassar podemos incorporar informações relevantes para cada página, como Title, Keywords, Descriptions, etc. único para cada. Aqui está um exemplo mais elaborado:\r\nAgora podemos ver possibilidades de utilização do Bootstrap CSS que é capaz de exibir ícones ao lado de cada uma das descrições. Agora, se nós simplesmente passar os valores de exibição personalizado como titletemos definidos anteriormente simplesmente temos que localizar a página ativa e recuperar esses dados para atribuir isso a uma variável na view e pode usá -lo .', 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15321.436632703706!2d-47.95650251534423!3d-16.253352799837103!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1482929167749', '2016-12-28 10:31:39', '2016-12-28 11:04:13', 'nome', 'Contatol', 32);

--
-- Acionadores `empresa`
--
DELIMITER $$
CREATE TRIGGER `trigger_limite_insert` BEFORE INSERT ON `empresa`
 FOR EACH ROW BEGIN
	IF (SELECT count(ID) FROM EMPRESA) > 0 THEN
		 CALL `'Não e Possivel Cadastrar Mais que Um registro'`;
	END IF;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) unsigned NOT NULL,
  `view` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `idControlador` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(10) unsigned NOT NULL,
  `NOME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `module`
--

INSERT INTO `module` (`id`, `NOME`, `date_create`, `date_update`) VALUES
(1, 'Application', '2016-12-21 14:06:14', NULL),
(2, 'Site', '2017-01-12 11:12:29', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE IF NOT EXISTS `postagem` (
  `id` int(10) unsigned NOT NULL,
  `idcategoria` int(10) unsigned NOT NULL,
  `TITULO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datapub` date NOT NULL,
  `conteudo` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id`, `idcategoria`, `TITULO`, `datapub`, `conteudo`, `tags`, `imagem`, `status`, `date_create`, `date_update`) VALUES
(1, 1, '2', '2017-01-19', '<p>94899990654</p>', '2', '2', 2, '2017-01-19 09:06:39', '2017-01-19 09:07:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `roleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `parent_id`, `roleId`) VALUES
(1, NULL, 'authenticated'),
(2, 1, 'user'),
(3, 1, 'agent');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `slider`
--

INSERT INTO `slider` (`id`, `date_create`, `date_update`, `img`, `titulo`, `descricao`) VALUES
(1, '2017-01-19 00:00:00', NULL, 'http://placehold.it/1200x500/3498db/2980b9', 'First slide', 'Nulla vitae elit libero, a pharetra augue mollis interdum.'),
(2, '2017-01-19 00:00:00', NULL, 'http://placehold.it/1200x500/9b59b6/8e44ad', ' Second slide', 'Nulla vitae elit libero, a pharetra augue mollis interdum.'),
(3, '2017-01-19 00:00:00', NULL, 'http://placehold.it/1200x500/34495e/2c3e50', 'Third slide', 'Nulla vitae elit libero, a pharetra augue mollis interdum.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `displayName`, `password`, `date_create`, `date_update`) VALUES
(1, 'Marcelo Pereira', 'marcelo_idoso@hotmail.com', 'Marcelo Pereira', '$2y$14$mECpCDYNmP2oQNZH1ggwCuWrzDalCARS5.8iEg6KJd.awkTAJZqwS', '2016-12-28 09:19:05', '2017-01-11 10:06:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_role_linker`
--

CREATE TABLE IF NOT EXISTS `user_role_linker` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user_role_linker`
--

INSERT INTO `user_role_linker` (`user_id`, `role_id`) VALUES
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `controlador`
--
ALTER TABLE `controlador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_controlador` (`idmodule`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_controlador_menu` (`idControlador`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_postagem` (`idcategoria`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_57698A6AB8C2FD88` (`roleId`),
  ADD KEY `IDX_57698A6A727ACA70` (`parent_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- Indexes for table `user_role_linker`
--
ALTER TABLE `user_role_linker`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_61117899A76ED395` (`user_id`),
  ADD KEY `IDX_61117899D60322AC` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `controlador`
--
ALTER TABLE `controlador`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `controlador`
--
ALTER TABLE `controlador`
  ADD CONSTRAINT `FK_F6C7268068998B84` FOREIGN KEY (`idmodule`) REFERENCES `module` (`id`);

--
-- Limitadores para a tabela `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_DD3795AD3006562F` FOREIGN KEY (`idControlador`) REFERENCES `controlador` (`id`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `FK_2995E607300BBBD8` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `FK_57698A6A727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `role` (`id`);

--
-- Limitadores para a tabela `user_role_linker`
--
ALTER TABLE `user_role_linker`
  ADD CONSTRAINT `FK_61117899A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_61117899D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
