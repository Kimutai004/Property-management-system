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

// Process the payment form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenantId = $_SESSION["tenant_id"];
    $amount = $_POST["amount"];
    $paymentMethod = $_POST["payment_method"];

    // Perform necessary validations and payment processing logic
    // ...

    // Insert payment record into the database
    $sql = "INSERT INTO payments (tenant_id, amount, payment_method) VALUES ('$tenantId', '$amount', '$paymentMethod')";
    if ($conn->query($sql) === TRUE) {
        // Payment successful, redirect to a success page
        header("Location: payment_success.php");
        exit();
    } else {
        // Payment failed, display an error message
        $errorMessage = "Payment failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Payment</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/8bd882cbe6.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <div class="logo">
            <h1>Avenue <em>Homes</em></h1>
        </div>
        <div class="menu">
            <a href="#mainnav" id="menuicon">
                <div class="hamburger"></div><br>
                <div class="hamburger1"></div><br>
                <div class="hamburger2"></div><br>
            </a>   
        </div>
    </header>

    <nav id="mainnav">
        <ul id="mainmenu">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="/dashboard">Payment</a>
            </li>
            <li>
                <a href="/dashboard">Maintenance</a>
            </li>
            <li>
                <a href="/dashboard">Report</a>
            </li>
        </ul>
    </nav>
        

    <div class="payment-form">
        <h2>Make a Payment</h2>
        <?php if (isset($errorMessage)) { ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php } ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="container">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" required>
            </div>
            <div class="form-group">
                <label for="payment-method">Payment Method:</label>
                <select name="payment_method" id="payment-method" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="debit_card">Debit Card</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="bank_transfer">M-PESA</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Pay Now">
            </div>
            </div>
        </form>
    </div>
</body>
</html>
