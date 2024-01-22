<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="order.css">
    <script src="links.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="receipt.js"></script>
    <style> 
    .myButton{
    background-color: rgb(91, 91, 238);
    padding: 20px;
    }
    
  </style>
</head>
<body>
    <div class="bigg">
        <div class="left">
            <table>
                <tr>
                    <td><button class="myButton" onclick="navigateTo('softdrinks.php', this)">Soft drink</button></td>
                    <td><button class="myButton" onclick="navigateTo('beer.php', this)">Beers</button></td>
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
            <iframe src="iframe2.php" name="iframe_b" height="1500px" width="600px" frameborder="0"></iframe>
        </div>
    </div>

    

    <script>
        const myButton = document.querySelector('.myButton');
        myButton.addEventListener('click', () => {
            myButton.style.backgroundColor = 'green';
        });

        function navigateTo(page, button) {
            document.getElementsByName("iframe_b")[0].src = page;

            document.querySelectorAll('.myButton').forEach(btn => {
                btn.style.backgroundColor = '';
            });

            button.style.backgroundColor = 'green';
        }
    </script>
</body>
</html>
