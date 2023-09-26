<?php
    include('./connection.php');

    $id = $_GET['id'];
    $table = $_GET['table'];

    if ($conn -> query("DELETE FROM $table WHERE `id`= $id")) {    
        header('Location: ./dashboard');
    } else {
        echo $conn->error;
    }
?>