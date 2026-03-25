DELIMITER //
CREATE PROCEDURE SP_InsertarTecnico(
    IN p_nombre VARCHAR(100),
    IN p_email VARCHAR(100),
    IN p_telefono VARCHAR(20),
    IN p_especialidad VARCHAR(100),
    IN p_id_estado INT
)
BEGIN
    INSERT INTO TBL_TECNICOS (NOMBRE, EMAIL, TELEFONO, ESPECIALIDAD, ID_ESTADO)
    VALUES (p_nombre, p_email, p_telefono, p_especialidad, p_id_estado);
END //
DELIMITER ;