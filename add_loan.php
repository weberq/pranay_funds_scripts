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

if(isset($_POST['customer_id'])){
    $customer_id=$_POST['customer_id'];
    $loan_type=$_POST['loan_type'];
    $loan_amount=$_POST['loan_amount'];
    $loan_duration=$_POST['loan_duration'];
    $interest_rate=$_POST['loan_interest'];
    $loan_date=$_POST['loan_start_date'];
    $loan_status='1';
    $without_intrest_month = $loan_amount/$loan_duration;
    $intrest = $loan_amount*($interest_rate/100);
    $emi = $without_intrest_month + $intrest;
    $emi = round($emi);
    $emi_total = $emi * $loan_duration;
}else{
die("No data provided");
// data
// $customer_id='36';
// $loan_type='1';
// $loan_amount='8000';
// $loan_duration='1';
// $interest_rate='1';
// $loan_date='2023-04-05';
$loan_status='1';
$without_intrest_month = $loan_amount/$loan_duration;
$intrest = $loan_amount*($interest_rate/100);
$emi = $without_intrest_month + $intrest;
$emi = round($emi);
$emi_total = $emi * $loan_duration;
}

// check if customer has an loan account
$sql = "SELECT * FROM accounts WHERE customer_id='$customer_id 'AND account_type='4'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    // customer has an loan account
    // get the account_id
    $row = $result->fetch_assoc();
    $account_id=$row["account_id"];
    // insert a new loan
    $sql = "INSERT INTO loans (loan_type, loan_amount, loan_duration, interest_rate, loan_date, loan_status, account_id , customer_id) VALUES ('" . $loan_type . "', '" . $loan_amount . "', '" . $loan_duration . "', '" . $interest_rate . "', '" . $loan_date . "', '" . $loan_status . "', '" . $account_id . "','" . $customer_id . "')";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // update the account balance
        $sql = "SELECT * FROM accounts WHERE customer_id=$customer_id AND account_type=4";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $account_balance=$row["account_balance"];
        $account_balance=$account_balance-$emi_total;
        $sql = "UPDATE accounts SET account_balance=$account_balance WHERE customer_id=$customer_id AND account_type=4";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
else{
    // customer does not have an loan account
    // generate a new account number for the customer
    $account_number_prefix = '999004';
    $account_number = $account_number_prefix . sprintf('%04d', $customer_id);
    // insert a new account for the customer
    $account_type = 4;
    $account_balance = 0;
    $sql = "INSERT INTO accounts (account_number, account_type, account_balance, customer_id) VALUES ('" . $account_number . "', '" . $account_type . "', '" . $account_balance . "', '" . $customer_id . "')";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // get the account_id
        $sql = "SELECT * FROM accounts WHERE customer_id=$customer_id AND account_type=4";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $account_id=$row["account_id"];
        // insert a new loan
        $sql = "INSERT INTO loans (loan_type, loan_amount, loan_duration, interest_rate, loan_date, loan_status, account_id, customer_id) VALUES ('" . $loan_type . "', '" . $loan_amount . "', '" . $loan_duration . "', '" . $interest_rate . "', '" . $loan_date . "', '" . $loan_status . "', '" . $account_id . "','" . $customer_id . "')";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            // update the account balance
            $sql = "SELECT * FROM accounts WHERE customer_id=$customer_id AND account_type=4";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $account_balance=$row["account_balance"];
            $account_balance=$account_balance-$emi_total;
            $sql = "UPDATE accounts SET account_balance=$account_balance WHERE customer_id=$customer_id AND account_type=4";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>