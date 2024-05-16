<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style_main.css">
    <link rel="stylesheet" href="style/style_product.css"> <!-- Підключаємо CSS-стилі -->
    <script src="scripts/product_filter.js"></script>
    <script src="scripts/product_click_display.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="main_page.html">Основна сторінка</a>
                <a class="navbar-brand" href="supplier.php">Постачальник</a>
                <a class="navbar-brand" href="technical_support.php">Технічна підтримка</a>
                <a class="navbar-brand ms-auto" href="user_page.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm2-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm1 1a4 4 0 0 0-4 4c0 1.333.667 2 2 2h.5a3.5 3.5 0 0 1 3.5 3.5v.5H2v-.5A5.5 5.5 0 0 1 7.5 11H8c1.333 0 2-.667 2-2a4 4 0 0 0-4-4 4 4 0 0 0-4 4c0 2.91 2.29 5.253 5 5.475V14H2v-1.525C.21 12.253 0 11.182 0 10c0-2.61 2.462-5 5-5h6zm3-2a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </svg>
                </a>
            </div>
        </nav>
        <h1>Наш магазин</h1>

        <!-- Форма для фільтрації -->
        <div class="filters">
            <select id="categoryFilter">
            <option value="all">Усі категорії</option>
            <option value="Laptop">Laptop</option>
            <option value="Computers">Computers</option>
            <option value="Robotics">Robotics</option>
            <option value="Smartphones">Smartphones</option>
            <option value="Tablets">Tablets</option>
            <option value="Gaming Consoles">Gaming Consoles</option>
            <option value="Smart TV">Smart TV</option>
            <option value="Home Appliances">Home Appliances</option>
            <option value="Cameras">Cameras</option>
            <option value="Wearable Devices">Wearable Devices</option>
            <option value="Networking Equipment">Networking Equipment</option>
            <option value="Renewable Energy Devices">Renewable Energy Devices</option>
            <option value="Drone">Drone</option>
            <option value="Virtual Reality Headset">Virtual Reality Headset</option>
            <option value="Printers">Printers</option>
            <option value="Camcorders">Camcorders</option>
            <option value="Mobile Accessories">Mobile Accessories</option>
            <option value="Smart Watches">Smart Watches</option>
            <option value="Televisions">Televisions</option>
            <option value="Home Theater System">Home Theater System</option>
            <option value="Audio Systems">Audio Systems</option>
            <option value="Air Conditioner">Air Conditioner</option>
            <option value="LED TV">LED TV</option>
            <option value="Wireless Charger">Wireless Charger</option>
            <option value="Wireless Earbuds">Wireless Earbuds</option>
            <option value="VR Headset">VR Headset</option>
            <option value="3D Printing Solutions">3D Printing Solutions</option>
            <option value="Biometric Security Systems">Biometric Security Systems</option>
            <option value="VR Experience">VR Experience</option>
        </select>
            <!-- Додайте список постачальників за потребою -->
        <select id="supplierFilter">
            <option value="all">Усі постачальники</option>
            <option value="GlobalTech Solutions">GlobalTech Solutions</option>
            <option value="Innovate Electronics Inc">Innovate Electronics Inc</option>
            <option value="TechGiant Enterprises">TechGiant Enterprises</option>
            <option value="FutureTech Innovations Ltd">FutureTech Innovations Ltd</option>
            <option value="ElectroWorld Corporation">ElectroWorld Corporation</option>
            <option value="DigitalEdge Technologies">DigitalEdge Technologies</option>
            <option value="SmartTech Solutions Ltd">SmartTech Solutions Ltd</option>
            <option value="TechWise Innovations Inc">TechWise Innovations Inc</option>
            <option value="EcoElectronics Corporation">EcoElectronics Corporation</option>
            <option value="InnoTech Ventures Ltd">InnoTech Ventures Ltd</option>
            <option value="Samsung Electronics">Samsung Electronics</option>
            <option value="LG Electronics">LG Electronics</option>
            <option value="Sony Corporation">Sony Corporation</option>
            <option value="Panasonic Corporation">Panasonic Corporation</option>
            <option value="Dyson Ltd">Dyson Ltd</option>
            <option value="Siemens AG">Siemens AG</option>
            <option value="Haier Group Corporation">Haier Group Corporation</option>
            <option value="Toshiba Corporation">Toshiba Corporation</option>
            <option value="AmpereWorks Inc">AmpereWorks Inc</option>
            <option value="PowerTech Innovations">PowerTech Innovations</option>
            <option value="VoltWave Electronics">VoltWave Electronics</option>
            <option value="BrightWire Electronics">BrightWire Electronics</option>
            <option value="CircuitWorks Corporation">CircuitWorks Corporation</option>
            <option value="MegaVolt Innovations">MegaVolt Innovations</option>
            <option value="CurrentEdge Electronics">CurrentEdge Electronics</option>
            <option value="SmartGenius Innovations">SmartGenius Innovations</option>
            <option value="NexGen Solutions">NexGen Solutions</option>
        </select>
            <input type="number" id="priceFilter" placeholder="Ціна від">
            <input type="number" id="maxPriceFilter" placeholder="Ціна до">
            <button id="filterButton">Фільтрувати</button>
            <div class="product-container">
                <?php include 'php_for_work/display_products.php'; ?>
            </div>

</body>
</html>
