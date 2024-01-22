<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="order.css">
    <script src="links.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="bigg">
        <div class="left">
            <table>
                <tr>
                    <td><button class="myButton" onclick="navigateTo('softdrinks.php', this)">Soft drink</button></td>
                    <td><button class="myButton" onclick="loadItemTable('beer')">Beers</button></td>
                </tr>
                <tr>
                    <td><button class="myButton" onclick="navigateTo('Wines.php', this)">Wines</button></td>
                    <td><button class="myButton" onclick="navigateTo('liquor.php', this)">Liquors</button></td>
                </tr>
                <tr>
                    <td><button class="myButton" onclick="navigateTo('billiard.php', this)">Billiard</button></td>
                    <td><button class="myButton" onclick="navigateTo('freshjuice.php', this)">Fresh Juice</button></td>
                </tr>
                <tr>
                    <td><button class="myButton" onclick="navigateTo('cigarette.php', this)">Cigarette</button></td>
                    <td><button class="myButton" onclick="navigateTo('liquor2.php', this)">Liquor 2</button></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="myButton" onclick="navigateTo('importeddrink.php', this)">Imported Drinks</button></td>
                </tr>
            </table>
        </div>
    
        <div class="right">
            <iframe src="iframe2.php" name="iframe_b" height="1500px" width="990px" frameborder="0"></iframe>
        </div>
    </div>

    <!-- Hidden form for user input -->
    <form id="hiddenForm" style="display: none;">
            <label for="customerName">customer Name:</label>
            <input type="text" name="customerName" id="customerName" required>

            <label for="telepphone">Customer Phone number :</label>
            <input type="number" name="phonenumber" id="phonenumber" required>

            <label for="paymentmethod">Payment method:</label>
            <input type="text" name="paymentMethod" id="paymentMethod" required>

            <label for="waitressName">Waitress Name:</label>
            <input type="text" name="WaitressName" id="waitressName" required>
        <button type="button" id="createReceiptBtn">Create receipt</button>
    </form>
    <button id="createOrderBtn">Create an order</button>

    <!-- Receipt layout -->
    <div id="receipt">
    <div id="companyInfo">
            <p>Company Name</p>
            <p>Company Address</p>
            <p>Email: company@example.com</p>
            <p>Telephone: 123-456-7890</p>
        </div>

        <div id="receiptInfo">
            <p>Date: <span id="date"></span></p>
            <p>Receipt Number: <span id="receiptNumber"></span></p>
            <p>Customer Number: <span id="customerNumber"></span></p>
        </div>

        <div id="customerInfo">
            <p>Customer Name: <span id="customerNameDisplay"></span></p>
            <p>Telephone: <span id="customerTelephone"></span></p>
            <p>Payment Method: <span id="paymentMethodDisplay"></span></p>
            <p>Waitress Name: <span id="waitressNameDisplay"></span></p>
        </div>

        <table id="orderTable">
        <thead>
                <tr>
                    <th>Item No</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
            </tbody>
            <tfoot>
        <tr>
            <td colspan="4" style="text-align: right;"><strong>Total Amount:</strong></td>
            <td id="totalAmount">0.00</td>
        </tr>
    </tfoot>
        </table>
    </div>

    <script>
        // Your JavaScript code
        function loadItemTable(category) {
    const iframe = document.getElementsByName("iframe_b")[0];
    iframe.src = category + '.php';
    // Also, notify the iframe about the createReceipt function
    iframe.contentWindow.createReceipt = createReceipt;
}

document.addEventListener("DOMContentLoaded", function () {
            // Ensure createOrderBtn is not null before adding event listener
            const createOrderBtn = document.getElementById('createOrderBtn');
            if (createOrderBtn) {
                createOrderBtn.addEventListener('click', showOrderForm);
            }

            const hiddenForm = document.getElementById('hiddenForm');
            const receiptContainer = document.getElementById('receipt');
            let receiptCreated = false;

            function showOrderForm() {
                if (!receiptCreated) {
                    hiddenForm.style.display = 'block';
                } else {
                    alert('Receipt already created. Print or save the receipt.');
                }
            }

            // Function to create a receipt
            function createReceipt() {
                const customerName = document.getElementById('customerName').value.trim();
                // Other input validations...

                if (customerName) {
                    hiddenForm.style.display = 'none';
                    receiptContainer.style.display = 'block';

                    document.getElementById('customerNameDisplay').innerText = customerName;
                    // Update other receipt information...

                    updateTotalAmount(); // Update total amount in the receipt
                    receiptCreated = true;
                } else {
                    alert('Please fill in all required fields.');
                }
            }

            createOrderBtn.addEventListener('click', showOrderForm);
            document.getElementById('createReceiptBtn').addEventListener('click', createReceipt);

            // Sample item buttons
            let itemNumber = 1;

const itemTable = document.getElementById('itemTable');
if (itemTable) {
    itemTable.addEventListener('click', function (event) {
        if (event.target.tagName === 'BUTTON') {
            const itemName = event.target.innerText;
            const unitPrice = parseFloat(prompt(`Enter unit price for ${itemName}:`));
            const quantity = parseInt(prompt(`Enter quantity for ${itemName}:`));

            if (!isNaN(unitPrice) && !isNaN(quantity)) {
                addItem(itemName, unitPrice, quantity);
            } else {
                alert('Invalid input. Please enter valid numbers for unit price and quantity.');
            }
        }
    });
}

            function addItem(itemName, unitPrice, quantity) {
                const itemTableBody = document.getElementById('orderTable').getElementsByTagName('tbody')[0];
                const newRow = itemTableBody.insertRow();

                const cell0 = newRow.insertCell(0);
                cell0.innerHTML = itemNumber++;

                const cell1 = newRow.insertCell(1);
                cell1.innerHTML = itemName;

                const cell2 = newRow.insertCell(2);
                cell2.innerHTML = quantity;

                const cell3 = newRow.insertCell(3);
                cell3.innerHTML = unitPrice.toFixed(2);

                const cell4 = newRow.insertCell(4);
                const total = unitPrice * quantity;
                cell4.innerHTML = total.toFixed(2);

                updateTotalAmount(); // Update total amount when adding an item
            }

            function updateTotalAmount() {
                const itemTableBody = document.getElementById('orderTable').getElementsByTagName('tbody')[0];
                const totalAmountCell = document.getElementById('totalAmount');
                let totalAmount = 0;

                for (let i = 0; i < itemTableBody.rows.length; i++) {
                    totalAmount += parseFloat(itemTableBody.rows[i].cells[4].innerHTML);
                }

                totalAmountCell.innerHTML = totalAmount.toFixed(2);
            }
        });
    </script>
</body>

        function loadItemTable(category) {
            const iframe = document.getElementsByName("iframe_b")[0];
            iframe.src = category + '.php';
        }
    </script>
</body>
</html>
