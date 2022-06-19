<?php
session_start();

require('con_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit Customer Details</title>
</head>
<body>
    <div class="container mt-3">
        <?php include('alert_dis.php'); ?>
        <div class="row">
            <div class="col-md-6 offset-md-3" >
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Edit
                        <a href="/erpsys/index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id'])){
                                $customer_id= mysqli_real_escape_string($conn, $_GET['id']);
                                $query= "SELECT * FROM customer WHERE id='$customer_id' ";

                                $query_run= mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run)>0){
                                    $customer= mysqli_fetch_array($query_run);
                                    ?>
                                        <form action="events.php" method="POST" class="needs-validation">
                                            <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>">

                                            <div class="mb-3">
                                                <label>Title</label>
                                                <select id="titleSelector" class="form-select mb-4" name="title" required>
                                                    <option value="Mr">Mr.</option>
                                                    <option value="Mrs">Mrs.</option>
                                                    <option value="Miss">Miss.</option>
                                                    <option value="Dr">Dr.</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" value="<?= $customer['first_name'] ?>" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label>Middle Name</label>
                                                <input type="text" name="middle_name" class="form-control" value="<?= $customer['middle_name'] ?>" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" value="<?= $customer['last_name'] ?>" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label>Contact No</label>
                                                <input type="text" name="contact_no" class="form-control" value="<?= $customer['contact_no'] ?>" pattern="[0-9]{10}" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label>District</label>
                                                <select id="titleSelector" class="form-select mb-4" name="district" required>
                                                    <option value=1>Ampara</option>
                                                    <option value=2>Anuradhapura</option>
                                                    <option value=3>Badulla</option>
                                                    <option value=4>Batticaloa</option>
                                                    <option value=5>Colombo</option>
                                                    <option value=6>Galle</option>
                                                    <option value=7>Gampaha</option>
                                                    <option value=8>Hambantota</option>
                                                    <option value=9>Jaffna</option>
                                                    <option value=10>Kalutara</option>
                                                    <option value=11>Kalutara</option>
                                                    <option value=12>Kandy</option>
                                                    <option value=13>Kegalle</option>
                                                    <option value=14>Kilinochchi</option>
                                                    <option value=15>Kurunegala</option>
                                                    <option value=16>Mannar</option>
                                                    <option value=17>Matale</option>
                                                    <option value=18>Matara</option>
                                                    <option value=19>Moneragala</option>
                                                    <option value=20>Mullaitivu</option>
                                                    <option value=21>Nuwara Eliya</option>
                                                    <option value=22>Polonnaruwa</option>
                                                    <option value=23>Puttalam</option>
                                                    <option value=24>Rathnapura</option>
                                                    <option value=25>Vavuniya</option>
                                                </select>
                                            </div>
                                            <div class="mb-1">
                                                <button type="submit" name="update_customer" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    <?php
                                }
                                else{
                                    echo"<h4>NO ID FOUND!</h4>";
                                }
                            }
                        ?>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>