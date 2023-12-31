<?php 
    session_start();
    include('./connection.php');
    if (!isset($_SESSION['user'])) {
        $_SESSION['error']   = 'Logueate';
        return print('
            <script>
                window.location = "./auth/";
            </script>
        ');
    }
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];
        if ($_SESSION['user']['rol_id'] == 1) {
            return header("Location: ./dashboard");
        }
    }
    $diseases = array('Covid-19', 'Varicela', 'Sarampion', 'Rubeola', 'Paperas', 'Tos', 'Epilepsia', 'Convulsiones', 'Diabetes', 'Asma', 'Anemia');
    $vaccines = array('Covid-19', 'Antitetanica', 'Carnet de vacunacion');
    $zonas = $conn->query("SELECT ubicaciones.name, ubicaciones.id, zonas.name AS zona FROM enfermeros INNER JOIN zonas ON enfermeros.zone_id = zonas.id INNER JOIN ubicaciones ON zonas.id = ubicaciones.zone_id WHERE user_id = $user_id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <script src="./assets/js/jquery.min.js"></script>
    <title>&lt; \ BlueConnect \ Inicio &gt;</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
</head>

<body onload=alertas()>
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
                <a class="menu-link is-active main-header-link" href="#boton-azul">Boton Azul</a>
                <a class="menu-link " href="#ficha-medica">Ficha Medica</a>
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
            <div class="main-container">
                <div class="content-wrapper" id="boton-azul">
                    <div class="content-section blue">
                        <ul></ul>
                        <?php while($row = $zonas->fetch_assoc()){ ?>
                            <button id="button" data-zona="<?php echo $row['id'] ?>" onclick=newAlert(this)><?php echo $row['zona'] ?><br><?php echo $row['name'] ?></button>
                        <?php } ?>
                    </div>
                </div>
                <div class="content-wrapper" id="ficha-medica">
                    <div class="content-section">
                        <form action="create-ficha" method="POST" class="ficha-medica">
                            <div class="info">
                                <span>Nueva ficha medica</span>
                                <input type="text" name="surname" placeholder="Apellidos" required>
                                <input type="text" name="name" placeholder="Nombres" required>
                                <input type="number" name="dni" placeholder="DNI" required>
                                <input type="date" name="birthday" required>
                                <input type="number" name="phone" placeholder="N° de Celular">
                                <input type="text" name="direction" placeholder="Direccion">
                                <input type="number" name="number" placeholder="N°">
                                <input type="number" name="floor" placeholder="Piso">
                                <input type="text" name="department" placeholder="Dto.">
                                <input type="text" name="location" placeholder="Localidad" required>
                            </div>
                            <div class="diseases">
                                <span>¿Tiene o tuvo alguna de estas enfermedades?</span>
                                <div class="bloque">
                                    <?php
                                        for($i=0; $i<count($diseases); $i++){
                                            echo "<label><input type=\"checkbox\" name=\"diseases[]\" value=\"$diseases[$i]\">$diseases[$i]</label>";
                                        }
                                    ?>
                                </div>
                                <span>Vacunas</span>
                                <div class="bloque">
                                    <?php
                                        for($i=0; $i<count($vaccines); $i++){
                                            echo "<label><input type=\"checkbox\" name=\"vaccines[]\" value=\"$vaccines[$i]\">$vaccines[$i]</label>";
                                        }
                                    ?>
                                </div>
                                <span>Medicamentos que no se pueden administrar</span>
                                <input type="text" name="medicines">
                                <span>Antecedentes de alergias</span>
                                <input type="text" name="allergies">
                                <button type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div class="overlay-app"></div>
    </div>
    <script>
        let target = $(location).attr('hash') || '#boton-azul';
        $('.main-container > div').not(target).hide();
        $(target).fadeIn(600);
        $('.header-menu a').on('click', function (e) {
            e.preventDefault();
            $(this).addClass('is-active');
            $(this).siblings().removeClass('is-active');
            target = $(this).attr('href');

            $('.main-container > div').not(target).hide();
            $(target).fadeIn(600);
        });
        document.querySelector('.dark-light').addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
        });
        function newAlert(e){
            $.ajax({
                type:"POST",
                url: "./alerta.php",
                data: { ubi: e.getAttribute("data-zona"), type: 1 },
                success: (res) => {
                    alert(res)
                }
            })
        }
        function alertas() {
            $.ajax({
                url: "./alertas.php",
                success: (res) => {
                    $('#boton-azul .content-section ul').html(res);
                }
            })
        }
        function resolver(e){
            const data = e.getAttribute("data-update").split(',');
            $.ajax({
                type:"GET",
                url: "./update.php",
                data: { id: data[0], table: 'notificaciones', status_id: data[1] },
                success: () => {
                    if(data[1] == 'true'){
                        e.parentElement.parentElement.children[1].innerHTML = `<span class='status-circle green'></span>Atendido`
                        e.outerHTML = `<a onClick=\"resolver(this)\" data-update=\"${data[0]},false\"><button class='content-button status-button open'>Resuelto</button></a>`
                    }else{
                        e.parentElement.parentElement.children[1].innerHTML = `<span class='status-circle red'></span>No atendido`
                        e.outerHTML = `<a onClick="resolver(this)" data-update="${data[0]},true"><button class='content-button status-button'>Resolver</button></a>`
                    }
                }
            })
        }
        setInterval(alertas, 1000);
    </script>
</body>

</html>