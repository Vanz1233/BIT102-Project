<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auctionwebsite";

// Set the timezone
date_default_timezone_set('Asia/Kuala_Lumpur'); // Change this to your timezone

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
    $email = $_POST['email'];
    $transaction_time = date('Y-m-d H:i:s'); // Capture current timestamp for transaction_time

    // SQL query to insert data into the payments table
    $sql = "INSERT INTO payment_table (full_name, address, DateOfBirth, gender, payment_Method, cardNumber, Amount, transaction_time,email ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }

        $stmt->bind_param("ssssssiss", $fullName, $address, $dateOfBirth, $gender, $paymentMethod, $cardNumber, $amount, $transaction_time ,$email);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Transaction successful.";
            // Optionally, you can redirect to the transaction success page
            $redirectUrl = "transaction.php?cardNumber=$cardNumber&email=" . urlencode($email);
            echo "Redirecting to: $redirectUrl";
            // Optionally, you can redirect to the transaction success page
            header("Location: $redirectUrl");

            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }


// Close the connection
$conn->close();
?> 

//payment