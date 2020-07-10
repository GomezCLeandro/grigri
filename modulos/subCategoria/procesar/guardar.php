<?php

require_once '../../../clases/SubCategoria.php';

$descripcion = $_POST['txtSubCategoria'];
$categoria = $_POST['idCategoria'];

/*
highlight_string(var_export($categorias,true));
highlight_string(var_export($descripcion,true));
exit;
*/

$subCategoria = new SubCategoria($descripcion);

$subCategoria->setIdCategoria($categoria);
$subCategoria->guardar();


header("location: /grigri/modulos/subcategoria/listado.php");

?>