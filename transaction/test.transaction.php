<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
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

if (!isset($_GET['id'])) {
    // Redirect to user page or show an error
    die("Transaction ID not provided.");
}
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Successful</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="transaction.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="invoice">
            <div class="head">
                <div class="container">
                    <img src="transtick-removebg-preview.png" alt="Transaction Logo">
                </div>
                <h1>Transaction Success</h1>
            </div>
            <div class="body">

                <?php
                // Fetch transaction details
                $sql = "SELECT amount, order_id, payment_method, transaction_time, user_id FROM transactions WHERE transaction_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $amount = $row['amount'];
                    $orderId = $row['order_id'];
                    $paymentMethod = $row['payment_method'];
                    $transactionTime = date('jS F Y', strtotime($row['transaction_time']));
                    $userId = $row['user_id'];

                    // Fetch user email
                    $userSql = "SELECT email FROM users WHERE id = ?";
                    $userStmt = $conn->prepare($userSql);
                    $userStmt->bind_param("i", $userId);
                    $userStmt->execute();
                    $userResult = $userStmt->get_result();
                    $userRow = $userResult->fetch_assoc();
                    $userEmail = $userRow['email'];

                    // Display transaction details
                    echo "<p><strong>Amount:</strong> $amount</p>";
                   
                    echo "<p><strong>Payment Method:</strong> $paymentMethod</p>";
                    echo "<p><strong>Transaction Time:</strong> $transactionTime</p>";

                    // Send invoice email
                    
                  
                    require 'composer/autoload.php'; 

                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'qy050104@gmail.com';
                        $mail->Password = 'lvin bxdo rilr svcg'; // Use app password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;

                        $mail->setFrom('Vanz@gmail.com', 'Vanz');
                        $mail->addAddress($userEmail);

                        $mail->isHTML(true);
                        $mail->Subject = "Invoice Statement";
                        $mail->Body = "<b>Congratulations On Acquiring Your New Watch</b><br>
                                    <h1>Transaction Successful</h1><br>
                                <h2>Your Order Details Are As Follows:</h2><br>
                                    Amount: $$amount <br>
                                    Payment Method: $paymentMethod <br>
                                    Transaction Date and Time: $transactionTime <br>
                This is proof that you have successfully purchased from Vanz and you are eligible for claiming our one-year warranty and repair service.";

                        $mail->send();
                        echo '<p class="text-success">Invoice has been sent to ' . htmlspecialchars($userEmail) . '</p>';
                    } catch (Exception $e) {
                        echo '<p class="text-danger">Invoice could not be sent. Mailer Error: {$mail->ErrorInfo}</p>';
                    }
                } else {
                    echo "<p>No transaction found.</p>";
                }

                $stmt->close();
                $conn->close();
                ?>
                
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-primary" type="button">Home</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Toast Notification -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="congratsToast" class="toast toast-custom align-items-center text-white bg-success border-0"
            role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Congratulations on successfully acquiring your new timepiece at Vanz Auctions.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="transaction.js"></script>
    <script>
        // Initialize Bootstrap toast
        var congratsToast = new bootstrap.Toast(document.getElementById('congratsToast'));
        // Show the toast
        congratsToast.show();
        // Delay dismissal of the toast
        setTimeout(function () {
            congratsToast.hide();
        }, 8000); // Adjust duration in milliseconds
    </script>

</body>

</html>