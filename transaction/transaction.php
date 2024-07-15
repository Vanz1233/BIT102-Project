

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 


require 'C:\newXampp\htdocs\BIT102 work\assignment\vendor\autoload.php';


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

    $cardNumber = $_GET['cardNumber'];
$email = $_GET['email'] ?? null; // Capture email from the GET request

    if ($email === null) {
        echo "Email not provided!";
        exit();
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction successful</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="transaction.css">


    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="invoice">
            <div class="head">
                <div class="container">
                    <img src="transtick-removebg-preview.png" alt="">
                </div>
                <h1>Transaction Success</h1>
            </div>
            <div class="body">

             
              
            
               <?php
               // Fetch transaction details from database
               $sql = "SELECT Amount, payment_Method, transaction_time FROM payment_table WHERE cardNumber = ?";
               $stmt = $conn->prepare($sql);

               if ($stmt) {
                   $stmt->bind_param("s", $cardNumber); // Bind the cardNumber
                   $stmt->execute();
                   $result = $stmt->get_result();

                   if ($result->num_rows > 0) {
                       while ($row = $result->fetch_assoc()) {
                           $amount = $row['Amount']; // Corrected field name
                           $paymentMethod = $row['payment_Method'];
                           $transactionTime = date('jS F Y', strtotime($row['transaction_time']));

                           echo "<p><strong>Amount:</strong> $amount</p>";
                           echo "<p><strong>Payment Method:</strong> $paymentMethod</p>";
                           echo "<p><strong>Transaction Time:</strong> $transactionTime</p>";

                            // Send email
                            $mail = new PHPMailer(true);
                            try {
                                // Server settings
                                $mail->isSMTP();
                                $mail->Host = 'smtp.gmail.com'; // Your SMTP server
                                $mail->SMTPAuth = true;
                                $mail->Username = 'qy050104@gmail.com'; // Your email
                                $mail->Password = 'lvin bxdo rilr svcg'; // Your email password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                                $mail->Port = 587; // Port for TLS
 
                                // Recipients
                                $mail->setFrom('Vanz@gmail.com', 'Vanz');
                                $mail->addAddress($email); // Add recipient email
 
                                // Content
                                $mail->isHTML(true);
                                $mail->Subject = 'Transaction Confirmation Statement';
                                $mail->Body = "<h1>Transaction Successful</h1>
                                               <p>Amount: $amount</p>
                                               <p>Payment Method: $paymentMethod</p>
                                               <p>Transaction Time: $transactionTime</p>; </br> 
                                               <p>Congratulations on successfully acquiring your new timepiece at Vanz Auctions.  By showing this statement to our staff, your are eligible to claim your complementary reparation service and warranty</p>";
                                
                                $mail->send();
                            } catch (Exception $e) {
                                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                        }
                       
                   } else {
                       echo "No transaction found.";
                   }
                   $stmt->close();
                } else {
                   echo "Failed to prepare the SQL statement.";
               }

               $conn->close();
               ?>

              

                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-primary" type="button"> Home</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="transaction.js"></script>

</body>

</html>