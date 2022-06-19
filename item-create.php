<?php
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
    <script src="validate.js"></script>
    <title>Create Item</title>
</head>
<body>
    <div class="container mt-3">
        <?php include('alert_dis.php'); ?>
        <div class="row">
            <div class="col-md-6 offset-md-3" >
                <div class="card">
                    <div class="card-header">
                        <h4>Item Add
                        <a href="/erpsys/item.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="events.php" method="POST" class="needs-validation">
                            <div class="mb-3">
                                <label>Item Code</label>
                                <input type="text" name="item_code" class="form-control" required/>
                            </div>
                            <div class="mb-3">
                                <label>Item Category</label>
                                <select id="itemCategorySelector" class="form-select mb-4" name="item_category" required>
                                    <option value=1>Printers</option>
                                    <option value=2>Laptops</option>
                                    <option value=3>Gadgets</option>
                                    <option value=4>Ink bottels</option>
                                    <option value=5>Cartridges</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Item Sub-category</label>
                                <select id="itemCategorySelector" class="form-select mb-4" name="item_subcategory" required>
                                    <option value=1>HP</option>
                                    <option value=2>Dell</option>
                                    <option value=3>Lenovo</option>
                                    <option value=4>Acer</option>
                                    <option value=5>Samsung</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Item Name</label>
                                <input type="text" name="item_name" class="form-control" required/>
                            </div>
                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" pattern="[0-9]+" required/>
                            </div>
                            <div class="mb-3">
                                <label>Unit Price</label>
                                <input type="text" name="unit_price" class="form-control" pattern="[0-9]+" required/>
                            </div>
                            <div class="mb-1">
                                <button type="submit" name="save_item" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>