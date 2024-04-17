<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
if (!isset($_GET["id"])) {
exit("No hay id");
}
$mysqli = include_once "conexion.php";
$id = $_GET["id"];
$sentencia = $mysqli->prepare("DELETE FROM productos WHERE id = ?");
$sentencia->bind_param("i", $id);
if($sentencia->execute())
{
echo '<p><script>Swal.fire({
title: "Proceso Realizado!",
text: "Producto Eliminado!",
type: "success"
}).then(function() {
window.location = "listar.php";
});</script></p>';
} else{
echo '<p><script>Swal.fire({
title: "Opsss!",
text: "Hubo un error!",
type: "error"
}).then(function() {
window.location = "listar.php";
});</script></p>';
}

