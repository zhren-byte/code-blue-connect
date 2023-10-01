<?php
    include('./connection.php');
    $ubi = $_POST['ubi'];
    $type = '1';
    if(isset($_POST['type']))
        if($_POST['type'] != '') $type = $_POST['type'];
    $date = date('Y-m-d');
    $time = date('H:i:s');
    if ($conn->query("INSERT INTO `notificaciones` (`id`, `status_id`, `type_id`, `ubi_id`, `date`, `time`) VALUES (NULL, false, $type, $ubi, '$date', '$time')")) {
        $zona = $conn->query("SELECT ubicaciones.name, zonas.name AS zona FROM ubicaciones INNER JOIN zonas ON zonas.id = ubicaciones.zone_id WHERE ubicaciones.id=$ubi")->fetch_assoc();
        echo 'Alerta nueva desde ' . $zona['name'] . ' ' . $zona['zona'];
    } else {
        echo $conn->error;
    }
?>