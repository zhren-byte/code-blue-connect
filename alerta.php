<?php
    include('./connection.php');
    $zona = $_POST['zona'];
    $date = date('Y-m-d');
    $time = date('H:i:s');
    if ($conn->query("INSERT INTO `notificaciones` (`id`, `status_id`, `type_id`, `zone`, `date`, `time`) VALUES (NULL, false, 1, '$zona', '$date', '$time')")) {
        echo 'Alerta nueva en la zona ' . $zona;
    } else {
        echo $conn->error;
    }
?>