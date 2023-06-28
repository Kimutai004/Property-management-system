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
$sql = "SELECT * FROM payments WHERE tenant_id = 'TENANT_ID'";
$result = $conn->query($sql);
$paymentHistory = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $paymentHistory[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Portal</title>

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

    <div class="welcome-card">
        <h3>WELCOME TENANT!!</h3>
    </div>

    <div class="card-row">
    <div class="card">
            <i class="fas fa-home"></i>
            <h3 class="summary-card-title">Property</h3>
            <p class="summary-card-value"></p>
        </div>
        <div class="card">
            <i class="fas fa-home"></i>
            <h3 class="summary-card-title">House Number</h3>
            <p class="summary-card-value">5</p>
        </div>
          
        <div class="card">
            <i class="fas fa-wallet"></i>
            <h3 class="summary-card-title">Outstanding Balance</h3>
            <p class="summary-card-value">KSH 5000</p>
        </div>
          
        <div class="card">
            <i class="fas fa-wrench"></i>
            <h3 class="summary-card-title">Maintenance Requests</h3>
            <p class="summary-card-value">2</p>
        </div>
    </div>
    <div class="payment-history">
        <h2>Payment History</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paymentHistory as $payment) { ?>
                    <tr>
                        <td><?php echo $payment['date']; ?></td>
                        <td><?php echo $payment['description']; ?></td>
                        <td><?php echo $payment['amount']; ?></td>
                        <td><?php echo $payment['status']; ?></td>
                        <td><a href="receipts/<?php echo $payment['receipt_filename']; ?>" target="_blank">View Receipt</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
