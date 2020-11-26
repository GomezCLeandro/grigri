<?php 

require_once '../../../clases/MySQL.php';

$sql = "SELECT COUNT(id_usuario) AS cantidad FROM usuario";

$mysql = new MySQL();

$arrUsuarios = $mysql->consulta($sql);

$mysql->desconectar();

$listado = array();

if ($arrUsuarios->num_rows > 0){
    while($r = mysqli_fetch_assoc($arrUsuarios)) {
        $listado[] = $r;
    }
} else {
    $listado[] = $arrUsuarios;
}

echo json_encode($listado);

?>