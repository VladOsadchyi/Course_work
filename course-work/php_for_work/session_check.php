<?php
session_start();

// Перевірка, чи користувач увійшов в систему
if(!isset($_SESSION['email'])) {
    header("Location: login_process.php"); // Перенаправлення на сторінку авторизації, якщо користувач не увійшов
    exit();
}

// Отримання даних користувача з сесії
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];
?>
