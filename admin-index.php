<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login-form.php'); // Redirect to the login page
   
}

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$propertyCount = 0; // Initialize the count to 0
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Query to retrieve the count of properties from the database
    $query = "SELECT COUNT(*) AS count FROM properties";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $propertyCount = $row['count']; // Retrieve the count value
    }
}
$sql = "SELECT expected_rent FROM properties"; // Replace "your_table_name" with the actual table name in your database
$result = $conn->query($sql);

// Initialize the sum of expected rent to 0
$sumExpectedRent = 0;

// Calculate the sum of expected rent
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Add each expected rent value to the sum
        $sumExpectedRent += $row['expected_rent'];
    }
}
?>

<!-- Rest of your HTML code -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="script.js">
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
                <a href="admin-index.php">Dashboard</a>
            </li>
            <li>
                <a href="#" class="property-btn">Properties <span class="fas fa-caret-down"></span></a>
                <ul class="property-show">
                  <li><a href="view-property.php">View Properties</a></li>
                  <li><a href="add-property.php">Add Properties</a></li>
                  <li><a href="remove-property.html">Remove Properties</a></li>
                </ul>
            </li>
              
            <li>
                <a href="/dashboard">Payment</a>
            </li>
            <li><a href="tenants-in.php" class="tenant-btn">Tenants</a></li>
            
            <li>
                <a href="register-form.php" class="users-btn">Register New Tenants</a>
             </li>
        </ul>
        
    </nav>
    
        <div class="welcome-card">
            <h3>WELCOME ADMIN!!</h3>
        </div>
    
        <div class="card-row">
            <div class="card" style="background-color: yellow;">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Rent Collected</h3>
                <p>KSH 5000</p>
            </div>
            <div class="card" style="background-color: #00FA9A;">
                <i class="fas fa-home"></i>
                <h3>Properties</h3>
                <p><?php echo $propertyCount; ?></p>
            </div>
            <div class="card">
                <i class="fas fa-chart-line"></i>
                <h3>Expected Returns</h3>
                <p>KSH <?php echo $sumExpectedRent; ?></p>
            </div>
            <div class="card">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Rent Collected</h3>
                <p>KSH 5000</p>
            </div>
        </div>
        <div class="card-row-1">
            <div class="card">
                <i class="fas fa-money-check-alt"></i>
                <h3>Outstanding Balance</h3>
                <p>KSH 5000</p>
            </div>
            <div class="card" style="background-color:#FF6347 ;">
                <i class="fas fa-users"></i>
                <h3>Tenants With Balance</h3>
                <p>5000</p>
            </div>
        </div>


    <script>// Get the elements
        var propertyBtn = document.querySelector('.property-btn');
        var propertyShow = document.querySelector('.property-show');
        
        // Add event listener to the property button
        propertyBtn.addEventListener('click', function() {
          // Toggle the display of the property show element
          propertyShow.style.display = propertyShow.style.display === 'block' ? 'none' : 'block';
        });
        

    </script>
</body>
</html>
















