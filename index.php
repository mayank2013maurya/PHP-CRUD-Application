<?php 
    session_start();
    $_SESSION["current_page_css"] = "./layout/CSS/style.css";
    $_SESSION["current_page_name"] = "Office Record Entry";
?>

<?php require 'layout/header.php' ?>
<?php require 'layout/navbar.php' ?>

<div class="container mt-5 center my-container">
    <h1>Data Entry</h1>

    <?php
        if(isset($_SESSION["msgs"])) {

            echo $_SESSION["msgs"];
            unset($_SESSION["msgs"]);
        }
    ?>

    <form action="db/add-data.php" method="post" class="mt-4">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first-name">First Name</label>
                <input type="text" name="first-name" id="first-name" placeholder="First Name" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="">Last Name</label>
                <input type="text" name="last-name" id="last-name" placeholder="Last Name" class="form-control">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter Address" class="form-control">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="pin-code">Pin Code</label>
                <input type="text" name="pin-code" id="pin-code" placeholder="Enter Pincode" class="form-control">
            </div>
            <div class="form-group col-md-8">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="Enter City" class="form-control">
            </div>
        </div>
    <div class="mx-auto" style="width: 200px;">
        <button class="btn btn-dark" type="submit">Submit</button>
    </div>
    </form>
    
</div>


<?php require 'layout/footer.php' ?>