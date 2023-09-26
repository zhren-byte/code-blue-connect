<?php
    session_start();
    include('../connection.php');
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $query_user = mysqli_query($conn, "SELECT * FROM usuarios WHERE user='$user'");

        $user = mysqli_fetch_array($query_user);

        if (isset($user['id'])) {
            if (password_verify($pass, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: ../');
                exit;
            } else {
                $_SESSION['error'] = 'El usuario o la contraseña son incorrectos. <a href="#">¿Olvidaste tu contraseña?</a>';
                return print('
                    <script>
                        window.location = "../";
                    </script>
                ');
            }
        } else {
            $_SESSION['error'] = 'La contraseña es incorrecta <a href="#">¿Olvidaste tu contraseña?</a>';
            print('
                <script>
                    window.location = "../";
                </script>
            ');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index" method="post">
        <input type="text" name="user">
        <input type="text" name="password">
        <button type="submit" name="login">Entrar</button>
    </form>
</body>
</html>