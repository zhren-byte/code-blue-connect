<?php 
    include('./connection.php');
    $notificacion = $conn->query("SELECT notificaciones.time, ubicaciones.name as origen, zonas.name as zona FROM notificaciones INNER JOIN ubicaciones ON ubicaciones.id = notificaciones.ubi_id INNER JOIN zonas ON zonas.id = ubicaciones.zone_id WHERE status_id = 0 ORDER BY date DESC, time DESC LIMIT 1;")->fetch_assoc();
    $time = date('G:i', strtotime($notificacion['time']));
    $array = array("time" => $time, "origen" => $notificacion['origen'], "zona" => $notificacion['zona']);
    echo json_encode($array);
    