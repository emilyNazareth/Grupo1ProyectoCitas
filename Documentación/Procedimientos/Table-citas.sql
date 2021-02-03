CREATE TABLE `cita` (
  `pk_id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_funcionario` int(11) NOT NULL,
  `tf_fecha` date NOT NULL,
  `tc_hora` varchar(20) NOT NULL,
  `fk_id_profesional` int(11) NOT NULL,
  `tc_paciente` varchar(30) NOT NULL,
  `tc_estado` varchar(30) NOT NULL,
  `tc_observaciones` varchar(2000) DEFAULT NULL,
  `tc_justifacion` varchar(2000) DEFAULT NULL,
  `tc_borrado` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`pk_id_cita`),
  KEY `fk_id_funcionario` (`fk_id_funcionario`),
  KEY `fk_id_profesional` (`fk_id_profesional`),
  CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`fk_id_funcionario`) REFERENCES `usuario` (`pk_cedula_usuario`),
  CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`fk_id_profesional`) REFERENCES `usuario` (`pk_cedula_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
