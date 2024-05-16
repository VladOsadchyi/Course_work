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
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// SQL-запит для вибору даних з таблиці Postachalnyk
$sql = "SELECT name, address, category FROM Suppliers";

// Виконання запиту та отримання результату
$result = $conn->query($sql);

// Виведення результату в таблицю
if ($result->num_rows > 0) {
    // Виведення даних кожного рядка
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 результатів";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
