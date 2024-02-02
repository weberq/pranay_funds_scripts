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

// get today's date
$today = date("Y-m-d");

// get the sum of all account balances
$sql = "SELECT SUM(account_balance) AS total_balance FROM accounts WHERE account_type='1' OR account_type='2' OR account_type='3'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_balance = $row['total_balance'];

// get the difference between the sum of all laon amount and sum of emi paid
$sql2 = "SELECT SUM(account_balance) AS total_loan_amount FROM accounts WHERE account_type='4'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$total_loan_amount = $row2['total_loan_amount'];

// get the sum of all reward balances
$sql4 = "SELECT SUM(balance) AS total_reward_balance FROM reward_wallet";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();
$total_reward_balance = $row4['total_reward_balance'];

$net_amount = $total_balance + $total_reward_balance;

// get the sum of all credit transactions
$sql3 = "SELECT SUM(amount) AS total_credit FROM transactions WHERE transaction_type='credit'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$total_credit = $row3['total_credit'];

// get the sum of all debit transactions
$sql5 = "SELECT SUM(amount) AS total_debit FROM transactions WHERE transaction_type='debit'";
$result5 = $conn->query($sql5);
$row5 = $result5->fetch_assoc();
$total_debit = $row5['total_debit'];

// total deficiency
if($total_loan_amount > $net_amount){
    $total_deficiency = $total_loan_amount + $net_amount;
}else{
    $total_deficiency = ($net_amount + $total_loan_amount) * -1;
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- boostrap css  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        crossorigin="anonymous">
    <!-- all boostrap js and jquery  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <!-- fontawesome cdn  -->
    <script src="https://kit.fontawesome.com/4dc0251910.js" crossorigin="anonymous"></script>


    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins&display=swap');

    body {
        background: #f2f2f2;
        font-family: 'Poppins', sans-serif;
    }

    .social-box .box {
        background: #FFF;
        border-radius: 10px;
        cursor: pointer;
        margin: 20px 0;
        padding: 40px 10px;
        transition: all 0.5s ease-out;
    }

    .social-box .box:hover {
        box-shadow: 0 0 6px #4183D7;
    }

    .social-box .box-text {
        font-size: 15px;
        line-height: 30px;
        margin: 20px 0;
    }

    .social-box .box-btn a {
        color: #4183D7;
        font-size: 16px;
        text-decoration: none;
    }

    .social-box .fa {
        color: #4183D7;
        margin-bottom: 0.5em;
    }
    </style>
</head>

<body>

    <!-- header  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pranay Funds Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarNavDropdown" style="">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- container  -->
    <div class="container">
        <!-- cards conatiner  -->
        <div>
            <!-- cards  -->
            <div class="social-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-xs-12 text-center">
                            <div class="box">
                                <i class="fa fa-piggy-bank fa-3x" aria-hidden="true"></i>
                                <div class="box-title">
                                    <h3>Rs. <?php echo $net_amount; ?></h3>
                                </div>
                                <div class="box-text">
                                    <span>Total Saving Account Balance</span>
                                </div>
                                <div class="box-btn">
                                    <a href="#">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-xs-12  text-center">
                            <div class="box">
                                <i class="fa fa-landmark fa-3x" aria-hidden="true"></i>
                                <div class="box-title">
                                    <h3>Rs. <?php echo $total_loan_amount; ?></h3>
                                </div>
                                <div class="box-text">
                                    <span>Total Pending Loans</span>
                                </div>
                                <div class="box-btn">
                                    <a href="#">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-xs-12 text-center">
                            <div class="box">
                                <i class="fa fa-plus-minus fa-3x" aria-hidden="true"></i>
                                <div class="box-title">
                                    <h3>Rs. <?php echo $total_deficiency;  ?></h3>
                                </div>
                                <div class="box-text">
                                    <span>Total Deficit</span>
                                </div>
                                <div class="box-btn">
                                    <a href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <!-- total_credit  -->
                        <div class="col-lg-4 col-xs-12 text-center">
                            <div class="box">
                                <i class="fa fa-plus-minus fa-3x" aria-hidden="true"></i>
                                <div class="box-title">
                                    <h3>Rs. <?php echo $total_credit;  ?></h3>
                                </div>
                                <div class="box-text">
                                    <span>Total Credit</span>
                                </div>
                                <div class="box-btn">
                                    <a href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <!-- total_debit  -->
                        <div class="col-lg-4 col-xs-12 text-center">
                            <div class="box">
                                <i class="fa fa-plus-minus fa-3x" aria-hidden="true"></i>
                                <div class="box-title">
                                    <h3>Rs. <?php echo $total_debit;  ?></h3>
                                </div>
                                <div class="box-text">
                                    <span>Total Debit</span>
                                </div>
                                <div class="box-btn">
                                    <a href="#">Learn More</a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>