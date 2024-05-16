<?php include 'php_for_work/session_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Підключення стилів Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style_main.css">
    <link rel="stylesheet" type="text/css" href="style/style_table.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="main_page.html">Основна сторінка</a>
            <a class="navbar-brand" href="shop.php">Магазин</a>
            <a class="navbar-brand" href="supplier.php">Постачальник</a>
            <a class="navbar-brand" href="technical_support.php">Технічна підтримка</a>
            <a class="navbar-brand ms-auto" href="user_page.php">
                <!-- ms-auto для вирівнювання по правому краю -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm2-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm1 1a4 4 0 0 0-4 4c0 1.333.667 2 2 2h.5a3.5 3.5 0 0 1 3.5 3.5v.5H2v-.5A5.5 5.5 0 0 1 7.5 11H8c1.333 0 2-.667 2-2a4 4 0 0 0-4-4 4 4 0 0 0-4 4c0 2.91 2.29 5.253 5 5.475V14H2v-1.525C.21 12.253 0 11.182 0 10c0-2.61 2.462-5 5-5h6zm3-2a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg>
            </a>
        </div>
    </nav>
    <div class="container mt-5">
    <h1>Профіль Користувача</h1>
    <div class="profile-info">
        <h2>Ваша персональна інформація:</h2>
        <table class="table">
            <tbody>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td><?php echo $address; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container mt-5">
    <h2>Ваші замовлення:</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Айді товару</th>
                <th scope="col">Назва товару</th>
                <th scope="col">Кількість</th>
                <th scope="col">Дії</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'php_for_work/user_orders.php'; ?>
        </tbody>
    </table>
</div>
</body>
</html>
