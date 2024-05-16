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

// SQL-запит для вибірки даних замовлень
$sql_orders = "SELECT Orders.client_id, Users.name AS client_name, Orders.product_id, Products.name AS product_name, Suppliers.name AS supplier_name, Orders.order_date, Orders.quantity, Orders.card_number, Orders.phone_number 
               FROM Orders 
               JOIN Users ON Orders.client_id = Users.id 
               JOIN Products ON Orders.product_id = Products.id 
               JOIN Suppliers ON Products.supplier_id = Suppliers.id";
$result_orders = $conn->query($sql_orders);

// Виведення даних у вигляді таблиці
if ($result_orders->num_rows > 0) {
    while($row = $result_orders->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['client_name'] . "</td>";
        echo "<td>" . $row['product_name'] . "</td>";
        echo "<td>" . $row['supplier_name'] . "</td>";
        echo "<td>" . $row['order_date'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['card_number'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Немає замовлень</td></tr>";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
