CREATE TABLE `usuario_rol` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_rol` int(11) DEFAULT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `fk_id_rol` (`fk_id_rol`),
  KEY `fk_id_usuario` (`fk_id_usuario`),
  CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`fk_id_rol`) REFERENCES `rol` (`pk_id_rol`),
  CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`pk_cedula_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
