<?php

    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'dboffice2';

    session_start();

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password, array(PDO::ATTR_PERSISTENT => true));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

    } catch(PDOException $e) {
        $_SESSION["msgs"] = "<div class='alert alert-danger'>Can't connect to database. Please login later.</div>";

        header("location: login.php");
    }

?>