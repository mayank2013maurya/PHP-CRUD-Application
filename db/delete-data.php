<?php
    require 'pdoconn.php';

    $id = '';

    if(isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        $_SESSION["msgs"] = "<div class='alert alert-danger'>Something went wrong. Try again later.</div>";
        header("location: ../view-data/view-data.php");
    }

    try {

        $sql = "DELETE FROM employee_personal WHERE id=?";
        $query = $conn->prepare($sql);
        $query->execute([$id]);

        $_SESSION["msgs"] = "<div class='alert alert-warning'>Data successfully deleted</div>";
        header("location: ../view-data/view-data.php");

    } catch(PDOException $e) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>Can't connect to server. Please try again later.</div>";

        header("location: ../view-data/view-data.php");

    } finally {
        $conn = null;
    }

?>