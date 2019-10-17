<?php
    session_start();
    require 'pdoconn.php';

    if(empty($_POST['first-name']) || empty($_POST['address']) || empty($_POST['pin-code']) || empty($_POST['city'])) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>Please fill in all the field</div>";

        header("location: ../index.php");

        $conn = null;
        exit();

    }

    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $address = $_POST["address"];
    $pincode = $_POST["pin-code"];
    $city = $_POST["city"];

    date_default_timezone_set("Asia/Kolkata");

    $timeInSecond = time();
    $currentDate = date('d-m-Y', $timeInSecond);
    $currentTime = date("H:i:s");

    $timestamp = $currentTime ." ".$currentDate;

    try {

        $sql = "INSERT INTO employee_personal (first_name, last_name, address, pincode, city, timestamp) VALUES(?, ?, ?, ?, ?, ?)";

        $query = $conn->prepare($sql);
        $query->execute([$first_name, $last_name, $address, $pincode, $city, $timestamp]);


        $_SESSION["msgs"] = "<div class='alert alert-success'>Data added successfully</div>";
        header("location: ../index.php");


    } catch(PDOException $e) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>There was some issue. Please try again later.</div>";
        header("location: ../index.php");

    }

?>