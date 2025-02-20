<?php
$servername = "localhost";
$username = "z95022ia_test"; // Имя пользователя базы данных
$password = ""; // Пароль базы данных
$dbname = "user"; // Имя базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>