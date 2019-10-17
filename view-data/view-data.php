<?php 


require '../db/pdoconn.php';

$_SESSION["current_page_css"] = "../layout/CSS/style.css";
$_SESSION["current_page_name"] = "View Data";

?>

<?php require '../layout/header.php' ?>
<?php require '../layout/navbar.php' ?>



<div class="container mt-5">

    <div class="mb-4">
        <?php
            if(isset($_SESSION["msgs"])) {

                echo $_SESSION["msgs"];
                unset($_SESSION["msgs"]);
            }

        ?>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Address</th>
                <th scope="col">Pincode</th>
                <th scope="col">city</th>
                <th scope="col">Timestamp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 

                try {
                    
                    $sql = "SELECT * FROM employee_personal";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $arr = $query->fetchAll(PDO::FETCH_ASSOC);

                    if(count($arr) > 0) {

                        foreach ($arr as $row) {
                            # code...
                         {
                            ?>
                            <tr style="background-color: white;">
                                <td><?php echo $row["first_name"]; ?></td>
                                <td><?php echo $row["last_name"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>
                                <td><?php echo $row["pincode"]; ?></td>
                                <td><?php echo $row["city"]; ?></td>
                                <td><?php echo $row["timestamp"]; ?></td>
                                <td>

                                    <a href="../edit/edit.php?id=<?php echo $row["id"]; ?>"><span class="badge badge-warning">Edit</span></a>

                                    <a onclick="return confirm('Do you are really want to delete this entry?')" href="../db/delete-data.php?id=<?php echo $row["id"] ?>"><span class="badge badge-danger">Delete</span></a>
                                </td>
                            </tr>
                            <?php
                            }
                    }
                }

                else {
                    $_SESSION["msgs"] = "<div class='alert alert-danger'>No data exists.</div>";

                     header("location: ../index.php");
                     exit();
                }
                
            } catch(PDOException $e) {

                $_SESSION["msgs"] = "<div class='alert alert-danger'>Trouble in connecting to database. Try later.</div>";
    
                header("location: ../index.php");
    
            } finally {
                $conn = null;
            }
            ?>
        </tbody>
    </table>
</div>



<?php require '../layout/footer.php' ?>