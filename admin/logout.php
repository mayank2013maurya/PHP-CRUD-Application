<?php

    session_start();
    session_destroy();
    session_start();

    $_SESSION["msgs"] = "<div class='alert alert-success'>Logged out sucessfully</div>";
    header("location: login.php");

?>