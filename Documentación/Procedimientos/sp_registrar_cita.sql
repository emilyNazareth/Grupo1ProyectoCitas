CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_registrar_cita`(
fk_id_funcionario_ INT,
tf_fecha_ date,
tc_hora_ VARCHAR(20),
fk_id_profesional_ INT,
tc_paciente_ VARCHAR(30),
tc_estado_ VARCHAR(30),
tc_observaciones_ VARCHAR(2000),
tc_justificacion_ VARCHAR(2000))
BEGIN
 INSERT INTO `controlcitas`.`cita`
(
`fk_id_funcionario`,
`tf_fecha`,
`tc_hora`,
`fk_id_profesional`,
`tc_paciente`,
`tc_estado`,
`tc_observaciones`,
`tc_justifacion`,
`tc_borrado`)
     VALUES
           (fk_id_funcionario_
           ,tf_fecha_
           ,tc_hora_
           ,fk_id_profesional_
           ,tc_paciente_
           ,tc_estado_
           ,tc_observaciones_
           ,tc_justificacion_
           ,0);
END