<?php 
    
    session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../layout/CSS/style.css">

    <title>Login</title>
  </head>
  <body>
    
    <h1 class="mt-5">Login</h1>

    

    <div class="container mx-auto mt-5" style="width: 50vw;">

    <?php 
    
        if(isset($_SESSION["msgs"])) {

            echo $_SESSION["msgs"];
            unset($_SESSION["msgs"]);

        }

    ?>
    
        <form action="login-db-config.php" method="post">

            <div class="form-group">
                <label for="user">Username</label>
                <input type="text" name="username" id="user" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="password" id="pass" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group" style="">
                <button class="btn btn-dark" style=" width: 40vw; margin-left: 30px;" type="submit">Submit</button>
            </div>

        </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>