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

if (isset($_POST['pwdrst'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    if ($pwd === $cpwd) {
        $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($connection, "UPDATE user SET password = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashed_pwd, $email);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($result) {
            echo '<script>alert("Your password was updated successfully. Redirecting to homepage..."); window.location.href="assignmentP.php";</script>';
            exit;
        } else {
            $msg = "Error while updating password.";
        }
    } else {
        $msg = "Password and Confirm Password do not match";
    }
}

if (isset($_GET['secret']) && !empty($_GET['secret'])) {
    $email = base64_decode($_GET['secret']);
    $check_details = mysqli_prepare($connection, "SELECT email FROM user WHERE email = ?");
    mysqli_stmt_bind_param($check_details, "s", $email);
    mysqli_stmt_execute($check_details);
    mysqli_stmt_store_result($check_details);
    $res = mysqli_stmt_num_rows($check_details);
    mysqli_stmt_close($check_details);

    if ($res > 0) {
        // Valid reset link
    } else {
        $msg = "Invalid or expired reset link.";
    }
} else {
    $msg = "Invalid or expired reset link.";
}
?>
<html>
<head>
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<style>
 .box {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 .error {
  color: red;
  font-weight: 700;
}
</style>
<body>
<div class="container">
    <div class="table-responsive">
    <h3 align="center">Reset Password</h3><br/>
    <div class="box">
     <form id="validate_form" method="post" action="reset.php">
      <input type="hidden" name="email" value="<?php echo htmlspecialchars(isset($_GET['secret']) ? base64_decode($_GET['secret']) : ''); ?>"/>
      <div class="form-group">
       <label for="pwd">Password</label>
       <input type="password" name="pwd" id="pwd" placeholder="Enter Password" required class="form-control"/>
      </div>
      <div class="form-group">
       <label for="cpwd">Confirm Password</label>
       <input type="password" name="cpwd" id="cpwd" placeholder="Enter Confirm Password" required class="form-control"/>
      </div>
      <div class="form-group">
       <input type="submit" id="login" name="pwdrst" value="Reset Password" class="btn btn-success" />
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
