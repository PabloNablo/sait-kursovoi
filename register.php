<?php
header('Content-Type: application/json'); // Указываем, что возвращаем JSON

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['registerEmail'];
    $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

    // Проверка, существует ли пользователь с таким email
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Пользователь с таким email уже существует']);
    } else {
        // Вставка данных без имени
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'email' => $email]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Ошибка при регистрации']);
        }
    }

    $stmt->close();
}

$conn->close();
?>