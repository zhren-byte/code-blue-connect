<?php
    include('./connection.php');

    $id = $_GET['id'];
    $table = $_GET['table'];

    if (isset($_POST['account'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol_id = $_POST['rol_id'];

        $values = 
        "`name`='$name', `user`='$username', `password`='$password', `rol_id`='$rol_id'";
    }
    if ($table == 'notificaciones') {
        $time = date('H:i:s');
        $values = "`status_id` = $_GET[status_id], `time_response` = '$time'";
        if ($conn->query("UPDATE `notificaciones` SET $values WHERE `id`=$id"))
            return;
        else
            return print $SQL .' ||| \n '. $conn->error;
    }

    if ($conn->query("UPDATE `$table` SET $values WHERE `id`=$id"))
        header('Location: ./dashboard');
    else
        echo "UPDATE `$table` SET $values WHERE `id`=$id" .' ||| \n '. $conn->error;
?>