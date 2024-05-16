<?php
session_start();
include 'session_check.php'; // Включаємо перевірку сесії

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

// Отримання email користувача з сесії
$user_email = $_SESSION['email'];

// Отримання айді користувача за його email
$sql_user_id = "SELECT id FROM Users WHERE email = '$user_email'";
$result_user_id = $conn->query($sql_user_id);

if ($result_user_id->num_rows > 0) {
    $row_user_id = $result_user_id->fetch_assoc();
    $user_id = $row_user_id['id'];

    // Запит на отримання замовлень користувача з бази даних
    $sql_orders = "SELECT Products.name, Orders.quantity, Orders.order_id FROM Orders JOIN Products ON Orders.product_id = Products.id WHERE Orders.client_id = '$user_id'";
    $result_orders = $conn->query($sql_orders);

    if ($result_orders->num_rows > 0) {
        // Виведення замовлень
        while($row_orders = $result_orders->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row_orders['order_id'] . "</td>"; // Виведення ідентифікатора замовлення
            echo "<td>" . $row_orders['name'] . "</td>";
            echo "<td>" . $row_orders['quantity'] . "</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='order_id' value='" . $row_orders['order_id'] . "'>
                        <button type='submit' class='btn btn-danger' name='delete_order_button'>Відмінити</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Немає замовлень</td></tr>";
    }
} else {
    echo "Помилка: Користувача з таким email не знайдено.";
}

// Перевірка, чи було натиснуто кнопку "Відмінити"
if (isset($_POST['delete_order_button'])) {
    // Отримання ідентифікатора замовлення з прихованого поля форми
    $order_id = $_POST['order_id'];

    // Видалення замовлення
    $sql_delete_order = "DELETE FROM Orders WHERE order_id = '$order_id' AND client_id = '$user_id'";
    if ($conn->query($sql_delete_order) === TRUE) {
        // Перенаправлення на оновлену сторінку користувача
        header("Location: user_page.php");
        exit();
    } else {
        echo "Помилка видалення замовлення: " . $conn->error;
    }
}

// Закриття з'єднання з базою даних
$conn->close();
?>
