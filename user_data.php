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
        'name' => strtolower($lines[$i]),
        'email' => strtolower($lines[$i + 1]),
        'mobile' => strtolower($lines[$i + 2]),
        'address' => strtolower($lines[$i + 3])
    );
    $customers[] = $customer;
}

// Prepare the SQL statement
$sql = "INSERT INTO customers (customer_name, customer_address, customer_contact, customer_email, customer_pin, status) VALUES (?, ?, ?, ?, ?, 1)";
$stmt = $conn->prepare($sql);

foreach ($customers as $customer) {
    // Generate a random 6-digit pin for the customer
    $pin = sprintf('%06d', mt_rand(0, 999999));
    
    // Bind the parameters to the prepared statement
    $stmt->bind_param("sssss", $customer['name'], $customer['address'], $customer['mobile'], $customer['email'], $pin);
    
    // Execute the prepared statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
fclose($file);

?>