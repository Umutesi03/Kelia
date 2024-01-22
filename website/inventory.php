<?php
include("session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Inventory software</title>
        <link rel="stylesheet" type="text/css" href="inventory.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="body">
            <header>
        <div class="links">
           <div> <a href="dashboard.php" target="iframe_a" class="link"><i class="fa-solid fa-gauge"></i>Dashboard</a></div>
        <div><a href="stock.php" target="iframe_a" class="link"> <i class="fa-solid fa-cubes-stacked"></i>In stock</a></div>
            
                <div class="dropdown">
                    <a href="#" class="link"><i class="fa-solid fa-command"></i> Order</a>
                    <div class="dropdown-content">
                      <a href="order.php" target="iframe_a">Drinks</a>
                      <a href="food.php" target="iframe_a">Foods</a>
                    </div>
                  </div>                  
            <div><a href="expenses.php" target="iframe_a" class="link">expenses</a></div>
            <div><a href="credit.php" target="iframe_a" class="link"><i class="fa-solid fa-bars-progress"></i>Credit</a></div>
            <div> <a href="" target="iframe_a"class="link"> <i class="fa-solid fa-hotel"></i>reports</a></div>
            <div> <a href="logout.php" class="link">Logout</a></div>
            <div> 
                
            </div>
            <?php
    if (isset($firstName) && isset($lastName)) {
        echo $firstName . ' ' . $lastName;
    } else {
        echo "User not found";
    }
    ?>

        </div>
    </header>
    <footer>
        
        <div class="top">
            
            <p><strong>Inventory Management software</strong></p>
            </div>
            <!--
           <div class="search">
           <input type="text" name="" id="myinput">
           <i class="fa-solid fa-magnifying-glass"></i>
          </div> 
          <div class="choice">
          <label> <strong>status</strong></label>
          <select name="type" id="select">
            <option value="choose">Choose the type of order</option>
            <option value="drinks">Drinks</option>
            <option value="Foods">Foods</option>
           </select>
        </div>
          </div>
-->
          <div class="big">
            <div class="left">
                <div class="form">           
                    <form>
                   <label id="label"> Orders of today</label>
                   <input type="text" id="demo">
               </form>
               <form>
                   <label id="label"> pending orders</label>
                   <input type="text" id="demo">
               </form>
               <form>
                   <label id="label"> Delivered orders</label>
                   <input type="text" id="demo">
               </form>
               <form>
                   <label id="label"> cancellered orders</label>
                   <input type="text" id="demo">
               </form>
           
       
               </div>
            </div>
                
            <div class="frame">
            <iframe src="iframe.php" name="iframe_a" height="3000px" width="100%" frameborder="0">
            </iframe>
        </div>
          </div>
    </div>
</footer>
<script>
    var currentPage = window.location.pathname;
    var navLinks = document.getElementsByClassName("link");
    
    for (var i = 0; i < navLinks.length; i++) {
      if (currentPage === navLinks[i].pathname) {
        navLinks[i].classList.add("active");
      }
    }
    </script>
    
    

    </body>
    
</html>