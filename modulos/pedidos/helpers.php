<?php 

require_once '../../clases/Item.php';

$item = new Item();

$result = $item->obtenerTodos();

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}

print json_encode($rows);

?>