<?php
// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establish a connection to your MySQL database
// $servername = "34.172.217.6"; 
// $username = "hydro"; 
// $password = "hydro123"; 
// $dbname = "pranay_funds"; 

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "pranay_funds";


// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Open the CSV file
$file = fopen("tran.csv", "r");

// Read the header row
$headers = fgetcsv($file);

// Loop through each row of data
while (($row = fgetcsv($file)) !== false) {
    $account_number = $row[0];
    $transaction_date = date('Y-m-d', strtotime($row[1]));
    $amount = floatval($row[2]);

    // Determine transaction type (credit or debit)
    $transaction_type = ($amount >= 0) ? 'credit' : 'debit';

    // Get the account ID for the given account number
    $query = "SELECT account_id FROM accounts WHERE account_number = '$account_number'";
    $result = $conn->query($query);
    $account_id = ($result->num_rows > 0) ? $result->fetch_assoc()['account_id'] : null;

    if ($account_id !== null) {
        // Insert the transaction into the database
        $query = "INSERT INTO transactions (transaction_type, transaction_date, amount, account_id) VALUES ('$transaction_type', '$transaction_date', $amount, $account_id)";
        if ($conn->query($query) === true) {
            echo "Transaction successfully inserted into the database.\n";
        } else {
            echo "Error inserting transaction into the database: " . $conn->error . "\n";
        }
    } else {
        echo "Error: Could not find account with account number $account_number.\n";
    }
}

// Close the file and database connection
fclose($file);
$conn->close();