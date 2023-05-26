<?php

// show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

$query="SELECT * FROM loans";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $loan_id=$row["loan_id"];
        $customer_id=$row["customer_id"];
    $loan_type=$row["loan_type"];
    $loan_amount=$row["loan_sanctioned"];
    $loan_duration=$row["loan_duration"];
    $interest_rate=$row["interest_rate"];
    $loan_date=$row["loan_date"];
    $without_intrest_month = $loan_amount/$loan_duration;
    $intrest = $loan_amount*($interest_rate/100);
    $emi = $without_intrest_month + $intrest;
    $emi = round($emi);
    $emi_total = $emi * $loan_duration;

    $query2 = "UPDATE loans SET total_payable='$emi_total' WHERE loan_id='$loan_id'";

    if($conn->query($query2) === TRUE){
        echo "Record updated successfully";
    }else{
        echo "Error updating record: " . $conn->error;
    }
}
}else {
    echo "0 results";
}