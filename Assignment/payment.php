<?php
$servername =  "localhost";
$username = "root";
$password = "";
$dbname = "auctionwebsite"; // Change it based on your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $fullName = $_POST['full_name'];
    $address = $_POST['address'];
    $dateOfBirth = $_POST['DateOfBirth'];
    $gender = $_POST['gender'];
    $paymentMethod = $_POST['payment_Method'];
    $cardNumber = $_POST['cardNumber'];
    $amount = $_POST['Amount'];

    // SQL query to insert data into the payments table
    $sql = "INSERT INTO payment_table (full_name, address, DateOfBirth, gender, payment_Method, cardNumber, Amount) 
            VALUES ('$fullName', '$address', '$dateOfBirth', '$gender', '$paymentMethod', '$cardNumber', '$amount')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the transaction success page
        header("Location: transaction.php" =$transaction_id);
        // Redirect to the transaction success page with the transaction ID
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
