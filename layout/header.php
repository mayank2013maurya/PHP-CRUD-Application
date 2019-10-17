<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_SESSION['current_page_name']; unset($_SESSION['current_page']); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $_SESSION["current_page_css"]; unset($_SESSION["current_page_css"]); ?>">
</head>

<body>

<?php 

    if(!isset($_SESSION["isLogin"]) || $_SESSION["isLogin"] < 1) {

        $_SESSION["msgs"] = "<div class='alert alert-danger'>You must login first</div>";
        header("location: http://127.0.0.1/office-2/admin/login.php");
        exit();
    }

?>