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

// $account_number=$_POST['account_number'];
// $amount=$_POST['amount'];
// $transaction_type=$_POST['transaction_type'];
// $transaction_date=$_POST['transaction_date'];

if(isset($_POST['account_number'])){
    $account_number=$_POST['account_number'];
    $amount=$_POST['amount'];
    $transaction_type=$_POST['transaction_type'];
    $transaction_date=$_POST['transaction_date'];
}else{
    die("No data provided");
}

// Get account id and balance from account number
$sql = "SELECT customer_id FROM accounts WHERE account_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $account_number);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$customer_id = $row['customer_id'];

$sql2="SELECT * FROM reward_wallet WHERE customer_id=$customer_id";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();
$reward_balance = $row2['balance'];
$wallet_id = $row2['wallet_id'];


// Prepare the SQL statement
$sql3 = "INSERT INTO reward_transactions (transaction_type, transaction_date, amount, wallet_id) VALUES (?, ?, ?, ?)";
$stmt3 = $conn->prepare($sql3);

// Bind the parameters to the prepared statement
$stmt3->bind_param("ssss", $transaction_type, $transaction_date, $amount, $wallet_id);

// Execute the prepared statement
if ($stmt3->execute() === TRUE) {
    if($transaction_type=="credit"){
        $reward_balance=$reward_balance+$amount;
    }
    else{
        $reward_balance=$reward_balance-$amount;
    }
    $sql4="UPDATE reward_wallet SET balance=$reward_balance WHERE wallet_id=$wallet_id";
    if ($conn->query($sql4) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Error: " . $stmt3->error;
}