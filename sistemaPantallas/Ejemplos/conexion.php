<?php
function conectar(){
	$user="root";
	$pass="";
	$server="localhost";
	$db="Web";
	$con=mysqli_connect($server,$user,$pass) or die ("No hay conexion".mysqli_error());
	return $con;
    
    
}
?>