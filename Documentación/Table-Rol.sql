CREATE TABLE `rol` (
  `pk_id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `tc_nombre_rol` varchar(30) NOT NULL,
  `tc_borrado` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`pk_id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
