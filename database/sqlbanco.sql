-- MySQL Script generated by MySQL Workbench
-- Wed Oct  9 19:42:06 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema RestauranteDB
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `RestauranteDB` ;

-- -----------------------------------------------------
-- Schema RestauranteDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `RestauranteDB` DEFAULT CHARACTER SET utf8 ;
USE `RestauranteDB` ;

-- -----------------------------------------------------
-- Table `RestauranteDB`.`Password_Resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Password_Resets` (
  `token` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`token`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(255) NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_Users_Password_Resets1_idx` (`remember_token` ASC),
  CONSTRAINT `fk_Users_Password_Resets1`
    FOREIGN KEY (`remember_token`)
    REFERENCES `RestauranteDB`.`Password_Resets` (`token`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`Admins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Admins` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(255) NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_Admins_Password_Resets1_idx` (`remember_token` ASC),
  CONSTRAINT `fk_Admins_Password_Resets1`
    FOREIGN KEY (`remember_token`)
    REFERENCES `RestauranteDB`.`Password_Resets` (`token`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`Enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Enderecos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Users_id` BIGINT UNSIGNED NOT NULL,
  `bairro` VARCHAR(255) NOT NULL,
  `logradouro` VARCHAR(255) NOT NULL,
  `numero` INT NOT NULL,
  `complemento` VARCHAR(255) NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Enderecos_Users1_idx` (`Users_id` ASC),
  CONSTRAINT `fk_Enderecos_Users1`
    FOREIGN KEY (`Users_id`)
    REFERENCES `RestauranteDB`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Pedidos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` CHAR(1) NOT NULL,
  `Users_id` BIGINT UNSIGNED NOT NULL,
  `Enderecos_id` BIGINT UNSIGNED NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Pedidos_Enderecos1_idx` (`Enderecos_id` ASC),
  INDEX `fk_Pedidos_Users1_idx` (`Users_id` ASC),
  CONSTRAINT `fk_Pedidos_Enderecos1`
    FOREIGN KEY (`Enderecos_id`)
    REFERENCES `RestauranteDB`.`Enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_Users1`
    FOREIGN KEY (`Users_id`)
    REFERENCES `RestauranteDB`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`Tipo_Produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Tipo_Produtos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`Produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Produtos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `Tipo_Produtos_id` BIGINT UNSIGNED NOT NULL,
  `ingredientes` VARCHAR(255) NOT NULL,
  `urlImage` VARCHAR(255) NOT NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Produtos_Tipo_Produtos1_idx` (`Tipo_Produtos_id` ASC),
  CONSTRAINT `fk_Produtos_Tipo_Produtos1`
    FOREIGN KEY (`Tipo_Produtos_id`)
    REFERENCES `RestauranteDB`.`Tipo_Produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`User_Infos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`User_Infos` (
  `Users_id` BIGINT UNSIGNED NOT NULL,
  `profileImg` VARCHAR(255) NULL,
  `status` CHAR(1) NULL,
  `dataNasc` DATE NULL,
  `genero` VARCHAR(2) NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`Users_id`),
  CONSTRAINT `fk_User_Infos_Users1`
    FOREIGN KEY (`Users_id`)
    REFERENCES `RestauranteDB`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RestauranteDB`.`Pedido_Produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RestauranteDB`.`Pedido_Produtos` (
  `Pedidos_id` BIGINT UNSIGNED NOT NULL,
  `Produtos_id` BIGINT UNSIGNED NOT NULL,
  `quantidade` INT UNSIGNED NOT NULL,
  `observacao` VARCHAR(255) NULL,
  `updated_at` TIMESTAMP NULL,
  `created_at` TIMESTAMP NULL,
  PRIMARY KEY (`Pedidos_id`, `Produtos_id`),
  INDEX `fk_Pedidos_has_Produtos_Produtos1_idx` (`Produtos_id` ASC),
  INDEX `fk_Pedidos_has_Produtos_Pedidos1_idx` (`Pedidos_id` ASC),
  CONSTRAINT `fk_Pedidos_has_Produtos_Pedidos1`
    FOREIGN KEY (`Pedidos_id`)
    REFERENCES `RestauranteDB`.`Pedidos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_has_Produtos_Produtos1`
    FOREIGN KEY (`Produtos_id`)
    REFERENCES `RestauranteDB`.`Produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `RestauranteDB`.`Users`
-- -----------------------------------------------------
START TRANSACTION;
USE `RestauranteDB`;
INSERT INTO `RestauranteDB`.`Users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES (1, 'Usuário', 'user@user.com.br', NULL, '$2y$10$oA5PXJyYjHzoPXqv6idLYuZ.Jgkmmw3J1Y9Krfuo4fJfK2STxglVC', NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RestauranteDB`.`Admins`
-- -----------------------------------------------------
START TRANSACTION;
USE `RestauranteDB`;
INSERT INTO `RestauranteDB`.`Admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES (1, 'Administrador', 'admin@admin.com.br', NULL, '$2y$10$oA5PXJyYjHzoPXqv6idLYuZ.Jgkmmw3J1Y9Krfuo4fJfK2STxglVC', NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RestauranteDB`.`Enderecos`
-- -----------------------------------------------------
START TRANSACTION;
USE `RestauranteDB`;
INSERT INTO `RestauranteDB`.`Enderecos` (`id`, `Users_id`, `bairro`, `logradouro`, `numero`, `complemento`, `updated_at`, `created_at`) VALUES (1, 1, 'São Francisco', 'Rua Pedro II', 111, 'Apto. 303', '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Enderecos` (`id`, `Users_id`, `bairro`, `logradouro`, `numero`, `complemento`, `updated_at`, `created_at`) VALUES (2, 1, 'Centro', 'Rua Parque Paulo', 222, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RestauranteDB`.`Pedidos`
-- -----------------------------------------------------
START TRANSACTION;
USE `RestauranteDB`;
INSERT INTO `RestauranteDB`.`Pedidos` (`id`, `status`, `Users_id`, `Enderecos_id`, `updated_at`, `created_at`) VALUES (1, 'A', 1, 1, '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Pedidos` (`id`, `status`, `Users_id`, `Enderecos_id`, `updated_at`, `created_at`) VALUES (2, 'A', 1, 2, '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Pedidos` (`id`, `status`, `Users_id`, `Enderecos_id`, `updated_at`, `created_at`) VALUES (3, 'A', 1, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RestauranteDB`.`Tipo_Produtos`
-- -----------------------------------------------------
START TRANSACTION;
USE `RestauranteDB`;
INSERT INTO `RestauranteDB`.`Tipo_Produtos` (`id`, `descricao`, `updated_at`, `created_at`) VALUES (1, 'Pizza', '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Tipo_Produtos` (`id`, `descricao`, `updated_at`, `created_at`) VALUES (2, 'Suco', '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Tipo_Produtos` (`id`, `descricao`, `updated_at`, `created_at`) VALUES (3, 'Cerveja', '2024-07-25 22:00:00', '2024-07-25 22:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RestauranteDB`.`Produtos`
-- -----------------------------------------------------
START TRANSACTION;
USE `RestauranteDB`;
INSERT INTO `RestauranteDB`.`Produtos` (`id`, `nome`, `preco`, `Tipo_Produtos_id`, `ingredientes`, `urlImage`, `updated_at`, `created_at`) VALUES (1, 'Pepperoni', 50.50, 1, 'Pepperoni fatiado, queijo, cebola, pimentão, molho de tomate e orégano', '/img/Pizza/pizza-pepperoni.png', '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Produtos` (`id`, `nome`, `preco`, `Tipo_Produtos_id`, `ingredientes`, `urlImage`, `updated_at`, `created_at`) VALUES (2, 'Laranja', 8.00, 2, 'Laranja, água e açucar', '/img/Suco/suco-laranja.png', '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Produtos` (`id`, `nome`, `preco`, `Tipo_Produtos_id`, `ingredientes`, `urlImage`, `updated_at`, `created_at`) VALUES (3, 'Skol - Lata', 8.00, 3, 'Água, malte, milho e lúpulo. Alergênicos: Contém cevada e glúten', '/img/Cerveja/cerveja-skol-lata.png', '2024-07-25 22:00:00', '2024-07-25 22:00:00');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RestauranteDB`.`Pedido_Produtos`
-- -----------------------------------------------------
START TRANSACTION;
USE `RestauranteDB`;
INSERT INTO `RestauranteDB`.`Pedido_Produtos` (`Pedidos_id`, `Produtos_id`, `quantidade`, `observacao`, `updated_at`, `created_at`) VALUES (1, 1, 1, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Pedido_Produtos` (`Pedidos_id`, `Produtos_id`, `quantidade`, `observacao`, `updated_at`, `created_at`) VALUES (1, 2, 2, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Pedido_Produtos` (`Pedidos_id`, `Produtos_id`, `quantidade`, `observacao`, `updated_at`, `created_at`) VALUES (1, 3, 1, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Pedido_Produtos` (`Pedidos_id`, `Produtos_id`, `quantidade`, `observacao`, `updated_at`, `created_at`) VALUES (2, 1, 2, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Pedido_Produtos` (`Pedidos_id`, `Produtos_id`, `quantidade`, `observacao`, `updated_at`, `created_at`) VALUES (3, 3, 10, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');
INSERT INTO `RestauranteDB`.`Pedido_Produtos` (`Pedidos_id`, `Produtos_id`, `quantidade`, `observacao`, `updated_at`, `created_at`) VALUES (3, 2, 1, NULL, '2024-07-25 22:00:00', '2024-07-25 22:00:00');

COMMIT;

