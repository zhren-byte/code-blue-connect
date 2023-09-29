<?php
    include('./connection.php');
    $query = "SELECT notificaciones.id, notificaciones.status_id, notificaciones.date, notificaciones.time, ubicaciones.name AS origen, zonas.name AS zona, llamados.name AS tipo FROM notificaciones LEFT JOIN ubicaciones ON notificaciones.ubi_id = ubicaciones.id LEFT JOIN zonas ON ubicaciones.zone_id = zonas.id LEFT JOIN llamados ON notificaciones.type_id = llamados.id";
    if(isset($_GET['search'])){
        if($_GET['search'] == 'atendidos' || $_GET['search'] == 'atendido') $query .= " WHERE notificaciones.status_id = 1";
        else if($_GET['search'] == 'no atendidos' || $_GET['search'] == 'no atendido') $query .= " WHERE notificaciones.status_id = 0";
        else if($_GET['search'] != '') $query .= " WHERE zonas.name LIKE '%$_GET[search]%' OR notificaciones.date LIKE '%$_GET[search]%' OR notificaciones.time LIKE '%$_GET[search]%' OR ubicaciones.name LIKE '%$_GET[search]%' OR llamados.name LIKE '%$_GET[search]%'";
    }
    if(isset($_GET['filter'])){
        for($i=0; count($_GET['filter']); $i++){
            echo "<li>".$_GET['filter'][$i]."</li>";
        }
        return;
        if($_GET['filter'] != '') $query .= "";
        else if (str_starts_with($_GET['filter'], 'zonas')) $query .= " AND zonas.name = $_GET[filter]";
    }
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            print("
                <li>
                   <div class=\"alerts\"><span class=\"datetime\">$row[date] $row[time]</span><strong>$row[tipo]</strong>$row[zona] - $row[origen]</div>
            ");
            print("<span class=\"status\">");
            if($row['status_id'] == 0) print "<span class='status-circle red'></span>No atendido";else print "<span class='status-circle green'></span>Atendido";
            print("</span>");
            print("<div class=\"button-wrapper\">");
            if($row['status_id'] == 0) print "<a onClick=\"resolver(this)\" data-update=\"$row[id],true\"><button class='content-button status-button'>Resolver</button></a>";else print "<a onClick=\"resolver(this)\" data-update=\"$row[id],false\"><button class='content-button status-button open'>Resuelto</button></a>";
            print("
                        <div class=\"menu\">
                            <button class=\"dropdown\">
                                <ul><li><a onClick=\"borrar(this)\" data-delete=\"$row[id]\">Borrar</a></li></ul>
                            </button>
                        </div>
                    </div>
                </li>");
        }
    }
?>