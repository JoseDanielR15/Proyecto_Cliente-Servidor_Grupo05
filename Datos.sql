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
-- Dumping data for table `tbl_categorias`
--

LOCK TABLES `tbl_categorias` WRITE;
/*!40000 ALTER TABLE `tbl_categorias` DISABLE KEYS */;
INSERT INTO `tbl_categorias` VALUES (1,'Categoria default',1);
/*!40000 ALTER TABLE `tbl_categorias` ENABLE KEYS */;
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

--
-- Dumping data for table `tbl_estados_sistema`
--

LOCK TABLES `tbl_estados_sistema` WRITE;
/*!40000 ALTER TABLE `tbl_estados_sistema` DISABLE KEYS */;
INSERT INTO `tbl_estados_sistema` VALUES (1,'Activo'),(2,'Inactivo'),(3,'Descontinuado');
/*!40000 ALTER TABLE `tbl_estados_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_estados_usuarios`
--

LOCK TABLES `tbl_estados_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_estados_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_estados_usuarios` VALUES (1,'Activo'),(2,'Suspendido'),(3,'Baneado'),(4,'Pendiente de Verificación');
/*!40000 ALTER TABLE `tbl_estados_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_estados_venta`
--

LOCK TABLES `tbl_estados_venta` WRITE;
/*!40000 ALTER TABLE `tbl_estados_venta` DISABLE KEYS */;
INSERT INTO `tbl_estados_venta` VALUES (1,'Pendiente'),(2,'Pagado'),(3,'Enviado'),(4,'Entregado'),(5,'Cancelado');
/*!40000 ALTER TABLE `tbl_estados_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
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
-- Dumping data for table `tbl_marcas`
--

LOCK TABLES `tbl_marcas` WRITE;
/*!40000 ALTER TABLE `tbl_marcas` DISABLE KEYS */;
INSERT INTO `tbl_marcas` VALUES (1,'Marca default',1);
/*!40000 ALTER TABLE `tbl_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_productos`
--

LOCK TABLES `tbl_productos` WRITE;
/*!40000 ALTER TABLE `tbl_productos` DISABLE KEYS */;
INSERT INTO `tbl_productos` VALUES (5,1,1,'Test producto','Producto sample',1000.00,1,NULL,1),(6,1,1,'ASUS Vivobook – i3 N305 – 8GB-  Cool Silver','Pantalla: 15.6 pulgadas – 1920 x 1080 resolución\r\nProcesador: Intel Core i3 N305 – 3.8 GHz – 8 Cores\r\nMemoria: 8 GB DDR4 3200\r\nGráficos: Intel UHD Graphics\r\nDisco SSD: 256 GB M.2 NVME\r\nConectividad: Wi-Fi  – Bluetooth\r\nSistema Operativo: Windows 11 ',205000.00,4,NULL,1);
/*!40000 ALTER TABLE `tbl_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_reset_contrasenna`
--

LOCK TABLES `tbl_reset_contrasenna` WRITE;
/*!40000 ALTER TABLE `tbl_reset_contrasenna` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reset_contrasenna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_tecnicos`
--

LOCK TABLES `tbl_tecnicos` WRITE;
/*!40000 ALTER TABLE `tbl_tecnicos` DISABLE KEYS */;
INSERT INTO `tbl_tecnicos` VALUES (1,'Sample Technician','sampleyechnician@gmail.com','7777777','Redes',1,'2026-04-19 21:11:02');
/*!40000 ALTER TABLE `tbl_tecnicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES (1,'402640370','CASTRO ZUNIGA JUAN JOSE','juanjosecastrozuniga@gmail.com','adfFA981!0','Cliente',1,'2026-04-19 13:14:35'),(3,NULL,'admin','correo@infinitytech.com','admin','Administrador',1,'2026-04-19 15:41:24');
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
