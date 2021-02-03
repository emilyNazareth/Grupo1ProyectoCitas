
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_buscar_cita_para_funcionario_admi;
CREATE procedure sp_buscar_cita_para_funcionario_admi
(id_funcionario_ int(11),
id_cita_ int(11),
fecha_inicial_ date,
fecha_final_ date,
id_profesional_ int(11),
sexo_ char(1))

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
			(C.tc_borrado = 0 and U.pk_cedula_usuario = id_funcionario_ and C.fk_id_funcionario = id_funcionario_		                        
			and R.tc_nombre_rol = 'Funcionario'  and UR.fk_id_rol = 3 and UR.fk_id_usuario = id_funcionario_) 
            or (C.tf_fecha >= fecha_inicial_ and C.tf_fecha <= fecha_final_ and   R.tc_nombre_rol = 'Funcionario'  and C.tc_borrado = 0 
            and UR.fk_id_rol = 3 and UR.fk_id_usuario = U.pk_cedula_usuario and C.fk_id_funcionario = U.pk_cedula_usuario)	           
			or (U.tc_sexo = sexo_ and  R.tc_nombre_rol = 'Funcionario'  and C.tc_borrado = 0 
            and UR.fk_id_rol = 3 and UR.fk_id_usuario = U.pk_cedula_usuario and C.fk_id_funcionario = U.pk_cedula_usuario)
            or (C.pk_id_cita = id_cita_ and  R.tc_nombre_rol = 'Funcionario'  and C.tc_borrado = 0 
            and UR.fk_id_rol = 3 and UR.fk_id_usuario = U.pk_cedula_usuario and C.fk_id_funcionario = U.pk_cedula_usuario)
			or (C.fk_id_profesional = id_profesional_ and  R.tc_nombre_rol = 'Funcionario'  and C.tc_borrado = 0 
            and UR.fk_id_rol = 3 and UR.fk_id_usuario = U.pk_cedula_usuario and C.fk_id_funcionario = U.pk_cedula_usuario);

end;

$$