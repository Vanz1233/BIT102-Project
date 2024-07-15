<?php
// Database connection details (replace with your actual database credentials)
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database = 'auctionwebsite';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$country = $_POST['editCountry'];
$buildingName = $_POST['editBuildingName'];
$address1 = $_POST['editAddressLine1'];
$address2 = $_POST['editAddressLine2'];
$city = $_POST['editCity'];
$province = $_POST['editProvince'];
$postalCode = $_POST['editPostalCode'];

// Example: Update address in addresses table (adjust SQL statement according to your table structure)
$userID = 1; // Replace with actual user ID, either from session or input
$sql = "INSERT INTO addresses (user_ID, country, buildingName, address1, address2, city, province, postal_code) 
        VALUES ('$userID', '$country', '$buildingName', '$address1', '$address2', '$city', '$province', '$postalCode')";

if ($conn->query($sql) === TRUE) {
    echo "Address updated successfully";
} else {
    echo "Error updating address: " . $conn->error;
}

$conn->close();
?>