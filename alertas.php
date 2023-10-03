<?php 
    include('./connection.php');
    $notificaciones = $conn->query("SELECT notificaciones.id, notificaciones.status_id, ubicaciones.name AS origen, zonas.name AS zona, llamados.name AS tipo FROM notificaciones LEFT JOIN ubicaciones ON notificaciones.ubi_id = ubicaciones.id LEFT JOIN zonas ON ubicaciones.zone_id = zonas.id LEFT JOIN llamados ON notificaciones.type_id = llamados.id WHERE notificaciones.status_id = 0 ORDER BY notificaciones.date DESC, notificaciones.time DESC");
    while($row = $notificaciones->fetch_assoc()){ 
        echo "<li>";
        echo "<div class=\"alerts\">$row[zona]<br>$row[origen]</div><span class=\"pin\"></span>";
        echo "<a onClick=\"resolver(this)\" data-update=\"$row[id],true\"><button class='content-button status-button'>$row[tipo]</button></a>";
        echo "</li>";
    } 
?>