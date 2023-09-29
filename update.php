<?php
    include('./connection.php');

    $id = $_GET['id'];
    $table = $_GET['table'];

    if (isset($_POST['account'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $rol_id = $_POST['rol_id'];
        
        $values = "`name`='$name', `user`='$username', `rol_id`='$rol_id'";
        if($_POST['password'] != ''){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $values .= ", `password`='$password'";
        }
    }
    if (isset($_POST['zona'])) {
        $name = $_POST['name_zona'];
        
        $values = "`name`='$name'";
    }
    if (isset($_POST['ubicacion'])) {
        $name = $_POST['name_ubi'];
        $zone = $_POST['zone_id'];
        
        $values = "`name`='$name', `zone_id`=$zone";
        if ($conn->query("UPDATE `$table` SET $values WHERE `id`=$id"))
            return header('Location: ./dashboard#zonas');
        else
            echo "UPDATE `$table` SET $values WHERE `id`=$id" .' ||| \n '. $conn->error;
    }
    if (isset($_POST['enfermeros'])) {
        $user_id = $_POST['user_id_enf'];
        $zone = $_POST['zone_id_enf'];
        
        $values = "`user_id`='$user_id', `zone_id`=$zone";
        if ($conn->query("UPDATE `$table` SET $values WHERE `id`=$id"))
            return header('Location: ./dashboard#enfermeros');
        else
            echo "UPDATE `$table` SET $values WHERE `id`=$id" .' ||| \n '. $conn->error;
    }
    if (isset($_POST['pacientes'])) {
        $ubi = $_POST['ubi_id_pac'];
        
        $values = "`ubi_id`=$ubi";
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
        header('Location: ./dashboard#'. $table);
    else
        echo "UPDATE `$table` SET $values WHERE `id`=$id" .' ||| \n '. $conn->error;
?>