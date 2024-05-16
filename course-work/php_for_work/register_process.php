<?php
session_start();

// Параметри підключення до бази даних
$servername = "127.0.0.1";
$username = "root";
$password = ""; 
$database = "computer_store";

// Створення з'єднання з базою даних
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// Отримання даних з форми
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];

// Перевірка, чи існує користувач з такою електронною адресою в базі даних
$check_sql = "SELECT * FROM Users WHERE email='$email'";
$result = $conn->query($check_sql);
if ($result->num_rows > 0) {
    echo "<script>window.location.href = '/user_exists.html';</script>";
} else {
    // Підготовка SQL-запиту для вставки даних в базу даних
    $sql = "INSERT INTO Users (name, email, password, address) VALUES ('$name', '$email', '$password', '$address')";

    // Виконання SQL-запиту
    if ($conn->query($sql) === TRUE) {
        // Збереження даних користувача у сесії
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        
        // Перенаправлення на головну сторінку
        echo "<script>window.location.href = '/main_page.html';</script>";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

// Закриття з'єднання з базою даних
$conn->close();
?>
