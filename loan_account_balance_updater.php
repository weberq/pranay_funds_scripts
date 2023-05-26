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

$sql="SELECT * FROM accounts WHERE account_type='4' AND account_number='9990040076'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $account_id=$row["account_id"];
        $account_number=$row["account_number"];
        $account_balance=0;
        $account_type=$row["account_type"];
        $customer_id=$row["customer_id"];
        $sql1="SELECT * FROM loans WHERE account_id=$account_id";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                $loan_id=$row1["loan_id"];
                $loan_type=$row1["loan_type"];
                $loan_amount=$row1["loan_sanctioned"];
                $loan_duration=$row1["loan_duration"];
                $interest_rate=$row1["interest_rate"];
                $loan_date=$row1["loan_date"];
                $emi_paid=$row1["emi_paid"];
                $without_intrest_month = $loan_amount/$loan_duration;
                $intrest = $loan_amount*($interest_rate/100);
                $emi = $without_intrest_month + $intrest;
                $emi = round($emi);
                $emi_total = $emi * $loan_duration;
                $account_balance = $account_balance - $emi_total + $emi_paid;
            }
        }
        $sql2="UPDATE accounts SET account_balance=$account_balance WHERE account_id=$account_id";
        if ($conn->query($sql2) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "0 results";
}