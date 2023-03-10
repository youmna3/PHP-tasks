<?php
define('db_server', 'localhost');
define('db_username', 'root');
define('db_password', '');
define('db_dbname', 'shop');
function getRows($q)
{
    $rows = [];
    $con = new mysqli(db_server, db_username, db_password, db_dbname);
    if ($con->connect_error) {
        return [];
    }
    $q = $con->query($q);
    while ($row = $q->fetch_assoc()) {
        array_push($rows, $row);
    }
    $con->close();

    return $rows;
}