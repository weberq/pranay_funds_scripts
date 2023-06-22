<?php

// Establish a connection to your MySQL database
// $servername = "34.172.217.6"; 
// $username = "hydro"; 
// $password = "hydro123"; 
// $dbname = "pranay_funds"; 

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "pranay_funds";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$file = fopen("sample.txt", "r");

// Read contents of the file into a string
$customers_input = fread($file, filesize("sample.txt"));

// Split input into lines
$lines = explode("\n", $customers_input);

// Initialize customers array
$customers = array();

// Loop through lines and store customer information
for ($i = 0; $i < count($lines); $i += 4) {
    $customer = array(
        'name' => $lines[$i],
        'email' => $lines[$i + 1],
        'mobile' => $lines[$i + 2],
        'address' => $lines[$i + 3]
    );
    $customers[] = $customer;
}

foreach ($customers as $customer) {
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
}

// Close the database connection
$conn->close();
fclose($file);

?>