<?php
// Start session to store user login state
session_start();

// Sample users array for demonstration. Replace this with database check in real implementation.
$users = [
    ['username' => 'admin', 'password' => 'admin123'],
    ['username' => 'user', 'password' => 'user123']
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    
    // Check if username and password match any user in the array
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: index.html');
            exit;
        }
    }
    // If no match found
    $error = 'Invalid username or password';
}
?>
