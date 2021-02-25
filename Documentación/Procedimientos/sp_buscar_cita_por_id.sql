
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_buscar_cita_por_id;
CREATE procedure sp_buscar_cita_por_id(
id_cita_ int(11)
)

BEGIN
Select C.pk_id_cita, C.fk_id_profesional, U.tc_nombre,  C.tf_fecha, C.tc_hora, C.tc_observaciones
FROM  cita C, usuario U
where  C.fk_id_funcionario = U.pk_cedula_usuario
AND C.pk_id_cita = id_cita_ 
AND C.tc_borrado = 0;
end

$$


