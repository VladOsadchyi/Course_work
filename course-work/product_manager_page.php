<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager Page</title>
    <!-- Підключення стилів Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style_main.css">
    <link rel="stylesheet" type="text/css" href="style/style_table.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Product Manager Page</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Client Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Card Number</th>
                        <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'php_for_work/product_manager_orders.php'; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
