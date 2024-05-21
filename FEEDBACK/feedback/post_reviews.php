<?php
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proto_comments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching comments
$query = "SELECT user_ID, datePublished, comments, star_rating FROM reviews ORDER BY datePublished DESC";
$result = $conn->query($query);

if (!$result) {
    die("Error: " . $conn->error);
}

$comments = array();
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

echo json_encode($comments);

$conn->close();
?>
