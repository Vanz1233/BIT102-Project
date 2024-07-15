<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

# Load Composer's autoloader
require 'composer/autoload.php'; 

# Database connection credentials
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "auctionwebsite";

# Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

# Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# Get the transaction ID from the GET request
$transactionId = $_GET['transactionId'];

# Fetch user and transaction details from the database
$sql = "SELECT users.email, transactions.amount, transactions.payment_method, transactions.transaction_time 
        FROM transactions 
        INNER JOIN users ON transactions.user_id = users.id 
        WHERE transactions.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $transactionId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userEmail = $row['email'];
    $amount = $row['amount'];
    $paymentMethod = $row['payment_method'];
    $transactionTime = $row['transaction_time'];
    
    $mail = new PHPMailer(true);
    
    try { 
        //Server settings 
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'qy050104@gmail.com';
        $mail->Password = 'lvin bxdo rilr svcg'; // SMTP password (or app password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients 
        $mail->setFrom('Vanz@gmail.com', 'Vanz');
        $mail->addAddress($userEmail, 'Recipient');

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Invoice Statement";
        $mail->Body    = '<b>Congratulation On Acquiring Your New Watch</b><br><br> 
                          <h1>Transaction Success</h1><br><br> 
                          <h2>Your Order Details Are As Follows</h2><br><br><br> 
                          Amount: ' . $amount . ' <br><br> 
                          Payment Method: ' . $paymentMethod . ' <br><br> 
                          Transaction Date and Time: ' . $transactionTime . ' <br><br> 
                          This is proof that you have successfully purchased from Vanz. Showing this to our staff will allow you to claim your free reparation in the future.';
        $mail->AltBody = 'Congratulation On Acquiring Your New Watch. Transaction Success. Your Order Details Are As Follows: Amount: ' . $amount . ' Payment Method: ' . $paymentMethod . ' Transaction Date and Time: ' . $transactionTime . ' This is proof that you have successfully purchased from Vanz. Showing this receipt to our staff will allow you to claim your free reparation in the future.';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "No transaction found with the provided ID.";
}

# Close connection
$conn->close();
?> 