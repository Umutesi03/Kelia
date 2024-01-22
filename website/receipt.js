document.addEventListener("DOMContentLoaded", function () {
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
});