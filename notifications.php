<?php
    include('./connection.php');
    $search = '1';
    if(isset($_GET['search'])){ 
        if($_GET['search'] == 'atendidos' || $_GET['search'] == 'atendido') $search = "notificaciones.status_id = 1";
        else if($_GET['search'] == 'no atendidos' || $_GET['search'] == 'no atendido') $search = "notificaciones.status_id = 0";
        else if($_GET['search'] != '') $search = "zonas.name LIKE '%$_GET[search]%' OR notificaciones.date LIKE '%$_GET[search]%' OR notificaciones.time LIKE '%$_GET[search]%' OR ubicaciones.name LIKE '%$_GET[search]%' OR llamados.name LIKE '%$_GET[search]%'";
    }
    if(isset($_GET['zonas']))
        if($_GET['zonas'] != 'empty') $search .= " AND zonas.name = '$_GET[zonas]'";
    if(isset($_GET['tipos']))
        if($_GET['tipos'] != 'empty') $search .= " AND llamados.name = '$_GET[tipos]'";
    if(isset($_GET['estados']))
        if($_GET['estados'] != 'empty') $search .= " AND notificaciones.status_id = $_GET[estados]";
    if(isset($_GET['date']))
        if($_GET['date'] != '') $search .= " AND notificaciones.date LIKE  '%$_GET[date]%'";
    if(isset($_GET['time']))
        if($_GET['time'] != '') $search .= " AND notificaciones.time LIKE '%$_GET[time]%'";
    if(isset($_GET['desde']))
        if($_GET['desde'] != '' && $_GET['hasta'] != '') $search .= " AND notificaciones.date BETWEEN '$_GET[desde]' AND '$_GET[hasta]'";
    
    $query = "SELECT notificaciones.id, notificaciones.status_id, notificaciones.date, notificaciones.time, ubicaciones.name AS origen, zonas.name AS zona, llamados.name AS tipo FROM notificaciones LEFT JOIN ubicaciones ON notificaciones.ubi_id = ubicaciones.id LEFT JOIN zonas ON ubicaciones.zone_id = zonas.id LEFT JOIN llamados ON notificaciones.type_id = llamados.id WHERE $search ORDER BY notificaciones.status_id ASC";
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
                                <ul><li onClick=\"borrar(this)\" data-delete=\"$row[id]\"><a>Borrar</a></li></ul>
                            </button>
                        </div>
                    </div>
                </li>");
        }
    }
?>