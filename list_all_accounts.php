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

$query="SELECT *,`customers`.`customer_name` FROM accounts,`customers` WHERE `accounts`.`customer_id`=`customers`.`customer_id` AND `accounts`.`account_type`='4'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    $accounts = array();
    while($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }
} else {
    echo "0 results";
}

// print all rows in the table
// print_r($accounts);

// print all rows in the table
foreach($accounts as $account){
    ?>
<table>
    <tr>
        <td><?php echo $account["customer_name"]; ?></td>
        <td><?php echo $account["account_number"]; ?></td>
        <td><?php echo $account["account_balance"]; ?></td>
    </tr>
</table>
<?php
    // echo $account["customer_name"]." ".$account["account_number"]." ".$account["account_balance"]." ".$account["account_type"]." ".$account["customer_id"]." ".$account["status"]."<br>";
}