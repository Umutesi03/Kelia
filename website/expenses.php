<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="expense.js" defer></script>
    <style>
       .formBut{
    color: white;
    background-color: blue;
    margin-left: 700px;
    border: none;
    padding: 5px;
    border-radius: 10px;
    
}
.form {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
    }

    .form label {
        margin-bottom: 5px;
    }

    .form input,
    .form button {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form button {
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    #expensesTable {
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;
    }

    #expensesTable th,
    #expensesTable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    </style>
</head>
<body>
    <div class="container">
        <h1>Inventory Management</h1>
        <button class="formBut" type="button" onclick="makeform()">create Expenses</button>

        <form id="expenseForm" style="display: none;">
            <label for="date">Date</label>
            <input type="date" name="createdAt" id="createdAt" required>

            <label for="descriptions">Description</label>
            <input type="text" name="descriptions" id="descriptions" required>

            <label for="amount">Amaunt</label>
            <input type="number" name="amaunt" id="amaunt" required>

            <label for="comments">Comment</label>
            <input type="text" name="comments" id="comments" required>
            <button type="button" onclick="addExpense()">Submit</button>
        </form>

        <table id="expensesTable">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Amaunt</th>
                <th>Comment</th>
                <th> Edit</th>
            </tr>
        </table>
    </div>
</body>
</html>
