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
            Account Info
        </div>
        <div class="card-body">
            <form action="../loan_account_creater.php" method="post">
                <div class="form-group">
                    <label for="mobile_number">Customer Id</label>
                    <input type="text" class="form-control" id="mobile_number" name="customer_id"
                        placeholder="Customer Id">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

</body>

</html>