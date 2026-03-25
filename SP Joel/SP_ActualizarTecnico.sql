DELIMITER //
CREATE PROCEDURE SP_ActualizarTecnico(
    IN p_id_tecnico INT,
    IN p_nombre VARCHAR(100),
    IN p_email VARCHAR(100),
    IN p_telefono VARCHAR(20),
    IN p_especialidad VARCHAR(100),
    IN p_id_estado INT
)
BEGIN
    UPDATE TBL_TECNICOS 
    SET NOMBRE = p_nombre, 
        EMAIL = p_email, 
        TELEFONO = p_telefono,
        ESPECIALIDAD = p_especialidad,
        ID_ESTADO = p_id_estado
    WHERE ID_TECNICO = p_id_tecnico;
END //
DELIMITER ;