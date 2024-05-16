document.addEventListener("DOMContentLoaded", function() {
    // Отримуємо посилання на кнопку фільтрації
    var filterButton = document.getElementById("filterButton");

    // Додаємо обробник події для кнопки фільтрації
    filterButton.addEventListener("click", function() {
        // Отримуємо значення фільтрів
        var category = document.getElementById("categoryFilter").value;
        var supplier = document.getElementById("supplierFilter").value;
        var minPrice = parseFloat(document.getElementById("priceFilter").value);
        var maxPrice = parseFloat(document.getElementById("maxPriceFilter").value);

        // Виконуємо фільтрацію продуктів
        filterProducts(category, supplier, minPrice, maxPrice);
    });
});

// Функція для фільтрації продуктів
function filterProducts(category, supplier, minPrice, maxPrice) {
    // Отримати всі блоки продуктів
    var products = document.querySelectorAll(".product");

    // Проходимося по кожному продукту і приховуємо ті, які не відповідають критеріям фільтрації
    products.forEach(function(product) {
        var productCategory = product.dataset.category;
        var productSupplier = product.dataset.supplier;
        var productPrice = parseFloat(product.dataset.price);

        var categoryMatch = category === "all" || productCategory === category;
        var supplierMatch = supplier === "all" || productSupplier === supplier;
        var priceMatch = isNaN(minPrice) || productPrice >= minPrice;
        var maxPriceMatch = isNaN(maxPrice) || productPrice <= maxPrice;

        if (categoryMatch && supplierMatch && priceMatch && maxPriceMatch) {
            product.style.display = "block"; // Показуємо продукт
        } else {
            product.style.display = "none"; // Приховуємо продукт
        }
    });
}
