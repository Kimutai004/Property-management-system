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
    $value1 = $_POST["Property_Name"];
    $value2 = $_POST["Location"];
    $value3 = $_POST["Property_Description"];
    $value4 = $_POST["No_Of_Units"];
    $value5 = $_POST["Expected_Rent"];
    $value6 = $_POST["Owner"];

    // Prepare and bind the data to be inserted
    $stmt = $conn->prepare("INSERT INTO properties (Property_Name, Location, Property_Description, No_Of_Units, Expected_Rent, Owner) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $value1, $value2, $value3, $value4, $value5, $value6);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
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
                    <li><a href="view-property.html">Remove Properties</a></li>
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
    <div class="add-form">
            <h1>Avenue <em>Homes</em></h1>
            <h2>Add A House</h2>
            <form action="add-property.php" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="rownomargin">
                            <label for="Property_Name">Property Name:</label>
                            <Input type="text" name="Property_Name">
                        </div>
                        <div class="rownomargin">
                            <label for="Location">Location:</label>
                            <Input type="text" name="Location">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="rownomargin">
                            <label for="Property Description">Property Description:</label>
                            <Input type="text" name="Property_Description">
                        </div>
                        <div class="rownomargin">
                            <label for="No Of Units">No Of Units:</label>
                            <Input type="text" name="No_Of_Units">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="rownomargin">
                            <label for="Expected Rent">Expected Rent:</label>
                            <Input type="text" name="Expected_Rent">
                        </div>
                        <div class="rownomargin">
                            <label for="Owner">Owner:</label>
                            <Input type="text" name="Owner">
                        </div>
                    </div><br>
                    
                </div>
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







