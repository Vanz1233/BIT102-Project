<?php
// process_registration.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";  // Change this to your actual database password
$dbname = "auctionwebsite"; // Change it based on your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $title = $_POST['title'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $currencySymbol = !empty($_POST['currencySymbol']) ? $_POST['currencySymbol'] : null;
    $amount = !empty($_POST['amount']) ? $_POST['amount'] : null;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isCheckboxChecked = isset($_POST['terms-checkbox']) && $_POST['terms-checkbox'] == 'on'; // Check if the checkbox is ticked
    
    // Function to check if the user is at least 20 years old
    function isAtLeast20YearsOld($birthDate) {
        $today = new DateTime();
        $birthDateObj = new DateTime($birthDate);
        $age = $today->diff($birthDateObj)->y;
        return $age >= 20;
    }

    // Function to validate email domain
    function isValidEmailDomain($email) {
        $domain = substr(strrchr($email, "@"), 1);
        return checkdnsrr($domain, "MX");
    }

    // Validate input
    if (empty($firstName) || empty($email) || empty($password) || empty($date)) {
        echo "First Name, Email, Birth Date, and Password are required fields.";
    } else if (!isAtLeast20YearsOld($date)) {
        echo "You must be at least 20 years old to register.";
    } else if (!$isCheckboxChecked) {
        echo "You must agree to the terms of V4NZ services.";
    } else if (!isValidEmailDomain($email)) {
        echo "The email domain is invalid. Please enter a valid email address.";
    } else {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an insert statement
        $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, title, email, birthdate, currency_symbol, salarystatement, userName, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $firstName, $lastName, $title, $email, $date, $currencySymbol, $amount, $username, $hashedPassword);

        if ($stmt->execute()) {
            // Send confirmation email
            sendConfirmationEmail($email, $firstName, $lastName);
            echo "<script>
                    alert('Registration successful. A confirmation email has been sent.');
                    window.location.href = 'assignmentP.php'; // Replace 'index.php' with the path to your homepage
                  </script>";
        }else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
// Function to send confirmation email
function sendConfirmationEmail($email, $firstName, $lastName) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;                      // Disable verbose debug output
        $mail->isSMTP();                           // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';      // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                  // Enable SMTP authentication
        $mail->Username   = 'tlee88769@gmail.com'; // SMTP username
        $mail->Password   = 'wqsy sdgi qleo jxaz'; // SMTP password (or app password if 2FA is enabled)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                   // TCP port to connect to

        // Recipients
        $mail->setFrom('tlee88769@gmail.com', 'V4NZ');
        $mail->addAddress($email, $firstName . ' ' . $lastName); // Add a recipient

        // Content
        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = 'Registration Confirmation';
        $mail->Body    = 'Dear ' . $firstName . ',<br><br>Thank you for registering on our website.<br><br>Best Regards,<br>V4NZ';
        $mail->AltBody = 'Dear ' . $firstName . ',\n\nThank you for registering on our website.\n\nBest Regards,\nV4NZ';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
