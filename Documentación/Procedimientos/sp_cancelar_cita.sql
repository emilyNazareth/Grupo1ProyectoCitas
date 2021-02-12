CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_cancelar_cita`(id_ int(11), justificacion_ varchar(2000))
BEGIN
		update cita 
			set tc_borrado = 1
			,tc_justifacion = justificacion_
		where pk_id_cita = id_;
		
        
END