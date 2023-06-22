<?php

// Establish a connection to your MySQL database
$servername = "34.172.217.6"; // Change this to your server name
$username = "hydro"; // Change this to your MySQL username
$password = "hydro123"; // Change this to your MySQL password
$dbname = "pranay_funds"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['mobile_number'])){
    $full_name=$_POST['full_name'];
    $mobile_number=$_POST['mobile_number'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $customer = array(
    'name' => $full_name,
    'address' => $address,
    'mobile' => $mobile_number,
    'email' => $email,
);
}else{
    die("No data provided");
}



    // Generate a random 6-digit pin for the customer
    $pin = sprintf('%06d', mt_rand(0, 999999));
    
    // Insert the customer details into the database
    $sql = "INSERT INTO customers (customer_name, customer_address, customer_contact, customer_email, customer_pin, status) VALUES ('" . $customer['name'] . "', '" . $customer['address'] . "', '" . $customer['mobile'] . "', '" . $customer['email'] . "', '" . $pin . "', 1)";
    
    if ($conn->query($sql) === TRUE) {
        echo "New customer record created successfully<br>";
        
        // Get the customer ID of the inserted customer
        $customer_id = $conn->insert_id;
        
        // Generate a new account number for the customer
        $account_number_prefix = '999001';
        $account_number = $account_number_prefix . sprintf('%04d', $customer_id);
        
        // Insert a new account for the customer
        $account_type = 1;
        $account_balance = 0;
        $sql = "INSERT INTO accounts (account_number, account_type, account_balance, customer_id) VALUES ('" . $account_number . "', '" . $account_type . "', '" . $account_balance . "', '" . $customer_id . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New account record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();