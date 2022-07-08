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