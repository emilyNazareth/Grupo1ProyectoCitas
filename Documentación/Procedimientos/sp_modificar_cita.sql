CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_modificar_cita`(
id_cita_ int(11),
id_profesional_ int(9),
fecha_ varchar(20),
hora_  varchar(20),
observaciones_ varchar(2000)
)
BEGIN
UPDATE cita
SET   fk_id_profesional = id_profesional_, tf_fecha = fecha_, tc_hora = hora_, tc_observaciones = observaciones_
where  tc_borrado = 0 
AND pk_id_cita = id_cita_;
end

