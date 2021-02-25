CREATE DATABASE IF NOT EXISTS citas_psicologia;
USE citas_psicologia;

DROP TABLE IF EXISTS Usuario;
CREATE TABLE usuario(
	pk_cedula_usuario integer PRIMARY KEY NOT NULL,
	tc_nombre varchar(30) NOT NULL,
	tc_primer_apellido varchar(30) NOT NULL,
	tc_segundo_apellido varchar(30) NOT NULL,
	tc_telefono_personal varchar(9) NOT NULL,
	tc_telefono_habitacion varchar(9) NOT NULL,
	tf_fecha_nacimiento date NOT NULL,
	tc_sexo char(1) NOt NULL,
	tc_escolaridad varchar(50) NOT NULL,
	tc_provincia varchar(10) NOT NULL,
	tc_canton varchar(20) NOT NULL,
	tc_distrito varchar(20) NOT NULL,
	tc_estado_civil varchar(15) NOT NULL,
	tc_direccion varchar(255) NOT NULL,
	tc_puesto varchar(30) NOT NULL,
	tc_area varchar(30) NOT NULL,
	tc_oficina varchar(30)   NOT NULL,
	tn_numero_plaza integer NULL,
	tn_contacto_emergencia integer NULL,
	tc_contacto_emergencia varchar(30) NULL,
	tc_especialidad varchar(30) NULL,
	tn_codigo_colegio varchar(15) NULL,
	tn_estado bit NULL,
	tc_telefono_oficina varchar(9)  NULL,
	tc_correo_electronico varchar(35)  NULL,
	tn_id_placa varchar(15)  NULL,
	tf_fecha_vencimiento_portacion date  NULL,
	tf_fecha_ingreso date  NULL,	
	tc_contrasena VARBINARY(2000) NULL,
	tn_borrado bit default 0 NOT NULL
);
