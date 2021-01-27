USE `controlcitas`;
DROP procedure IF EXISTS `controlcitas`.`sp_delete_professional`;
;

DELIMITER $$
USE `controlcitas`$$
CREATE DEFINER=`controlcitas`@`%` PROCEDURE `sp_delete_professional`(cedula integer)
BEGIN
	DELETE FROM usuario WHERE pk_cedula_usuario = cedula;
    SELECT row_count() as result;
END$$

DELIMITER ;
;