
USE TiendaComputo;

DELIMITER $$

DROP PROCEDURE IF EXISTS sp_Registrar$$
CREATE PROCEDURE sp_Registrar(
    IN p_Identificacion VARCHAR(20),
    IN p_Nombre         VARCHAR(100),
    IN p_Contrasenna    VARCHAR(255),
    IN p_Correo         VARCHAR(100)
)
BEGIN
    IF EXISTS (SELECT 1 FROM TBL_USUARIOS WHERE EMAIL = p_Correo) THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El correo ya está registrado.';
    ELSE
        INSERT INTO TBL_USUARIOS (NOMBRE, EMAIL, PASSWORD, ROL, ID_ESTADO_USUARIO)
        VALUES (
            p_Nombre,
            p_Correo,
            p_Contrasenna,
            'Cliente',
            (SELECT ID_ESTADO_USUARIO FROM TBL_ESTADOS_USUARIOS WHERE DESCRIPCION = 'Activo' LIMIT 1)
        );
    END IF;
END$$

DROP PROCEDURE IF EXISTS sp_IniciarSesion$$
CREATE PROCEDURE sp_IniciarSesion(
    IN p_Correo      VARCHAR(100),
    IN p_Contrasenna VARCHAR(255)
)
BEGIN
    SELECT
        ID_USUARIO  AS Consecutivo,
        NOMBRE      AS Nombre,
        EMAIL       AS CorreoElectronico,
        ROL         AS Rol
    FROM TBL_USUARIOS
    WHERE EMAIL    = p_Correo
      AND PASSWORD = p_Contrasenna
      AND ID_ESTADO_USUARIO = (
            SELECT ID_ESTADO_USUARIO
            FROM TBL_ESTADOS_USUARIOS
            WHERE DESCRIPCION = 'Activo'
            LIMIT 1
      );
END$$

-- ============================================================
-- DATOS INICIALES REQUERIDOS
-- ============================================================
INSERT IGNORE INTO TBL_ESTADOS_USUARIOS (DESCRIPCION) VALUES
    ('Activo'),
    ('Suspendido'),
    ('Baneado'),
    ('Pendiente de Verificación');
    
    