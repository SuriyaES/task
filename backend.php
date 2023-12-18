<?php
//Database connection file
include "db_connect.php";
if(isset($_POST['submit'])) {
    $invoice_no=$_POST['invoice_no'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $bank = $_POST['bank'];
    $bank_address = $_POST['bank_address'];
    $account_holder = $_POST['account_holder'];
    $account_no = $_POST['account_no'];
    $branch_code = $_POST['branch_code'];
    $ifsc = $_POST['ifsc'];

    // Loop through the submitted products and prices
    foreach ($_POST['product'] as $key => $product) {
        $price = $_POST['price'][$key];

        // Perform the SQL insertion
        $sql = "INSERT INTO invoice (name, phone, address, product, price, bank, bank_address, account_holder, account_no, branch_code, ifsc, invoice_no) VALUES ('$name', '$phone', '$address', '$product', '$price', '$bank', '$bank_address', '$account_holder', '$account_no', '$branch_code', '$ifsc', '$invoice_no')";
        
        $query = mysqli_query($conn, $sql);
        if($query) {
            header('location:index.php');
        }
    }
}
?>
