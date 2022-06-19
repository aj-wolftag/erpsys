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
    <!-- Table View item details -->
    <div class="container mt-3">
        <?php include('alert_dis.php'); ?>
        <div class="raw">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Details
                            <a href="item-create.php" class="btn btn-primary float-end">Add New Item</a>
                        </h4>
                    </div>
                    <div class="card-body">
                         <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item Code</th>
                                    <th>Item Category</th>
                                    <th>Item Sub-category</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query= "SELECT item.id, item.item_code, item_category.category, item_subcategory.sub_category, 
                                    item.item_name, item.quantity, item.unit_price FROM item LEFT JOIN item_category ON item.item_category=item_category.id 
                                    LEFT JOIN item_subcategory ON item.item_subcategory=item_subcategory.id ORDER BY id";
                                    $query_run= mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run)>0){
                                        foreach($query_run as $item){
                                            ?>
                                            <tr>
                                                <td><?= $item['id'];?></td>
                                                <td><?= $item['item_code'];?></td>
                                                <td><?= $item['category'];?></td>
                                                <td><?= $item['sub_category'];?></td>
                                                <td><?= $item['item_name'];?></td>
                                                <td><?= $item['quantity'];?></td>
                                                <td><?= $item['unit_price'];?></td>
                                                <td>
                                                    <a href="item-edit.php?id=<?= $item['id'];?>" class="btn btn-secondary">Edit</a>
                                                    <form action="events.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_item" value="<?= $item['id']; ?>" class="btn btn-danger">Delete</button>
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