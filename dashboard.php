<?php
session_start();
include('./connection.php');
if (!isset($_SESSION['user'])) {
    $_SESSION['error']   = 'Error 404: Pagina no disponible';
    return print('
        <script>
            window.location = "./";
        </script>
    ');
}
$id = $_SESSION['user']['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>&lt; \ BlueConnect \ Admin &gt;</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="dark-light">
        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
        </svg>
    </div>
    <div class="app">
        <div class="header">
            <div class="menu-circle"></div>
            <div class="header-menu">
                <a class="menu-link is-active">Panel de Administración</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            <div class="header-profile">
                <div class="notification">
                    <span class="notification-number">
                    </span>
                    <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
                    </svg>
                </div>
                <a href="#">
                    <img class="profile-img"
                        src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                        alt="">
                </a>
                <a href="logout.php">
                    <svg viewBox="0 0 24 24" fill="currentColor" height="24" width="24" focusable="false"
                        class="logout">
                        <path
                            d="M20 3v18H8v-1h11V4H8V3h12zm-8.9 12.1.7.7 4.4-4.4L11.8 7l-.7.7 3.1 3.1H3v1h11.3l-3.2 3.3z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="wrapper">
            <div class="left-side">
                <div class="side-wrapper">
                    <div class="side-title">Cuenta</div>
                    <div class="side-menu">
                        <a href="../account/">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 48 48"><path d="M24 4A10 10 0 1024 24 10 10 0 1024 4zM36.021 28H11.979C9.785 28 8 29.785 8 31.979V33.5c0 3.312 1.885 6.176 5.307 8.063C16.154 43.135 19.952 44 24 44c7.706 0 16-3.286 16-10.5v-1.521C40 29.785 38.215 28 36.021 28z"/></svg>
                            Mi cuenta
                        </a>
                        <a href="../auth/logout">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 50 50"><path d="M 3 0 C 1.355469 0 0 1.355469 0 3 L 0 47 C 0 48.644531 1.355469 50 3 50 L 37 50 C 38.644531 50 40 48.644531 40 47 L 40 39 L 38 41 L 38 47 C 38 47.5625 37.5625 48 37 48 L 3 48 C 2.4375 48 2 47.5625 2 47 L 2 3 C 2 2.433594 2.433594 2 3 2 L 37 2 C 37.5625 2 38 2.4375 38 3 L 38 9 L 40 11 L 40 3 C 40 1.355469 38.644531 0 37 0 Z M 37.84375 13.09375 C 37.46875 13.160156 37.167969 13.433594 37.0625 13.796875 C 36.957031 14.164063 37.066406 14.554688 37.34375 14.8125 L 46.53125 24 L 17 24 C 16.96875 24 16.9375 24 16.90625 24 C 16.355469 24.027344 15.925781 24.496094 15.953125 25.046875 C 15.980469 25.597656 16.449219 26.027344 17 26 L 46.53125 26 L 37.34375 35.1875 C 37.046875 35.429688 36.910156 35.816406 36.996094 36.191406 C 37.082031 36.5625 37.375 36.855469 37.746094 36.941406 C 38.121094 37.027344 38.507813 36.890625 38.75 36.59375 L 49.65625 25.71875 L 50.34375 25 L 49.65625 24.28125 L 38.75 13.40625 C 38.542969 13.183594 38.242188 13.070313 37.9375 13.09375 C 37.90625 13.09375 37.875 13.09375 37.84375 13.09375 Z"/></svg>
                            Cerrar sesión
                        </a>
                    </div>
                </div>
                <div class="side-wrapper">
                    <div class="side-title">Secciones</div>
                    <div class="side-menu">
                        <a href="observaciones">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,4C7.674,4,3.773,7.005,2.062,11.654a.993.993,0,0,0,0,.692C3.773,17,7.674,20,12,20s8.227-3,9.938-7.654a.993.993,0,0,0,0-.692C20.227,7.005,16.326,4,12,4Zm0,14c-3.374,0-6.451-2.343-7.928-6C5.549,8.343,8.626,6,12,6s6.451,2.343,7.928,6C18.451,15.657,15.374,18,12,18Z"/><path d="M12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                            Observaciones
                            <span class="notification-number updates">
                            </span>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340" fill="currentColor"><path d="M316.82,293.485a3.5,3.5,0,0,0-3.731.694,27.572,27.572,0,0,1-14.2,7.037,74.52,74.52,0,0,0,4.988-35.415,3.524,3.524,0,0,0-5.537-2.348,99.373,99.373,0,0,0-25.1,26.274l-9.574-9.17c-4.5-3.639-9.563-17.972-12.225-23.038-9.083-18.524-24.856-15.839-42.1-16.89l46.8-134.774a59.245,59.245,0,0,1,15.438,14.767,3.5,3.5,0,0,0,5.794-.075l9.847-14.942a3.506,3.506,0,0,0-.248-4.184,99.887,99.887,0,0,0-27.14-21.145l14.843-41.093A113.963,113.963,0,0,0,283,27.726c5.245-9.7-4.176-15.386-13.9-19.019-9.806-3.151-20.728-4.483-22.6,6.343a114.224,114.224,0,0,0-.57,14.151L232.112,70.642a99.005,99.005,0,0,0-34.418-.216,3.5,3.5,0,0,0-2.776,3.127l-1.533,17.829a3.5,3.5,0,0,0,4.5,3.65,59.225,59.225,0,0,1,21.264-2.011L173.915,223.286a28.888,28.888,0,0,0-21.738-9.934h-31.85a16.144,16.144,0,0,0-15.9,13.676c-2.676,18.124-7.351,38.134-10.4,50.3a27.563,27.563,0,0,1-8.778-20.816,3.506,3.506,0,0,0-6.812-1.379c-5.97,18.053-4.2,31.74-.95,40.893-30.552-12.769-31.447-59.782-31.075-60.086a3.5,3.5,0,0,0-6.907-.859c-9.014,38.36.915,62.6,7.843,73.856a61.419,61.419,0,0,1-20.669-10.712,3.522,3.522,0,0,0-5.707,3.3,41.7,41.7,0,0,0,15.051,25.552,29.93,29.93,0,0,0,18.6,6.464h51.142c4.569-.074,4.627-6.915,0-7H54.625c-10.723.177-19.6-7.934-23.883-17.114,6.026,3.472,14.705,7.3,24.372,7.907a3.5,3.5,0,0,0,2.715-5.946c-.191-.195-15.571-16.44-14.833-49.63,3.994,14.548,12.416,31.421,30.152,39.929a56.963,56.963,0,0,1,12.335,8.136c3.335,2.953,7.917-1.789,4.86-5.033-.523-.543-10.652-11.36-8.561-32.371a34.319,34.319,0,0,0,11.747,13.435c23,15.677,31.337,30,24.769,42.566a3.524,3.524,0,0,0,3.1,5.121H220.38a3.5,3.5,0,0,0,0-7h-93.8c4.15-14.183-4.74-29.167-26.493-44.645,3.016-11.824,8.317-33.913,11.26-53.841a9.1,9.1,0,0,1,8.976-7.7h31.85a21.859,21.859,0,0,1,17.579,8.916L191,258.29a25.688,25.688,0,0,0,10.928,8.57,27.285,27.285,0,0,1,16.156,18.9c2.86,12.135,8.3,30.083,17.973,46.166a3.479,3.479,0,0,0,2.309,1.544,3.329,3.329,0,0,0,.646.063H279.96a3.523,3.523,0,0,0,3.481-3.87l-2.674-25.152a23.214,23.214,0,0,0-2.9-8.964,88.653,88.653,0,0,1,19.381-22.358c-.022,7.153-1.133,19.15-7.178,30.234a3.523,3.523,0,0,0,2.756,5.161,34.351,34.351,0,0,0,18.559-4.5c-.934,5.711-3.281,13.633-9.161,19.344a11.109,11.109,0,0,1-7.8,3.1,3.5,3.5,0,0,0,0,7c21.035.2,25.509-33.187,24.561-36.94A3.5,3.5,0,0,0,316.82,293.485ZM178.985,230.024,223.82,100.911l4.668,14.228L185.5,238.926Zm55.091-120.306L229.038,94.36a72.1,72.1,0,0,1,9.459,2.46,70.578,70.578,0,0,1,9.061,3.962Zm21.771-96.165c5.708-.71,16.787,3.214,20.745,7.2a2.451,2.451,0,0,1,.508,3.2,112.632,112.632,0,0,1-6.655,9.333L252.9,27.2a112.223,112.223,0,0,1,.563-11.449A2.45,2.45,0,0,1,255.847,13.553Zm-4.2,20.625L267.1,39.544l-13.592,37.63a90.078,90.078,0,0,0-14.518-5.043ZM200.78,87.09l.878-10.218c27.6-4.331,59.453,6.731,78.224,27.15l-5.65,8.574C254.724,91.365,229.315,82.507,200.78,87.09Zm40.237,239.448c-8.552-14.889-13.476-31.162-16.114-42.377a34.311,34.311,0,0,0-20.3-23.773,18.675,18.675,0,0,1-7.948-6.234l-6.124-8.363L235.1,117.436l12.482-8.274L199.371,248c-1.433,4.347,5.008,6.637,6.614,2.3l.962-2.772,20.431.949a20.431,20.431,0,0,1,17.7,11.957l7.493,16.384a28.613,28.613,0,0,0,6.255,8.8l10.071,9.646a16.242,16.242,0,0,1,4.909,10l2.263,21.282Z"/><path d="M132.808,245.266c3.252-3.364-1.67-8.284-5.033-5.033C124.523,243.6,129.445,248.518,132.808,245.266Z"/><path d="M144.181,251.8c-3.251,3.364,1.67,8.284,5.033,5.033C152.466,253.464,147.545,248.544,144.181,251.8Z"/><path d="M124.216,261.206c-3.251,3.364,1.67,8.285,5.033,5.033C132.5,262.875,127.58,257.955,124.216,261.206Z"/><path d="M236.482,279.19c-3.251,3.365,1.67,8.284,5.033,5.033C244.767,280.859,239.845,275.939,236.482,279.19Z"/><path d="M245.893,295.641c-3.251,3.364,1.67,8.284,5.033,5.032C254.177,297.309,249.256,292.389,245.893,295.641Z"/></svg>
                            Administración
                        </a>
                    </div>
                </div>
                <div class="side-wrapper">
                    <div class="side-title">Panel de administración</div>
                    <div class="side-menu admin">
                        <a href="#usuarios">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Usuarios
                        </a>
                        <a href="#graficos">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Graficos
                        </a>
                    </div>
                </div>
            </div>

            <div class="main-container">
                <div class="main-header">
                    <div class="header-menu">
                        <a class="main-header-link is-active" href="#usuarios">Usuarios</a>
                        <a class="main-header-link" href="#graficos">Graficos</a>
                    </div>
                </div>
                <div class="content-wrapper" id="usuarios">
                    <div class="content-section">
                        <table>
                            <tr>
                                <th style="width: 16%;">Nombre</th>
                                <th style="width: 19%;">Usuario</th>
                                <th>Autenticidad?</th>
                                <th style="width: 160px;">Rol</th>
                                <th style="width: 150px;">Opciones</th>
                            </tr>
                            <?php
                            $result = $conn->query("SELECT usuarios.*, roles.name AS roles FROM usuarios INNER JOIN roles ON roles.id = usuarios.rol_id");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["name"] ?></td>
                                        <td><?php echo $row["user"] ?></td>
                                        <td>
                                            <?php if (password_verify('', $row["password"]))
                                                print "<span class='status'><span class='status-circle red'></span>Sin contraseña</span>";
                                            else
                                                print "<span class='status'><span class='status-circle green'></span>Autenticado</span>"; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["roles"] ?>
                                        </td>
                                        <td>
                                            <div class="button-wrapper">
                                                <a href="./?id=<?php echo $row['id'] ?>&table=users"><button
                                                        class='content-button status-button'>Editar</button></a>
                                                <div class="menu">
                                                    <button class="dropdown">
                                                        <ul>
                                                            <li><a href="../actions/delete?id=<?php echo $row["id"] ?>&table=users">Borrar</a></li>
                                                        </ul>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            }
                            ?>
                            <tr>
                                <form action="./create.php" method="post">
                                    <td><input type="text" name="name" id="name" placeholder="Nombre"></td>
                                    <td><input type="text" name="username" id="username" placeholder="Nombre de usuario"></td>
                                    <td><input type="password" name="password" id="password" placeholder="Contraseña"></td>
                                    <td>
                                        <select name="rol_id" id="rol_id">
                                            <?php
                                            $result = $conn->query("SELECT * FROM roles");
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="button-wrapper">
                                            <button class='content-button status-button' name="account"
                                                type="submit">Agregar</button>
                                            <button type="reset">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-arrow-clockwise"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                                    <path
                                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        </table>
                        <?php
                        if (isset($_GET['id']) || isset($_GET['table'])) {
                            if ($_GET['table'] == 'users') {
                                $user = $conn->query("SELECT * FROM `users` WHERE `id`=$_GET[id]")->fetch_assoc();
                                ?>
                                <table>
                                    <tr>
                                        <th style="width: 11%;">Nombre</th>
                                        <th style="width: 11%;">Apellido</th>
                                        <th style="width: 11%;">Usuario</th>
                                        <th>Email</th>
                                        <th style="width: 16%;">Autenticidad?</th>
                                        <th style="width: 13%;">Rol</th>
                                        <th style="width: 12%;">Opciones</th>
                                    </tr>
                                    <tr>
                                        <form action="../actions/update?id=<?php echo $user['id'] ?>&table=users" method="post">
                                            <td><input type="text" name="name" id="name_new" placeholder="Nombre"
                                                    value="<?php echo $user['name'] ?>"></td>
                                            <td><input type="text" name="surname" id="surname" placeholder="Apellido"
                                                    value="<?php echo $user['surname'] ?>"></td>
                                            <td><input type="text" name="username" id="username" placeholder="Nombre de usuario"
                                                    value="<?php echo $user['username'] ?>"></td>
                                            <td><input type="email" name="email" id="email" placeholder="Email"
                                                    value="<?php echo $user['email'] ?>"></td>
                                            <td><input type="password" name="password" id="password" placeholder="***********"
                                                    value=""></td>
                                            <td>
                                                <select name="rol_id" id="rol_id">
                                                    <?php
                                                    $roles = $conn->query("SELECT * FROM roles");
                                                    if ($roles->num_rows > 0) {
                                                        while ($row = $roles->fetch_assoc()) {
                                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="button-wrapper">
                                                    <button class='content-button status-button' type="submit"
                                                        name="account">Aceptar</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="content-wrapper" id="graficos">
                    <div class="content-section">
                    </div>
                </div>
            </div>
        </div>
    <div class="overlay-app"></div>
    </div>
    <script>
        let target = $(location).attr('hash').substring(0, $(location).attr('hash').indexOf("?")) || $(location).attr('hash') || '#usuarios';
        $('.main-container > div + div').not(target).hide();
        $(target).fadeIn(600);
        $('.main-header .header-menu a').on('click', function (e) {
            e.preventDefault();
            $(this).addClass('is-active');
            $(this).siblings().removeClass('is-active');
            target = $(this).attr('href');

            $('.main-container > div + div').not(target).hide();

            $(target).fadeIn(600);

        });
    </script>
</body>

</html>