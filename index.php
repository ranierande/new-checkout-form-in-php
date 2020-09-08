<?php
$name =  isset($_POST['name']) ? $_POST['name']: '';
$mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number']: '';
$address = isset($_POST['address']) ?  $_POST['address']: '';
$email = isset($_POST['email']) ? $_POST['email']:'';
$product_name = isset($_POST['product_name']) ? $_POST['product_name']: '';
$quantity =  isset($_POST['quantity']) ? $_POST['quantity']: '';
$payment_methode  = isset($_POST['payment_methode']) ? $_POST['payment_methode']: '';

// Create connection
$conn = new mysqli ('localhost:3307','root','','customer');
if ($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}
else{
$stmt = $conn->prepare("insert into employee (name, mobile_number, address, email, product_name, quantity, payment_methode)
values (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sssssis' ,$name, $mobile_number, $address, $email, $product_name, $quantity, $payment_methode);
$stmt ->execute();
echo "New record is inserted sucessfully";
$stmt ->close();
$conn->close();
}
?>