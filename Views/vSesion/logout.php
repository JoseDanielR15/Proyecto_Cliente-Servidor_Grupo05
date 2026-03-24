<?php
session_start();
session_destroy();
header("Location: ../vSesion/sesion.php");
exit();
?>