<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "painel_admin";

    $conn = mysqli_connect($host, $user, $password, $db);
    mysqli_set_charset( $conn, 'utf8');
?>