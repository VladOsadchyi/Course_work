<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Постачальники</title>
    <!-- Підключення Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style_main.css">
    <link rel="stylesheet" type="text/css" href="style/style_table.css">
    <script src="scripts/sup_filter.js"></script>
</head>

<body>

    <!-- Навігаційне меню -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="main_page.html">Основна сторінка</a>
            <a class="navbar-brand" href="shop.php">Магазин</a>
            <a class="navbar-brand" href="technical_support.php">Технічна підтримка</a>
            <a class="navbar-brand ms-auto" href="user_page.php">
                <!-- ms-auto для вирівнювання по правому краю -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm2-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm1 1a4 4 0 0 0-4 4c0 1.333.667 2 2 2h.5a3.5 3.5 0 0 1 3.5 3.5v.5H2v-.5A5.5 5.5 0 0 1 7.5 11H8c1.333 0 2-.667 2-2a4 4 0 0 0-4-4 4 4 0 0 0-4 4c0 2.91 2.29 5.253 5 5.475V14H2v-1.525C.21 12.253 0 11.182 0 10c0-2.61 2.462-5 5-5h6zm3-2a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg>
            </a>
        </div>
    </nav>

    <!-- Контейнер для тексту та інструментів фільтрації -->
    <div class="container mt-5">
        <h2 class="text-center">Ось список всіх постачальників нашого магазину та товарів, які вони нам постачають:</h2>
        
        <!-- Форма для фільтрації -->
        <form id="filterForm">
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="categoryInput" class="form-label">Фільтрувати за категорією:</label>
                    <input type="text" class="form-control" id="categoryInput" placeholder="Введіть категорію">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="addressInput" class="form-label">Фільтрувати за адресою:</label>
                    <input type="text" class="form-control" id="addressInput" placeholder="Введіть адресу">
                </div>
            </div>
            <button type="button" class="btn btn-primary" onclick="applyFilter()">Застосувати фільтр</button>
        </form>

        <!-- Таблиця з постачальниками -->
        <table id="supplierTable" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col" style="border-right: 1px solid red;" onclick="sortTable(0)">Назва</th>
                    <th scope="col" style="border-right: 1px solid red;" onclick="sortTable(1)">Адреса</th>
                    <th scope="col" onclick="sortTable(2)">Категорія</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP-код для відображення даних постачальників -->
                <?php include 'php_for_work/supplier_data.php'; ?>
            </tbody>
        </table>
    </div>

    <!-- Підключення Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
