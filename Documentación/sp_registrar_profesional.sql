
DELIMITER $$

CREATE PROCEDURE `sp_registrar_profesional`(
	identificacion_ int(11),    
    contrasena_  varbinary(2000),
    nombre_ VARCHAR(30),
    primer_apellido_ VARCHAR(30),
    segundo_apellido_ VARCHAR(30),
    telefono_personal_ VARCHAR(9),
    telefono_habitacion_ VARCHAR(9),
    fecha_nacimiento_ date,
    sexo_ CHAR(1),
    estado_civil_ VARCHAR(15),
    numero_plaza_ INT(11),
    estado_ BIT(1),
    contacto_emergencia_ VARCHAR(30),
    contacto_emergencia_numero_ INT(11),
    escolaridad_ VARCHAR(50),
    especialidad_ VARCHAR(30),
    codigo_colegio_ VARCHAR(15),
    provincia_ VARCHAR(10),
    canton_ VARCHAR(20),
    distrito_ VARCHAR(20),
    direccion_ VARCHAR(255)
)
BEGIN
		INSERT INTO usuario VALUES (identificacion_, nombre_, primer_apellido_, segundo_apellido_, telefono_personal_, telefono_habitacion_,  
				fecha_nacimiento_, sexo_, escolaridad_, provincia_, canton_, distrito_,  estado_civil_, direccion_, 
				1, 1, 1, numero_plaza_, contacto_emergencia_numero_, contacto_emergencia_, especialidad_,
				codigo_colegio_, estado_, 'NA', 'NA', '000', '1999-12-06', '1999-12-06', contrasena_, 0);
		INSERT INTO usuario_rol VALUES (NULL, 2, identificacion_);
END;
$$















