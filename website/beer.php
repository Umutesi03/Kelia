<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="order.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="receipt.js"></script>
    <style> button{
    padding: 20px;
    background-color: rgb(52, 64, 97);
    color: white;
    font-size: 22px;
}</style>
    
</head>
<body>
    
    <table id="itemTable">
            <tr><td><button style="padding-right:90px;"> Mitzing</button></td><td><button style="padding-right:80px;"> Amstel</button></td><td><button style="padding-right:75px;"> Heinken</button></td><td><button style="padding-right:35px;"> Skol Pulse</button></td></td></tr>
            <tr><td><button style="padding-right:72px;"> Skol Malt</button></td><td><button style="padding-right:50px;"> skol Lager</button></td><td><button style="padding-right:35px;"> Tusker lager</button></td><td><button style="padding-right:35px;"> Virunga</button></tr>
            <tr><td><button style="padding-right:45px;"> Tusker malt</button></td><td><button style="padding-right:35px;"> Big Mutzing</button></td><td><button style="padding-right:86px;"> Primus</button></td><td><button style="padding-right:35px;"> Big Primus</button></td></tr>
            <tr><td><button style="padding-right:35px;"> Big skol malt</button></td><td><button style="padding-right:115px;"> Kiki</button></td><td><button style="padding-right:97px;"> Pablo</button></td><td><button style="padding-right:10px;"> Skol lager cannete</button></td></tr>
            <td><button style="padding-right:98px;"> Amstel</button></td><td><button style="padding-right:70px;"> Heinken</button></td><td><button style="padding-right:67px;"> Heinken</button></td></tr>
            
        </table>
   
        <script>
        // Beer-specific JavaScript code ...
        function addItem(itemName, unitPrice) {
            const quantity = parseInt(prompt(`Enter quantity for ${itemName}:`));

            if (!isNaN(quantity)) {
                parent.addItemToReceipt(itemName, unitPrice, quantity);
            } else {
                alert('Invalid input. Please enter a valid quantity.');
            }
        }
    </script>
    </html>