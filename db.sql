CREATE TABLE `obook`.`book` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `auteur` VARCHAR(35) NULL , `titre` VARCHAR(100) NULL , `page` INT(5) NULL , `prix` INT(15) NULL , `parurion` DATE NULL , `courant` ENUM('amour','science','politique','comedie','art','economie') NULL , `description` VARCHAR(250) NULL , `photo` VARCHAR(200) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `book` ADD `nationalite` VARCHAR(25) NULL AFTER `auteur`;
ALTER TABLE `book` CHANGE `courant` `courant` VARCHAR(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
CREATE TABLE `obook`.`collaborateur` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `email` VARCHAR(100) NULL , `pass` VARCHAR(100) NULL , `name` VARCHAR(35) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;