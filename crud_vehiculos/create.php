<?php
include "includes/db.php";
include "includes/navbar.php";

$mensaje = "";

if (isset($_POST['guardar'])) {

    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $precio = trim($_POST['precio']);
    $cantidad = trim($_POST['cantidad']);

    if ($nombre == "" || $descripcion == "" || $precio == "" || $cantidad == "") {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($precio) || !is_numeric($cantidad)) {
        $mensaje = "Precio y cantidad deben ser numéricos.";
    } else {

        $sql = "INSERT INTO vehiculos (nombre, descripcion, precio, cantidad)
                VALUES ('$nombre','$descripcion','$precio','$cantidad')";

        if ($conexion->query($sql)) {
            $mensaje = "Vehículo agregado correctamente.";
        } else {
            $mensaje = "Error al guardar.";
        }
    }
}
?>

<h3>Agregar Vehículo</h3>

<?php if ($mensaje != "") { ?>
<p><b><?php echo $mensaje; ?></b></p>
<?php } ?>

<form method="POST">

Nombre:<br>
<input type="text" name="nombre"><br><br>

Descripción:<br>
<input type="text" name="descripcion"><br><br>

Precio:<br>
<input type="text" name="precio"><br><br>

Cantidad:<br>
<input type="text" name="cantidad"><br><br>

<button type="submit" name="guardar">Guardar</button>

</form>

<?php include "includes/footer.php"; ?>