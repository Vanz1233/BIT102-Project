<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auctionwebsite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a user session variable
$user_id = $_SESSION['username'];

// Get the form data
$email = $_POST['editEmail'];
$password = password_hash($_POST['editPassword'], PASSWORD_DEFAULT);


// Update user data
$sql = "UPDATE user SET email = ?, password = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $email, $password, $user_id);

if ($stmt->execute()) {
    echo "Profile updated successfully";
    header("Location: profile.php"); // Redirect to the profile page after update
} else {
    echo "Error updating profile: " . $conn->error;
}




$conn->close();
?>