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

// Запуск сесії
session_start();

// Отримання даних з сесії (перевірка наявності)
if(isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];

    // Отримання айді користувача за його електронною поштою
    $sql_user_id = "SELECT id FROM Users WHERE email = '$user_email'";
    $result_user_id = $conn->query($sql_user_id);

    if ($result_user_id->num_rows > 0) {
        // Отримання айді користувача
        $row_user_id = $result_user_id->fetch_assoc();
        $user_id = $row_user_id['id'];

        // Отримання даних з форми
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $card_number = $_POST['card_number'];
        $phone_number = $_POST['phone_number'];
        $order_date = date("Y-m-d H:i:s"); // Поточна дата та час

        // Запит для отримання айді продукту за назвою
        $sql_product_id = "SELECT id FROM Products WHERE name = '$product_name'";
        $result_product_id = $conn->query($sql_product_id);

        if ($result_product_id->num_rows > 0) {
            // Отримання айді продукту
            $row_product_id = $result_product_id->fetch_assoc();
            $product_id = $row_product_id['id'];

            // Вставка даних замовлення в таблицю Orders
            $sql_orders = "INSERT INTO Orders (client_id, product_id, order_date, quantity, card_number, phone_number) VALUES ('$user_id', '$product_id', '$order_date', '$quantity', '$card_number', '$phone_number')";
            if ($conn->query($sql_orders) === TRUE) {
                echo "<script>setTimeout(function() { window.location.href = '/suc_oder.html'; }, 10);</script>";
            } else {
                echo "Помилка: " . $sql_orders . "<br>" . $conn->error;
            }
        } else {
            echo "Помилка: продукт з назвою '$product_name' не знайдено.";
        }
    } else {
        echo "Помилка: користувач з електронною поштою '$user_email' не знайдений.";
    }
} else {
    // Якщо електронна пошта користувача не знайдена у сесії
    echo "Помилка: користувач не увійшов в систему.";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
