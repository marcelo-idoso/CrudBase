
--
-- Estrutura da tabela `CATEGORIA`
--

DROP TABLE IF EXISTS `CATEGORIA`;
CREATE TABLE IF NOT EXISTS `CATEGORIA` (
  `id` int(10) unsigned NOT NULL,
  `NOME` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `exibir` int(11) DEFAULT '2',
  `orderexibir` int(11) DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `CONTROLADOR`
--

DROP TABLE IF EXISTS `CONTROLADOR`;
CREATE TABLE IF NOT EXISTS `CONTROLADOR` (
  `id` int(10) unsigned NOT NULL,
  `idMODULE` int(10) unsigned NOT NULL,
  `dsCONTROLADOR` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `EMPRESA`
--

DROP TABLE IF EXISTS `EMPRESA`;
CREATE TABLE IF NOT EXISTS `EMPRESA` (
  `id` int(10) unsigned NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logoIco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mimiDescrEmpre` text COLLATE utf8_unicode_ci,
  `googleMaps` text COLLATE utf8_unicode_ci,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `pEMPRESA` text COLLATE utf8_unicode_ci,
  `pcontatos` text COLLATE utf8_unicode_ci,
  `pservicos` text COLLATE utf8_unicode_ci,
  `endereco` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Acionadores `EMPRESA`
--
DROP TRIGGER IF EXISTS `trigger_limite_insert`;
DELIMITER $$
CREATE TRIGGER `trigger_limite_insert` BEFORE INSERT ON `EMPRESA`
 FOR EACH ROW BEGIN
	IF (SELECT count(ID) FROM EMPRESA) > 0 THEN
		 CALL `'Não e Possivel Cadastrar Mais que Um registro'`;
	END IF;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `MENU`
--

DROP TABLE IF EXISTS `MENU`;
CREATE TABLE IF NOT EXISTS `MENU` (
  `id` int(10) unsigned NOT NULL,
  `view` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `idCONTROLADOR` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `MODULE`
--

DROP TABLE IF EXISTS `MODULE`;
CREATE TABLE IF NOT EXISTS `MODULE` (
  `id` int(10) unsigned NOT NULL,
  `NOME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `PARCEIROS`
--

DROP TABLE IF EXISTS `PARCEIROS`;
CREATE TABLE IF NOT EXISTS `PARCEIROS` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `link` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `POSTAGEM`
--

DROP TABLE IF EXISTS `POSTAGEM`;
CREATE TABLE IF NOT EXISTS `POSTAGEM` (
  `id` int(10) unsigned NOT NULL,
  `idCATEGORIA` int(10) unsigned NOT NULL,
  `TITULO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datapub` date NOT NULL,
  `conteudo` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `resumo` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ROLE`
--

DROP TABLE IF EXISTS `ROLE`;
CREATE TABLE IF NOT EXISTS `ROLE` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `roleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `parent_id`, `roleId`) VALUES
(1, NULL, 'guest'),
(2, 4, 'agent'),
(3, 4, 'user'),
(4, NULL, 'authenticated');

--
-- Estrutura da tabela `SLIDER`
--

DROP TABLE IF EXISTS `SLIDER`;
CREATE TABLE IF NOT EXISTS `SLIDER` (
  `id` int(10) unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `img` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `link` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderexibir` int(11) DEFAULT NULL,
  `imgalt` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `USERS`
--

DROP TABLE IF EXISTS `USERS`;
CREATE TABLE IF NOT EXISTS `USERS` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `USER_ROLE_LINKER`
--

DROP TABLE IF EXISTS `USER_ROLE_LINKER`;
CREATE TABLE IF NOT EXISTS `USER_ROLE_LINKER` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CONTROLADOR`
--
ALTER TABLE `CONTROLADOR`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_MODULE_CONTROLADOR` (`idMODULE`);

--
-- Indexes for table `EMPRESA`
--
ALTER TABLE `EMPRESA`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MENU`
--
ALTER TABLE `MENU`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_CONTROLADOR_MENU` (`idCONTROLADOR`);

--
-- Indexes for table `MODULE`
--
ALTER TABLE `MODULE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PARCEIROS`
--
ALTER TABLE `PARCEIROS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `POSTAGEM`
--
ALTER TABLE `POSTAGEM`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_CATEGORIA_POSTAGEM` (`idCATEGORIA`);

--
-- Indexes for table `ROLE`
--
ALTER TABLE `ROLE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_57698A6AB8C2FD88` (`roleId`),
  ADD KEY `IDX_57698A6A727ACA70` (`parent_id`);

--
-- Indexes for table `SLIDER`
--
ALTER TABLE `SLIDER`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- Indexes for table `USER_ROLE_LINKER`
--
ALTER TABLE `USER_ROLE_LINKER`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_61117899A76ED395` (`user_id`),
  ADD KEY `IDX_61117899D60322AC` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `CONTROLADOR`
--
ALTER TABLE `CONTROLADOR`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `EMPRESA`
--
ALTER TABLE `EMPRESA`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MENU`
--
ALTER TABLE `MENU`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MODULE`
--
ALTER TABLE `MODULE`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PARCEIROS`
--
ALTER TABLE `PARCEIROS`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `POSTAGEM`
--
ALTER TABLE `POSTAGEM`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `ROLE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SLIDER`
--
ALTER TABLE `SLIDER`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `CONTROLADOR`
--
ALTER TABLE `CONTROLADOR`
  ADD CONSTRAINT `FK_F6C7268068998B84` FOREIGN KEY (`idMODULE`) REFERENCES `MODULE` (`id`);

--
-- Limitadores para a tabela `MENU`
--
ALTER TABLE `MENU`
  ADD CONSTRAINT `FK_DD3795AD3006562F` FOREIGN KEY (`idCONTROLADOR`) REFERENCES `CONTROLADOR` (`id`);

--
-- Limitadores para a tabela `POSTAGEM`
--
ALTER TABLE `POSTAGEM`
  ADD CONSTRAINT `FK_2995E607300BBBD8` FOREIGN KEY (`idCATEGORIA`) REFERENCES `CATEGORIA` (`id`);

--
-- Limitadores para a tabela `ROLE`
--
ALTER TABLE `ROLE`
  ADD CONSTRAINT `FK_57698A6A727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `ROLE` (`id`);

--
-- Limitadores para a tabela `USER_ROLE_LINKER`
--
ALTER TABLE `USER_ROLE_LINKER`
  ADD CONSTRAINT `FK_61117899A76ED395` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`id`),
  ADD CONSTRAINT `FK_61117899D60322AC` FOREIGN KEY (`role_id`) REFERENCES `ROLE` (`id`);


