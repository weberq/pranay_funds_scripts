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
    $loan_id=$_POST['loan_id'];
}else{
    die("No data provided");
    // data
    // $account_number='1234567890';
    // $amount='1000';
    // $transaction_type='credit';
    // $transaction_date='2023-04-05';
    // $loan_id='1';
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
$status = '1';

// Prepare the SQL statement
$sql2 = "INSERT INTO loan_transactions (transaction_type, transaction_date, amount, loan_id, status ) VALUES (?, ?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql2);

// Bind the parameters to the prepared statement
$stmt2->bind_param("sssss", $transaction_type, $transaction_date, $amount, $loan_id, $status);

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
        // update emi paid
        $sql4 = "SELECT * FROM loans WHERE loan_id = ?";
        $stmt4 = $conn->prepare($sql4);
        $stmt4->bind_param("s", $loan_id);
        $stmt4->execute();
        $result4 = $stmt4->get_result();
        $row4 = $result4->fetch_assoc();
        $emi_paid = $row4['emi_paid'];
        if($transaction_type=="credit"){
            $emi_paid=$emi_paid+$amount;
        }
        else{
            $emi_paid=$emi_paid-$amount;
        }
        $sql5="UPDATE loans SET emi_paid=$emi_paid WHERE loan_id=$loan_id";
        if ($conn->query($sql5) === TRUE) {
            echo "Record updated successfully";
            // calculate remaining emi
            $sql6 = "SELECT * FROM loans WHERE loan_id = ?";
            $stmt6 = $conn->prepare($sql6);
            $stmt6->bind_param("s", $loan_id);
            $stmt6->execute();
            $result6 = $stmt6->get_result();
            $row6 = $result6->fetch_assoc();
            $loan_amount = $row6['loan_amount'];
            $loan_duration = $row6['loan_duration'];
            $intrerest_rate = $row6['interest_rate'];
            $without_intrest_month = $loan_amount/$loan_duration;
            $intrest = $loan_amount*($intrerest_rate/100);
            $emi = $without_intrest_month + $intrest;
            $emi = round($emi);
            $emi_total = $emi * $loan_duration;

            echo "EMI :".$emi.PHP_EOL;
            echo "EMI Total :".$emi_total.PHP_EOL;
            // calculate remaining emi
            $sql7 = "SELECT * FROM loans WHERE loan_id = ?";
            $stmt7 = $conn->prepare($sql7);
            $stmt7->bind_param("s", $loan_id);
            $stmt7->execute();
            $result7 = $stmt7->get_result();
            $row7 = $result7->fetch_assoc();
            $emi_paid = $row7['emi_paid'];
            $emi_remaining = $emi_total - $emi_paid;
            echo "EMI Remaining :".$emi_remaining;

            // print emi table
            $monthly_emi = $emi;
            $paid_amount = $emi_paid;
            $num_of_emis = $loan_duration;
            $pending_emis = [];
            $extra_payment = 0;

            for ($i = 0; $i < $num_of_emis; $i++) {
                $pending_emi = $monthly_emi;
                if ($i === 0) {
                    $pending_emi -= $paid_amount;
                    if ($pending_emi < 0) {
                        $extra_payment = abs($pending_emi);
                        $pending_emi = 0;
                    }
                } else if ($extra_payment > 0) {
                    $pending_emi -= $extra_payment;
                    if ($pending_emi < 0) {
                        $extra_payment = abs($pending_emi);
                        $pending_emi = 0;
                    } else {
                        $extra_payment = 0;
                    }
                }
                $pending_emis[] = $pending_emi;
            }

?>

<table>
    <thead>
        <tr>
            <th>EMI No.</th>
            <th>EMI Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pending_emis as $i => $emi): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo number_format($emi, 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php


            // end of emi table

        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Error: " . $stmt->error;
}