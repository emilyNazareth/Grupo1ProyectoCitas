
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_obtener_catidad_de_citas_por_mes;
CREATE procedure sp_obtener_catidad_de_citas_por_mes()
BEGIN	
	SELECT 
	count(pk_id_cita)
	/*DATE_FORMAT(tf_fecha, "%M")*/
	FROM controlcitas.cita 
	group by DATE_FORMAT(tf_fecha, "%M")
	order by tf_fecha;

END;

$$

