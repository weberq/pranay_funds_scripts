<?php
// display errors 
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
    $loan_id=$_POST['loan_id'];
}else{
    die("No data provided");
}

// Get account id and balance from account number
$sql = "SELECT account_id, account_balance FROM accounts WHERE account_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $account_number);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$balance = $row['account_balance'];

// list of transactions
$sql2 = "SELECT * FROM loan_transactions WHERE loan_id = ? ORDER BY transaction_date DESC";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $loan_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
$transactions = array();
while ($row2 = $result2->fetch_assoc()) {
    $transactions[] = $row2;
}

// print transactions
echo "<table>";
echo "<tr><th>Transaction ID</th><th>Transaction Type</th><th>Transaction Date</th><th>Amount</th></tr>";
foreach ($transactions as $transaction) {
    echo "<tr>";
    echo "<td>" . $transaction['transaction_id'] . "</td>";
    echo "<td>" . $transaction['transaction_type'] . "</td>";
    echo "<td>" . $transaction['transaction_date'] . "</td>";
    echo "<td>" . $transaction['amount'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Close the connection
mysqli_close($conn);
?>