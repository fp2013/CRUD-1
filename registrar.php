<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
$mysqli = include_once "conexion.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$sentencia = $mysqli->prepare("INSERT INTO productos
(nombre, descripcion)
VALUES
(?, ?)");
$sentencia->bind_param("ss", $nombre, $descripcion);
if($sentencia->execute())
{
echo '<p><script>Swal.fire({
title: "Proceso Realizado!",
text: "Producto Agregado!",
type: "success"
}).then(function() {
window.location = "listar.php";
});</script></p>';
} else{
echo '<p><script>Swal.fire({
title: "Opsss!",
text: "Hubo un problema!",
type: "error"
}).then(function() {
window.location = "listar.php";
});</script></p>';
}
