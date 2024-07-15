<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auctionwebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$emailPreferences = $_POST['emailPreferences'];
$auctionUpdates = isset($_POST['auctionUpdates']) ? 1 : 0;
$eventInvitations = isset($_POST['eventInvitations']) ? 1 : 0;
$artNews = isset($_POST['artNews']) ? 1 : 0;
$noEmails = isset($_POST['emailPreferences']) && $_POST['emailPreferences'] == 'no' ? 1 : 0;

// Find user ID by email
$sql = "SELECT user_ID FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($emailPreferences == 'no') {
    $auctionUpdates = 0;
    $eventInvitations = 0;
    $artNews = 0;
}

$userId = $_SESSION['userID'];
$userEmail = $_SESSION['userEmail']; 

    // Insert or update preferences into database
    $sql = "INSERT INTO email_preference (userID, AuctionUpdates, EventInvitations, ArtNews, NoEmails)
            VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            AuctionUpdates = VALUES(AuctionUpdates),
            EventInvitations = VALUES(EventInvitations),
            ArtNews = VALUES(ArtNews),
            NoEmails = VALUES(NoEmails)";


   

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiii", $userID, $auctionUpdates, $eventInvitations, $artNews, $noEmails);

    if ($stmt->execute()) {
        // Send email based on preferences
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'qy05010 4@gmail.com'; // SMTP username
            $mail->Password = 'lvin bxdo rilr svcg'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('Vanz@gmail.com', 'V4NZ');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Subscription Confirmation';
            $message = "Thank you for updating your preferences. You have subscribed to the following:<br><br>";

            if ($auctionUpdates) {
                $message .= "Auction and Private Sale Updates<br>";
            }
            if ($eventInvitations) {
                $message .= "Event Invitations<br>";
            }
            if ($artNews) {
                $message .= "Art News<br>";
            }
            if ($noEmails) {
                $message = "You have chosen not to receive any emails.";
            }

            $mail->Body = $message;

            $mail->send();
            echo "Preferences saved and email sent successfully.";
        } catch (Exception $e) {
            echo "Preferences saved, but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }
}else {
    echo "User not found";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>