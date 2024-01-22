<!DOCTYPE html>
<html>
<head>
    <title>Background Image Example</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
         /* Replace with the path to your image */
            background-size: cover; /* Adjust the size as needed */
            background-repeat: no-repeat;
            margin-bottom: 0px;
        }
        h2{
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color:white;
            margin-top: 400px;
            
        }
        h1{
            font-size: 50px;
            text-align: center;
            
        }
        .main{
            display: flex;
            width:100%;
            padding: 10px;
        }
        .col1,.col2,.col3
        {
            margin: 10px;
            padding:40px;
            background-color: #efeae2;
            border-radius: 2px  #f2f2f2 solid;
            box-shadow: #0000;
        }
        .table{
            border-collapse: collapse;
        }
        .expense{
            padding:30px;
        }
        .table tr th{
            background-color: #efeae2 ;
            margin:5px;
            padding:5px;
            border: 1px solid lightgray;
        }
        .table tr td{
            border: 1px solid lightgray;
            padding:5px;
        }
    </style>
</head>
<body>
     <div class="main">
        <div class="col1">
        Total Expenses For Everythings:<br>
        <?php
        include("session.php");
        $sql=mysqli_query($conn,"SELECT SUM(amaunt) from expenses");
        $result=mysqli_fetch_row($sql);
        echo $result[0];
        ?>
        </div>
        <div class="col2">
        Total sales for each:<br>
        <?php
        $sql=mysqli_query($conn,"SELECT SUM(totalSales) from stock");
        $result=mysqli_fetch_row($sql);
        echo $result[0];
        ?>
        </div>
        <div class="col3">
        Total credit for each person:<br>
        <?php
        $sql=mysqli_query($conn,"SELECT SUM(amaunt) from credit");
        $result=mysqli_fetch_row($sql);
        echo $result[0];
        ?>
        </div>
     </div>
     <div class="expense">
     <?php
        include 'connection.php';
            $query = "SELECT * FROM registration";
            $stmt = mysqli_prepare($conn, $query);
        if ($stmt)
        {
            echo "<table class=\"table\" width=\"100\" height=\"100\">";
            echo "<tr>";
                echo "<th>userid</th>";
                echo "<th>FirstName</th>";
                echo "<th>LastName</th>";
                echo "<th>Email</th>";
                echo "<th>position</th>";
                echo "<th>Birthday</th>";
                echo "<th>Gender</th>";
                echo "<th>Edit user</th>";
                echo "<th>Deactivate user</th>";
                echo "</tr>";
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_row($result))
            {
                echo "<tr>";
                echo "<td>",$row[0],"</td>";
                echo "<td>",$row[1],"</td>";
                echo "<td>",$row[2],"</td>";
                echo "<td>",$row[3],"</td>";
                echo "<td>",$row[4],"</td>";
                echo "<td>",$row[5],"</td>";
                echo "<td>",$row[6],"</td>";
                echo "<td>"."<a href=\"useredit.php?userid=$row[0]\"><div class=\"home1\">EDIT  </div>  </a>"."</td>";
                echo "<td>"."<a href=\"deactivate.php?userid=$row[0]\"><div class=\"home1\">DELETE</div></a>"."</td>";
                echo "</tr>";
            }
            echo "</table";
        }
        ?>
     </div>
    <h2>
        <strong>
        Inventory management software is an indispensable tool for <br>
        efficiently overseeing and controlling your organization's <br>
        stock and resources. Our cutting-edge software offers a seamless <br>
        and comprehensive solution to streamline your inventory operations.<br>
         With a user-friendly interface, real-time tracking, and robust <br>
         reporting capabilities, it empowers you to maintain optimal stock<br>
          levels, reduce carrying costs, and minimize stockouts or overstocking.<br>
          This software is tailored to your specific needs, allowing you to <br>
          categorize and monitor your inventory, set reorder points, and <br>
          automatically generate purchase orders, all while providing <br>
          valuable insights through data analytics. Say goodbye to manual <br>
          inventory management headaches and embrace our software for a smarter, <br>
          more organized, and cost-effective approach to managing your assets and<br>
           ensuring the smooth flow of your business operations.
        </strong>
    </h2>
</body>
</html>
