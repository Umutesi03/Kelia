function makeTable(data) {
    const table = document.getElementById('expensesTable');
    data.forEach(rowData => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${rowData.createdAt}</td>
            <td>${rowData.descriptions}</td>
            <td>${rowData.amaunt}</td>
            <td>${rowData.comments}</td>
            <td><button onclick="deleteRow(this)">Delete</button></td>
        `;
        table.appendChild(row);
    });
}

function makeform() {
    const Form = document.getElementById('expenseForm');
    Form.style.display = Form.style.display === 'none' ? 'block' : 'none';
}

function addExpense() {
    const descriptions = document.getElementById('descriptions').value;
    const amaunt = document.getElementById('amaunt').value;
    const comments = document.getElementById('comments').value;
    const createdAt = document.getElementById('createdAt').value;

    const addRow = document.createElement('tr');
    addRow.innerHTML = `
        <td>${descriptions}</td>
        <td>${amaunt}</td>
        <td>${comments}</td>
        <td>${createdAt}</td>
        <td><button onclick="deleteRow(this)">Delete</button></td>
    `;
    document.getElementById('expensesTable').appendChild(addRow);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'connectexpense.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    const data = `descriptions=${descriptions}&amaunt=${amaunt}&comments=${comments}&createdAt=${createdAt}`;

    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };

    xhr.send(data);

    document.getElementById('expenseForm').reset();

    // Hide the form after submitting data
    document.getElementById('expenseForm').style.display = 'none';
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
    xhr.open('GET', 'connectexpense.php', true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            const data = JSON.parse(xhr.responseText);
            makeTable(data);  // Corrected to use 'makeTable' instead of 'updateTableWithData'
        }
    };

    xhr.send();
}
