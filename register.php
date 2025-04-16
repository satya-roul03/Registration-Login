<?php
$conn = new mysqli('localhost', 'root', '', 'user_auth');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute()) {
        echo "Registration successful. <a href='log.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
