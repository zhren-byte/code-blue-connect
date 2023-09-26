<?php
    include('./connection.php');
    if (isset($_POST['account'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol_id = $_POST['rol_id'];

        if ($conn->query("INSERT INTO `usuarios` (`id`, `name`, `user`, `password`, `rol_id`) VALUES (NULL, '$name', '$username', '$password', $rol_id)")) {
            header('Location: ./dashboard#usuarios');
        } else {
            echo $conn->error;
        }
    }
    if (isset($_POST['zones'])) {
        $name = $_POST['name'];

        if ($conn->query("INSERT INTO `zonas` (`id`, `name`) VALUES (NULL, '$name')")) {
            header('Location: ./dashboard#zonas');
        } else {
            echo $conn->error;
        }
    }
    if (isset($_POST['enfermeros'])) {
        $user = $_POST['user_id'];
        $zone = $_POST['zone_id'];

        if ($conn->query("INSERT INTO `enfermeros` (`id`, `user_id`, `zone_id`) VALUES (NULL, $user, $zone)")) {
            header('Location: ./dashboard#enfermeros');
        } else {
            echo $conn->error;
        }
    }
?>