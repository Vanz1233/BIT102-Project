<?php
$servername = "localhost"; // replace with your database host
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "myproject2024"; // replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users_registration";
$result = $conn->query ($sql);

if($result->num_rows>0){
    echo"<table><tr>";
    echo"<th>ID</th>";
    echo"<th>First Name</th>";
    echo"<th>Last Name</th>";
    echo"<th>Email</th>";
    echo"<th>Action</th>";
    while ($row= $result->fetch_assoc()){
        echo "<tr><td>".$row["id"]. "</td>";
        echo "<td>".$row["first_name"]. "</td>";
        echo "<td>".$row["last_name"]. "</td>";
        echo "<td>".$row["email"]. "</td>";
        echo "<td><a href='edit_user.php?id=". $row["id"] . "'>Edit</a> |";
        echo "<a href='delete_user.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
    }
    echo "</table>";
}
else{
    echo "0 results";

}
?>