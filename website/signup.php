<?php
$error = "";
include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $FirstName = $_POST['fname'];
    $SecondName = $_POST['lname']; 
    $Email = $_POST['email'];
    $Birthday = $_POST['birthday'];
    $Position = $_POST['position'];
    $Password = $_POST['psw'];
    $Cpassword = $_POST['cpsw'];
    $Gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    
    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT Email FROM registration WHERE Email = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 0) {
        $stmt->close();

        if ($Password != $Cpassword) {
            $error = "Error: Password and confirm password do not match.";
        } else {
            // Using prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO registration (FirstName, LastName, Gender, Position, Password, Passwordconfirm, Email, Birthday) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $FirstName, $SecondName, $Gender, $Position, $Password, $Cpassword, $Email, $Birthday);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                header("location: inventory.php");
                exit();
            } else {
                $error = "Error: " . $stmt->error;
            }
        }
    } else {
        $error = "You already have an account!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login or Sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

form {
    width: 250px;
    margin: 10px auto;
    padding: 5px;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 2px;
}

input[type="text"],
input[type="date"],
input[type="email"],
input[type="password"],
select {
    width: calc(100% - 6px);
    padding: 2px;
    margin-bottom: 2px;
    box-sizing: border-box;
}

select {
    margin-bottom: 2px;
}

input[type="radio"] {
    width: auto;
    margin-right: 2px;
}

input[type="submit"] {
    background: #4caf50;
    color: #fff;
    padding: 2px 6px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 2px;
}

input[type="submit"]:hover {
    background: #45a049;
}

.error {
    color: red;
    margin-bottom: 2px;
}


</style>
<body>
    <form action="" method="POST">
        <?php echo $error;?><br>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" required><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" required><br>
        <label for="birthday">Your Birthday:</label><br>
        <input type="date" id="birthday" name="birthday" required><br><br>
        <label for="gender">Gender:</label><br>
        <label>
            <input type="radio" name="gender" value="male" required> Male
        </label><br>
        <label>
            <input type="radio" name="gender" value="female" required> Female
        </label><br>
        <label>
            <input type="radio" name="gender" value="other" required> Prefer not to say
        </label><br><br>
        <label for="position">Choose your position:</label><br>
        <select name="position" required>
            <option value="choose your position">Choose your position</option>
            <option value="owner">Owner</option>
            <option value="Housekeeping and Cleaning Staff">Housekeeping and Cleaning Staff</option>
            <option value="Food and Beverage Staff">Food and Beverage Staff</option>
            <option value="Maintenance">Maintenance</option>
            <option value="Sales and Marketing">Sales and Marketing</option>
            <option value="Accounting and Finance">Accounting and Finance</option>
            <option value="Managing Director">Managing Director</option>
            <option value="Reception staff">Reception staff</option>
        </select><br><br>
        <label for="email">Enter your email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="psw" required><br>
        <label for="cpsw">Confirm your Password:</label><br>
        <input type="password" id="cpsw" name="cpsw" required><br>

        <input type="submit" value="Sign Up">
    </form>

    <?php
    
    ?>
</body>

</html>