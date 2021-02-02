CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_registrar_funcionario`(
  Cedula int, Nombre varchar(30), PrimerApellido varchar(30), SegundoApellido varchar(30),
  TelefonoPersonal varchar(9), TelefonoHabitacion varchar(9), FechaNacimiento varchar(30),
  Sexo char(1), Escolaridad varchar(50), Provincia varchar(10), Canton varchar(20),
  Distrito varchar(20), EstadoCivil varchar(15), Direccion varchar(255),
  TelefonoOficina varchar(9), CorreoElectronico varchar(35),IdPlaca varchar(15),
  FechaVencimientoPortacion varchar(30), Puesto varchar(50), Area varchar(50), Oficina varchar(50), 
  FechaIngreso varchar(30)
)
BEGIN
IF exists(select pk_cedula_usuario from usuario where pk_cedula_usuario = Cedula) THEN
				update usuario
					set tc_nombre = Nombre
					   ,tc_primer_apellido = PrimerApellido
					   ,tc_segundo_apellido = SegundoApellido
					   ,tc_telefono_personal = TelefonoPersonal
					   ,tc_telefono_habitacion = TelefonoHabitacion
					   ,tf_fecha_nacimiento = FechaNacimiento
					   ,tc_sexo = Sexo
					   ,tc_escolaridad = Escolaridad
					   ,tc_provincia = Provincia
					   ,tc_canton = Canton
					   ,tc_distrito = Distrito
					   ,tc_estado_civil = EstadoCivil
					   ,tc_direccion = Direccion
					   ,tc_puesto = Puesto
					   ,tc_area = Area
					   ,tc_oficina = Oficina
      				   ,tc_telefono_oficina = TelefonoOficina
					   ,tc_correo_electronico = CorreoElectronico
					   ,tn_id_placa = IdPlaca
					   ,tf_fecha_vencimiento_portacion = FechaVencimientoPortacion
					   ,tf_fecha_ingreso = FechaIngreso
				
				where pk_cedula_usuario = Cedula;

				
			 ELSE 

INSERT INTO usuario
						   (pk_cedula_usuario
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
						   ,tn_numero_plaza
						   ,tn_contacto_emergencia
						   ,tc_contacto_emergencia
						   ,tc_especialidad
						   ,tn_codigo_colegio
						   ,tn_estado
						   ,tc_telefono_oficina
						   ,tc_correo_electronico
						   ,tn_id_placa
						   ,tf_fecha_vencimiento_portacion
						   ,tf_fecha_ingreso
						   ,tc_contrasena
						   ,tn_borrado)

					 VALUES
						   (Cedula
						   ,Nombre
						   ,PrimerApellido
						   ,SegundoApellido
						   ,TelefonoPersonal
						   ,TelefonoHabitacion
						   ,FechaNacimiento
						   ,Sexo
						   ,Escolaridad
						   ,Provincia
						   ,Canton
						   ,Distrito
						   ,EstadoCivil
						   ,Direccion
						   ,Puesto
						   ,Area
						   ,Oficina
						   ,NULL
						   ,NULL
						   ,NULL
						   ,NULL
						   ,NULL
						   ,NULL
						   ,TelefonoOficina
						   ,CorreoElectronico
						   ,IdPlaca
						   ,FechaVencimientoPortacion
						   ,FechaIngreso
						   ,NULL
						   ,0);
                           
					INSERT INTO Usuario_rol
						   (fk_id_rol
						   ,fk_id_usuario)
					 VALUES
						   (NULL,3,Cedula);




        END IF;
END