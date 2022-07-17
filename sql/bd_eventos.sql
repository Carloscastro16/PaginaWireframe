CREATE DATABASE db_eventos CHARACTER SET utf8mb4;
Use db_eventos;
/*DROP DATABASE db_eventos; */
/*---------------------------------TABLA DE CIUDAD---------------------------*/
CREATE TABLE `ciudad` (
  `cod_ciudad` INT NOT NULL AUTO_INCREMENT,
  `nombre_ciudad` VARCHAR(50) NULL,
  PRIMARY KEY (`cod_ciudad`));
  /*-----------------------TABLA TRIGGER  LOGEO------------------------------*/
CREATE TABLE `historial_logeo` (
  `cod_logueo` INT NOT NULL AUTO_INCREMENT,
  `Accion` VARCHAR(900) NULL,
  `correo` VARCHAR(900) NULL,
  PRIMARY KEY (`cod_logueo`));
  /*--------------------------------TABLA ROLES-------------------------*/
  CREATE TABLE `rol_usuario` (
	`cod_rol` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom_rol` VARCHAR(45) NULL,
	PRIMARY KEY (`cod_rol`));
    
  INSERT INTO rol_usuario VALUES(1, 'Administrador');
  INSERT INTO rol_usuario VALUES(2, 'Cliente');
  INSERT INTO rol_usuario VALUES(3, 'Empresa');
  /*--------------------------------TABLA TIPOS DE SERVICIO-------------------------*/
  CREATE TABLE `tipo_servicio` (
	`cod_tipo_servicio` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom_servicio` VARCHAR(45) NULL,
	PRIMARY KEY (`cod_tipo_servicio`));
    
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('1', 'Boda');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('2', 'XV años');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('3', 'Fin de año');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('4', 'Deportivos');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('5', 'Conferencia');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('6', 'Posada');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('7', 'Cena especial');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('8', 'Seminario');
    INSERT INTO `tipo_servicio` (`cod_tipo_servicio`, `nom_servicio`) VALUES ('9', 'Graduación');
  /*--------------------------------TABLA MONTAJE-------------------------*/
  CREATE TABLE `montaje` (
  `cod_montaje` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_montaje` VARCHAR(30) NULL,
  PRIMARY KEY (`cod_montaje`));
  
  INSERT INTO `montaje` (`cod_montaje`, `nombre_montaje`) VALUES ('1', 'Montaje U');
  INSERT INTO `montaje` (`cod_montaje`, `nombre_montaje`) VALUES ('2', 'Montaje imperial');
  INSERT INTO `montaje` (`cod_montaje`, `nombre_montaje`) VALUES ('3', 'Montaje escuela');
  INSERT INTO `montaje` (`cod_montaje`, `nombre_montaje`) VALUES ('4', 'Montaje teatro');
  INSERT INTO `montaje` (`cod_montaje`, `nombre_montaje`) VALUES ('5', 'Montaje en O cerrada');
  INSERT INTO `montaje` (`cod_montaje`, `nombre_montaje`) VALUES ('6', 'Montaje sillas pala');
  INSERT INTO `montaje` (`cod_montaje`, `nombre_montaje`) VALUES ('7', 'Montaje cocktail');
/*--------------------------------TABLA USUARIO-------------------------*/
CREATE TABLE `usuario` (
  `cod_usuario` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fk_rol_usuario` INT UNSIGNED NOT NULL,
  `nombre_usuario` VARCHAR(45) NULL,
  `ape_paterno` VARCHAR(45) NULL,
  `ape_materno` VARCHAR(45) NULL,
  `correo_usuario` VARCHAR(100) NULL,
  `contra_usuario` VARCHAR(200) NULL,
  `nombre_empresa` VARCHAR(100) NULL,
  `tel_empresa` BIGINT(10) NULL,
  `rfc` VARCHAR(50) NULL,
  FOREIGN KEY (fk_rol_usuario) REFERENCES rol_usuario(cod_rol));
  
  /*--------------------------------TABLA PAQUETES DE EVENTOS-------------------------*/
  CREATE TABLE `paquete`(
  `cod_paquete` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fk_cod_empresa` INT UNSIGNED NOT NULL,
  `fk_cod_tipo_servicio` INT UNSIGNED NOT NULL,
  `imagen_paquete` VARCHAR(200) NULL,
  `nom_paquete` VARCHAR(45) NULL,
  `descrip_paquete` VARCHAR(900) NULL,
  `cant_personas` INT NULL,
  `precio_paquete` DOUBLE NULL DEFAULT NULL,
  `fk_cod_ciudad` INT NOT NULL,
  `direc_evento` VARCHAR(900) NULL,
  `disponibilidad_evento` VARCHAR(12) NULL,
  FOREIGN KEY (fk_cod_empresa) REFERENCES usuario(cod_usuario),
  FOREIGN KEY (fk_cod_tipo_servicio) REFERENCES tipo_servicio(cod_tipo_servicio),
  FOREIGN KEY (fk_cod_ciudad) REFERENCES ciudad(cod_ciudad)
  );
  
  /*--------------------------------ORDEN DE EVENTO-------------------------*/
CREATE TABLE `orden_evento` (
  `cod_orden_evento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `folio_evento` VARCHAR(45) NOT NULL,
  `fk_cod_usuario` INT UNSIGNED NOT NULL,
  `fk_cod_montaje` INT UNSIGNED NOT NULL,
  `fec_inicio` VARCHAR(20) NULL,
  `fec_fin` VARCHAR(20) NULL,
  `hora_evento` VARCHAR(10) NULL,
  `num_tel` INT(12) NULL,
  `fk_cod_paquete` INT UNSIGNED NOT NULL,
	FOREIGN KEY (fk_cod_usuario) REFERENCES usuario(cod_usuario),
	FOREIGN KEY (fk_cod_montaje) REFERENCES montaje(cod_montaje),
	FOREIGN KEY (fk_cod_paquete) REFERENCES paquete(cod_paquete),
  PRIMARY KEY (`cod_orden_evento`));


/*-------------------------------- Triggers -------------------------*/
DELIMITER $$
CREATE TRIGGER tg_tipo_usuario
AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
  IF isnull(NEW.rfc)
    THEN
      UPDATE usuario
      set fk_rol_usuario = 2
      WHERE cod_usuario = NEW.cod_usuario;
  END IF ;
END$$
DELIMITER ;


/*-------------------------------- Administradores -------------------------*/
INSERT INTO usuario(fk_rol_usuario, nombre_usuario ,ape_paterno ,ape_materno , correo_usuario, contra_usuario) 
	VALUE (1,"Carlos Andre", "Castro", "Rodriguez", "andycastro.2716@gmail.com", "hola");
INSERT INTO usuario(fk_rol_usuario, nombre_usuario ,ape_paterno ,ape_materno , correo_usuario, contra_usuario) 
	VALUE (1,"Esmeralda", "Mendoza", "Jimenez", "Esmeralda810@gmail.com", "hola");