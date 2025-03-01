<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashedPassword);

    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        echo json_encode(['success' => true, 'email' => $email]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Неверный email или пароль']);
    }

    $stmt->close();
}

$conn->close();
?>