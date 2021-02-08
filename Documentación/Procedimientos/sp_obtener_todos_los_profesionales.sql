call sp_obtener_todos_los_profesionales
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_obtener_todos_los_profesionales;
CREATE procedure sp_obtener_todos_los_profesionales()

BEGIN
Select 
    pk_cedula_usuario as cedula,
	CONCAT(tc_nombre, ' ', tc_primer_apellido) as nombre 	
from  usuario , usuario_rol , rol 
where  tn_borrado = 0 AND pk_cedula_usuario = fk_id_usuario
AND fk_id_rol = pk_id_rol
AND tc_nombre_rol = 'Profesional';
end

$$