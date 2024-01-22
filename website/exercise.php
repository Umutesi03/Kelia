<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Inventory Management</h1>
        <button onclick="toggleForm()">Toggle Form</button>

        <form id="inventoryForm" style="display: none;">
            <button type="button" onclick="submitData()">Submit</button>
            <!-- Common form fields for both order and stock go here -->
            <label for="itemName">Item Name:</label>
            <input type="text" name="item" id="itemName" required>

            <label for="opening">Opening:</label>
            <input type="number" name="opening" id="opening" required>

            <label for="added">Added:</label>
            <input type="number" name="added" id="added" required>

            <label for="closingStock">Closing Stock:</label>
            <input type="number" name="closing" id="closingstock" required>

            <label for="unitPrice">U.P:</label>
            <input type="number" name="unit" id="unitPrice" required>

            <label for="orderDate">Order Date:</label>
            <input type="date" id="orderDate">
        </form>

        <table id="inventoryTable">
            <tr>
                <th>Items</th>
                <th>Opening</th>
                <th>Added</th>
                <th>Total</th>
                <th>Closing Stock</th>
                <th>Sales</th>
                <th>Unit Price</th>
                <th>Total Sales</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </table>
    </div>

    <script>
        function toggleForm() {
            const form = document.getElementById('inventoryForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function submitData() {
            const itemName = document.getElementById('itemName').value;
            const opening = document.getElementById('opening').value;
            const added = document.getElementById('added').value;
            const closingStock = document.getElementById('closingstock').value;
            const unitPrice = document.getElementById('unitPrice').value;
            const orderDate = document.getElementById('orderDate').value;

            // Perform necessary calculations and create a table row
            const total = parseInt(opening) + parseInt(added);
            const closingStockCalc = total - parseInt(closingStock);
            const sales = total - parseInt(closingStock);
            const unitPriceCalc = parseFloat(unitPrice);
            const totalSales = unitPriceCalc * sales;

            // Create a table row
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${itemName}</td>
                <td>${opening}</td>
                <td>${added}</td>
                <td>${total}</td>
                <td>${closingStockCalc}</td>
                <td>${sales}</td>
                <td>${unitPriceCalc}</td>
                <td>${totalSales}</td>
                <td>${orderDate}</td>
                <td><button onclick="deleteRow(this)">Delete</button></td>
            `;

            // Add the new row to the table
            document.getElementById('inventoryTable').appendChild(newRow);

            // Clear the form after submission
            document.getElementById('inventoryForm').reset();

            // Hide the form after submitting data
            document.getElementById('inventoryForm').style.display = 'none';
            const xhr = new XMLHttpRequest();
        xhr.open('POST', 'logic.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        const data = `itemName=${itemName}&opening=${opening}&added=${added}&total=${total}&closingStock=${closingStock}&sales=${sales}&unitPrice=${unitPrice}&totalSales=${totalSales}&orderDate=${orderDate}`;

        xhr.onload = function() {
            if (xhr.status == 200) {
                console.log(xhr.responseText);
            }
        };

        xhr.send(data);
    
        }

        function deleteRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>
</html>
