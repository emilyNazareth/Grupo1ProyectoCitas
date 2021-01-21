

DELIMITER $$
CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_buscar_profesional`(cedula_ INT,
nombre_ VARCHAR(30),
apellido_ VARCHAR(30))
BEGIN
Select  DISTINCT `pk_cedula_usuario` as consecutivo 
		,`pk_cedula_usuario` as cedula
		,`tc_nombre`  as nombre
		,concat_ws(' ', `tc_primer_apellido`, `tc_segundo_apellido`) as apellido
		from  `usuario` inner join `usuario_rol`  on `pk_cedula_usuario` = `fk_id_usuario`
			inner join `rol`  on `pk_id_rol` = `fk_id_rol`
	
		where `tn_borrado` = 0
		and `tc_nombre_rol` = 'Profesional'
		and (( cast(`pk_cedula_usuario` as char(30)) LIKE CONCAT ('%' , cast(cedula_ as char(30)) , '%')) and cedula_ <> -1 )
        or ((cast(`pk_cedula_usuario` as char(30)) like cast(`pk_cedula_usuario` as char(30)) and cedula_ = -1 ))
		and ((`tc_nombre` LIKE CONCAT( '%',nombre_,'%') and nombre_ <> '') or (`tc_nombre` LIKE tc_nombre and nombre_ = ''))
		and (((`tc_primer_apellido` LIKE CONCAT('%',apellido_,'%') or `tc_segundo_apellido` LIKE CONCAT('%',apellido_,'%')) and apellido_ <> '')
		or ((`tc_primer_apellido` LIKE `tc_primer_apellido` or `tc_segundo_apellido` LIKE `tc_primer_apellido`) and apellido_ = '')
        or ((CONCAT(`tc_primer_apellido`,' ',`tc_segundo_apellido`) LIKE CONCAT('%',apellido_,'%') ) and apellido_ <> ''));
END$$
DELIMITER ;
