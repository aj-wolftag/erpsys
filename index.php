<?php
    require('con_db.php');

    session_start();
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
    <title>Document</title>
</head>
<body>
    <!-- Nav Bar -->
    <?php include('navbar.php') ?>
    <!-- Table View customer details -->
    <div class="container mt-3">
        <?php include('alert_dis.php'); ?>
        <div class="raw">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Details
                            <a href="customer-create.php" class="btn btn-primary float-end">Add New Customer</a>
                        </h4>
                    </div>
                    <div class="card-body">
                         <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Contact Number</th>
                                    <th>District</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query= "SELECT customer.id, customer.title, customer.first_name, customer.middle_name, customer.last_name, 
                                    customer.contact_no, district.district FROM customer JOIN district ON customer.district=district.id";
                                    $query_run= mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run)>0){
                                        foreach($query_run as $customer){
                                            ?>
                                            <tr>
                                                <td><?= $customer['id'];?></td>
                                                <td><?= $customer['title']." ".$customer['first_name']." ".$customer['middle_name']." ".$customer['last_name'];?></td>
                                                <td><?= $customer['contact_no'];?></td>
                                                <td><?= $customer['district'];?></td>
                                                <td>
                                                    <a href="customer-edit.php?id=<?= $customer['id'];?>" class="btn btn-secondary">Edit</a>
                                                    <form action="events.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_customer" value="<?= $customer['id']; ?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                    }
                                    else{
                                        echo "<h5>NO Rec</h5>";
                                    }
                                ?>
                                
                            </tbody>
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>