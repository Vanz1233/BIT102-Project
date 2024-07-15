<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
// Load Composer's autoloader
require 'vendor/autoload.php';
 
$servername = "localhost"; // replace with your database host
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "auctionwebsite"; // replace with your database name
 
// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
// Create the registration table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user (
    user_ID INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(70),
    last_name VARCHAR(255),
    userName VARCHAR(255,
    email VARCHAR(254),
    password VARCHAR(255)
)";
 
if ($conn->query($sql) === TRUE) {
    echo "Table 'registrations' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}
 
// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
 
// Insert data into the database
$sql = "INSERT INTO users_registration (first_name, last_name, userName, email, password)
VALUES ('$firstName', '$lastName', '$username', '$email', '$password')";
 
if ($conn->query($sql) === TRUE) {
    echo "Registration successful!<br>";
 
    // Send a confirmation email
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
        echo 'A confirmation email has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
// Close the connection
$conn->close();
?>
 