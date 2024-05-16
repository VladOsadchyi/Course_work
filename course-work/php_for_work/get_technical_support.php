<?php
// Параметри підключення до бази даних
$servername = "127.0.0.1";
$username = "root";
$password = ""; 
$database = "computer_store";

// Створення з'єднання з базою даних
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL-запит для отримання працівників, що відповідають за Technical Support
$sql = "SELECT name, email FROM Workers WHERE position = 'Technical Support Specialist'";

// Виконання SQL-запиту
$result = $conn->query($sql);

// Виведення даних у вигляді таблиці
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No workers found for Technical Support</td></tr>";
}
$conn->close();
?>
