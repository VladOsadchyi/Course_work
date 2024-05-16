<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $name = $_POST['name'];
    $email = $_POST['email'];
    $question = $_POST['question'];

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

    // SQL-запит для отримання електронної пошти працівників, що відповідають за Technical Support
    $sql = "SELECT email FROM Workers WHERE position = 'Technical Support Specialist'";

    // Виконання SQL-запиту
    $result = $conn->query($sql);

    // Відправка електронних листів
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Отримання електронної пошти працівника
            $to = $row["email"];
            $subject = "Нове повідомлення від $name";
            $message = "Ім'я: $name\n";
            $message .= "Електронна пошта: $email\n";
            $message .= "Питання: $question\n";

            // Відправлення повідомлення
            if (mail($to, $subject, $message)) {
                echo "<script>alert('Повідомлення надіслано!'); window.location = '/technical_support.php';</script>";
            } else {
                echo "<script>alert('Помилка! Повідомлення не надіслано.');</script>";
            }
        }
    } else {
        echo "<script>alert('Помилка! Немає працівників, що відповідають за Technical Support.');</script>";
    }
    $conn->close();
}

?>
