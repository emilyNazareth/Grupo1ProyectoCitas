CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_buscar_funcionario_cedula`(Cedula int)
BEGIN
			SELECT      pk_cedula_usuario
					   ,tc_nombre
					   ,tc_primer_apellido
					   ,tc_segundo_apellido
					   ,tc_telefono_personal
					   ,tc_telefono_habitacion
					   ,tf_fecha_nacimiento
					   ,tc_sexo
					   ,tc_escolaridad
					   ,tc_provincia
					   ,tc_canton
					   ,tc_distrito
					   ,tc_estado_civil
					   ,tc_direccion
					   ,tc_puesto
					   ,tc_area
					   ,tc_oficina
					   ,tc_telefono_oficina
					   ,tc_correo_electronico
					   ,tn_id_placa
					   ,tf_fecha_vencimiento_portacion
					   ,tf_fecha_ingreso
					   FROM
					   usuario
					   WHERE pk_cedula_usuario = Cedula;


END