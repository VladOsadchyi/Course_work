document.addEventListener("DOMContentLoaded", function() {
    // Отримуємо всі блоки продуктів
    var products = document.querySelectorAll('.product');
    
    // Додаємо обробник подій для кожного блоку продукту
    products.forEach(function(product) {
        product.addEventListener('click', function() {
            // Отримуємо ідентифікатор продукту
            var productId = this.getAttribute('data-id');
            
            // Перенаправлення на сторінку product_page.php з параметром id
            window.location.href = 'product_page.php?id=' + productId;
        });
    });
});