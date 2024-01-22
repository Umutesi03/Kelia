<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="credit.js" defer></script>
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

   

    </style>
</head>
<body>
    <div class="container">
        <h1>Inventory Management</h1>
        <button class="formBut" type="button" onclick="creditForm()">create Credit</button>

        <form id="creditForm" style="display: none;">
            
            <!-- Common form fields for both order and stock go here -->
            <label for="date">Date</label>
            <input type="date" name="createdAt" id="createdAt" required>

            <label for="customer">Customer</label>
            <input type="text" name="customer" id="customer" required>

            <label for="amount">Amaunt</label>
            <input type="number" name="amaunt" id="amaunt" required>

            <label for="paid">paid</label>
            <input type="number" name="paid" id="paid" required>
            
            <label for="comments">Comment</label>
            <input type="text" name="comments" id="comments" required>
            <button type="button" onclick="addCredit()">Submit</button>

        </form>

        <table id="creditTable">
            <tr>
                <th>Date</th>
                <th>Customer</th>
                <th>Amaunt</th>
                <th>Paid</th>
                <th>Comment</th>
                <th> update</th>
            </tr>
        </table>
    </div>
</body>
</html>
