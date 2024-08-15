
TODO: Base de datos
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema Sexto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Sexto` DEFAULT CHARACTER SET utf8 ;
USE `Sexto` ;

-- -----------------------------------------------------
-- Table `Sexto`.`Clubes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Clubes` (
  `club_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `deporte` VARCHAR(45) NOT NULL,
  `ubicacion` TEXT NULL,
  `fecha_fundacion` DATETIME NOT NULL,
  PRIMARY KEY (`club_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sexto`.`Miembros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Miembros` (
  `miembro_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,  
  PRIMARY KEY (`miembro_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Sexto`.`Inscripciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sexto`.`Inscripciones` (
  `Inscripcion_id` INT NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` DATETIME NOT NULL,
  `detalle` TEXT NULL,
  `Clubes_club_id` INT NOT NULL, 
  `Miembros_miembro_id` INT NOT NULL, 
  PRIMARY KEY (`Inscripcion_id`),
  INDEX `fk_Inscripciones_Clubes1_idx` (`Clubes_club_id` ASC) ,
  INDEX `fk_Miembros_miembro_id1_idx` (`Miembros_miembro_id` ASC) ,
  CONSTRAINT `fk_Inscripciones_Clubes1`
    FOREIGN KEY (`Clubes_club_id`)
    REFERENCES `Sexto`.`Clubes` (`club_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Miembros_miembro_id1`
    FOREIGN KEY (`Miembros_miembro_id`)
    REFERENCES `Sexto`.`Miembros` (`miembro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION   )

ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
