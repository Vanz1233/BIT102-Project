<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['searchQuery'];
    echo "<h1>Search Results for: " . htmlspecialchars($searchQuery) . "</h1>";

}
?>
