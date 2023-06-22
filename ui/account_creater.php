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
            Account Info
        </div>
        <div class="card-body">
            <form action="../account_creater.php" method="post">
                <!-- Full Name  -->
                <div class="form-group">
                    <label for="Full_Name">Full Name</label>
                    <input type="text" class="form-control" id="Full_Name" name="full_name"
                        placeholder="Enter Full Name">
                </div>
                <!-- Mobile Number  -->
                <div class="form-group">
                    <label for="Mobile_Number">Mobile Number</label>
                    <input type="text" class="form-control" id="Mobile_Number" name="mobile_number"
                        placeholder="Enter Mobile Number">
                </div>
                <!-- Email  -->
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" id="Email" name="email" placeholder="Enter Email">
                </div>
                <!-- Address  -->
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" name="address" placeholder="Enter Address">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

</body>

</html>