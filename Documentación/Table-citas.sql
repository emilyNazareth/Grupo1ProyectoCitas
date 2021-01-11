CREATE DATABASE IF NOT EXISTS citas_psicologia
USE citas_psicologia

CREATE TABLE `Citas` (
  `pk_id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_funcionario` int(11) NOT NULL,
  `tf_fecha` date NOT NULL,
  `tc_hora` time NOT NULL,
  `fk_id_profesional` int(11) NOT NULL,
  `tc_paciente` varchar(30) NOT NULL,
  `tc_estado` varchar(30) NOT NULL,
  `fk_id_subproceso` int(11) NOT NULL,
  `fk_id_asistencia` int(11) NOT NULL,
  `tc_observaciones` varchar(5000) NOT NULL,
  `tc_justificacion` varchar(5000) NOT NULL,
  PRIMARY KEY (`pk_id_cita`),
  UNIQUE KEY `pk_id_cita_UNIQUE` (`pk_id_cita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
