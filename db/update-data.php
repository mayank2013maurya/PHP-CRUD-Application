<?php
    require 'pdoconn.php';
    
    $id = '';

    if(!empty($_GET["id"])) {
        
        $id = $_GET["id"];

    } else {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>Something went wrong. Try again later.</div>";

        header("location: ../view-data/view-data.php");

        $conn = null;
        exit();

    }

    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $address = $_POST["address"];
    $pincode = $_POST["pin-code"];
    $city = $_POST["city"];

    if(empty(trim($first_name, " ")) || empty(trim($address, " ")) || empty(trim($pincode, " ")) || empty(trim($city, " "))) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>Please fill in all the fields.</div>";

        header("location: ../edit/edit.php?id=$id");

        $conn = null;
        exit();

    }

    try {

        $sql = "UPDATE employee_personal SET first_name = ?, last_name = ?, address = ?, pincode=?, city=? WHERE id=?";

        $query = $conn->prepare($sql);
        $query->execute([$first_name, $last_name, $address, $pincode, $city, $id]);

        $_SESSION["msgs"] = "<div class='alert alert-success'>Data updated successfully.</div>";

        header("location: ../view-data/view-data.php");

    } catch(PDOException $e) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>Could not connect to server. Please try again later.</div>";

        header("location: ../view-data/view-data.php");

    } finally {
        $conn = null;

    }

?>