<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
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
        <button class="formBut" onclick="toggleForm()">Create Stock</button>

        <form id="inventoryForm" style="display: none;">
           
            <!-- Common form fields for both order and stock go here -->
            <label for="itemType">Item Type:</label>
            <select id="itemType" name="itemType" required onchange="populateSpecificItems()">
                <option value="beer">Beer</option>
                <option value="wine">Wine</option>
                <option value="softdrink">Soft Drink</option>
                <option value="importeddrink">Imported Drink</option>
            </select>

            <div id="specificItemsForm" style="display: none;">
                <label for="specificItem">Choose Specific Item:</label>
                <select id="specificItem" name="specificItem" required>
                    <!-- Options for specific items will be populated dynamically using JavaScript -->
                </select>
            </div>


            <label for="opening">Opening:</label>
            <input type="number" name="opening" id="opening" required>

            <label for="added">Added:</label>
            <input type="number" name="added" id="added" required>

            <label for="closingStock">Closing Stock:</label>
            <input type="number" name="closingStock" id="closingstock" required>

            <label for="unitPrice">U.P:</label>
            <input type="number" name="unitPrice" id="unitPrice" required>
            <label for="date">date</label>
            <input type="date" name="createdAt" id="createdAt" required>
            <button type="button" onclick="submitData()">Submit</button>
        </form>

        <table id="inventoryTable">
            <tr>
                
                <th>Item Category</th>
                <th>Item name</th>
                <th>Opening</th>
                <th>Added</th>
                <th>Total</th>
                <th>Closing Stock</th>
                <th>Sales</th>
                <th>Unit Price</th>
                <th>Total Sales</th>
                <th> Date </th>
                <th>Action</th>
            </tr>
        </table>
    </div>
</body>
</html>
