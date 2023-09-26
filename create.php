<?php
    include('./connection.php');
    if (isset($_POST['account'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol_id = $_POST['rol_id'];

        if ($conn->query("INSERT INTO `usuarios` (`id`, `name`, `user`, `password`, `rol_id`) VALUES (NULL, '$name', '$username', '$password', $rol_id)")) {
            header('Location: ./dashboard.php');
        } else {
            echo $conn->error;
        }
    }
?>