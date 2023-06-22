<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- boostrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        crossorigin="anonymous">
    <!-- all boostrap js and jquery  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</head>

<body>
    <!-- simple boostrap form for creating account in a card-->
    <div class="card">
        <div class="card-header">
            Add Loan Transaction
        </div>
        <div class="card-body">
            <form action="../loan_transactions.php" method="post">
                <!-- Full Name  -->
                <div class="form-group">
                    <label for="Fuaccount_numberll_Name">Account Number</label>
                    <input type="text" class="form-control" id="account_number" name="account_number"
                        placeholder="Enter Account Number">
                </div>
                <!-- amount  -->
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                </div>
                <!-- transaction type  -->
                <div class="form-group">
                    <label for="transaction_type">Transaction Type</label>
                    <select class="form-control" id="transaction_type" name="transaction_type">
                        <option value="credit">credit</option>
                        <option value="debit">debit</option>
                    </select>
                </div>
                <!-- transaction date  -->
                <div class="form-group">
                    <label for="transaction_date">Transaction Date</label>
                    <input type="date" class="form-control" id="transaction_date" name="transaction_date"
                        placeholder="Enter Transaction Date">
                </div>
                <!-- loan Id -->
                <div class="form-group">
                    <label for="loan_id">Loan Id</label>
                    <input type="text" class="form-control" id="loan_id" name="loan_id" placeholder="Enter Loan Id">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

</body>

</html>