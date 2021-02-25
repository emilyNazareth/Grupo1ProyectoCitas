
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_obtener_detalle_cita;
CREATE procedure sp_obtener_detalle_cita(
id_cita_ int(11)
)

BEGIN
	Select C.pk_id_cita,
		U.tc_nombre,
		U.tc_primer_apellido,
		U.tc_segundo_apellido,
		U.pk_cedula_usuario,
        U.tc_sexo,
        U.tc_puesto,
        U.tc_area,
        U.tc_oficina,
        U.tc_telefono_personal,
        U.tc_correo_electronico,        
		C.fk_id_profesional,				
		C.tf_fecha,
		C.tc_hora
	FROM usuario U,
		 cita C,
		 usuario_rol UR	
	 WHERE		
		C.fk_id_funcionario = U.pk_cedula_usuario
        AND U.pk_cedula_usuario = UR.fk_id_usuario
        AND UR.fk_id_rol = 3
        AND U.tn_borrado = 0
        AND C.tc_borrado = 0
        AND C.pk_id_cita = id_cita_;		
end

$$


