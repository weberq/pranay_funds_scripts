// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all users from the customers table
$sql = "SELECT customer_id, customer_name FROM customers";
$result = mysqli_query($conn, $sql);

// Check if any users were found
if (mysqli_num_rows($result) > 0) {
    // Output data of each user
    while($row = mysqli_fetch_assoc($result)) {
        echo "Customer ID: " . $row["customer_id"]. " - Name: " . $row["customer_name"]. "<br>";
    }
} else {
    echo "No users found.";
}

// Close the database connection
mysqli_close($conn);
