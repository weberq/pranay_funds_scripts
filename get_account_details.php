<?php
// print all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establish a connection to your MySQL database
$servername = "34.172.217.6"; // Change this to your server name
$username = "hydro"; // Change this to your MySQL username
$password = "hydro123"; // Change this to your MySQL password
$dbname = "pranay_funds"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// data
if(isset($_POST['mobile_number'])){
    $customer_contact=$_POST['mobile_number'];
}else{
$customer_contact='9014898012';
}

// Get customer id from customer contact
$sql = "SELECT * FROM customers WHERE customer_contact = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $customer_contact);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if($row==NULL){
    echo "No Customer Found";
    exit();
}else{
$customer_id = $row['customer_id'];
$customer_name = $row['customer_name'];
$customer_contact = $row['customer_contact'];
$customer_address = $row['customer_address'];
$customer_email = $row['customer_email'];

// Get account id from customer id
$sql2 = "SELECT * FROM accounts WHERE customer_id = ? AND account_type='1'";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("s", $customer_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();
$saving_account_id = $row2['account_id'];
$saving_account_number = $row2['account_number'];
$saving_account_balance = $row2['account_balance'];

echo "Customer ID: ".$customer_id."<br>";
echo "Customer Name: ".$customer_name."<br>";
echo "Customer Contact: ".$customer_contact."<br>";
echo "Customer Address: ".$customer_address."<br>";
echo "Customer Email: ".$customer_email."<br>";
echo "Saving Account Number: ".$saving_account_number."<br>";
echo "Saving Account Balance: ".$saving_account_balance."<br>";

// Get loan id from customer id
$sql3 = "SELECT * FROM accounts WHERE customer_id = ? AND account_type='4'";
$stmt3 = $conn->prepare($sql3);
$stmt3->bind_param("s", $customer_id);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();
if($row3==NULL){
    echo "No Loan Account Found";
    exit();
}else{
    $loan_account_id = $row3['account_id'];
    $loan_account_number = $row3['account_number'];
    $loan_account_balance = $row3['account_balance'];
    echo "Loan Account Number: ".$loan_account_number."<br>";
    echo "Loan Account Balance: ".$loan_account_balance."<br>";
    // Registered  all Loan Details
    $sql4 = "SELECT * FROM loans WHERE account_id = ?";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->bind_param("s", $loan_account_id);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $i=1;
    while($row4 = $result4->fetch_assoc()){
        $loan_id=$row4['loan_id'];
        $loan_amount=$row4['loan_amount'];
        $loan_interest=$row4['interest_rate'];
        // Print All Data
        echo $i."- Loan ID: ".$loan_id."<br>";
        echo $i."- Loan Amount: ".$loan_amount."<br>";
        echo $i." - Loan Interest: ".$loan_interest."<br>";
        $i++;
    }
}

}

// Close the connection
$conn->close();
?>