--USUARIOS

CREATE TABLE `mvc`.`usuarios` ( `id` INT NOT NULL AUTO_INCREMENT , `nombres` VARCHAR(50) NOT NULL , `apellidos` VARCHAR(50) NOT NULL , `documento` INT(11) NOT NULL , `telefono` INT(10) NOT NULL , `correo` VARCHAR(50) NOT NULL , `pass` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

