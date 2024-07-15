<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction successful</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="transaction.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Vanz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#Auctions">Auction</a></li>
                <li class="nav-item"><a class="nav-link" href="#Location">Locations</a></li>
                <li class="nav-item"><a class="nav-link" href="#Services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contacts</a></li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

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
                // Database connection details (replace with your actual database credentials)
                $host = 'localhost';
                $username = 'your_username';
                $password = 'your_password';
                $database = 'your_database';

                // Create connection
                $conn = new mysqli($host, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch transaction details from database (assuming transaction ID 1 for example)
                $transactionId = 1; // Replace with your actual transaction ID or obtain dynamically
                $sql = "SELECT amount, order_id, payment_method, transaction_time FROM transactions WHERE transaction_id = $transactionId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $amount = $row['amount'];
                        $orderId = $row['order_id'];
                        $paymentMethod = $row['payment_method'];
                        $transactionTime = date('jS F Y', strtotime($row['transaction_time'])); // Format date as desired
                        // Display the fetched data
                        echo "<p><strong>Amount:</strong> $amount</p>";
                        echo "<p><strong>Order ID:</strong> $orderId</p>";
                        echo "<p><strong>Payment Method:</strong> $paymentMethod</p>";
                        echo "<p><strong>Transaction Time:</strong> $transactionTime</p>";
                    }
                } else {
                    echo "No transaction found.";
                }

                // Close connection
                $conn->close();
                ?>
                
                <p>An email of this invoice will be sent to your inbox.</p>
                
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