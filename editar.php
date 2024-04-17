<?php
include_once "encabezado.php";
$mysqli = include_once "conexion.php";
$id = $_GET["id"];
$sentencia = $mysqli->prepare("SELECT id, nombre, descripcion FROM productos WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
$resultado = $sentencia->get_result();
# Obtenemos solo una fila, que será el producto a editar
$producto = $resultado->fetch_assoc();
if (!$producto) {
exit("No hay resultados para ese ID");
}
?>
<div class="row">
    <div class="col-12">
        <h1>Actualizar Producto</h1>
        <form action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto["id"] ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="<?php echo $producto["nombre"] ?>" placeholder="Nombre" class="form-control" type="text"
                    name="nombre" id="nombre" required>

            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea placeholder="Descripción" class="form-control" name="descripcion" id="descripcion" cols="30"
                    rows="10" required><?php echo $producto["descripcion"] ?></textarea>

            </div>
            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-warning" href="listar.php">Volver</a>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>