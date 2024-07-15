<?php
// process_login.php

session_start();

$servername = "localhost";
$username = "root";
$password = "";  // Change this to your actual database password
$dbname = "auctionwebsite"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname']; // Use 'uname' to match the form in assignmentP.php
    $password = $_POST['psw']; // Use 'psw' to match the form in assignmentP.php

    // Validate input
    if (empty($username) || empty($password)) {
        header("Location: assignmentP.php?login=failed"); // Redirect to assignmentP.php with login failure
        exit();
    } else {
        // Prepare a select statement
        $stmt = $conn->prepare("SELECT user_ID, password FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Bind result variables
            $stmt->bind_result($id, $hashedPassword, $firstName, $lastName, $title);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashedPassword)) {
                // Start a session and store user information
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['firstName'] = $firstName; // Store the user's name
                $_SESSION['lastName'] = $lastName;
                $_SESSION['title'] = $title; // Store the user's title
                header("Location: assignmentP.php"); // Redirect to the main page
                exit();
            } else {
                header("Location: assignmentP.php?login=failed"); // Redirect to assignmentP.php with login failure
                exit();
            }
        } else {
            header("Location: assignmentP.php?login=failed"); // Redirect to assignmentP.php with login failure
            exit();
        }

        $stmt->close();
    }
}

$conn->close();
?>