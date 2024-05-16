function applyFilter() {
    var inputCategory, filterCategory, inputAddress, filterAddress, table, tr, tdCategory, tdAddress, i, txtValueCategory, txtValueAddress;
    inputCategory = document.getElementById("categoryInput");
    filterCategory = inputCategory.value.toUpperCase();
    inputAddress = document.getElementById("addressInput");
    filterAddress = inputAddress.value.toUpperCase();
    table = document.getElementById("supplierTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        tdCategory = tr[i].getElementsByTagName("td")[2];
        tdAddress = tr[i].getElementsByTagName("td")[1];
        if (tdCategory && tdAddress) {
            txtValueCategory = tdCategory.textContent || tdCategory.innerText;
            txtValueAddress = tdAddress.textContent || tdAddress.innerText;
            if (txtValueCategory.toUpperCase().indexOf(filterCategory) > -1 && txtValueAddress.toUpperCase().indexOf(filterAddress) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

// Встановлюємо обробник подій для полів фільтрації
document.getElementById("categoryInput").addEventListener("input", applyFilter);
document.getElementById("addressInput").addEventListener("input", applyFilter);