<html>
    <head>
        <title>Login and Registration Website</title>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <style>
             body {
            background-image: url("Beer.jpg"); /* Replace with the path to your image */
            background-size: cover; /* Adjust the size as needed */
            background-repeat: no-repeat;
            margin-bottom: 0px;
             }

.form {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
    text-align: center;
    margin-left: 400px;
    margin-top: 150px;
}

.form h1 {
    color: #333;
}

label {
    display: block;
    
}

input[type="text"],
input[type="password"] {
    width: 100%;
   
    box-sizing: border-box;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

a {
    text-decoration: none;
    color: #333;
}

a:hover {
    color: #4caf50;
}

.error {
    color: red;
  
}

             
        </style>
    
    </head>
    <body>
        <div>
          <form  method="post">
                <div class="form">
                    <h1>Login</h1>
                    
                        
                           <label>Email</label><br/><br/>
                          
                            <input type="text" name="emails" placeholder="Email or Username"><br/>
                            
                        
                            <label>Password</label><br/><br/>
                            <input type="password" name="psws" placeholder="Password"><br/>
                            
                        
                        
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot Password?</a><br/><br/>
                            <button type="submit" name="submit" class="btn">Login<br/></button>
                            <div>
                                <p>Don't have an account? <a href="signup.php">Register</a></p>
                            </div>
                       
                    
                </div>
          </form>
        </div>
        <?php
include('Connection.php');
$error='';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    $Reemail = $_POST['emails'];
    $Repassword = $_POST['psws'];

    $sql = "SELECT * FROM registration WHERE Email='$Reemail' AND Password='$Repassword'";
    $connect = mysqli_query($conn, $sql);

    if (mysqli_num_rows($connect) > 0) {
        $row = mysqli_fetch_assoc($connect);
        $FirstName = $row['FirstName'];
        $secondName = $row['LastName'];
        $_SESSION['log_user']=$Reemail;
        header("Location:inventory.php");
        exit();
    }
    else {
        $error= "please register";
    }
}
$conn->close();
?>

        
    </body>
</html>