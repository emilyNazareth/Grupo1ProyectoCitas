DELIMITER $$
CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_obtener_usuario`(
	identificacion_ int(11)
)
BEGIN
	SELECT `tc_contrasena`, `pk_id_rol` FROM `usuario`, `rol`, `usuario_rol` 
	WHERE `tn_borrado` = 0 
    AND `usuario`.`pk_cedula_usuario` = identificacion_ 
    AND `rol`.`pk_id_rol` = (SELECT `fk_id_rol` FROM  `usuario_rol` WHERE `usuario_rol`.`fk_id_usuario`= identificacion_);
END$$
DELIMITER ;
