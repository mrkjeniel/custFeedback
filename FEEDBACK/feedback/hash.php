<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "proto_comments";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$sql = "SELECT id, password FROM users";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $plain_password = $row['password']; // Assuming the current password is in plain text
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    // Update the password to hashed
    $update_sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('si', $hashed_password, $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
