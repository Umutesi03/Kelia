// Add this function to fetch data from the server (PHP script) using AJAX
// Add this function to fetch data from the server (PHP script) using AJAX
xhr.onload = function() {
    if (xhr.status == 200) {
        console.log("Server response:", xhr.responseText);

        const data = JSON.parse(xhr.responseText);
        populateTable(data);
    }
};

// ... (rest of your code)

function populateTable(data) {
    const table = document.getElementById('inventoryTable');
    data.forEach(rowData => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${formatDate(rowData.createdAt)}</td>
            <td>${rowData.opening}</td>
            <td>${rowData.added}</td>
            <td>${rowData.total}</td>
            <td>${rowData.closing}</td>
            <td>${rowData.sales}</td>
            <td>${rowData.unitPrice}</td>
            <td>${rowData.totalSales}</td>
            <td>${formatDate(rowData.datee)}</td>
            <td><button onclick="deleteRow(this)">Delete</button></td>
        `;
        table.appendChild(row);
    });
}

function formatDate(dateString) {
    const options = { year: 'numeric', month: 'numeric', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

function toggleForm() {
    const form = document.getElementById('inventoryForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}
function populateSpecificItems() {
    const itemType = document.getElementById('itemType').value;
    const specificItemsForm = document.getElementById('specificItemsForm');
    const specificItemSelect = document.getElementById('specificItem');

    // Clear previous options
    specificItemSelect.innerHTML = "";

    if (itemType !== "") {
        // Enable specific items form if item type is selected
        specificItemsForm.style.display = 'block';

        // Sample data for specific items (adjust as needed)
        const specificItemsData = {
            beer: ["Heineken", "Budweiser", "Guinness"],
            wine: ["Red Wine", "White Wine", "Rosé"],
            softdrink: ["Coca-Cola", "Pepsi", "Sprite"],
            importeddrink: ["Champagne", "Whisky", "Tequila"]
        };

        // Populate options for specific items based on the selected item type
        specificItemsData[itemType].forEach(item => {
            const option = document.createElement("option");
            option.value = item;
            option.textContent = item;
            specificItemSelect.appendChild(option);
        });
    } else {
        // Disable and hide specific items form if no item type is selected
        specificItemsForm.style.display = 'none';
    }
}
function submitData() {
    const itemType = document.getElementById('itemType').value;
    const specificItem = document.getElementById('specificItem').value; // Get selected specific item
    const opening = document.getElementById('opening').value;
    const added = document.getElementById('added').value;
    const closingStock = document.getElementById('closingstock').value;
    const unitPrice = document.getElementById('unitPrice').value;
    const createdAt = document.getElementById('createdAt').value;

    // Perform necessary calculations and create a table row
    const total = parseInt(opening) + parseInt(added);
    const closingStockCalc = parseInt(closingStock);
    const sales = total - parseInt(closingStock);
    const unitPriceCalc = parseFloat(unitPrice);
    const totalSales = unitPriceCalc * sales;

    // Create a table row
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${itemType}</td>
        <td>${specificItem}</td>
        <td>${opening}</td>
        <td>${added}</td>
        <td>${total}</td>
        <td>${closingStockCalc}</td>
        <td>${sales}</td>
        <td>${unitPriceCalc}</td>
        <td>${totalSales}</td>
        <td>${formatDate(createdAt)}</td>
        <td><button onclick="deleteRow(this)">Delete</button></td>
    `;

    // Add the new row to the table
    document.getElementById('inventoryTable').appendChild(newRow);

    // Send data to the server (PHP script) using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'logic.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    const data = `itemType=${itemType}&specificItem=${specificItem}&opening=${opening}&added=${added}&total=${total}&closingStock=${closingStock}&sales=${sales}&unitPrice=${unitPrice}&totalSales=${totalSales}&createdAt=${createdAt}`;

    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };

    xhr.send(data);

    // Clear the form after submission
    document.getElementById('inventoryForm').reset();

    // Hide the form after submitting data
    document.getElementById('inventoryForm').style.display = 'none';
}

function deleteRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

// Call fetchData() when the page loads
document.addEventListener('DOMContentLoaded', function() {
    fetchData();
});
