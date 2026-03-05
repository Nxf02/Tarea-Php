<?php
include "includes/db.php";
include "includes/navbar.php";

$resultado = $conexion->query("SELECT * FROM vehiculos");
?>

<h3>Lista de Vehículos</h3>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Acciones</th>
</tr>

<?php while ($row = $resultado->fetch_assoc()) { ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['descripcion']; ?></td>
<td><?php echo $row['precio']; ?></td>
<td><?php echo $row['cantidad']; ?></td>
<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a> |

<a href="delete.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('¿Seguro que desea eliminar este vehículo?');">
Eliminar
</a>

</td>
</tr>

<?php } ?>

</table>

<?php include "includes/footer.php"; ?>