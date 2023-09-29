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
    <script src="./assets/js/jquery.min.js"></script>
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
                <a class="menu-link" href="reportes">Reportes</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            <div class="header-profile">
                <a class="access" href="./account/">
                    <button style="width: fit-content;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="24" height="24" fill="#3ea6ff"><path d="M 25 2.0078125 C 12.309296 2.0078125 2.0000002 12.317108 2 25.007812 C 2 37.698518 12.309295 48.007812 25 48.007812 C 37.690705 48.007812 48 37.698518 48 25.007812 C 48 12.317108 37.690704 2.0078125 25 2.0078125 z M 25 4.0078125 C 36.609824 4.0078125 46 13.397988 46 25.007812 C 46 30.740509 43.703999 35.925856 39.988281 39.712891 C 38.158498 38.369571 35.928049 37.69558 34.039062 37.023438 C 32.975192 36.644889 32.018651 36.269758 31.320312 35.851562 C 30.651504 35.451051 30.280089 35.039466 30.083984 34.566406 C 29.992134 33.419545 30.010738 32.496253 30.017578 31.40625 C 30.13873 31.285594 30.294155 31.200823 30.417969 31.054688 C 30.709957 30.710058 31.007253 30.29128 31.291016 29.820312 C 31.777604 29.012711 32.131673 28.024913 32.330078 27.023438 C 32.63305 26.869 32.956699 26.835578 33.203125 26.521484 C 33.658098 25.941577 33.965233 25.125482 34.101562 23.988281 C 34.222454 22.984232 33.898957 22.29366 33.482422 21.763672 C 33.930529 20.298851 34.48532 17.969341 34.296875 15.558594 C 34.193203 14.232288 33.859467 12.897267 33.056641 11.787109 C 32.290173 10.727229 31.045786 9.9653642 29.453125 9.6894531 C 28.441568 8.5409775 26.834704 8 24.914062 8 L 24.904297 8 L 24.896484 8 C 20.593741 8.078993 17.817552 9.8598398 16.628906 12.576172 C 15.498615 15.159149 15.741603 18.37477 16.552734 21.722656 C 16.116708 22.25268 15.775146 22.95643 15.898438 23.988281 C 16.035282 25.125098 16.34224 25.94153 16.796875 26.521484 C 17.043118 26.835604 17.366808 26.868911 17.669922 27.023438 C 17.868296 28.024134 18.222437 29.01059 18.708984 29.818359 C 18.992747 30.289465 19.289737 30.707821 19.582031 31.052734 C 19.705876 31.198874 19.861128 31.285522 19.982422 31.40625 C 19.988922 32.49568 20.007396 33.418614 19.916016 34.566406 C 19.720294 35.037723 19.34937 35.449526 18.681641 35.851562 C 17.984409 36.271364 17.029015 36.648577 15.966797 37.029297 C 14.079805 37.705631 11.85061 38.384459 10.015625 39.716797 C 6.2976298 35.929423 4 30.742497 4 25.007812 C 4.0000002 13.397989 13.390176 4.0078125 25 4.0078125 z M 24.921875 10.001953 C 26.766001 10.003853 27.92628 10.549863 28.244141 11.107422 L 28.488281 11.535156 L 28.974609 11.601562 C 30.230788 11.776108 30.932655 12.263579 31.435547 12.958984 C 31.938439 13.654389 32.217535 14.624895 32.302734 15.714844 C 32.473134 17.894741 31.849129 20.468905 31.453125 21.660156 L 31.201172 22.416016 L 31.882812 22.830078 C 31.813472 22.787858 32.203297 23.018609 32.115234 23.75 C 32.008564 24.639799 31.781184 25.093017 31.628906 25.287109 C 31.476629 25.481202 31.411442 25.45641 31.427734 25.455078 L 30.603516 25.523438 L 30.515625 26.345703 C 30.440195 27.052169 30.04285 28.015793 29.578125 28.787109 C 29.345762 29.172767 29.098543 29.516317 28.890625 29.761719 C 28.682707 30.00712 28.461282 30.159117 28.544922 30.115234 L 28.009766 30.394531 L 28.009766 31 C 28.009766 32.324321 27.955813 33.407291 28.095703 34.949219 L 28.107422 35.082031 L 28.154297 35.207031 C 28.547829 36.266071 29.369275 37.013258 30.292969 37.566406 C 31.216662 38.119555 32.276387 38.519377 33.369141 38.908203 C 35.170096 39.549023 37.047465 40.179657 38.478516 41.111328 C 34.832228 44.16545 30.135566 46.007812 25 46.007812 C 19.866422 46.007812 15.171083 44.167232 11.525391 41.115234 C 12.964568 40.188909 14.844735 39.556492 16.642578 38.912109 C 17.73461 38.520704 18.79156 38.119183 19.712891 37.564453 C 20.634221 37.009723 21.452728 36.262662 21.845703 35.207031 L 21.892578 35.082031 L 21.904297 34.949219 C 22.043042 33.408482 21.990234 32.325309 21.990234 31 L 21.990234 30.394531 L 21.455078 30.113281 C 21.538828 30.157091 21.317362 30.005196 21.109375 29.759766 C 20.901388 29.514336 20.654237 29.172879 20.421875 28.787109 C 19.957151 28.015571 19.559775 27.05118 19.484375 26.345703 L 19.396484 25.523438 L 18.572266 25.455078 C 18.587716 25.456378 18.523206 25.481158 18.371094 25.287109 C 18.218979 25.093064 17.991921 24.640183 17.884766 23.75 C 17.797356 23.01846 18.191557 22.784891 18.117188 22.830078 L 18.751953 22.445312 L 18.566406 21.724609 C 17.705952 18.412902 17.575833 15.399621 18.460938 13.376953 C 19.345167 11.356284 21.116417 10.074289 24.921875 10.001953 z"/></svg></button>
                </a>
                <a href="./auth/logout">
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
                        <a href="./auth/logout">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 50 50"><path d="M 3 0 C 1.355469 0 0 1.355469 0 3 L 0 47 C 0 48.644531 1.355469 50 3 50 L 37 50 C 38.644531 50 40 48.644531 40 47 L 40 39 L 38 41 L 38 47 C 38 47.5625 37.5625 48 37 48 L 3 48 C 2.4375 48 2 47.5625 2 47 L 2 3 C 2 2.433594 2.433594 2 3 2 L 37 2 C 37.5625 2 38 2.4375 38 3 L 38 9 L 40 11 L 40 3 C 40 1.355469 38.644531 0 37 0 Z M 37.84375 13.09375 C 37.46875 13.160156 37.167969 13.433594 37.0625 13.796875 C 36.957031 14.164063 37.066406 14.554688 37.34375 14.8125 L 46.53125 24 L 17 24 C 16.96875 24 16.9375 24 16.90625 24 C 16.355469 24.027344 15.925781 24.496094 15.953125 25.046875 C 15.980469 25.597656 16.449219 26.027344 17 26 L 46.53125 26 L 37.34375 35.1875 C 37.046875 35.429688 36.910156 35.816406 36.996094 36.191406 C 37.082031 36.5625 37.375 36.855469 37.746094 36.941406 C 38.121094 37.027344 38.507813 36.890625 38.75 36.59375 L 49.65625 25.71875 L 50.34375 25 L 49.65625 24.28125 L 38.75 13.40625 C 38.542969 13.183594 38.242188 13.070313 37.9375 13.09375 C 37.90625 13.09375 37.875 13.09375 37.84375 13.09375 Z"/></svg>
                            Cerrar sesión
                        </a>
                    </div>
                </div>
                <div class="side-wrapper">
                    <div class="side-title">Panel de administración</div>
                    <div class="side-menu admin">
                        <a href="#ficha-medica">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Ficha medica
                        </a>
                        <a href="#usuarios">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Usuarios
                        </a>
                    </div>
                </div>
                <div class="side-wrapper">
                    <div class="side-title">Reportes</div>
                    <div class="side-menu admin">
                        <a href="./reportes#llamados">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,4C7.674,4,3.773,7.005,2.062,11.654a.993.993,0,0,0,0,.692C3.773,17,7.674,20,12,20s8.227-3,9.938-7.654a.993.993,0,0,0,0-.692C20.227,7.005,16.326,4,12,4Zm0,14c-3.374,0-6.451-2.343-7.928-6C5.549,8.343,8.626,6,12,6s6.451,2.343,7.928,6C18.451,15.657,15.374,18,12,18Z"/><path d="M12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                            Llamados
                        </a>
                        <a href="./reportes#graficos">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,4C7.674,4,3.773,7.005,2.062,11.654a.993.993,0,0,0,0,.692C3.773,17,7.674,20,12,20s8.227-3,9.938-7.654a.993.993,0,0,0,0-.692C20.227,7.005,16.326,4,12,4Zm0,14c-3.374,0-6.451-2.343-7.928-6C5.549,8.343,8.626,6,12,6s6.451,2.343,7.928,6C18.451,15.657,15.374,18,12,18Z"/><path d="M12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                            Gráficos
                        </a>
                    </div>
                </div>
            </div>

            <div class="main-container">
                <div class="main-header">
                    <div class="header-menu">
                        <a class="main-header-link" href="#usuarios">Usuarios</a>
                        <a class="main-header-link" href="#zonas">Zonas</a>
                        <a class="main-header-link" href="#enfermeros">Enfermeros</a>
                        <a class="main-header-link" href="#pacientes">Pacientes</a>
                    </div>
                </div>
                <div class="content-wrapper" id="usuarios">
                    <div class="content-section">
                        <table>
                            <tr>
                                <th style="width: 16%;">Nombre</th>
                                <th style="width: 19%;">Usuario</th>
                                <th>¿Autenticidad?</th>
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
                                                <a href="./dashboard?id=<?php echo $row['id'] ?>&table=usuarios"><button
                                                        class='content-button status-button'>Editar</button></a>
                                                <div class="menu">
                                                    <button class="dropdown">
                                                        <ul>
                                                            <li><a href="./delete?id=<?php echo $row["id"] ?>&table=usuarios">Borrar</a></li>
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
                                <form action="./create" method="post">
                                    <td><input type="text" name="name" id="name" placeholder="Nombre"></td>
                                    <td><input type="text" name="username" id="username" placeholder="Nombre de usuario"></td>
                                    <td><input type="password" name="password" id="password" placeholder="Contraseña"></td>
                                    <td>
                                        <select name="rol_id" id="rol_id">
                                            <?php
                                            $result = $conn->query("SELECT * FROM roles");
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='$row[id]'>$row[name]</option>";
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
                            if ($_GET['table'] == 'usuarios') {
                                $user = $conn->query("SELECT * FROM `usuarios` WHERE `id`=$_GET[id]")->fetch_assoc();
                                ?>
                                <table>
                                    <tr>
                                        <th style="width: 16%;">Nombre</th>
                                        <th style="width: 19%;">Usuario</th>
                                        <th>Contraseña</th>
                                        <th style="width: 160px;">Rol</th>
                                        <th style="width: 150px;">Opciones</th>
                                    </tr>
                                    <tr>
                                        <form action="./update?id=<?php echo $user['id'] ?>&table=usuarios" method="post">
                                            <td><input type="text" name="name" id="name_new" placeholder="Nombre"
                                                    value="<?php echo $user['name'] ?>"></td>
                                            <td><input type="text" name="username" id="username" placeholder="Nombre de usuario"
                                                    value="<?php echo $user['user'] ?>"></td>
                                            <td><input type="password" name="password" id="password" placeholder="***********"
                                                    value=""></td>
                                            <td>
                                                <select name="rol_id" id="rol_id">
                                                    <?php
                                                    $roles = $conn->query("SELECT * FROM roles");
                                                    if ($roles->num_rows > 0) {
                                                        while ($row = $roles->fetch_assoc()) {
                                                            if($row['id'] == $user['rol_id']){
                                                                echo "<option value='$row[id]' selected>$row[name]</option>";
                                                            }else{
                                                                echo "<option value='$row[id]'>$row[name]</option>";
                                                            }
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
                <div class="content-wrapper" id="zonas">
                    <div class="content-section">
                        <ul>
                            <?php
                            $result = $conn->query("SELECT zonas.name AS zona, zonas.id, GROUP_CONCAT(usuarios.name) AS enfermeros FROM zonas LEFT JOIN enfermeros ON enfermeros.zone_id = zonas.id LEFT JOIN usuarios ON enfermeros.user_id = usuarios.id GROUP BY zonas.name ORDER BY zonas.name ASC");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <li>
                                        <div class="product" onclick="this.parentElement.classList.toggle('is-active')" style="font-size: 18px;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" style=" margin-right: 10px" fill="currentColor"  class="bi bi-caret-down-fill" viewBox="0 0 16 16"><path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg><?php echo $row["zona"] ?></div>
                                        <span class="status"><?php echo $row['enfermeros'] ?></span>
                                        <div class="button-wrapper">
                                            <a href="./dashboard?id=<?php echo $row['id'] ?>&table=zonas#zonas"><button
                                                    class='content-button status-button'>Editar</button></a>
                                            <div class="menu">
                                                <button class="dropdown">
                                                    <ul>
                                                        <li><a href="./delete?id=<?php echo $row["id"] ?>&table=zonas">Borrar</a></li>
                                                    </ul>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <?php $ubiQuery = $conn->query("SELECT id, name FROM ubicaciones WHERE zone_id=$row[id] ORDER BY name ASC");
                                    if ($ubiQuery->num_rows > 0) { ?>
                                    <ul class="dropdown-list">
                                        <?php while ($ubi = $ubiQuery->fetch_assoc()) { ?>
                                        <li>
                                            <div class="product"><?php echo $ubi['name'] ?></div>
                                            <span class="status"></span>
                                            <div class="button-wrapper">
                                                <a href="./dashboard?id=<?php echo $ubi['id'] ?>&table=ubicaciones#zonas"><button
                                                        class='content-button status-button open'>Editar</button></a>
                                                <div class="menu">
                                                    <button class="dropdown">
                                                        <ul>
                                                            <li><a href="./delete?id=<?php echo $ubi["id"] ?>&table=ubicaciones">Borrar</a></li>
                                                        </ul>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                    <li class="dropdown-create">
                                        <form action="./create" method="POST" class="form-create">
                                            <input type="text" name="name_ubi" placeholder="Nombre de Ubicacion" /><input type="hidden" name="zone_id" value="<?php echo $row['id'] ?>"/>
                                            <span class="status"></span>
                                            <div class="button-wrapper">
                                                <button class='content-button status-button' name="ubicacion">Agregar</button>
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
                                        </form>
                                    </li> <?php
                                }
                            }
                            ?>
                            <li>
                                <form action="./create" method="post" class="form-create">
                                    <input type="text" name="name_zona" placeholder="Nombre de Zona">
                                    <span class="status"></span>
                                    <div class="button-wrapper">
                                        <button class='content-button status-button' name="zones"
                                            type="submit">Agregar Zona</button>
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
                                </form>
                            </li>
                        </ul>
                        <?php
                        if (isset($_GET['id']) || isset($_GET['table'])) {
                            if ($_GET['table'] == 'zonas') {
                                $user = $conn->query("SELECT * FROM `zonas` WHERE `id`=$_GET[id]")->fetch_assoc();
                                ?>
                                <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <th style="width: 150px;">Opciones</th>
                                    </tr>
                                    <tr>
                                        <form action="./update?id=<?php echo $user['id'] ?>&table=zonas" method="post">
                                            <td><input type="text" name="name_zona" id="name_new" placeholder="Nombre" value="<?php echo $user['name'] ?>"></td>
                                            <td>
                                                <div class="button-wrapper">
                                                    <button class='content-button status-button' type="submit" name="zona">Aceptar</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                        <?php }
                        } ?>
                        <?php
                        if (isset($_GET['id']) || isset($_GET['table'])) {
                            if ($_GET['table'] == 'ubicaciones') {
                                $user = $conn->query("SELECT * FROM `ubicaciones` WHERE `id`=$_GET[id]")->fetch_assoc();
                                ?>
                                <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Zona</th>
                                        <th style="width: 150px;">Opciones</th>
                                    </tr>
                                    <tr>
                                        <form action="./update?id=<?php echo $user['id'] ?>&table=ubicaciones" method="post">
                                            <td><input type="text" name="name_ubi" id="name_ubi" placeholder="Nombre" value="<?php echo $user['name'] ?>"></td>
                                            <td>
                                                <select name="zone_id" id="zone_id">
                                                    <?php
                                                    $roles = $conn->query("SELECT id, name FROM zonas");
                                                    if ($roles->num_rows > 0) {
                                                        while ($row = $roles->fetch_assoc()) {
                                                            if($row['id'] == $user['zone_id'])
                                                                echo "<option value='$row[id]' selected>$row[name]</option>";
                                                            else
                                                                echo "<option value='$row[id]'>$row[name]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="button-wrapper">
                                                    <button class='content-button status-button' type="submit" name="ubicacion">Aceptar</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="content-wrapper" id="enfermeros">
                    <div class="content-section">
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th style="width: 160px;">Zona</th>
                                <th style="width: 150px;">Opciones</th>
                            </tr>
                            <?php
                            $result = $conn->query("SELECT usuarios.name, zonas.name AS zona, enfermeros.id FROM enfermeros INNER JOIN usuarios ON usuarios.id = enfermeros.user_id INNER JOIN zonas ON enfermeros.zone_id = zonas.id WHERE rol_id = 2");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["name"] ?></td>
                                        <td><?php echo $row["zona"] ?></td>
                                        <td>
                                            <div class="button-wrapper">
                                                <a href="./dashboard?id=<?php echo $row['id'] ?>&table=enfermeros#enfermeros"><button
                                                        class='content-button status-button'>Editar</button></a>
                                                <div class="menu">
                                                    <button class="dropdown">
                                                        <ul>
                                                            <li><a href="./delete?id=<?php echo $row["id"] ?>&table=enfermeros">Borrar</a></li>
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
                                <form action="./create" method="post">
                                    <td>
                                        <select name="user_id" id="user_id">
                                            <?php
                                            $result = $conn->query("SELECT * FROM usuarios WHERE rol_id=2");
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='$row[id]'>$row[name]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="zone_id" id="zone_id">
                                            <?php
                                            $result = $conn->query("SELECT * FROM zonas");
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='$row[id]'>$row[name]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="button-wrapper">
                                            <button class='content-button status-button' name="enfermeros"
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
                            if ($_GET['table'] == 'enfermeros') {
                                $user = $conn->query("SELECT zone_id, user_id, id FROM enfermeros WHERE `id`=$_GET[id]" )->fetch_assoc();
                                ?>
                                <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <th style="width: 160px;">Zona</th>
                                        <th style="width: 150px;">Opciones</th>
                                    </tr>
                                    <tr>
                                        <form action="./update?id=<?php echo $user['id'] ?>&table=enfermeros" method="post">
                                            <td>
                                                <select name="user_id_enf" id="user_id">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM usuarios WHERE rol_id=2");
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            if($user['user_id'] == $row['id']){
                                                                echo "<option value='$row[id]' selected>$row[name]</option>";
                                                            }else{
                                                                echo "<option value='$row[id]'>$row[name]</option>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="zone_id_enf" id="zone_id">
                                                    <?php
                                                    $result = $conn->query("SELECT * FROM zonas");
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            if($user['zone_id'] == $row['id']){
                                                                echo "<option value='$row[id]' selected>$row[name]</option>";
                                                            }else{
                                                                echo "<option value='$row[id]'>$row[name]</option>";
                                                            }
                                                            
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="button-wrapper">
                                                    <button class='content-button status-button' type="submit"
                                                        name="enfermeros">Aceptar</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="content-wrapper" id="pacientes">
                    <div class="content-section">
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th style="width: 150px;">Zona</th>
                                <th style="width: 150px;">Ubicacion</th>
                                <th style="width: 200px;">Opciones</th>
                            </tr>
                            <?php
                            $result = $conn->query("SELECT pacientes.id,pacientes.name, pacientes.surname, ubicaciones.name AS ubicacion, zonas.name AS zona FROM pacientes LEFT JOIN ubicaciones ON pacientes.ubi_id = ubicaciones.id LEFT JOIN zonas ON ubicaciones.zone_id = zonas.id");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["name"] ?></td>
                                        <td><?php echo $row["surname"] ?></td>
                                        <td><?php echo $row["zona"] ?></td>
                                        <td><?php echo $row["ubicacion"] ?></td>
                                        <td>
                                            <div class="button-wrapper">
                                                <button class='content-button status-button' style="padding: 6px 24px" data-id="<?php echo $row["id"] ?>" onclick="medica(this)">Ficha Medica</button>
                                                <div class="menu">
                                                    <button class="dropdown">
                                                        <ul>
                                                            <li><a href="./dashboard?id=<?php echo $row['id'] ?>&table=pacientes#pacientes">Editar</a></li>
                                                            <li><a href="./delete?id=<?php echo $row["id"] ?>&table=pacientes">Borrar</a></li>
                                                        </ul>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </table>
                        <?php
                        if (isset($_GET['id']) || isset($_GET['table'])) {
                            if ($_GET['table'] == 'pacientes') {
                                $user = $conn->query("SELECT ubi_id, name, surname, id FROM pacientes WHERE `id`=$_GET[id]" )->fetch_assoc();
                                ?>
                                <table>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th style="width: 240px;">Ubicacion</th>
                                        <th style="width: 150px;">Opciones</th>
                                    </tr>
                                    <tr>
                                        <form action="./update?id=<?php echo $user['id'] ?>&table=pacientes" method="post">
                                            <td><input type="text" name="name" id="name_pac" placeholder="Nombre" value="<?php echo $user['name'] ?>"></td>
                                            <td><input type="text" name="name" id="surname_pac" placeholder="Apellido" value="<?php echo $user['surname'] ?>"></td>
                                            <td>
                                                <select name="ubi_id_pac">
                                                    <?php
                                                    $result = $conn->query("SELECT ubicaciones.id, zonas.name AS zona, ubicaciones.name FROM ubicaciones INNER JOIN zonas ON ubicaciones.zone_id = zonas.id");
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            if($user['ubi_id'] == $row['id'])
                                                                echo "<option value='$row[id]' selected>$row[zona] -> $row[name]</option>";
                                                            else 
                                                                echo "<option value='$row[id]'>$row[zona] -> $row[name]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="button-wrapper">
                                                    <button class='content-button status-button' type="submit" name="pacientes">Aceptar</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                        <?php }
                        } ?>
                    </div>
                    <div class="modal-medico">
                        <div class="header-menu">
                            <span>Ficha Médica</span>
                            <div href="#" class="close-button">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="container"></div>
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
        document.querySelectorAll(".dropdown").forEach((dropdown) => {
            dropdown.addEventListener("click", (e) => {
                e.stopPropagation();
                document.querySelectorAll(".dropdown").forEach((c) => c.classList.remove("is-active"));
                dropdown.classList.add("is-active");
            });
        });
        document.querySelector(".modal-medico .close-button").addEventListener("click", (e) => {
            document.querySelector(".modal-medico").classList.remove("modal--show");
        });
        $(document).click(function (e) {
            const container = $(".status-button");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $(".dropdown").removeClass("is-active");
            }
        });

        $(function () {
            $(".dropdown").on("click", function (e) {
                $(".content-wrapper").addClass("overlay");
                e.stopPropagation();
            });
            $(document).on("click", function (e) {
                if ($(e.target).is(".dropdown") === false) {
                    $(".content-wrapper").removeClass("overlay");
                }
            });
        });
        document.querySelector('.dark-light').addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
        });
        function medica(e){
            $.ajax({
                type: "POST",
                url: 'ficha-medica.php',
                data: { id: e.getAttribute("data-id") },
                success: function(response) {
                    let res = JSON.parse(response);
                    if(res){
                        document.querySelector(".modal-medico .container").innerHTML = ``
                        document.querySelector(".modal-medico .container").innerHTML += `
                            <span class="nombre">${res.name} ${res.surname}</span>
                            <span>DNI: ${res.dni}</span>
                            <span>Fecha de Nacimiento${res.birthday}</span>
                            <span>Telefono: ${res.phone}</span>
                            <span>Direccion: ${res.direction} N°${res.number} Piso: ${res.floor} Dto. ${res.department}</span>
                            <span>Localidad: ${res.location}</span>
                            <span>Enfermedades padecidas: ${res.diseases}</span>
                            <span>Vacunas: ${res.vaccines}</span>
                            <span>Medicinas que no debe tomar: ${res.medicines}</span>
                            <span>Alergias: ${res.allergies}</span>
                        `
                        document.querySelector(".modal-medico").classList.add('modal--show')
                    }
                }
            });
        }
    </script>
</body>

</html>