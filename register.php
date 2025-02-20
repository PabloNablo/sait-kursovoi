<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password == $confirmPassword) {
        // Хеширование пароля
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Вставка данных в базу данных
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Регистрация успешна!";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Пароли не совпадают.";
    }
}
?>