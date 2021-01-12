CREATE TABLE `Rol` (
  `pk_id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `tc_nombre_rol` varchar(30) NOT NULL,
  `tc_borrrado` bit(1) NOT NULL,
  PRIMARY KEY (`pk_id_rol`),
  UNIQUE KEY `pk_id_rol_UNIQUE` (`pk_id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
