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

if(isset($_POST['account_number'])){
    $account_number=$_POST['account_number'];
    $amount=$_POST['amount'];
    $transaction_type=$_POST['transaction_type'];
    $transaction_date=$_POST['transaction_date'];
}else{
    die("No data provided");
    // data
    // $account_number='1234567890';
    // $amount='1000';
    // $transaction_type='credit';
    // $transaction_date='2023-04-05';
}

// Get account id and balance from account number
$sql = "SELECT account_id, account_balance FROM accounts WHERE account_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $account_number);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$account_id = $row['account_id'];
$balance = $row['account_balance'];

// Prepare the SQL statement
$sql2 = "INSERT INTO transactions (transaction_type, transaction_date, amount, account_id) VALUES (?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql2);

// Bind the parameters to the prepared statement
$stmt2->bind_param("ssss", $transaction_type, $transaction_date, $amount, $account_id);

// Execute the prepared statement
if ($stmt2->execute() === TRUE) {
    if($transaction_type=="credit"){
        $balance=$balance+$amount;
    }
    else{
        $balance=$balance-$amount;
    }
    $sql3="UPDATE accounts SET account_balance=$balance WHERE account_id=$account_id";
    if ($conn->query($sql3) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Error: " . $stmt->error;
}