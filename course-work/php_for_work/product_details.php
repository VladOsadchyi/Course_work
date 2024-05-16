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

// Отримання ідентифікатора продукту з параметра GET
if(isset($_GET['id'])) {
    $productId = $_GET['id'];

    // SQL-запит для вибору даних про обраний продукт
    $sql ="SELECT p.id, p.name, p.category, p.price, s.name AS supplier_name, p.image_url
        FROM Products p
        JOIN Suppliers s ON p.supplier_id = s.id
        WHERE p.id = $productId"; // Фільтр за ідентифікатором продукту

    // Виконання запиту та отримання результату
    $result = $conn->query($sql);

    // Виведення даних
    if ($result->num_rows > 0) {
        // Виведення даних про продукт
        $row = $result->fetch_assoc();
        echo "<div class='container'>";
        echo "<img src='images/{$row['image_url']}' alt='{$row['name']}' class='product-image'>";
        echo "<h2>{$row['name']}</h2>";
        echo "<p>Ціна: {$row['price']} грн</p>";
        echo "<p>Категорія: {$row['category']}</p>";
        echo "<p>Постачальник: {$row['supplier_name']}</p>";
        echo "</div>";
    } else {
        echo "Продукт не знайдено";
    }
} else {
    echo "Немає ідентифікатора продукту";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
