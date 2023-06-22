<?php
// Establish a connection to your MySQL database
$servername = "34.172.217.6"; 
$username = "hydro"; 
$password = "hydro123"; 
$dbname = "pranay_funds"; 

// $servername = "localhost";
// $username = "root"; 
// $password = ""; 
// $dbname = "pranay_funds";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['customer_id'])){
    $customer_id=$_POST['customer_id'];
}else{
    $customer_id='38';
}

// Generate a new account number for the customer
$account_number_prefix = '999004';
$account_number = $account_number_prefix . sprintf('%04d', $customer_id);

// Insert a new account for the customer
$account_type = 4;
$account_balance = 0;
$sql = "INSERT INTO accounts (account_number, account_type, account_balance, customer_id) VALUES ('" . $account_number . "', '" . $account_type . "', '" . $account_balance . "', '" . $customer_id . "')";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}