<?php
include ("conexion.php");

$con=conectar();

echo "Conexion exitosa;";

mysqli_close($con);
?>