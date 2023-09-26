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

    if ($conn->query("UPDATE `$table` SET $values WHERE `id`=$id"))
        header('Location: ./dashboard');
    else
        echo "UPDATE `$table` SET $values WHERE `id`=$id" .' ||| \n '. $conn->error;
?>