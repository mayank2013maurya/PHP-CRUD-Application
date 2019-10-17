<?php
    session_start();
    require 'connection.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_PERSISTENT => true));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        $_SESSION["msgs"] = "<div class='alert alert-danger'>Can't connect to database. Please try later.</div>";

        header("location: ../index.php");
    }

?>