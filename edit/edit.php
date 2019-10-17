<?php 
    require '../db/pdoconn.php';
    $_SESSION["current_page_css"] = "../layout/CSS/style.css";
    $_SESSION["current_page_name"] = "Update Entry";
?>

<?php require '../layout/header.php' ?>
<?php require '../layout/navbar.php' ?>

<div class="container mt-5 center my-container">
    <h1>Update Entry</h1>

    <?php
        if(isset($_SESSION["msgs"])) {

            echo $_SESSION["msgs"];
            unset($_SESSION["msgs"]);
        }
    ?>

    <?php 
    
        $id = '';

        if(isset($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            $_SESSION["msgs"] = "<div class='alert alert-danger'>Something went wrong. Try again later.</div>";
            header("location: ../view-data/view-data.php");
        }

        try {

            $sql = "SELECT * FROM employee_personal WHERE id=?";
            $query = $conn->prepare($sql);
            $query->execute([$id]);
            $arr = $query->fetchAll(PDO::FETCH_ASSOC);

            if(count($arr) < 1) {
                $_SESSION["msgs"] = "<div class='alert alert-danger'>Something went wrong. Try again later.</div>";
                header("location: ../view-data/view-data.php");
                $conn = null;
                exit();
            }
            
        
        
    ?>

    <form action="../db/update-data.php?id=<?php echo $id ?>" method="post" class="mt-4">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first-name">First Name</label>
                <input type="text" name="first-name" id="first-name" placeholder="First Name" class="form-control" value="<?php echo $arr[0]["first_name"] ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="">Last Name</label>
                <input type="text" name="last-name" id="last-name" placeholder="Last Name" class="form-control" value="<?php echo $arr[0]["last_name"] ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter Address" class="form-control" value="<?php echo $arr[0]["address"] ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="pin-code">Pin Code</label>
                <input type="text" name="pin-code" id="pin-code" placeholder="Enter Pincode" class="form-control" value="<?php echo $arr[0]["pincode"] ?>">
            </div>
            <div class="form-group col-md-8">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="Enter City" class="form-control" value="<?php echo $arr[0]["city"] ?>">
            </div>
        </div>
    <div class="mx-auto" style="width: 200px;">
        <button class="btn btn-dark" type="submit">Submit</button>
        <a class="btn btn-outline-light ml-3" href="../view-data/view-data.php">Dismiss</a>
    </div>
    </form>

    <?php 
    
        } catch(PDOException $e) {
                    
            $_SESSION["msgs"] = "<div class='alert alert-danger'>Can't connect to server. Please try again later.</div>";

            header("location: ../view-data/view-data.php");

        } finally {
            $conn = null;
            
        }        

    ?>
    
</div>


<?php require '../layout/footer.php' ?>