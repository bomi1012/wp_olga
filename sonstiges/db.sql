SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `db_web` ;
CREATE SCHEMA IF NOT EXISTS `db_web` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `db_web` ;

-- -----------------------------------------------------
-- Table `db_web`.`tabRubrick`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_web`.`tabRubrick` ;

CREATE  TABLE IF NOT EXISTS `db_web`.`tabRubrick` (
  `idRubrick` INT NOT NULL AUTO_INCREMENT ,
  `rubrick` VARCHAR(15) NOT NULL COMMENT 'z.B. <index, about, lager>  was kann als adresse mit *.php oder als Ordner   dienen ' ,
  `rubrickTitle_deDE` VARCHAR(20) NOT NULL ,
  `rubrickTitle_ruRU` VARCHAR(20) NULL ,
  `rubrickBeschreibung` TEXT NULL ,
  PRIMARY KEY (`idRubrick`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = 'Haupseiten';


-- -----------------------------------------------------
-- Table `db_web`.`tabSeite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_web`.`tabSeite` ;

CREATE  TABLE IF NOT EXISTS `db_web`.`tabSeite` (
  `idSeite` INT NOT NULL AUTO_INCREMENT ,
  `fk_tabRubrick` INT NOT NULL ,
  `seite` VARCHAR(15) NOT NULL COMMENT 'Seite test.php  in Ordner z.B.  about/test.php - es wird onhe .php gespeichert sein' ,
  `seiteTitle_deDE` VARCHAR(20) NOT NULL ,
  `seiteTitle_ruRU` VARCHAR(20) NULL ,
  `seiteBeschreibung` TEXT NULL ,
  `seitePfad` VARCHAR(90) NOT NULL COMMENT 'z.B. about => www.seite.de/about/seite.php' ,
  PRIMARY KEY (`idSeite`) ,
  INDEX `fk_tab_Seite_tab_Rubrick_idx` (`fk_tabRubrick` ASC) ,
  CONSTRAINT `fk_tab_Seite_tab_Rubrick`
    FOREIGN KEY (`fk_tabRubrick` )
    REFERENCES `db_web`.`tabRubrick` (`idRubrick` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = 'Seiten 2+  level';



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `db_web`.`tabRubrick`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_web`;
INSERT INTO `db_web`.`tabRubrick` (`idRubrick`, `rubrick`, `rubrickTitle_deDE`, `rubrickTitle_ruRU`, `rubrickBeschreibung`) VALUES (1, 'index', 'Tagesmutter', NULL, 'Erste Seite');
INSERT INTO `db_web`.`tabRubrick` (`idRubrick`, `rubrick`, `rubrickTitle_deDE`, `rubrickTitle_ruRU`, `rubrickBeschreibung`) VALUES (2, 'about', 'Über uns', NULL, 'Vorstellung');

COMMIT;
