DELIMITER $$
DROP PROCEDURE IF EXISTS sp_buscar_cita_para_profesional;
CREATE procedure sp_buscar_cita_para_profesional
(id_funcionario_ varchar(11),
id_cita_ varchar(11),
fecha_inicial_ varchar(11),
fecha_final_ varchar(11),
id_profesional_ varchar(11),
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
		 usuario_rol UR
	 WHERE
		/* join tables */
		C.fk_id_funcionario = U.pk_cedula_usuario
        AND U.pk_cedula_usuario = UR.fk_id_usuario
        AND UR.fk_id_rol = 3
        AND U.tn_borrado = 0
        AND C.tc_borrado = 0
        AND C.fk_id_profesional = id_profesional_
        /* filters */
        AND (id_funcionario_ = '' OR U.pk_cedula_usuario = id_funcionario_)
        AND (id_cita_ = '' OR C.pk_id_cita = id_cita_)
        AND (fecha_inicial_ = '' OR  C.tf_fecha >= fecha_inicial_)
        AND (fecha_final_ = '' OR  C.tf_fecha <= fecha_final_)
        AND (id_profesional_ = '' OR C.fk_id_profesional = id_profesional_)
        AND (sexo_ = '' OR U.tc_sexo = sexo_);
end;

$$