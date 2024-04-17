<?php
$host = "localhost";
$usuario = "root";
$contrasenia = "info2023";
$base_de_datos = "login";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
return $mysqli;