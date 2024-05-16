<?php
// Початок сесії
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
$email = $_POST['email'];
$password = $_POST['password'];

// Підготовка SQL-запиту для перевірки наявності користувача в базі даних
$check_sql = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    // Якщо користувач знайдений
    $row = $result->fetch_assoc();
    
    // Зберігаємо дані користувача в сесії
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['address'] = $row['address'];
    
    // Перевірка чи користувач є продуктовим менеджером
    $check_worker_sql = "SELECT * FROM Workers WHERE email='$email' AND position='Product Manager'";
    $worker_result = $conn->query($check_worker_sql);
    
    if ($worker_result->num_rows > 0) {
        // Якщо користувач є продуктовим менеджером, перенаправляємо його на окрему сторінку працівника
        header("Location: /product_manager_page.php");
        exit();
    } else {
        // Якщо користувач не є продуктовим менеджером, перенаправляємо його на головну сторінку
        header("Location: /main_page.html");
        exit();
    }
} else {
    // Якщо користувача не знайдено, виводимо повідомлення про невдачу авторизації
    echo "<script>setTimeout(function() { window.location.href = '/uncorrect_login.html'; }, 10);</script>";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
