<?php
    include('./connection.php');
    $zona = $_POST['zona'];
    $type = $_POST['type'];
    $date = date('Y-m-d');
    $time = date('H:i:s');
    if ($conn->query("INSERT INTO `notificaciones` (`id`, `status_id`, `type_id`, `zone_id`, `date`, `time`) VALUES (NULL, false, $type, $zona, '$date', '$time')")) {
        $zona = $conn->query("SELECT name FROM zonas WHERE id=$zona")->fetch_assoc();
        echo 'Alerta nueva en la zona ' . $zona['name'];
    } else {
        echo $conn->error;
    }
?>