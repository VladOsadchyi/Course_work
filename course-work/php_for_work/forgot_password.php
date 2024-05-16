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

// Отримання email з сесії
$email = $_SESSION['email'];

// Перевірка, чи існує користувач з введеним email в базі даних
$check_sql = "SELECT * FROM Users WHERE email='$email'";
$result = $conn->query($check_sql);
if ($result->num_rows > 0) {
    // Знайдено користувача з таким email
    // Генеруємо новий тимчасовий пароль
    $new_password = generateRandomPassword();

    // Оновлюємо пароль користувача в базі даних
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $update_sql = "UPDATE Users SET password='$hashed_password' WHERE email='$email'";
    $conn->query($update_sql);

    // Відправляємо новий пароль користувачеві по електронній пошті
    $to = $email;
    $subject = 'Ваш новий тимчасовий пароль';
    $message = 'Ваш новий тимчасовий пароль: ' . $new_password;
    $headers = 'From: your_email@example.com' . "\r\n" .
               'Reply-To: your_email@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

   // Перенаправлення на сторінку успішної зміни пароля
   header("Location: /password_reset_success.html");

} else {
    // Користувача з введеним email не знайдено
    echo "Користувача з введеним email не знайдено.";
}

// Закриття з'єднання з базою даних
$conn->close();

// Функція для генерації випадкового пароля
function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
