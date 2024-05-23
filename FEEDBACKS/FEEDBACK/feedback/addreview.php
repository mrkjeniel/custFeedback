<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proto_comments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if user is logged in
    if (!isset($_SESSION['userID'])) {
        echo "User is not logged in.";
        exit();
    }

    $userID = $_SESSION['userID']; // Get the user ID from session

    $comment = $_POST['comment'];
    $suggestion = $_POST['suggestion'];
    $rating = $_POST['rating'];
    $date = $_POST['date'];

    // Insert the review into the database
    $sql = "INSERT INTO reviews (user_ID, star_rating, comments, suggestion, datePublished) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issis', $userID, $rating, $comment, $suggestion, $date);

    if ($stmt->execute()) {
        echo 'Comment submitted successfully';
        $stmt->close();
        $conn->close();
        header("Location: feedback.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
