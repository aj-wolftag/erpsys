<?Php
require 'con_db.php';
session_start();

// customer detais update
if(isset($_POST['update_customer'])){
    $customerID=mysqli_real_escape_string($conn, $_POST['customer_id']);
    $title=mysqli_real_escape_string($conn, $_POST['title']);
    $firstName=mysqli_real_escape_string($conn, $_POST['first_name']);
    $middleName=mysqli_real_escape_string($conn, $_POST['middle_name']);
    $lastName=mysqli_real_escape_string($conn, $_POST['last_name']);
    $contactNumber=mysqli_real_escape_string($conn, $_POST['contact_no']);
    $district=mysqli_real_escape_string($conn, $_POST['district']);

    

    $query = "UPDATE customer SET title='$title', first_name='$firstName', middle_name='$middleName', last_name='$lastName', contact_no='$contactNumber', district='$district' WHERE id='$customerID' ";
    $query_run= mysqli_query($conn, $query);
    

    if ($query_run){
        $_SESSION['message']= "Customer Updated Successfully";
        header("Location:index.php");
        exit(0);
    }
    else{
        $_SESSION['message']= "Customer Update Failed";
        header("Location:index.php");
        exit(0);
    }
}

//customer details save
if (isset($_POST['save_customer'])){
    $title=mysqli_real_escape_string($conn, $_POST['title']);
    $firstName=mysqli_real_escape_string($conn, $_POST['first_name']);
    $middleName=mysqli_real_escape_string($conn, $_POST['middle_name']);
    $lastName=mysqli_real_escape_string($conn, $_POST['last_name']);
    $contactNumber=mysqli_real_escape_string($conn, $_POST['contact_no']);
    $district=mysqli_real_escape_string($conn, $_POST['district']);

    $query = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district)
    VALUES ('$title', '$firstName', '$middleName', '$lastName', '$contactNumber', $district)";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message']= "Customer Created Successfully";
        header("Location:index.php");
        exit(0);
    }
    else{
        $_SESSION['message']= "Customer Create Failed";
        header("Location:index.php");
        exit(0);
    }
}

//customer details delete
if (isset($_POST['delete_customer'])){
    $customerID=mysqli_real_escape_string($conn, $_POST['delete_customer']);
    $query="DELETE FROM customer WHERE id='$customerID' ";
    $query_run=mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message']= "Customer Deleted Successfully";
        header("Location:index.php");
        exit(0);
    }
    else{
        $_SESSION['message']= "Customer Delete Failed";
        header("Location:index.php");
        exit(0);
    }
}

//item details save
if (isset($_POST['save_item'])){
    $itemCode=mysqli_real_escape_string($conn, $_POST['item_code']);
    $itemCategory=mysqli_real_escape_string($conn, $_POST['item_category']);
    $itemSubcategory=mysqli_real_escape_string($conn, $_POST['item_subcategory']);
    $itemName=mysqli_real_escape_string($conn, $_POST['item_name']);
    $quantity=mysqli_real_escape_string($conn, $_POST['quantity']);
    $unitPrice=mysqli_real_escape_string($conn, $_POST['unit_price']);

    $query = "INSERT INTO item (item_code, item_category, item_subcategory, item_name, quantity, unit_price)
    VALUES ('$itemCode', '$itemCategory', '$itemSubcategory', '$itemName', '$quantity', $unitPrice)";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message']= "Item Created Successfully";
        header("Location:item.php");
        exit(0);
    }
    else{
        $_SESSION['message']= "Item Create Failed";
        header("Location:item.php");
        exit(0);
    }
}

//item details update
if(isset($_POST['update_item'])){
    $itemID=mysqli_real_escape_string($conn, $_POST['item_id']);
    $itemCode=mysqli_real_escape_string($conn, $_POST['item_code']);
    $itemCategory=mysqli_real_escape_string($conn, $_POST['item_category']);
    $itemSubcategory=mysqli_real_escape_string($conn, $_POST['item_subcategory']);
    $itemName=mysqli_real_escape_string($conn, $_POST['item_name']);
    $quantity=mysqli_real_escape_string($conn, $_POST['quantity']);
    $unitPrice=mysqli_real_escape_string($conn, $_POST['unit_price']);

    

    $query = "UPDATE item SET item_code='$itemCode', item_category='$itemCategory', item_subcategory='$itemSubcategory', item_name='$itemName', quantity='$quantity', unit_price='$unitPrice' WHERE id='$itemID' ";
    $query_run= mysqli_query($conn, $query);
    

    if ($query_run){
        $_SESSION['message']= "Item Updated Successfully";
        header("Location:item.php");
        exit(0);
    }
    else{
        $_SESSION['message']= "Item Update failed";
        header("Location:item.php");
        exit(0);
    }
}

//item details delete
if (isset($_POST['delete_item'])){
    $itemID=mysqli_real_escape_string($conn, $_POST['delete_item']);
    $query="DELETE FROM item WHERE id='$itemID' ";
    $query_run=mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message']= "Item Deleted Successfully";
        header("Location:item.php");
        exit(0);
    }
    else{
        $_SESSION['message']= "Item Delete Failed";
        header("Location:item.php");
        exit(0);
    }
}



?>