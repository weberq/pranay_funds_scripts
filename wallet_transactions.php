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

// Open the CSV file for reading
$file = fopen("rewards.csv", "r");

// Read the first row (header row) and discard it
$headers = fgetcsv($file);

// Loop through the remaining rows and store transaction information
while (($row = fgetcsv($file)) !== FALSE) {
    $account_number = $row[0];
    echo "Account number: $account_number<br>";
    for ($i = 1; $i < count($row); $i++) {
        $transaction_date = date('Y-m-d', strtotime($headers[$i]));
        $amount = $row[$i];
        if($amount!='') {
        $transaction_type = $amount >= 0 ? 'credit' : 'debit';
        try {$amount = abs($amount);} catch (Exception $e) {echo 'Caught exception: ',  $e->getMessage(), " for account number $account_number and transaction date $transaction_date and amount $amount <br>";}
        
            // Retrieve the account_id for the given account_number
        $account_query = "SELECT customer_id FROM accounts WHERE account_number = '$account_number'";
        $account_result = $conn->query($account_query);
        if ($account_result->num_rows > 0) {
            $account = $account_result->fetch_assoc();
            $customer_id = $account['customer_id'];
            $wallet_query = "SELECT wallet_id FROM reward_wallet WHERE customer_id = $customer_id";
            $wallet_result = $conn->query($wallet_query);
            if ($wallet_result->num_rows > 0) {
                $wallet = $wallet_result->fetch_assoc();
                $wallet_id = $wallet['wallet_id'];
            } else {
                echo "Error: Wallet not found for customer id $customer_id<br>";
            }
            
            // Insert the transaction into the database
            $transaction_query = "INSERT INTO reward_transactions (transaction_type, transaction_date, amount, wallet_id, description) VALUES ('$transaction_type', '$transaction_date', $amount, $wallet_id, NULL)";
            if ($conn->query($transaction_query) === TRUE) {
                echo "New transaction created successfully<br>";
            } else {
                echo "Error: " . $transaction_query . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Account not found for account number $account_number<br>";
        }
            
        }


    }
}

// Close the file and the database connection
fclose($file);
$conn->close();

?>