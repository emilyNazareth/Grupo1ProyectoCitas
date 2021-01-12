CREATE DATABASE IF NOT EXISTS citas_psicologia;
USE citas_psicologia;

DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario(
	pk_cedula_usuario INT PRIMARY KEY NOT NULL,
	tc_nombre VARCHAR(30) NOT NULL,
	tc_primer_apellido VARCHAR(30) NOT NULL,
	tc_segundo_apellido VARCHAR(30) NOT NULL, 
	tc_telefono_personal VARCHAR(9) NOT NULL,
	tc_telefono_habitacion VARCHAR(9) NOT NULL,
	tf_fecha_nacimiento DATE NOT NULL,
	tc_sexo CHAR(1) NOT NULL,
	tc_escolaridad VARCHAR(50) NOT NULL,
	tc_provincia VARCHAR(10) NOT NULL,
	tc_canton VARCHAR(20) NOT NULL,
	tc_distrito VARCHAR(20) NOT NULL,
	tc_estado_civil VARCHAR(15) NOT NULL,
	tc_direccion VARCHAR(255) NOT NULL,
	tn_id_area INT NOT NULL,
	tn_id_oficina INT NOT NULL,
	tn_id_puesto INT NOT NULL,
	tf_fecha_ingreso date NULL,
	tc_telefono_oficina VARCHAR(9) NULL,
	tc_correo_electronico VARCHAR(35) NULL,
	tn_id_placa VARCHAR(15) NULL,
	tf_fecha_vencimiento_portacion date  NULL,
	tn_numero_plaza INT NULL,
	tn_contacto_emergencia INT NULL,
	tc_contacto_emergencia VARCHAR(30) NULL,
	tc_especialidad VARCHAR(30) NULL,
	tc_codigo_colegio VARCHAR(15) NULL,
	tc_contrasena VARBINARY(2000) NULL,
	tn_borrado bit DEFAULT ((0)) NOT NULL	
);
