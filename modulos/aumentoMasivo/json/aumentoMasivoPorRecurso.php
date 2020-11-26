<?php 

require_once "../../../clases/MySQL.php";

$aumento = $_GET['aumento'];

$idParaAumentar = $_GET['idAumento'];

$id = $_GET['idDondeAumentar'];

const RECURSO = 1;
const SUB_CATEGORIA = 2;
const CATEGORIA = 3;

$sql = "UPDATE item INNER JOIN disenio ON item.id_item = disenio.id_item";

if ($id == RECURSO) {

	$sql .= " INNER JOIN disenio_recurso ON disenio_recurso.id_disenio = disenio.id_disenio"
	. " INNER JOIN recurso ON recurso.id_recurso = disenio_recurso.id_recurso"
	. " SET item.precio = item.precio + (item.precio * '$aumento' / 100)"
	. " WHERE recurso.id_recurso = '$idParaAumentar'";
}
if ($id == SUB_CATEGORIA) {
	$sql .= " INNER JOIN subcategoria ON subcategoria.id_subCategoria = disenio.id_subCategoria"
	. " SET item.precio = item.precio + (item.precio * '$aumento' / 100)"
	. " WHERE subcategoria.id_subCategoria = '$idParaAumentar'";
}
if ($id == CATEGORIA) {
	$sql .= " INNER JOIN subcategoria ON subcategoria.id_subCategoria = disenio.id_subCategoria"
		. " INNER JOIN categoria ON categoria.id_categoria = subcategoria.id_categoria"
		. " SET item.precio = item.precio + (item.precio * '$aumento' / 100)"
		. " WHERE categoria.id_categoria = '$idParaAumentar'";
}
/*
var_dump($sql);
var_dump($id);
var_dump($aumento);
var_dump($idParaAumentar);
exit;
*/
$mysql = new MySQL();

$confirmacionDeAumento = $mysql->consulta($sql);

$mysql->desconectar();

echo json_encode($confirmacionDeAumento);

?>