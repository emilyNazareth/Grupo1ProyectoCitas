call sp_obtener_citas_admi
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_obtener_citas_admi;
CREATE procedure sp_obtener_citas_admi()

begin


		Select C.pk_id_cita,
		U.tc_nombre,
		U.tc_primer_apellido,
		U.tc_segundo_apellido,
		U.pk_cedula_usuario,
		C.fk_id_profesional,				
		C.tf_fecha,
		C.tc_hora
	FROM usuario U,
		 cita C,
         rol R,
		 usuario_rol UR	
	 WHERE					
			R.tc_nombre_rol = 'Funcionario'  and C.tc_borrado = 0 
            and UR.fk_id_rol = 3 and UR.fk_id_usuario = U.pk_cedula_usuario and C.fk_id_funcionario = U.pk_cedula_usuario
            order by C.pk_id_cita asc limit 5;

end;

$$