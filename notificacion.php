<?php 
    include('./connection.php');
    $notificacion = $conn->query("SELECT * FROM notificaciones ORDER BY date DESC, time DESC LIMIT 1;")->fetch_assoc();
    echo $notificacion['time'];
    