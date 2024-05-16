<?php
// Параметри підключення до бази даних
$servername = "127.0.0.1";
$username = "root";
$password = ""; 
$database = "computer_store";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $database);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// SQL-запит для вибору даних з таблиць Products та Suppliers
$sql = "SELECT p.id, p.name, p.category, p.price, s.name AS supplier_name, p.image_url
        FROM Products p
        JOIN Suppliers s ON p.supplier_id = s.id";

// Виконання запиту та отримання результату
$result = $conn->query($sql);

// Виведення даних
if ($result->num_rows > 0) {
    // Виведення даних кожного рядка
    while ($row = $result->fetch_assoc()) {
        // Відображення блоку для кожного продукту з відповідними атрибутами
        echo "<div class='product' data-id='{$row['id']}' data-category='{$row['category']}' data-supplier='{$row['supplier_name']}' data-price='{$row['price']}'>";
        echo "<img src='images/{$row['image_url']}' alt='{$row['name']}'>";
        echo "<p>ID: {$row['id']}</p>";
        echo "<h2>{$row['name']}</h2>";
        echo "<p>Категорія: {$row['category']}</p>";
        echo "<p>Ціна: {$row['price']} грн</p>";
        echo "<p>Постачальник: {$row['supplier_name']}</p>";
        echo "</div>";
    }
} else {
    echo "Немає продуктів для відображення";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
