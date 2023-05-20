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
    <!-- simple boostrap form for account info from mobile number in a card-->
    <div class="card">
        <div class="card-header">
            Loan List Transactions
        </div>
        <div class="card-body">
            <form action="../loan_list_transactions.php" method="post">
                <div class="form-group">
                    <label for="account_number">Account Number</label>
                    <input type="text" class="form-control" id="account_number" name="account_number"
                        placeholder="Enter Account Number">
                </div>
                <!-- loan Id  -->
                <div class="form-group">
                    <label for="loan_id">Loan Id</label>
                    <input type="text" class="form-control" id="loan_id" name="loan_id" placeholder="Enter Loan Id">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

</body>

</html>