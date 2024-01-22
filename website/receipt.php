<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="order.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="receipt.js"></script>
    <style>
        /* Add your styles for the receipt here */
        #receipt {
            display: none;
        }
    </style>
</head>
<body>
    
    <table id="itemTable">
            <tr><td><button> Mitzing</button></td><td><button> Amstel</button></td><td><button> Heinken</button></td><td><button> Skol Pulse</button></td></tr>
            <tr><td><button> Skol Malt</button></td><td><button> skol Lager</button></td><td><button> Virunga</button></td><td><button> Tusker lager</button></td></tr>
            <tr><td><button> Tusker malt</button></td><td><button> Big Mutzing</button></td><td><button> Primus</button></td><td><button> Big Primus</button></td></tr>
            <tr><td><button> Big skol malt</button></td><td><button> Kiki</button></td><td><button> Pablo</button></td><td><button> Skol lager cannete</button></td></tr>
            <td><button> Amstel</button></td><td><button> Heinken</button></td><td><button> Heinken</button></td></tr>
            
        </table>
   

    <button id="createOrderBtn">Create an order</button>

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
    <script>document.addEventListener("DOMContentLoaded", function () {
    const createOrderBtn = document.getElementById('createOrderBtn');
    const hiddenForm = document.getElementById('hiddenForm');
    const receiptContainer = document.getElementById('receipt');

    let receiptCreated = false;

    // Function to show the order form
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
        const phoneNumber = document.getElementById('phonenumber').value.trim();
        const paymentMethod = document.getElementById('paymentMethod').value.trim();
        const waitressName = document.getElementById('waitressName').value.trim();
        if (customerName && phoneNumber && paymentMethod) {
            hiddenForm.style.display = 'none';
            receiptContainer.style.display = 'block';

            document.getElementById('customerNameDisplay').innerText = customerName;
            document.getElementById('customerTelephone').innerText = phoneNumber;
            document.getElementById('paymentMethodDisplay').innerText = paymentMethod;
            document.getElementById('waitressNameDisplay').innerText = waitressName;
            

            receiptCreated = true;
        } else {
            alert('Please fill in all required fields.');
        }
    }

    createOrderBtn.addEventListener('click', showOrderForm);
    document.getElementById('createReceiptBtn').addEventListener('click', createReceipt);

    // Sample item buttons
    let itemNumber = 1;

    document.getElementById('itemTable').addEventListener('click', function (event) {
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

    function addItem(itemName, unitPrice, quantity) {
        const itemTableBody = document.getElementById('orderTable').getElementsByTagName('tbody')[0];
        const newRow = itemTableBody.insertRow();
        
        const cell0 = newRow.insertCell(0);
        cell0.innerHTML = itemNumber++;

        const cell1 = newRow.insertCell(1);
        cell1.innerHTML = itemName;

        const cell2 = newRow.insertCell(2);
        cell2.innerHTML = unitPrice.toFixed(2);

        const cell3 = newRow.insertCell(3);
        cell3.innerHTML = quantity;

        const cell4 = newRow.insertCell(4);
        const total = unitPrice * quantity;
        cell4.innerHTML = total.toFixed(2);
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
}); </script>
    </html>