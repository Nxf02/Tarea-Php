<?php
include "includes/db.php";
include "includes/navbar.php";

$id = $_GET['id'];

$resultado = $conexion->query("SELECT * FROM vehiculos WHERE id=$id");
$fila = $resultado->fetch_assoc();

if (isset($_POST['actualizar'])) {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE vehiculos SET
            nombre='$nombre',
            descripcion='$descripcion',
            precio='$precio',
            cantidad='$cantidad'
            WHERE id=$id";

    $conexion->query($sql);

    header("Location: index.php");
}
?>

<h3>Editar Vehículo</h3>

<form method="POST">

Nombre:<br>
<input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br><br>

Descripción:<br>
<input type="text" name="descripcion" value="<?php echo $fila['descripcion']; ?>"><br><br>

Precio:<br>
<input type="text" name="precio" value="<?php echo $fila['precio']; ?>"><br><br>

Cantidad:<br>
<input type="text" name="cantidad" value="<?php echo $fila['cantidad']; ?>"><br><br>

<button type="submit" name="actualizar">Actualizar</button>

</form>

<?php include "includes/footer.php"; ?>