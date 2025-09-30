-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `preco` DECIMAL NOT NULL,
  `estoque` DECIMAL NOT NULL,
  `Fornecedor_idFornecedor` INT NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `fk_Produto_Categoria1_idx` (`Categoria_idCategoria` ASC) VISIBLE,
  CONSTRAINT `fk_Produto_Categoria1`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `mydb`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nomeCliente` VARCHAR(45) NOT NULL,
  `telefone` DECIMAL NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Venda` (
  `idVenda` INT NOT NULL AUTO_INCREMENT,
  `idCliente` VARCHAR(45) NOT NULL,
  `data` DECIMAL NOT NULL,
  `ItensVenda_id_item` INT NOT NULL,
  `Cliente_idCliente` INT NOT NULL,
  PRIMARY KEY (`idVenda`),
  INDEX `fk_Venda_Cliente1_idx` (`Cliente_idCliente` ASC) VISIBLE,
  CONSTRAINT `fk_Venda_Cliente1`
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `mydb`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ingrediente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ingrediente` (
  `idingrediente` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idingrediente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Produto_has_ingrediente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Produto_has_ingrediente` (
  `Produto_idProduto` INT NOT NULL,
  `ingrediente_idingrediente` INT NOT NULL,
  PRIMARY KEY (`Produto_idProduto`, `ingrediente_idingrediente`),
  INDEX `fk_Produto_has_ingrediente_ingrediente1_idx` (`ingrediente_idingrediente` ASC) VISIBLE,
  INDEX `fk_Produto_has_ingrediente_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  CONSTRAINT `fk_Produto_has_ingrediente_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `mydb`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produto_has_ingrediente_ingrediente1`
    FOREIGN KEY (`ingrediente_idingrediente`)
    REFERENCES `mydb`.`ingrediente` (`idingrediente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Venda_has_Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Venda_has_Produto` (
  `Venda_idVenda` INT NOT NULL,
  `Produto_idProduto` INT NOT NULL,
  PRIMARY KEY (`Venda_idVenda`, `Produto_idProduto`),
  INDEX `fk_Venda_has_Produto_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  INDEX `fk_Venda_has_Produto_Venda1_idx` (`Venda_idVenda` ASC) VISIBLE,
  CONSTRAINT `fk_Venda_has_Produto_Venda1`
    FOREIGN KEY (`Venda_idVenda`)
    REFERENCES `mydb`.`Venda` (`idVenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venda_has_Produto_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `mydb`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
