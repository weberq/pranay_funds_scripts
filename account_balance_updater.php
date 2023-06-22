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

$sql="SELECT * FROM accounts WHERE account_type='1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $account_id=$row["account_id"];
        $account_number=$row["account_number"];
        $account_balance=0;
        $account_type=$row["account_type"];
        $customer_id=$row["customer_id"];
        $status=$row["status"];
        $sql1="SELECT * FROM transactions WHERE account_id=$account_id";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                $transaction_id=$row1["transaction_id"];
                $transaction_type=$row1["transaction_type"];
                $transaction_date=$row1["transaction_date"];
                $amount=$row1["amount"];
                $account_id=$row1["account_id"];
                if($transaction_type=="credit"){
                    $account_balance=$account_balance+$amount;
                }
                else{
                    $account_balance=$account_balance-$amount;
                }
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