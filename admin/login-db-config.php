<?php

    require 'login-db-connect.php';

    $user = $_POST["username"];
    $pass = $_POST["password"];

    if(empty(trim($user, " ")) || empty(trim($pass, " "))) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>Please fill in all the fields</div>";
        header("location: login.php");
        $conn = null;
        exit();

    }

    try {

        $sql = "SELECT * FROM user_info WHERE username=? AND password=?";
        $query = $conn->prepare($sql);
        $query->execute([$user, $pass]);

        $arr = $query->fetchAll(PDO::FETCH_ASSOC);

        if(count($arr) > 0) {
            $_SESSION["msgs"] = "<div class='alert alert-success'>Login successfully</div>";
            header("location: ../index.php");

            $_SESSION["isLogin"] = 1;
        } else {
            
            $_SESSION["msgs"] = "<div class='alert alert-danger'>Invalid Login Credentials</div>";
            header("location: login.php");

            $_SESSION["isLogin"] = 0;

        }

    } catch(PDOException $e) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>Cannot connect. Try again later.</div>";
        header("location: login.php");

    } finally {
        $conn = null;
    }

?>