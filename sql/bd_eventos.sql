CREATE DATABASE db_eventos CHARACTER SET utf8mb4;
Use db_eventos;
/*--------------------------------TABLA USUARIO-------------------------*/
CREATE TABLE `usuario` (
  `cod_usuario` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombre_usuario` VARCHAR(45) NULL,
  `ape_paterno` VARCHAR(45) NULL,
  `ape_materno` VARCHAR(45) NULL,
  `correo_usuario` VARCHAR(100) NULL,
  `contra_usuario` VARCHAR(45) NULL,
  `fecha_nac` DATE NULL);
 /*--------------------------------TABLA USUARIOS EMPRESA-------------------------*/
  CREATE TABLE `db_eventos`.`empresa` (
  `cod_usuario_em` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_empresa` VARCHAR(45) NULL,
  `nom_representante` VARCHAR(45) NULL,
  `ape_pa_representante` VARCHAR(45) NULL,
  `ape_ma_representante` VARCHAR(45) NULL,
  `giro_comercial` VARCHAR(45) NULL,
  `tel_empresa` INT(10) NULL,
  `correo_empresa` VARCHAR(100) NULL,
  `contra_empresa` VARCHAR(45) NULL,
  `direc_empresa` VARCHAR(500) NULL,
  PRIMARY KEY (`cod_usuario_em`));
  /*--------------------------------TABLA TIPOS DE SERVICIO-------------------------*/
  CREATE TABLE `db_eventos`.`tipo_servicio` (
`cod_tipo_servicio` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_servicio` VARCHAR(20) NULL,
  PRIMARY KEY (`cod_tipo_servicio`));
  /*--------------------------------TABLA MONTAJE-------------------------*/
  CREATE TABLE `db_eventos`.`montaje` (
  `cod_montaje` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_montaje` VARCHAR(30) NULL,
  `descrip_montaje` VARCHAR(500) NULL,
  PRIMARY KEY (`cod_montaje`));
  /*--------------------------------TABLA PAQUETES DE EVENTOS-------------------------*/
  CREATE TABLE `db_eventos`.`paquete` (
  `cod_paquete` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_cod_usuario_em` INT UNSIGNED NOT NULL,
  `fk_cod_tipo_servicio` INT UNSIGNED NOT NULL,
  `nom_paquete` VARCHAR(45) NULL,
  `descrip_paquete` VARCHAR(900) NULL,
  `cant_personas` INT NULL,
  `precio_paquete` DOUBLE NULL DEFAULT NULL,
  `locacion_evento` VARCHAR(50) NULL,
  `direc_evento` VARCHAR(900) NULL,
  `disponibilidad_evento` VARCHAR(12) NULL,
  FOREIGN KEY (fk_cod_usuario_em) REFERENCES empresa(cod_usuario_em),
  FOREIGN KEY (fk_cod_tipo_servicio) REFERENCES tipo_servicio(cod_tipo_servicio),
  PRIMARY KEY (`cod_paquete`));
  /*--------------------------------ORDEN DE EVENTO-------------------------*/
CREATE TABLE `db_eventos`.`orden_evento` (
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
  

  