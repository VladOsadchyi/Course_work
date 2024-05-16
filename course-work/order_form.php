<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style_main.css">
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
<div class="container">
    <h2>Order Form</h2>
    <?php
    // Отримання назви продукту з параметра GET
    $product_name = isset($_GET['product_name']) ? $_GET['product_name'] : '';
    ?>
    <form action="php_for_work/process_order.php" method="POST">
        <div class="mb-3">
            <label for="product_name" class="form-label">Назва продукту:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Кількість товару для замовлення:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="mb-3">
            <label for="card_number" class="form-label">Платіжна карта:</label>
            <input type="text" class="form-control" id="card_number" name="card_number" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Номер телефона:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <button type="submit" class="btn btn-primary">Відправити замовлення</button>
    </form>
</div>
</body>
</html>
