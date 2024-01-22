function makeTable(data) {
    const table = document.getElementById('creditTable');
    data.forEach(rowData => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${rowData.createdAt}</td>
            <td>${rowData.customer}</td>
            <td>${rowData.amaunt}</td>
            <td>${rowData.paid}</td>
            <td>${rowData.comments}</td>
            <td><button onclick="deleteRow(this)">Delete</button></td>
        `;
        table.appendChild(row);
    });
}

function creditForm() {
    const Form = document.getElementById('creditForm');
    Form.style.display = Form.style.display === 'none' ? 'block' : 'none';
}

function addCredit() {
    const customer = document.getElementById('customer').value;
    const amaunt = document.getElementById('amaunt').value;
    const paid = document.getElementById('paid').value;
    const comments = document.getElementById('comments').value;
    const createdAt = document.getElementById('createdAt').value;

    const addRow = document.createElement('tr');
    addRow.innerHTML = `
        <td>${customer}</td>
        <td>${amaunt}</td>
        <td>${paid}</td>
        <td>${comments}</td>
        <td>${createdAt}</td>
        <td><button onclick="deleteRow(this)">Delete</button></td>
    `;
    document.getElementById('creditTable').appendChild(addRow);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'connCredit.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    const data = `customer=${customer}&amaunt=${amaunt}&paid=${paid}&comments=${comments}&createdAt=${createdAt}`;

    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };

    xhr.send(data);

    document.getElementById('creditForm').reset();

    // Hide the form after submitting data
    document.getElementById('creditForm').style.display = 'none';
}

function deleteRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

document.addEventListener('DOMContentLoaded', function() {
    fetchDataAndUpdateTable();
});

function fetchDataAndUpdateTable() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'connCredit.php', true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            const data = JSON.parse(xhr.responseText);
            makeTable(data);  // Corrected to use 'makeTable' instead of 'updateTableWithData'
        }
    };

    xhr.send();
}
