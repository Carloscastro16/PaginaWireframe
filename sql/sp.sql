/* Llamado para la busqueda */
USE `db_eventos`;
DROP procedure IF EXISTS `sp_Busqueda`;

DELIMITER $$
USE `db_eventos`$$
CREATE PROCEDURE `sp_busqueda` (
	in ubicacion varchar(50),
    in cant_personas int(11), 
    in tipo_servicio int(10)
)
BEGIN
	SELECT * FROM paquete where fk_cod_tipo_servicio = tipo_servicio AND locacion_evento like ubicacion AND disponibilidad_evento = 'Disponible' AND cant_personas = cant_personas;
END$$

DELIMITER ;

/* Llamado para registro de clientes */
USE `db_eventos`;
DROP procedure IF EXISTS `sp_reg_cliente`;

USE `db_eventos`;
DROP procedure IF EXISTS `db_eventos`.`sp_reg_cliente`;
;

DELIMITER $$
USE `db_eventos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reg_cliente`(
	in nom_usuario VARCHAR(45),
    in apellPa VARCHAR(45),
	in apellMa VARCHAR(45),
    in correo VARCHAR(100),
    in contra VARCHAR(200)
    
)
BEGIN
	INSERT INTO usuario(fk_rol_usuario, nombre_usuario ,ape_paterno ,ape_materno , correo_usuario, contra_usuario) 
	VALUE (2,nom_usuario, apellPa, apellMa ,correo ,contra);
END$$

DELIMITER ;
;

/* Llamado para registro de Empresas */
USE `db_eventos`;
DROP procedure IF EXISTS `sp_reg_usrempresa`;

USE `db_eventos`;
DROP procedure IF EXISTS `db_eventos`.`sp_reg_usrempresa`;
;

DELIMITER $$
USE `db_eventos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reg_usrempresa`(
	in nom_usuario VARCHAR(45),
    in apellPa VARCHAR(45),
	in apellMa VARCHAR(45),
    in correo VARCHAR(100),
    in contra VARCHAR(200),
    in celular BIGINT(10),
    in rfc VARCHAR(50)
)
BEGIN
	INSERT INTO usuario(fk_rol_usuario, nombre_usuario ,ape_paterno ,ape_materno , correo_usuario, contra_usuario, tel_empresa, rfc) 
	VALUE (3, nom_usuario, apellPa, apellMa ,correo ,contra, celular, rfc);
    
END$$

DELIMITER ;
;
/* Llamado para trigger login */
USE `db_eventos`;
DROP procedure IF EXISTS `tr_logeo_usuarios`;

USE `db_eventos`;
DROP procedure IF EXISTS `db_eventos`.`tr_logeo_usuarios`;
;

DELIMITER $$
USE `db_eventos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tr_logeo_usuarios`(
	in correo_tr varchar(100),
    in id_usuario_tr INT(10),
    in rol_usuario_tr INT(10)
)
BEGIN
	INSERT INTO historial_logeo(Accion, correo) values (
		concat("El usuario con id: ", id_usuario_tr,"y con el rol: ",rol_usuario_tr ," inicio sesión"),
        correo_tr
    );
    
END$$

DELIMITER ;
;

/* Llamado para trigger logout */
USE `db_eventos`;
DROP procedure IF EXISTS `tr_salida_usuario`;

USE `db_eventos`;
DROP procedure IF EXISTS `db_eventos`.`tr_salida_usuario`;
;

DELIMITER $$
USE `db_eventos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tr_salida_usuario`(
	in correo_tr varchar(100),
    in id_usuario_tr INT(10),
    in rol_usuario_tr INT(10)
)
BEGIN
	INSERT INTO historial_logeo(Accion, correo) values (
		concat("El usuario con id: ", id_usuario_tr," y con el rol: ",rol_usuario_tr ," cerro sesión"),
        correo_tr
    );
    
END$$

DELIMITER ;
;

/*------------------------SP PARA REGISTRO DE PAQUETE---------------------*/
USE `db_eventos`;
DROP procedure IF EXISTS `sp_registroPaquete`;

DELIMITER $$
USE `db_eventos`$$
CREATE PROCEDURE `sp_registroPaquete` (
in imagenPaqueteI varchar(200),
in nombrePaqueteI varchar(45),
in tipoServicioI int,
in ciudadI int,
in direcEventoI varchar(900), 
in disponobilidadEvI varchar(12),
in precioEventoI double,
in cantidadPersonasI int,
in descripcionI varchar (900)

)
BEGIN
INSERT INTO paquete(
imagen_paquete, nom_paquete,fk_cod_tipo_servicio,
fk_cod_ciudad,direc_evento,disponibilidad_evento,
precio_paquete,cant_personas,descrip_paquete)
VALUE (imagenPaqueteI,nombrePaqueteI,tipoServicioI,
ciudadI,direcEventoI,disponobilidadEvI,precioEventoI,
cantidadPersonasI,descripcionI);
END$$

DELIMITER ;