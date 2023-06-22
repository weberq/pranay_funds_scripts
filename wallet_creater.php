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

$sql="SELECT * FROM customers WHERE customer_id NOT IN (SELECT customer_id FROM reward_wallet)";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $customer_id=$row["customer_id"];
        $sql1="INSERT INTO `reward_wallet` (`wallet_id`, `customer_id`, `balance`) VALUES (NULL, '$customer_id', '0')";
        if ($conn->query($sql1) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}