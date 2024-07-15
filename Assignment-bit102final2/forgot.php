<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "auctionwebsite";
$connection = mysqli_connect($server, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = "";

if (isset($_POST['pwdrst'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check_user = mysqli_prepare($connection, "SELECT email FROM user WHERE email = ? AND username = ?");
        mysqli_stmt_bind_param($check_user, "ss", $email, $username);
        mysqli_stmt_execute($check_user);
        mysqli_stmt_store_result($check_user);
        $res = mysqli_stmt_num_rows($check_user);
        mysqli_stmt_close($check_user);

        if ($res > 0) {
            $message = '<div>
                <p><b>Hello!</b></p>
                <p>You are receiving this email because we received a password reset request for your account.</p>
                <br>
                <p><a href="http://localhost/project012024/Assignment-P/reset.php?secret=' . base64_encode($email) . '">Reset Password</a></p>
                <br>
                <p>If you did not request a password reset, no further action is required.</p>
            </div>';

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->Username = "tlee88769@gmail.com";   //Enter your username/emailid
            $mail->Password = "wqsy sdgi qleo jxaz";   //Enter your password
            $mail->FromName = "V4NZ";
            $mail->AddAddress($email);
            $mail->Subject = "Reset Password";
            $mail->isHTML(true);
            $mail->Body = $message;

            if ($mail->send()) {
                $msg = "We have e-mailed your password reset link!";
            } else {
                $msg = "Failed to send the email.";
            }
        } else {
            $msg = "We can't find a user with that email address and username.";
        }
    } else {
        $msg = "Invalid email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
        .box {
            width: 100%;
            max-width: 600px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 16px;
            margin: 0 auto;
        }
        .error {
            color: red;
            font-weight: 700;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <h3 align="center">Forgot Password</h3><br/>
        <div class="box">
            <form id="validate_form" method="post" action="forgot.php">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email" required class="form-control" />
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter Username" required class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" id="login" name="pwdrst" value="Send Password Reset Link" class="btn btn-success" />
                </div>

                <?php if(!empty($msg)) { ?>
                <p class="error"><?php echo $msg; ?></p>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>
