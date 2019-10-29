<?php

define('DBSERVER','localhost');
define('DBUSERNAME','root');
define('DBPASSWORD','');
define('DBNAME','users_db');

$conn = new mysqli(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if ($conn->connect_error) {

    echo "Error in connection" . $conn->connect_error;
    exit;
}
?>