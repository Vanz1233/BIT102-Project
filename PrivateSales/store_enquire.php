
<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "auctionwebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$contactnum = $_POST['contactnum'];
$message = $_POST['message'];
$ishuman = isset($_POST['remember']) ? 1 : 0; // Checkbox value, 1 if checked, otherwise 0

// Insert data into the database
$sql = "INSERT INTO userinquiries (Name, Email, ContactNumber, Message, IsHuman, CreatedAt) 
        VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("ssssi", $name, $email, $contactnum, $message, $ishuman);

if ($stmt->execute()) {
    echo "New record created successfully";
    // Optionally redirect to a success page
    // header('Location: success.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>