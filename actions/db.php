<?php
    $host = "localhost";
    $user = "zddqlszw_permzap_app";
    $password = "P@ssw0rd@123";
    $databasename = "zddqlszw_permzap_app";

    // DB_HOSTNAME=localhost
    // DB_DATABASE_NAME=zddqlszw_permzap_app
    // DB_USERNAME=zddqlszw_permzap_app
    // DB_PASSWORD=Permzap@123

    $condb = new mysqli($host, $user, $password, $databasename);

    if($condb->connect_errno) {
        echo $mysqli->connect_error;
        exit;
    }
?>