<?php
    include('./connection.php');
    $user = $conn->query("
        SELECT *
        FROM `pacientes` 
        WHERE id = $_POST[id]
    ")->fetch_assoc();
    print(json_encode($user));