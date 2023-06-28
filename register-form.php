<?php
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
echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the input fields
    $value1 = $_POST["first_name"];
    $value2 = $_POST["last_name"];
    $value3 = $_POST["phone_number"];
    $value4 = $_POST["id_number"];
    $value5 = $_POST["property_name"];
    $value6 = $_POST["house_number"];
    $value7 = $_POST["email"];
    $value8 = $_POST["password"];
    $value9 = $_POST["date_of_arrival"];
    $value10 = $_POST["usertype"];

    // Prepare and bind the data to be inserted
    $stmt = $conn->prepare("INSERT INTO login (First_Name, Last_Name, Phone_Number, ID_number, Property, House_Number, Email, Password, Date_Of_Arrival, usertype) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssssssss", $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
<link rel="stylesheet" href="style.css">   
<link rel="stylesheet" href="script.js">
<link rel="stylesheet" href="fontawesome-free-5.15.4-web\fontawesome-free-5.15.4-web\css\all.min.css">
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
                <a href="#" class="property-btn">Properties</a>
                <ul class="property-show">
                    <li><a href="view-property.php">View Properties</a></li>
                    <li><a href="add-property.php">Add Properties</a></li>
                    <li><a href="view-property.html">Remove Properties</a></li>
                </ul>
            </li>
            <li>
                <a href="/dashboard">Payment</a>
            </li>
            <li>
                <a href="tenants-in.html">Tenants</a>
            </li>
            <li>
                <a href="/dashboard">Maintainances</a>
            </li>
            <li>
                <a href="#">Users</a>
                <ul>
                    <li><a href="register-form.php">Register New Tenants</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="register-form">
        <h1>Avenue <em>Homes</em></h1>
        <h2>Register</h2>
        <form method="POST" action="register-form.php">
            <div class="container">
                <div class="row">
                    <div class="rownomargin">
                        <label for="first_name">First Name:</label>
                        <Input type="text" name="first_name" >
                    </div>
                    <div class="rownomargin">
                        <label for="last_name">Last Name:</label>
                        <Input type="text" name="last_name">
                    </div>
                </div><br>
                <div class="row">
                    <div class="rownomargin">
                        <label for="phone_number">Phone Number:</label>
                        <Input type="text" name="phone_number">
                    </div>
                    <div class="rownomargin">
                        <label for="id_number">ID Number:</label>
                        <Input type="number" name="id_number">
                    </div>
                </div><br>
                <div class="row">
                    <div class="rownomargin">
                        <label for="property_name">Property:</label>
                        <Input type="text" name="property_name">
                    </div>
                    <div class="rownomargin">
                        <label for="house_number">House Number:</label>
                        <Input type="text" name="house_number" >
                    </div>
                </div><br>
                <div class="row">
                    <div class="rownomargin">
                        <label for="email">Email:</label>
                        <Input type="text" name="email">
                    </div>
                    <div class="rownomargin">
                        <label for="password">Password:</label>
                        <Input type="password" name="password">
                    </div>
                </div><br>
                <div class="row">
                    <div class="rownomargin">
                        <label for="date_of_arrival">Date of Arrival:</label>
                        <Input type="date" name="date_of_arrival">
                    </div>    
                    <div class="rownomargin">
                        <label for="usertype">Role:</label>
                        <Input type="text" name="usertype">
                    </div> 
                </div>
            </div><br>
            <input type="checkbox">I hereby confirm to agreeing with the terms and conditions<br>
            <input type="submit" value="Submit">    
        </form>
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