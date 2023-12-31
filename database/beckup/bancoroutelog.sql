-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para routelog
CREATE DATABASE IF NOT EXISTS `routelog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `routelog`;

-- Copiando estrutura para tabela routelog.entregas
CREATE TABLE IF NOT EXISTS `entregas` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cidadeDestino` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dataSaida` timestamp NULL DEFAULT NULL,
  `dataChegada` varchar(50) DEFAULT NULL,
  `fk_loja` int DEFAULT NULL,
  `fk_produto` bigint NOT NULL DEFAULT '0',
  `fk_motorista` int NOT NULL,
  `fk_usuario` bigint NOT NULL,
  `valorTotal` float DEFAULT NULL,
  `quantidadeProdutos` int NOT NULL DEFAULT (0),
  `statusEntrega` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_motorista` (`fk_motorista`),
  KEY `fk_usuario` (`fk_usuario`),
  KEY `fk_produto` (`fk_produto`),
  KEY `fk_loja` (`fk_loja`),
  CONSTRAINT `fk_loja` FOREIGN KEY (`fk_loja`) REFERENCES `lojas` (`id`),
  CONSTRAINT `fk_motorista` FOREIGN KEY (`fk_motorista`) REFERENCES `motoristas` (`id`),
  CONSTRAINT `fk_produto` FOREIGN KEY (`fk_produto`) REFERENCES `produtos` (`id`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela routelog.entregas: ~4 rows (aproximadamente)
INSERT INTO `entregas` (`id`, `cidadeDestino`, `dataSaida`, `dataChegada`, `fk_loja`, `fk_produto`, `fk_motorista`, `fk_usuario`, `valorTotal`, `quantidadeProdutos`, `statusEntrega`, `updated_at`, `created_at`) VALUES
	(5, 'Alecrim', NULL, '2023-10-27', 2, 12, 7, 2, 1427.97, 3, 'Em andamento', '2023-10-11 20:11:49', '2023-10-11 20:11:49'),
	(6, 'Agudo', NULL, '2023-10-26', 5, 15, 2, 2, 0, 5, 'Em andamento', '2023-10-11 20:13:11', '2023-10-11 20:13:11'),
	(7, 'Alto Feliz', NULL, '2023-10-18', 5, 7, 5, 2, 1599.96, 4, 'Em andamento', '2023-10-11 20:14:19', '2023-10-11 20:14:19'),
	(8, 'Ametista do Sul', NULL, '2023-10-16', 5, 10, 9, 2, 1254.5, 5, 'Em andamento', '2023-10-11 21:34:50', '2023-10-11 21:34:50');

-- Copiando estrutura para tabela routelog.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela routelog.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela routelog.lojas
CREATE TABLE IF NOT EXISTS `lojas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela routelog.lojas: ~0 rows (aproximadamente)
INSERT INTO `lojas` (`id`, `nome`, `endereco`, `telefone`) VALUES
	(1, 'RouteLog SC', '123 Rua Principal, Cidade A, Estado A', '(123) 456-7890'),
	(2, 'RouteLog RS', '456 Rua Secundária, Cidade B, Estado B', '(234) 567-8901'),
	(3, 'Correios RS', '789 Rua Terciária, Cidade C, Estado C', '(345) 678-9012'),
	(4, 'Seu Claudio', '012 Rua Quaternária, Cidade D, Estado D', '(456) 789-0123'),
	(5, 'RouteLog Matriz', '345 Rua Quinária, Cidade E, Estado E', '(567) 890-1234');

-- Copiando estrutura para tabela routelog.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela routelog.migrations: ~4 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(13, '2014_10_12_000000_create_users_table', 1),
	(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(15, '2019_08_19_000000_create_failed_jobs_table', 1),
	(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(17, '2023_10_08_012537_produto', 2);

-- Copiando estrutura para tabela routelog.motoristas
CREATE TABLE IF NOT EXISTS `motoristas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `idade` int NOT NULL,
  `caminhao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela routelog.motoristas: ~10 rows (aproximadamente)
INSERT INTO `motoristas` (`id`, `nome`, `cpf`, `idade`, `caminhao`) VALUES
	(1, 'João da Silva', '123.456.789-00', 30, 'Volvo FH12'),
	(2, 'Maria Souza', '987.654.321-00', 28, 'Scania R450'),
	(3, 'Pedro Oliveira', '111.222.333-00', 35, 'Mercedes-Benz Actros'),
	(4, 'Ana Pereira', '444.555.666-00', 33, 'MAN TGX'),
	(5, 'Lucas Santos', '777.888.999-00', 29, 'Iveco Stralis'),
	(6, 'Mariana Costa', '666.777.888-00', 32, 'DAF XF'),
	(7, 'Fernando Ribeiro', '333.444.555-00', 40, 'Renault T440'),
	(8, 'Juliana Fernandes', '222.333.444-00', 27, 'Kenworth W990'),
	(9, 'Carlos Rodrigues', '555.666.777-00', 38, 'Peterbilt 389'),
	(10, 'Luisa Almeida', '999.888.777-00', 31, 'Freightliner Cascadia');

-- Copiando estrutura para tabela routelog.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela routelog.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela routelog.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela routelog.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela routelog.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(8,2) NOT NULL,
  `quantidade` int NOT NULL,
  `fornecedora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_usuario` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`fk_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela routelog.produtos: ~14 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `quantidade`, `fornecedora`, `fk_usuario`, `created_at`, `updated_at`) VALUES
	(1, 'Produto 132', 'Descrição do Produto 1', 19.99, 50, 'Fornecedor A', 2, NULL, '2023-10-10 16:03:31'),
	(5, 'Produto 5', 'Descrição do Produto 5', 39.99, 10, 'Fornecedor B', 2, NULL, NULL),
	(6, 'produto teste', 'Camiseta de futebol', 300.00, 12, 'Adidas', 2, '2023-10-09 15:38:22', '2023-10-09 15:38:22'),
	(7, 'Camiseta do Barcemlona', 'Camiseta de futebol do Barcenlona F.C', 399.99, 20, 'Nike', 2, '2023-10-09 15:50:25', '2023-10-09 15:50:25'),
	(8, 'Camiseta do Real Madrid', 'Camiseta de futebol', 250.90, 34, 'Adidas', 2, '2023-10-09 15:51:55', '2023-10-09 15:51:55'),
	(9, 'Chuteira Adidas', 'Chuteira de futebol', 125.99, 45, 'Adidas', 2, '2023-10-09 15:59:52', '2023-10-09 15:59:52'),
	(10, 'Camiseta do Man. United', 'Camiseta de futebol', 250.90, 34, 'Adidas', 2, '2023-10-09 16:06:27', '2023-10-09 16:06:27'),
	(11, 'Bola da copa 2022', 'bola de futebol moderna', 1000.99, 5, 'Nike', 2, '2023-10-09 19:20:41', '2023-10-09 19:20:41'),
	(12, 'Moletom Grêmio', 'moletom de lã', 475.99, 8, 'Umbro', 2, '2023-10-09 19:30:12', '2023-10-09 19:30:12'),
	(13, 'asdasdsa', 'sdadasdasd', 12.50, 33, 'Umbro', 2, '2023-10-09 21:09:35', '2023-10-09 21:09:35'),
	(14, 'Camiseta do Barcemlona', 'Camiseta de futebol', 33.33, 33, 'Umbro', 2, '2023-10-10 04:54:03', '2023-10-10 04:54:03'),
	(15, 'Camiseta do Barcemlona 23/24', 'Camiseta de futebol', 239.99, 2, 'Nike', 2, '2023-10-11 15:07:09', '2023-10-11 15:07:09'),
	(16, 'Camiseta Brasil 2023', 'Camiseta de futebol', 150.00, 320, 'Nike', 2, '2023-10-11 15:08:12', '2023-10-11 15:08:12');

-- Copiando estrutura para tabela routelog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela routelog.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `nome`, `email`, `email_verified_at`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'admin', 'admin@hotmail.com', NULL, '$2y$10$JjrFC.Ghc1aS51D0ZJeTf.ou0XaczE57u0h2vUB2.l9Cbmq.aPLky', '/img/Users/henriquebonatto.jpg', NULL, '2023-10-08 04:05:43', '2023-10-08 04:05:43');

-- Copiando estrutura para view routelog.viewentregas
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `viewentregas` (
	`id` BIGINT(19) NOT NULL,
	`cidadeDestino` VARCHAR(100) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`dataSaida` TIMESTAMP NULL,
	`dataChegada` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`fk_loja` INT(10) NULL,
	`nome_loja` VARCHAR(100) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`fk_produto` BIGINT(19) NOT NULL,
	`nome_produto` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`fk_motorista` INT(10) NOT NULL,
	`nome_motorista` VARCHAR(100) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`fk_usuario` BIGINT(19) NOT NULL,
	`nome_usuario` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`valorTotal` FLOAT NULL,
	`quantidadeProdutos` INT(10) NOT NULL,
	`statusEntrega` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`updated_at` TIMESTAMP NULL,
	`created_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Copiando estrutura para trigger routelog.calculaValorTotal
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `calculaValorTotal` BEFORE INSERT ON `entregas` FOR EACH ROW BEGIN
  DECLARE produtoValor DECIMAL(10, 2);
  
  -- Buscar o preço do produto
  SELECT valor INTO produtoValor
  FROM produtos
  WHERE id = NEW.fk_produto;

  -- Verificar se a quantidade de produtos é menor ou igual à quantidade disponível
  IF NEW.quantidadeProdutos <= (SELECT quantidade FROM produtos WHERE id = NEW.fk_produto) THEN
    -- Calcular o valor total
    SET NEW.valorTotal = NEW.quantidadeProdutos * produtoValor;
  ELSE
    -- Caso contrário, definir o valorTotal como 0
    SET NEW.valorTotal = 0;
  END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Copiando estrutura para view routelog.viewentregas
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `viewentregas`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `viewentregas` AS select `e`.`id` AS `id`,`e`.`cidadeDestino` AS `cidadeDestino`,`e`.`dataSaida` AS `dataSaida`,`e`.`dataChegada` AS `dataChegada`,`e`.`fk_loja` AS `fk_loja`,`l`.`nome` AS `nome_loja`,`e`.`fk_produto` AS `fk_produto`,`p`.`nome` AS `nome_produto`,`e`.`fk_motorista` AS `fk_motorista`,`m`.`nome` AS `nome_motorista`,`e`.`fk_usuario` AS `fk_usuario`,`u`.`nome` AS `nome_usuario`,`e`.`valorTotal` AS `valorTotal`,`e`.`quantidadeProdutos` AS `quantidadeProdutos`,`e`.`statusEntrega` AS `statusEntrega`,`e`.`updated_at` AS `updated_at`,`e`.`created_at` AS `created_at` from ((((`entregas` `e` left join `lojas` `l` on((`e`.`fk_loja` = `l`.`id`))) left join `produtos` `p` on((`e`.`fk_produto` = `p`.`id`))) left join `motoristas` `m` on((`e`.`fk_motorista` = `m`.`id`))) left join `users` `u` on((`e`.`fk_usuario` = `u`.`id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
