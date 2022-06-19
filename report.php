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
    <title>Reports</title>
</head>
<body>
    <!-- Nav bar -->
    <?php include('navbar.php'); ?>
    <!-- view invoice report -->
    <div class="container">
        <div class="raw justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                            <h5>Invoice Report</h5>
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-boarderd">
                            <thead>
                                <tr>
                                    <th>Invoice number</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>District</th>
                                    <th>Item count</th>
                                    <th>Invoice amount</th>
                                </tr>
                            </thead>
                            <?php
                            if(isset($_GET['from_date'])&&isset($_GET['to_date'])){
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                $query= "SELECT invoice.invoice_no, invoice.date, customer.first_name, district.district, invoice.item_count, invoice.amount FROM invoice 
                                LEFT JOIN customer ON invoice.customer=customer.id LEFT JOIN district ON district.id=customer.district
                                WHERE invoice.date BETWEEN '$from_date' AND '$to_date'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $raw){
                                        ?>
                                        <tr>
                                            <td><?= $raw['invoice_no']; ?></td>
                                            <td><?= $raw['date']; ?></td>
                                            <td><?= $raw['first_name']; ?></td>
                                            <td><?= $raw['district']; ?></td>
                                            <td><?= $raw['item_count']; ?></td>
                                            <td><?= $raw['amount']; ?></td>
                                        </tr>
                                       <?php
                                    }
                                }
                                else{
                                    echo "No Record";
                                }
                            }


                            ?>  
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- view invoice item report -->
    <div class="container">
        <div class="raw justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                            <h5>Invoice item Report</h5>
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="date" name="invoice_item_from_date" value="<?php if(isset($_GET['invoice_item_from_date'])){ echo $_GET['invoice_item_from_date']; } ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="date" name="invoice_item_to_date" value="<?php if(isset($_GET['invoice_item_to_date'])){ echo $_GET['invoice_item_to_date']; } ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-boarderd">
                            <thead>
                                <tr>
                                    <th>Invoice number</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Item Name with Code</th>
                                    <th>Item category</th>
                                    <th>Item unit price</th>
                                </tr>
                            </thead>
                            <?php
                            if(isset($_GET['invoice_item_from_date'])&&isset($_GET['invoice_item_to_date'])){
                                $from_date = $_GET['invoice_item_from_date'];
                                $to_date = $_GET['invoice_item_to_date'];

                                $query= "SELECT invoice.invoice_no, invoice.date, customer.first_name, item.item_name, item.item_code, item_category.category, invoice_master.unit_price FROM invoice 
                                LEFT JOIN customer ON invoice.customer=customer.id LEFT JOIN invoice_master ON invoice_master.item_id=item.id LEFT JOIN item ON item.item_category=item_category.id
                                WHERE invoice.date BETWEEN '$from_date' AND '$to_date'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $raw){
                                        ?>
                                        <tr>
                                            <td><?= $raw['invoice_no']; ?></td>
                                            <td><?= $raw['date']; ?></td>
                                            <td><?= $raw['first_name']; ?></td>
                                            <td><?= $raw['item_code']; ?></td>
                                            <td><?= $raw['item_count']; ?></td>
                                            <td><?= $raw['unit_price']; ?></td>
                                        </tr>
                                       <?php
                                    }
                                }
                                else{
                                    echo "No Record";
                                }
                            }


                            ?>  
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>