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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/chart.js"></script>
    <title>&lt; \ BlueConnect \ Admin &gt;</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
</head>

<body onLoad=search()>
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
                <a class="menu-link" href="dashboard">Panel de Administración</a>
                <a class="menu-link is-active">Reportes</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Buscar" onchange=search()>
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
                    <div class="side-title">Secciones</div>
                    <div class="side-menu">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340" fill="currentColor"><path d="M316.82,293.485a3.5,3.5,0,0,0-3.731.694,27.572,27.572,0,0,1-14.2,7.037,74.52,74.52,0,0,0,4.988-35.415,3.524,3.524,0,0,0-5.537-2.348,99.373,99.373,0,0,0-25.1,26.274l-9.574-9.17c-4.5-3.639-9.563-17.972-12.225-23.038-9.083-18.524-24.856-15.839-42.1-16.89l46.8-134.774a59.245,59.245,0,0,1,15.438,14.767,3.5,3.5,0,0,0,5.794-.075l9.847-14.942a3.506,3.506,0,0,0-.248-4.184,99.887,99.887,0,0,0-27.14-21.145l14.843-41.093A113.963,113.963,0,0,0,283,27.726c5.245-9.7-4.176-15.386-13.9-19.019-9.806-3.151-20.728-4.483-22.6,6.343a114.224,114.224,0,0,0-.57,14.151L232.112,70.642a99.005,99.005,0,0,0-34.418-.216,3.5,3.5,0,0,0-2.776,3.127l-1.533,17.829a3.5,3.5,0,0,0,4.5,3.65,59.225,59.225,0,0,1,21.264-2.011L173.915,223.286a28.888,28.888,0,0,0-21.738-9.934h-31.85a16.144,16.144,0,0,0-15.9,13.676c-2.676,18.124-7.351,38.134-10.4,50.3a27.563,27.563,0,0,1-8.778-20.816,3.506,3.506,0,0,0-6.812-1.379c-5.97,18.053-4.2,31.74-.95,40.893-30.552-12.769-31.447-59.782-31.075-60.086a3.5,3.5,0,0,0-6.907-.859c-9.014,38.36.915,62.6,7.843,73.856a61.419,61.419,0,0,1-20.669-10.712,3.522,3.522,0,0,0-5.707,3.3,41.7,41.7,0,0,0,15.051,25.552,29.93,29.93,0,0,0,18.6,6.464h51.142c4.569-.074,4.627-6.915,0-7H54.625c-10.723.177-19.6-7.934-23.883-17.114,6.026,3.472,14.705,7.3,24.372,7.907a3.5,3.5,0,0,0,2.715-5.946c-.191-.195-15.571-16.44-14.833-49.63,3.994,14.548,12.416,31.421,30.152,39.929a56.963,56.963,0,0,1,12.335,8.136c3.335,2.953,7.917-1.789,4.86-5.033-.523-.543-10.652-11.36-8.561-32.371a34.319,34.319,0,0,0,11.747,13.435c23,15.677,31.337,30,24.769,42.566a3.524,3.524,0,0,0,3.1,5.121H220.38a3.5,3.5,0,0,0,0-7h-93.8c4.15-14.183-4.74-29.167-26.493-44.645,3.016-11.824,8.317-33.913,11.26-53.841a9.1,9.1,0,0,1,8.976-7.7h31.85a21.859,21.859,0,0,1,17.579,8.916L191,258.29a25.688,25.688,0,0,0,10.928,8.57,27.285,27.285,0,0,1,16.156,18.9c2.86,12.135,8.3,30.083,17.973,46.166a3.479,3.479,0,0,0,2.309,1.544,3.329,3.329,0,0,0,.646.063H279.96a3.523,3.523,0,0,0,3.481-3.87l-2.674-25.152a23.214,23.214,0,0,0-2.9-8.964,88.653,88.653,0,0,1,19.381-22.358c-.022,7.153-1.133,19.15-7.178,30.234a3.523,3.523,0,0,0,2.756,5.161,34.351,34.351,0,0,0,18.559-4.5c-.934,5.711-3.281,13.633-9.161,19.344a11.109,11.109,0,0,1-7.8,3.1,3.5,3.5,0,0,0,0,7c21.035.2,25.509-33.187,24.561-36.94A3.5,3.5,0,0,0,316.82,293.485ZM178.985,230.024,223.82,100.911l4.668,14.228L185.5,238.926Zm55.091-120.306L229.038,94.36a72.1,72.1,0,0,1,9.459,2.46,70.578,70.578,0,0,1,9.061,3.962Zm21.771-96.165c5.708-.71,16.787,3.214,20.745,7.2a2.451,2.451,0,0,1,.508,3.2,112.632,112.632,0,0,1-6.655,9.333L252.9,27.2a112.223,112.223,0,0,1,.563-11.449A2.45,2.45,0,0,1,255.847,13.553Zm-4.2,20.625L267.1,39.544l-13.592,37.63a90.078,90.078,0,0,0-14.518-5.043ZM200.78,87.09l.878-10.218c27.6-4.331,59.453,6.731,78.224,27.15l-5.65,8.574C254.724,91.365,229.315,82.507,200.78,87.09Zm40.237,239.448c-8.552-14.889-13.476-31.162-16.114-42.377a34.311,34.311,0,0,0-20.3-23.773,18.675,18.675,0,0,1-7.948-6.234l-6.124-8.363L235.1,117.436l12.482-8.274L199.371,248c-1.433,4.347,5.008,6.637,6.614,2.3l.962-2.772,20.431.949a20.431,20.431,0,0,1,17.7,11.957l7.493,16.384a28.613,28.613,0,0,0,6.255,8.8l10.071,9.646a16.242,16.242,0,0,1,4.909,10l2.263,21.282Z"/><path d="M132.808,245.266c3.252-3.364-1.67-8.284-5.033-5.033C124.523,243.6,129.445,248.518,132.808,245.266Z"/><path d="M144.181,251.8c-3.251,3.364,1.67,8.284,5.033,5.033C152.466,253.464,147.545,248.544,144.181,251.8Z"/><path d="M124.216,261.206c-3.251,3.364,1.67,8.285,5.033,5.033C132.5,262.875,127.58,257.955,124.216,261.206Z"/><path d="M236.482,279.19c-3.251,3.365,1.67,8.284,5.033,5.033C244.767,280.859,239.845,275.939,236.482,279.19Z"/><path d="M245.893,295.641c-3.251,3.364,1.67,8.284,5.033,5.032C254.177,297.309,249.256,292.389,245.893,295.641Z"/></svg>
                            Administración
                        </a>
                        <a href="observaciones">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,4C7.674,4,3.773,7.005,2.062,11.654a.993.993,0,0,0,0,.692C3.773,17,7.674,20,12,20s8.227-3,9.938-7.654a.993.993,0,0,0,0-.692C20.227,7.005,16.326,4,12,4Zm0,14c-3.374,0-6.451-2.343-7.928-6C5.549,8.343,8.626,6,12,6s6.451,2.343,7.928,6C18.451,15.657,15.374,18,12,18Z"/><path d="M12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                            Reportes
                        </a>
                    </div>
                </div>
                <div class="side-wrapper">
                    <div class="side-title">Panel de administración</div>
                    <div class="side-menu admin">
                        <a href="./dashboard#usuarios">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Usuarios
                        </a>
                        <a href="./dashboard#zonas">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Zonas
                        </a>
                        <a href="./dashboard#enfermeros">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Enfermeros
                        </a>
                        <a href="./dashboard#pacientes">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Pacientes
                        </a>
                    </div>
                </div>
                <div class="side-wrapper">
                    <div class="side-title">Reportes</div>
                    <div class="side-menu admin">
                        <a href="#llamados">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="currentColor"><path d="M 9 4 C 6.239 4 4 6.239 4 9 L 4 10 C 4 12.761 6.239 15 9 15 C 11.761 15 14 12.761 14 10 L 14 9 C 14 6.239 11.761 4 9 4 z M 21 4 C 18.239 4 16 6.239 16 9 L 16 10 C 16 12.761 18.239 15 21 15 C 23.761 15 26 12.761 26 10 L 26 9 C 26 6.239 23.761 4 21 4 z M 21 6 C 22.654 6 24 7.346 24 9 L 24 10 C 24 11.654 22.654 13 21 13 C 19.346 13 18 11.654 18 10 L 18 9 C 18 7.346 19.346 6 21 6 z M 8.9980469 17 C 5.7200469 17 1.5146875 18.874062 0.3046875 20.914062 C -0.4423125 22.174062 0.26909375 24 1.4960938 24 L 13.496094 24 L 16.503906 24 L 28.503906 24 C 29.730906 24 30.443313 22.174063 29.695312 20.914062 C 28.484313 18.874062 24.276047 17 20.998047 17 C 19.047658 17 16.780902 17.671584 15 18.638672 C 13.21859 17.67114 10.948987 17 8.9980469 17 z M 20.998047 19 C 23.768047 19 27.207609 20.640594 27.974609 21.933594 C 27.985609 21.951594 27.990141 21.975 27.994141 22 L 17.992188 22 C 17.982946 21.627707 17.893464 21.251138 17.693359 20.914062 C 17.496485 20.582142 17.198019 20.259134 16.859375 19.943359 C 18.140889 19.393039 19.646958 19 20.998047 19 z"/></svg>
                            Llamados
                        </a>
                        <a href="#graficos">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12,4C7.674,4,3.773,7.005,2.062,11.654a.993.993,0,0,0,0,.692C3.773,17,7.674,20,12,20s8.227-3,9.938-7.654a.993.993,0,0,0,0-.692C20.227,7.005,16.326,4,12,4Zm0,14c-3.374,0-6.451-2.343-7.928-6C5.549,8.343,8.626,6,12,6s6.451,2.343,7.928,6C18.451,15.657,15.374,18,12,18Z"/><path d="M12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                            Gráficos
                        </a>
                    </div>
                </div>
            </div>

            <div class="main-container">
                <div class="main-header">
                    <div class="header-menu">
                        <a class="main-header-link" href="#llamados">Llamados</a>
                        <a class="main-header-link" href="#graficos">Gráficos</a>
                    </div>
                </div>
                <div class="content-wrapper" id="llamados">
                    <div class="main-header">
                        <div class="header-menu">
                            <a class="main-header-link is-active" href="#llamados">Filtros </a>
                            <select id="zonas" onchange=search()>
                                <option value="empty">Zona</option>
                                <?php
                                $roles = $conn->query("SELECT name FROM zonas ORDER BY name ASC");
                                if ($roles->num_rows > 0) 
                                    while ($row = $roles->fetch_assoc()) 
                                        echo "<option value='$row[name]'>$row[name]</option>";
                                ?>
                            </select>
                            <select id="tipos" onchange=search()>
                                <option value="empty">Tipo</option>
                                <?php
                                $roles = $conn->query("SELECT name FROM llamados");
                                if ($roles->num_rows > 0) 
                                    while ($row = $roles->fetch_assoc()) 
                                        echo "<option value='$row[name]'>$row[name]</option>";
                                ?>
                            </select>
                            <select id="estados" onchange=search()>
                                <option value="empty">Estado</option>
                                <option value="0">No atendidos</option>
                                <option value="1">Atendidos</option>
                            </select>
                            <input type="date" id="dia" onchange=search()>
                            <input type="time" id="horario" onchange=search()>
                        </div>
                    </div>
                    <div class="content-section">
                        <ul></ul>
                    </div>
                </div>
                <div class="content-wrapper" id="graficos">
                    <div class="content-section">
                        <select name="rango-temporal" class="time-select">
                            <option value="week">Última semana</option>
                            <option value="month">Último mes</option>
                            <option value="trimester">Últimos tres meses</option>
                            <option value="year">Último año</option>
                        </select>
                        <button id="download">Descargar Reporte PDF</button>
                        <div class="chart-wrapper" style="width: 800px; margin: 20px auto 0 auto">
                            <canvas id="graphics"></canvas>
                        </div>

                        <script>
                            window.jsPDF = window.jspdf.jsPDF;

                            const ctx = document.getElementById('graphics');
                            const timeSelect = document.querySelector(".time-select");
                            
                            <?php 
                                function getSec(string $time){
                                    $hms = explode(':', $time);
                                    return ($hms[0]*3600+$hms[1]*60+$hms[2]);
                                }
                                $conn->query("SET lc_time_names = 'es_AR'"); 
                                $week = $conn->query("SELECT DAYNAME(date) AS dia, COUNT(date) AS count, GROUP_CONCAT(time, '-', time_response) AS time FROM `notificaciones` GROUP BY DAYNAME(date)");
                                $dias = []; $dia_count = []; $tiempo = [];
                                while($row = $week->fetch_assoc()){
                                    array_push($dias, ucfirst($row['dia'])); array_push($dia_count, $row['count']);
                                    $timeResponse = 0;
                                    $i = 0;
                                    while ($i < count(explode(',',$row['time']))) {
                                        $time = explode('-', (explode(',',$row['time']))[$i]);
                                        $timeResponse += getSec($time[1]) - getSec($time[0]);
                                        $i++;
                                    }
                                    $timeResponse /= $i;
                                    array_push($tiempo, round($timeResponse));
                                }
                            ?>
                            const weekOption = {
                                labels: <?php echo json_encode($dias) ?>,
                                datasets: [
                                    {
                                        label: 'Pacientes atendidos',
                                        data: <?php echo json_encode($dia_count) ?>,
                                    },
                                    {
                                        label: 'Tiempo de respuesta promedio (s)',
                                        data: <?php echo json_encode($tiempo) ?>,
                                    }
                                ]
                            };
                            const monthOption = {
                                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                datasets: [{
                                    label: 'Pacientes atendidos',
                                    data: [120, 92, 54, 123, 233, 75, 132, 175, 103, 85, 92, 63],
                                }]
                            };
                            <?php 
                                $year = $conn->query("SELECT MONTHNAME(date) AS mes, COUNT(date) AS count FROM `notificaciones` GROUP BY MONTHNAME(date)");
                                $meses = []; $mes_count = [];
                                while($row = $year->fetch_assoc()){
                                    array_push($meses, ucfirst($row['mes']));
                                    array_push($mes_count, $row['count']);
                                }
                            ?>
                            const yearOption = {
                                labels: <?php echo json_encode($meses) ?>,
                                datasets: [{
                                    label: 'Pacientes atendidos',
                                    data: <?php echo json_encode($mes_count) ?>,
                                }]
                            };

                            let chart;
                            let option = weekOption;
                            function initializeChart(dataOption) {
                                if (chart) chart.destroy();

                                chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: dataOption,
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            }

                            initializeChart(option);

                            timeSelect.addEventListener("change", e => {
                                if (e.target.value === "week") {
                                    option = weekOption;
                                } else if (e.target.value === "month") {
                                    option = monthOption;
                                } else if (e.target.value === "year") {
                                    option = yearOption;
                                }
                                initializeChart(option);
                            });
                            
                            download.addEventListener("click", function() {
                                var imgData = ctx.toDataURL('image/jpeg', 1.0);
                                var pdf = new jsPDF();
                                pdf.addImage(imgData, 'JPEG', 0, 0);
                                pdf.save('reporte.pdf')
                                

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    <div class="overlay-app"></div>
    </div>
    <script>
        
        let target = $(location).attr('hash').substring(0, $(location).attr('hash').indexOf("?")) || $(location).attr('hash') || '#llamados';
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
        function search(){
            parametros = {"search" : $('.search-bar input').val().toLowerCase(), "zonas": $('#zonas').val(), "tipos": $('#tipos').val(), "estados": $('#estados').val() , "date": $('#dia').val(), "time": $('#horario').val()};
            $.ajax({
                type:"GET",
                url: "./notifications.php",
                data: parametros,
                success: (res) => {
                    $('#llamados .content-section ul').html(res);
                    document.querySelectorAll(".dropdown").forEach((dropdown) => {
                        dropdown.addEventListener("click", (e) => {
                            e.stopPropagation();
                            document.querySelectorAll(".dropdown").forEach((c) => c.classList.remove("is-active"));
                            dropdown.classList.add("is-active");
                        });
                    });
                }
            })
        }
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
        function borrar(e){
            const data = e.getAttribute("data-delete");
            $.ajax({
                type:"GET",
                url: "./delete.php",
                data: { id: data, table: 'notificaciones'},
                success: () => {
                    e.parentElement.parentElement.parentElement.parentElement.parentElement.outerHTML = ''
                    $(".content-wrapper").removeClass("overlay");
                }
            })
        }
    </script>
</body>

</html>