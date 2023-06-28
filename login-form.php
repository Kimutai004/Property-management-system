<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM login WHERE email = '".$email."' AND password = '".$password."'";
    $result = $conn->query($sql);
    $_SESSION = $result->fetch_array(MYSQLI_ASSOC);
}

    if($_SESSION["usertype"]=="user")
    {$_SESSION["email"]=$email;
    header("Location:admin-index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    
</head>

<body>
    <header>
        <div class="logo">
            <h1>Avenue <em>Homes</em></h1>
            <img src="images/PngItem_5167304.png" alt="User Icon" class="user-icon" style="float: right; margin-top: -60px; margin-left:-40px" height="50px" width="50px">
        </div>
    </header>
    <div class="login-form">
        <h1>Avenue <em>Homes</em></h1>
        <h2>Login</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label>
            <input type="text" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <input type="checkbox" name="remember">Remember me Always<br>
            <h4><a href="forgotpassword.html">Forgot Password?</a></h4><br>

            <input type="submit" name="login" value="Submit">
        </form>
        <?php if (count($errors) > 0) { ?>
            <div class="error">
                <?php foreach ($errors as $error) {
                    echo $error;
                } ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>
