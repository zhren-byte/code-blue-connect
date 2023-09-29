<?php 
    include('./connection.php');
    $name = ucfirst(strtolower($_POST['name']));
    $surname = ucfirst(strtolower($_POST['surname']));
    $diseases = implode(',',$_POST['diseases']);
    $vaccines = implode(', ',$_POST['vaccines']);
    if(is_int($_POST['floor'])) $floor = $_POST['floor']; else $floor = 0;
    if ($conn->query("INSERT INTO `pacientes` (`id`, `name`, `surname`, `dni`, `birthdate`, `phone`, `direction`, `number`, `floor`, `department`, `location`, `diseases`, `vaccines`, `medicines`, `allergies`) VALUES (NULL, '$name', '$surname', $_POST[dni], '$_POST[birthday]', $_POST[phone], '$_POST[direction]', $_POST[number], $floor, '$_POST[department]', '$_POST[location]', '$diseases', '$vaccines' ,'$_POST[medicines]', '$_POST[allergies]')")) {
        header('Location: ./');
    } else {
        echo $conn->error;
    }
?>