<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Stock Form</h2>

<form id="stockForm">
    <label for="drinkType">Choose a drink:</label>
    <select id="drinkType" name="drinkType">
        <option value="beer">Beer</option>
        <option value="wine">Wine</option>
        <option value="liquors">Beer</option>
        <option value="liquor2">Wine</option>
        <option value="importeddrink">Beer</option>
        <option value="softdrink">Wine</option>
        <!-- Add more options for different drink types as needed -->
    </select>

    <label for="specificDrink">Choose a specific drink:</label>
    <select id="specificDrink" name="specificDrink" disabled>
        <!-- Options for specific drinks will be populated dynamically using JavaScript -->
    </select>

    <button type="button" onclick="addToTable()">Add to Table</button>
</form>

<table id="stockTable">
    <thead>
        <tr>
            <th>Drink Type</th>
            <th>Specific Drink</th>
        </tr>
    </thead>
    <tbody>
        <!-- Table content will be populated dynamically using JavaScript -->
    </tbody>
</table>

<script>
    // Sample data for different drink types and their specific drinks
    const drinksData = {
        beer: ["Heineken", "Budweiser", "Guinness"],
        wine: ["Red Wine", "White Wine", "Rosé"]
        // Add more drink types and their specific drinks as needed
    };

    // Function to populate the specific drinks dropdown based on selected drink type
    function populateSpecificDrinks() {
        const drinkTypeSelect = document.getElementById("drinkType");
        const specificDrinkSelect = document.getElementById("specificDrink");
        const selectedDrinkType = drinkTypeSelect.value;

        // Clear previous options
        specificDrinkSelect.innerHTML = "";

        // Enable or disable the specific drink dropdown based on the selected drink type
        specificDrinkSelect.disabled = (selectedDrinkType === "");

        // Populate options for specific drinks based on the selected drink type
        drinksData[selectedDrinkType].forEach(drink => {
            const option = document.createElement("option");
            option.value = drink;
            option.textContent = drink;
            specificDrinkSelect.appendChild(option);
        });
    }

    // Function to add selected drink to the table
    function addToTable() {
        const drinkType = document.getElementById("drinkType").value;
        const specificDrink = document.getElementById("specificDrink").value;

        // Check if both drink type and specific drink are selected
        if (drinkType && specificDrink) {
            const table = document.getElementById("stockTable").getElementsByTagName('tbody')[0];
            const newRow = table.insertRow(table.rows.length);
            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            cell1.textContent = drinkType;
            cell2.textContent = specificDrink;

            // Clear form fields
            document.getElementById("drinkType").value = "";
            document.getElementById("specificDrink").value = "";
        } else {
            alert("Please select both drink type and specific drink.");
        }
    }

    // Attach event listener to the drink type dropdown
    document.getElementById("drinkType").addEventListener("change", populateSpecificDrinks);
</script>

</body>
</html>
