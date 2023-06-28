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

// Query to retrieve data from the database
$query = "SELECT * FROM login";
$result = $conn->query($query);
?>
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
            <li><a href="tenants-in.html" class="tenant-btn">Tenants</a></li>
            
            <li>
                <a href="register-form.html" class="users-btn">Register New Tenants</a>
             </li>
        </ul>
    </nav>

    <table action="" id="property-table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Property </th>
            <th>House Number</th>
            <th>Date of Arrival</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['First_Name']; ?></td>
                    <td><?php echo $row['Last_Name']; ?></td>
                    <td><?php echo $row['Phone_Number']; ?></td>
                    <td><?php echo $row['Property']; ?></td>
                    <td><?php echo $row['House_Number']; ?></td>
                    <td><?php echo $row['Date_of_Arrival']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Password']; ?></td>
                    <td><a href="edit-tenant.html">Edit</a><br><a href="remove.html">Remove</a></td>
                </tr>
            <?php endwhile; ?>
            
    </table>

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