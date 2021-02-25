DELIMITER $$
CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_obtener_profesionales`()
BEGIN
Select `pk_cedula_usuario` as consecutivo
    ,`pk_cedula_usuario` as cedula
	,`tc_nombre` as nombre 
	,`tc_primer_apellido` as apellido
from  `usuario` , `usuario_rol` , `rol` 
where  `tn_borrado` = 0 AND `pk_cedula_usuario` = `fk_id_usuario`
AND `fk_id_rol` = `pk_id_rol`
AND `tc_nombre_rol` = 'Profesional' LIMIT 10;
END$$
DELIMITER ;
