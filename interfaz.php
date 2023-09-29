<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./assets/js/jquery.min.js"></script>
    <title>Document</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            width: 100%;
            margin: auto;
            height: 100vh;
        }
        .zonas{
            background: url(./assets/zonas.png);
            width: 718px;
            height: 594px;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .zonas button{
            width: 14px;
            height: 14px;
            border-radius: 100%;
            outline: none;
            border: none;
            position: absolute;
            transition: .4s ease;
        }
        .zonas button.blue{
            background-color: cyan;
        }
        .zonas button.green{
            background-color: greenyellow;
        }
        .zonas button.blue:hover{
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="zonas">
        <button data-zona="3" data-type="1" style="top: 219px;left: 118px;" class="blue" ></button>
        <button data-zona="4" data-type="2" style="top: 163px;left: 268px;" class="green"></button>
        <button data-zona="5" data-type="2" style="top: 181px;left: 295px;" class="green"></button>
        <!-- <button data-zona="4" data-type="2" style="top: 217px;left: 354px;" class="green"></button>
        <button data-zona="5" data-type="2" style="top: 235px;left: 375px;" class="green"></button> -->
    </div>
    <script>
        <?php
            include('./connection.php');
            $select = $conn->query('SELECT * FROM notificaciones');
            $selects = array();
            while($row = $select->fetch_assoc()){
                array_push($selects, $row['time'].',' .$row['time_response']);
            }
        ?>
        function getSec(time){
            let hms = time.split(':');
            return (hms[0]*3600+parseInt(hms[1])*60+parseInt(hms[2]));
        }
        let resTime = JSON.parse('<?php echo json_encode($selects); ?> ');
        resTime.forEach(e => {
            let time = getSec(e.split(',')[0]);
            let response = getSec(e.split(',')[1]);
            let responseTime = response - time;
            console.log(responseTime)
        });
        document.querySelectorAll('.zonas button').forEach(e => {
            e.addEventListener('click', (e) => {
                let ubi = e.srcElement.dataset.zona
                let type = e.srcElement.dataset.type
                $.ajax({
                    type:"POST",
                    url: "./alerta.php",
                    data: { ubi, type },
                    success: (res) => {
                        alert(res)
                    }
                })
            })
        })
    </script>
</body>
</html>