CREATE DATABASE  IF NOT EXISTS `infinitytech` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `infinitytech`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: infinitytech
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_carrito`
--

DROP TABLE IF EXISTS `tbl_carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_carrito` (
  `ID_CARRITO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_CARRITO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `tbl_carrito_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuarios` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_carrito`
--

LOCK TABLES `tbl_carrito` WRITE;
/*!40000 ALTER TABLE `tbl_carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categorias` (
  `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA` varchar(100) DEFAULT NULL,
  `ID_ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  CONSTRAINT `tbl_categorias_ibfk_1` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_estados_sistema` (`ID_ESTADO_SISTEMA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categorias`
--

LOCK TABLES `tbl_categorias` WRITE;
/*!40000 ALTER TABLE `tbl_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_detalle_fact`
--

DROP TABLE IF EXISTS `tbl_detalle_fact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_detalle_fact` (
  `ID_DETALLE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_FACTURA` int(11) DEFAULT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRECIO_UNITARIO_MOMENTO` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_DETALLE`),
  KEY `ID_FACTURA` (`ID_FACTURA`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  CONSTRAINT `tbl_detalle_fact_ibfk_1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `tbl_facturas` (`ID_FACTURA`),
  CONSTRAINT `tbl_detalle_fact_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tbl_productos` (`ID_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_detalle_fact`
--

LOCK TABLES `tbl_detalle_fact` WRITE;
/*!40000 ALTER TABLE `tbl_detalle_fact` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detalle_fact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_direcciones`
--

DROP TABLE IF EXISTS `tbl_direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_direcciones` (
  `ID_DIRECCION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `PROVINCIA` varchar(50) DEFAULT NULL,
  `CANTON` varchar(50) DEFAULT NULL,
  `DIRECCION_EXACTA` text DEFAULT NULL,
  `ID_ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_DIRECCION`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  CONSTRAINT `tbl_direcciones_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuarios` (`ID_USUARIO`),
  CONSTRAINT `tbl_direcciones_ibfk_2` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_estados_sistema` (`ID_ESTADO_SISTEMA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_direcciones`
--

LOCK TABLES `tbl_direcciones` WRITE;
/*!40000 ALTER TABLE `tbl_direcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estados_sistema`
--

DROP TABLE IF EXISTS `tbl_estados_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_estados_sistema` (
  `ID_ESTADO_SISTEMA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ESTADO_SISTEMA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estados_sistema`
--

LOCK TABLES `tbl_estados_sistema` WRITE;
/*!40000 ALTER TABLE `tbl_estados_sistema` DISABLE KEYS */;
INSERT INTO `tbl_estados_sistema` VALUES (1,'Activo'),(2,'Inactivo'),(3,'Descontinuado');
/*!40000 ALTER TABLE `tbl_estados_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estados_usuarios`
--

DROP TABLE IF EXISTS `tbl_estados_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_estados_usuarios` (
  `ID_ESTADO_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ESTADO_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estados_usuarios`
--

LOCK TABLES `tbl_estados_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_estados_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_estados_usuarios` VALUES (1,'Activo'),(2,'Suspendido'),(3,'Baneado'),(4,'Pendiente de Verificación');
/*!40000 ALTER TABLE `tbl_estados_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estados_venta`
--

DROP TABLE IF EXISTS `tbl_estados_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_estados_venta` (
  `ID_ESTADO_VENTA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ESTADO_VENTA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estados_venta`
--

LOCK TABLES `tbl_estados_venta` WRITE;
/*!40000 ALTER TABLE `tbl_estados_venta` DISABLE KEYS */;
INSERT INTO `tbl_estados_venta` VALUES (1,'Pendiente'),(2,'Pagado'),(3,'Enviado'),(4,'Entregado'),(5,'Cancelado');
/*!40000 ALTER TABLE `tbl_estados_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_facturas`
--

DROP TABLE IF EXISTS `tbl_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_facturas` (
  `ID_FACTURA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_DIRECCION` int(11) DEFAULT NULL,
  `TOTAL` decimal(10,2) DEFAULT NULL,
  `ID_ESTADO_VENTA` int(11) DEFAULT NULL,
  `FECHA_CREACION` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_FACTURA`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_DIRECCION` (`ID_DIRECCION`),
  KEY `ID_ESTADO_VENTA` (`ID_ESTADO_VENTA`),
  CONSTRAINT `tbl_facturas_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuarios` (`ID_USUARIO`),
  CONSTRAINT `tbl_facturas_ibfk_2` FOREIGN KEY (`ID_DIRECCION`) REFERENCES `tbl_direcciones` (`ID_DIRECCION`),
  CONSTRAINT `tbl_facturas_ibfk_3` FOREIGN KEY (`ID_ESTADO_VENTA`) REFERENCES `tbl_estados_venta` (`ID_ESTADO_VENTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_facturas`
--

LOCK TABLES `tbl_facturas` WRITE;
/*!40000 ALTER TABLE `tbl_facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item_carrito`
--

DROP TABLE IF EXISTS `tbl_item_carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_item_carrito` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CARRITO` int(11) DEFAULT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ITEM`),
  KEY `ID_CARRITO` (`ID_CARRITO`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  CONSTRAINT `tbl_item_carrito_ibfk_1` FOREIGN KEY (`ID_CARRITO`) REFERENCES `tbl_carrito` (`ID_CARRITO`),
  CONSTRAINT `tbl_item_carrito_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `tbl_productos` (`ID_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item_carrito`
--

LOCK TABLES `tbl_item_carrito` WRITE;
/*!40000 ALTER TABLE `tbl_item_carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_item_carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_marcas`
--

DROP TABLE IF EXISTS `tbl_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_marcas` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MARCA` varchar(100) DEFAULT NULL,
  `ID_ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  CONSTRAINT `tbl_marcas_ibfk_1` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_estados_sistema` (`ID_ESTADO_SISTEMA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_marcas`
--

LOCK TABLES `tbl_marcas` WRITE;
/*!40000 ALTER TABLE `tbl_marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_productos`
--

DROP TABLE IF EXISTS `tbl_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_productos` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MARCA` int(11) DEFAULT NULL,
  `ID_CATEGORIA` int(11) DEFAULT NULL,
  `NOMBRE` varchar(150) DEFAULT NULL,
  `DESCRIPCION` text DEFAULT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `IMAGEN` varchar(255) DEFAULT NULL,
  `ID_ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `ID_MARCA` (`ID_MARCA`),
  KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`ID_MARCA`) REFERENCES `tbl_marcas` (`ID_MARCA`),
  CONSTRAINT `tbl_productos_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `tbl_categorias` (`ID_CATEGORIA`),
  CONSTRAINT `tbl_productos_ibfk_3` FOREIGN KEY (`ID_ESTADO`) REFERENCES `tbl_estados_sistema` (`ID_ESTADO_SISTEMA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_productos`
--

LOCK TABLES `tbl_productos` WRITE;
/*!40000 ALTER TABLE `tbl_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reset_contrasenna`
--

DROP TABLE IF EXISTS `tbl_reset_contrasenna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_reset_contrasenna` (
  `ID_RESET` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TOKEN` varchar(255) DEFAULT NULL,
  `EXPIRES_AT` datetime DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_RESET`),
  UNIQUE KEY `TOKEN` (`TOKEN`),
  KEY `EMAIL` (`EMAIL`),
  CONSTRAINT `tbl_reset_contrasenna_ibfk_1` FOREIGN KEY (`EMAIL`) REFERENCES `tbl_usuarios` (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reset_contrasenna`
--

LOCK TABLES `tbl_reset_contrasenna` WRITE;
/*!40000 ALTER TABLE `tbl_reset_contrasenna` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reset_contrasenna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `IDENTIFICACION` varchar(20) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROL` varchar(50) DEFAULT 'Cliente',
  `ID_ESTADO_USUARIO` int(11) DEFAULT NULL,
  `FECHA_REGISTRO` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  UNIQUE KEY `IDENTIFICACION` (`IDENTIFICACION`),
  KEY `ID_ESTADO_USUARIO` (`ID_ESTADO_USUARIO`),
  CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`ID_ESTADO_USUARIO`) REFERENCES `tbl_estados_usuarios` (`ID_ESTADO_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

CREATE TABLE TBL_TECNICOS (
    ID_TECNICO INT PRIMARY KEY AUTO_INCREMENT,
    NOMBRE VARCHAR(100) NOT NULL,
    EMAIL VARCHAR(100) UNIQUE NOT NULL,
    TELEFONO VARCHAR(20),
    ESPECIALIDAD VARCHAR(100), -- Ejemplo: Redes, Laptops, Impresoras
    ID_ESTADO INT,
    FECHA_REGISTRO TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_ESTADO) REFERENCES TBL_ESTADOS_SISTEMA(ID_ESTADO_SISTEMA)
);

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

DROP PROCEDURE IF EXISTS SP_EliminarTecnico;

DELIMITER //
CREATE PROCEDURE SP_ConsultarTecnicos()
BEGIN
    SELECT 
        T.ID_TECNICO, 
        T.NOMBRE, 
        T.EMAIL, 
        T.TELEFONO, 
        T.ESPECIALIDAD, 
        E.DESCRIPCION AS ESTADO
    FROM TBL_TECNICOS T
    INNER JOIN TBL_ESTADOS_SISTEMA E ON T.ID_ESTADO = E.ID_ESTADO_SISTEMA
    WHERE T.ID_ESTADO = 1; 
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SP_MostrarCategorias()
BEGIN
    SELECT 
       ID_Categoria,
       Nombre_Categoria
    FROM  TBL_Categorias
    WHERE ID_ESTADO = 1; -- Solo trae a los que están "Activos"
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE SP_ProductosPorCategoria(IN p_idCategoria INT)
BEGIN
    SELECT *
    FROM tbl_productos
    WHERE ID_Categoria = p_idCategoria;
END;//
DELIMITER ;

CALL SP_InsertarTecnico('Juan Pérez', 'juan.perez@email.com', '555-0101', 'Redes y Conectividad', 1);

CALL SP_InsertarTecnico('María García', 'm.garcia@email.com', '555-0202', 'Soporte de Hardware', 1);

CALL SP_InsertarTecnico('Carlos Ruiz', 'cruiz@email.com', '555-0303', 'Mantenimiento de Software', 2);


INSERT INTO tbl_categorias (NOMBRE_CATEGORIA, ID_ESTADO) VALUES 
('Laptops', 1),
('Componentes', 1),
('Periféricos', 1),
('Monitores', 1),
('Almacenamiento', 1);


INSERT INTO tbl_marcas (NOMBRE_MARCA, ID_ESTADO) VALUES 
('Asus', 1),
('Intel', 1),
('Logitech', 1),
('Samsung', 1),
('Corsair', 1),
('NVIDIA', 1);

INSERT INTO tbl_productos 
(ID_CATEGORIA, ID_MARCA, NOMBRE, DESCRIPCION, PRECIO, CANTIDAD, IMAGEN, ID_ESTADO)
VALUES

-- ================= LAPTOPS (2) =================
(1, 2, 'Laptop Asus ROG Strix G15', 'Laptop gaming Ryzen 7, 16GB RAM, RTX 3050', 650000, 5, 'Views/assets/images/productos/69e5c0bd3a821_ROG.jpg', 1),
(1, 2, 'Laptop Asus VivoBook 15', 'Laptop uso diario Intel i5, 8GB RAM, SSD 512GB', 420000, 8, 'Views/assets/images/productos/69e5c0b08749a_VIVOBOOK.jpg', 1),

-- ================= COMPONENTES (2) =================
(2, 3, 'Procesador Intel Core i7 12700K', 'CPU 12va generación alto rendimiento', 280000, 10, 'Views/assets/images/productos/69e5c0d3a3277_i7.jpg', 1),
(2, 3, 'Memoria RAM Corsair 16GB DDR4', 'RAM 3200MHz para gaming', 45000, 15, 'Views/assets/images/productos/69e5c10862598_RAM.jpg', 1),

-- ================= TARJETAS DE VIDEO (1) =================
(2, 1, 'Tarjeta Gráfica NVIDIA RTX 4060', 'GPU gaming 8GB GDDR6', 390000, 6, 'Views/assets/images/productos/69e5c0ed206a5_RTX.jpg', 1),

-- ================= PERIFÉRICOS (4) =================
(3, 4, 'Mouse Logitech G502 Hero', 'Mouse gamer RGB alta precisión', 35000, 20, 'Views/assets/images/productos/69e5c1179a854_Mouse.jpg', 1),
(3, 4, 'Teclado Logitech G213', 'Teclado gaming RGB resistente a salpicaduras', 40000, 12, 'Views/assets/images/productos/69e5c12750312_teclado.jpg', 1),

-- ================= MONITORES (5) =================
(4, 5, 'Monitor Samsung 24" FHD', 'Monitor 24 pulgadas Full HD 75Hz', 95000, 7, 'Views/assets/images/productos/69e5c1368cd50_Monitor Samsung.jpg', 1),
(4, 5, 'Monitor Asus TUF Gaming 27"', 'Monitor 27 pulgadas 165Hz 1ms', 210000, 4, 'Views/assets/images/productos/69e5c14626f90_Monitor Asus.jpg', 1),

-- ================= ALMACENAMIENTO (6) =================
(5, 6, 'SSD Samsung 1TB NVMe', 'Disco sólido ultra rápido', 80000, 10, 'Views/assets/images/productos/69e5c15554e9f_SSD Samsung.jpg', 1),
(5, 6, 'SSD Corsair 512GB', 'SSD SATA alto rendimiento', 45000, 9, 'Views/assets/images/productos/69e5c164b3c73_ssd corsair.avif', 1);

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'infinitytech'
--
/*!50003 DROP PROCEDURE IF EXISTS `SP_CREAR_CARRITO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CREAR_CARRITO`(IN p_usuario INT)
BEGIN
    INSERT INTO TBL_CARRITO(ID_USUARIO) VALUES(p_usuario);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_CREAR_PRODUCTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CREAR_PRODUCTO`(
    IN p_nombre VARCHAR(150),
    IN p_descripcion TEXT,
    IN p_precio DECIMAL(10,2),
    IN p_cantidad INT,
    IN p_marca INT,
    IN p_categoria INT
)
BEGIN
    INSERT INTO TBL_PRODUCTOS
    (NOMBRE,DESCRIPCION,PRECIO,CANTIDAD,ID_MARCA,ID_CATEGORIA,ID_ESTADO)
    VALUES (p_nombre,p_descripcion,p_precio,p_cantidad,p_marca,p_categoria,1);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_CREAR_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CREAR_USUARIO`(
    IN p_identificacion VARCHAR(20),
    IN p_nombre VARCHAR(100),
    IN p_email VARCHAR(100),
    IN p_password VARCHAR(255)
)
BEGIN
    INSERT INTO TBL_USUARIOS (IDENTIFICACION,NOMBRE,EMAIL,PASSWORD,ID_ESTADO_USUARIO)
    VALUES (p_identificacion,p_nombre,p_email,p_password,1);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_LOGIN` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LOGIN`(
    IN p_email VARCHAR(100),
    IN p_password VARCHAR(255)
)
BEGIN
    SELECT * FROM TBL_USUARIOS
    WHERE EMAIL=p_email AND PASSWORD=p_password AND ID_ESTADO_USUARIO=1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_OBTENER_PRODUCTOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_OBTENER_PRODUCTOS`()
BEGIN
    SELECT * FROM TBL_PRODUCTOS;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_VER_CARRITO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VER_CARRITO`(IN p_usuario INT)
BEGIN
    SELECT P.NOMBRE, IC.CANTIDAD, P.PRECIO
    FROM TBL_ITEM_CARRITO IC
    INNER JOIN TBL_CARRITO C ON IC.ID_CARRITO=C.ID_CARRITO
    INNER JOIN TBL_PRODUCTOS P ON IC.ID_PRODUCTO=P.ID_PRODUCTO
    WHERE C.ID_USUARIO=p_usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-03 22:35:17

-- ── CARRITO ──────────────────────────────────────────────────

DELIMITER $$
CREATE PROCEDURE SP_OBTENER_CARRITO(IN p_idUsuario INT)
BEGIN
    SELECT ID_CARRITO FROM tbl_carrito 
    WHERE ID_USUARIO = p_idUsuario 
    LIMIT 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_CREAR_CARRITO_USUARIO(IN p_idUsuario INT)
BEGIN
    INSERT INTO tbl_carrito (ID_USUARIO) VALUES (p_idUsuario);
    SELECT LAST_INSERT_ID() AS ID_CARRITO;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_VERIFICAR_ITEM_CARRITO(IN p_idCarrito INT, IN p_idProducto INT)
BEGIN
    SELECT ID_ITEM, CANTIDAD FROM tbl_item_carrito
    WHERE ID_CARRITO = p_idCarrito AND ID_PRODUCTO = p_idProducto;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_ACTUALIZAR_ITEM_CARRITO(IN p_idItem INT, IN p_cantidad INT)
BEGIN
    UPDATE tbl_item_carrito SET CANTIDAD = p_cantidad WHERE ID_ITEM = p_idItem;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_INSERTAR_ITEM_CARRITO(IN p_idCarrito INT, IN p_idProducto INT, IN p_cantidad INT)
BEGIN
    INSERT INTO tbl_item_carrito (ID_CARRITO, ID_PRODUCTO, CANTIDAD)
    VALUES (p_idCarrito, p_idProducto, p_cantidad);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_CONSULTAR_CARRITO(IN p_idUsuario INT)
BEGIN
    SELECT ic.ID_ITEM, ic.ID_PRODUCTO, p.NOMBRE, c.FECHA_CREACION,
           ic.CANTIDAD, p.PRECIO, (ic.CANTIDAD * p.PRECIO) AS TOTAL, p.IMAGEN
    FROM tbl_item_carrito ic
    INNER JOIN tbl_carrito c ON ic.ID_CARRITO = c.ID_CARRITO
    INNER JOIN tbl_productos p ON ic.ID_PRODUCTO = p.ID_PRODUCTO
    WHERE c.ID_USUARIO = p_idUsuario;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_RESUMEN_CARRITO(IN p_idUsuario INT)
BEGIN
    SELECT COALESCE(SUM(ic.CANTIDAD), 0) AS TotalCantidad,
           COALESCE(SUM(ic.CANTIDAD * p.PRECIO), 0) AS TotalPago
    FROM tbl_item_carrito ic
    INNER JOIN tbl_carrito c ON ic.ID_CARRITO = c.ID_CARRITO
    INNER JOIN tbl_productos p ON ic.ID_PRODUCTO = p.ID_PRODUCTO
    WHERE c.ID_USUARIO = p_idUsuario;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_REMOVER_ITEM_CARRITO(IN p_idItem INT)
BEGIN
    DELETE FROM tbl_item_carrito WHERE ID_ITEM = p_idItem;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_TOTAL_CARRITO(IN p_idCarrito INT)
BEGIN
    SELECT COALESCE(SUM(ic.CANTIDAD * p.PRECIO), 0) AS Total
    FROM tbl_item_carrito ic
    INNER JOIN tbl_productos p ON ic.ID_PRODUCTO = p.ID_PRODUCTO
    WHERE ic.ID_CARRITO = p_idCarrito;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_CREAR_FACTURA(IN p_idUsuario INT, IN p_total DECIMAL(10,2))
BEGIN
    INSERT INTO tbl_facturas (ID_USUARIO, ID_DIRECCION, TOTAL, ID_ESTADO_VENTA)
    VALUES (p_idUsuario, NULL, p_total, 1);
    SELECT LAST_INSERT_ID() AS ID_FACTURA;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_CREAR_DETALLE_FACTURA(IN p_idFactura INT, IN p_idCarrito INT)
BEGIN
    INSERT INTO tbl_detalle_fact (ID_FACTURA, ID_PRODUCTO, CANTIDAD, PRECIO_UNITARIO_MOMENTO)
    SELECT p_idFactura, ic.ID_PRODUCTO, ic.CANTIDAD, p.PRECIO
    FROM tbl_item_carrito ic
    INNER JOIN tbl_productos p ON ic.ID_PRODUCTO = p.ID_PRODUCTO
    WHERE ic.ID_CARRITO = p_idCarrito;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_DESCONTAR_STOCK(IN p_idCarrito INT)
BEGIN
    UPDATE tbl_productos p
    INNER JOIN tbl_item_carrito ic ON p.ID_PRODUCTO = ic.ID_PRODUCTO
    SET p.CANTIDAD = p.CANTIDAD - ic.CANTIDAD
    WHERE ic.ID_CARRITO = p_idCarrito;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_VACIAR_CARRITO(IN p_idCarrito INT)
BEGIN
    DELETE FROM tbl_item_carrito WHERE ID_CARRITO = p_idCarrito;
END$$
DELIMITER ;

-- ── FACTURAS ─────────────────────────────────────────────────

DELIMITER $$
CREATE PROCEDURE SP_CONSULTAR_FACTURAS_USUARIO(IN p_idUsuario INT)
BEGIN
    SELECT f.ID_FACTURA, f.FECHA_CREACION, f.TOTAL, ev.DESCRIPCION AS ESTADO
    FROM tbl_facturas f
    INNER JOIN tbl_estados_venta ev ON f.ID_ESTADO_VENTA = ev.ID_ESTADO_VENTA
    WHERE f.ID_USUARIO = p_idUsuario
    ORDER BY f.FECHA_CREACION DESC;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_CONSULTAR_TODAS_FACTURAS()
BEGIN
    SELECT f.ID_FACTURA, u.NOMBRE AS CLIENTE, u.EMAIL,
           f.FECHA_CREACION, f.TOTAL, ev.DESCRIPCION AS ESTADO
    FROM tbl_facturas f
    INNER JOIN tbl_usuarios u ON f.ID_USUARIO = u.ID_USUARIO
    INNER JOIN tbl_estados_venta ev ON f.ID_ESTADO_VENTA = ev.ID_ESTADO_VENTA
    ORDER BY f.FECHA_CREACION DESC;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_CONSULTAR_DETALLE_FACTURA(IN p_idFactura INT)
BEGIN
    SELECT df.ID_DETALLE, p.NOMBRE, p.IMAGEN,
           df.CANTIDAD, df.PRECIO_UNITARIO_MOMENTO,
           (df.CANTIDAD * df.PRECIO_UNITARIO_MOMENTO) AS SUBTOTAL
    FROM tbl_detalle_fact df
    INNER JOIN tbl_productos p ON df.ID_PRODUCTO = p.ID_PRODUCTO
    WHERE df.ID_FACTURA = p_idFactura;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_ACTUALIZAR_ESTADO_FACTURA(IN p_idFactura INT, IN p_idEstado INT)
BEGIN
    UPDATE tbl_facturas SET ID_ESTADO_VENTA = p_idEstado WHERE ID_FACTURA = p_idFactura;
END$$
DELIMITER ;

-- ── PRODUCTOS ─────────────────────────────────────────────────

DELIMITER $$
CREATE PROCEDURE SP_OBTENER_PRODUCTO_ID(IN p_idProducto INT)
BEGIN
    SELECT * FROM tbl_productos WHERE ID_PRODUCTO = p_idProducto;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_ACTUALIZAR_PRODUCTO(
    IN p_idProducto INT,
    IN p_nombre VARCHAR(150),
    IN p_descripcion TEXT,
    IN p_precio DECIMAL(10,2),
    IN p_cantidad INT,
    IN p_imagen VARCHAR(255)
)
BEGIN
    IF p_imagen = '' THEN
        UPDATE tbl_productos
        SET NOMBRE = p_nombre,
            DESCRIPCION = p_descripcion,
            PRECIO = p_precio,
            CANTIDAD = p_cantidad
        WHERE ID_PRODUCTO = p_idProducto;
    ELSE
        UPDATE tbl_productos
        SET NOMBRE = p_nombre,
            DESCRIPCION = p_descripcion,
            PRECIO = p_precio,
            CANTIDAD = p_cantidad,
            IMAGEN = p_imagen
        WHERE ID_PRODUCTO = p_idProducto;
    END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_ELIMINAR_PRODUCTO(IN p_idProducto INT)
BEGIN
    DELETE FROM tbl_productos WHERE ID_PRODUCTO = p_idProducto;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_CAMBIAR_ESTADO_PRODUCTO(IN p_idProducto INT)
BEGIN
    UPDATE tbl_productos
    SET ID_ESTADO = CASE
        WHEN ID_ESTADO = 1 THEN 2
        ELSE 1
    END
    WHERE ID_PRODUCTO = p_idProducto;
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE SP_VACIAR_CARRITO_USUARIO(IN p_idUsuario INT)
BEGIN
    DELETE ic FROM tbl_item_carrito ic
    INNER JOIN tbl_carrito c ON ic.ID_CARRITO = c.ID_CARRITO
    WHERE c.ID_USUARIO = p_idUsuario;
END$$
DELIMITER ;


-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: infinitytech
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `tbl_carrito`
--

LOCK TABLES `tbl_carrito` WRITE;
/*!40000 ALTER TABLE `tbl_carrito` DISABLE KEYS */;
INSERT INTO `tbl_carrito` VALUES (1,1,'2026-04-19 15:26:14');
/*!40000 ALTER TABLE `tbl_carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_detalle_fact`
--

LOCK TABLES `tbl_detalle_fact` WRITE;
/*!40000 ALTER TABLE `tbl_detalle_fact` DISABLE KEYS */;
INSERT INTO `tbl_detalle_fact` VALUES (1,1,5,1,1000.00),(2,2,6,1,205000.00);
/*!40000 ALTER TABLE `tbl_detalle_fact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_direcciones`
--

LOCK TABLES `tbl_direcciones` WRITE;
/*!40000 ALTER TABLE `tbl_direcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_direcciones` ENABLE KEYS */;
UNLOCK TABLES;

-- Dumping data for table `tbl_facturas`
--

LOCK TABLES `tbl_facturas` WRITE;
/*!40000 ALTER TABLE `tbl_facturas` DISABLE KEYS */;
INSERT INTO `tbl_facturas` VALUES (1,1,NULL,1000.00,1,'2026-04-19 21:26:24'),(2,1,NULL,205000.00,1,'2026-04-19 21:33:37');
/*!40000 ALTER TABLE `tbl_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_item_carrito`
--

LOCK TABLES `tbl_item_carrito` WRITE;
/*!40000 ALTER TABLE `tbl_item_carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_item_carrito` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `tbl_reset_contrasenna`
--

LOCK TABLES `tbl_reset_contrasenna` WRITE;
/*!40000 ALTER TABLE `tbl_reset_contrasenna` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reset_contrasenna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES (1,'NULL','USUARIO_CLIENTE','cliente@gmail.com','cliente','Cliente',1,'2026-04-19 13:14:35'),(3,NULL,'admin','correo@infinitytech.com','admin','Administrador',1,'2026-04-19 15:41:24');
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-19 16:17:54
