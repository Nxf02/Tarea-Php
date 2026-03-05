<?php

include "includes/db.php";

$id = $_GET['id'];

$conexion->query("DELETE FROM vehiculos WHERE id=$id");

header("Location: index.php");

?>