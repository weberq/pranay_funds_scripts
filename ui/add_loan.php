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
            Add Loan
        </div>
        <div class="card-body">
            <form action="../add_loan.php" method="post">
                <!-- Full Name  -->
                <div class="form-group">
                    <label for="customer_id">Customer Id</label>
                    <input type="text" class="form-control" id="customer_id" name="customer_id"
                        placeholder="Enter Full Name">
                </div>
                <!-- loan type  -->
                <div class="form-group">
                    <label for="loan_type">Loan Type</label>
                    <input type="text" class="form-control" id="loan_type" name="loan_type"
                        placeholder="Enter Loan Type">
                </div>
                <!-- loan amount  -->
                <div class="form-group">
                    <label for="loan_amount">Loan Amount</label>
                    <input type="text" class="form-control" id="loan_amount" name="loan_amount"
                        placeholder="Enter Loan Amount">
                </div>
                <!-- loan duration  -->
                <div class="form-group">
                    <label for="loan_duration">Loan Duration</label>
                    <input type="text" class="form-control" id="loan_duration" name="loan_duration"
                        placeholder="Enter Loan Duration">
                </div>
                <!-- loan interest  -->
                <div class="form-group">
                    <label for="loan_interest">Loan Interest</label>
                    <input type="text" class="form-control" id="loan_interest" name="loan_interest"
                        placeholder="Enter Loan Interest">
                </div>
                <!-- loan start date  -->
                <div class="form-group">
                    <label for="loan_start_date">Loan Start Date</label>
                    <input type="date" class="form-control" id="loan_start_date" name="loan_start_date"
                        placeholder="Enter Loan Start Date">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

</body>

</html>