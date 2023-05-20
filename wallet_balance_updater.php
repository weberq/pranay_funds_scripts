<?php
// show errors
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

$sql="SELECT * FROM reward_wallet";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $wallet_id=$row["wallet_id"];
        $customer_id=$row["customer_id"];
        $balance=$row["balance"];
        $sql1="SELECT * FROM reward_transactions WHERE wallet_id=$wallet_id";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                $transaction_id=$row1["transaction_id"];
                $transaction_type=$row1["transaction_type"];
                $transaction_date=$row1["transaction_date"];
                $amount=$row1["amount"];
                $wallet_id=$row1["wallet_id"];
                if($transaction_type=="credit"){
                    $balance=$balance+$amount;
                }
                else{
                    $balance=$balance-$amount;
                }
            }
            
        }
        $sql2="UPDATE reward_wallet SET balance=$balance WHERE wallet_id=$wallet_id";
        if ($conn->query($sql2) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }

}