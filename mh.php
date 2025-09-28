<?php
<!DOCTYPE html>
<html>
<head>
    <title>Create Table with PHP</title>
</head>
<body>
    <h2>Create Table Example</h2>

    <?php
    $servername = "localhost";
    $username   = "root";     
    $password   = "";         
    $dbname     = "testdb";  

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
    }

    // Step 2: SQL to create table
    $sql = "CREATE TABLE students (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        age INT(3) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Table <b>students</b> created successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error creating table: " . $conn->error . "</p>";
    }
    $conn->close();
    ?>

    <p><a href="index.php">Go back to homepage</a></p>

    <!DOCTYPE html>
<html>
<head>
    <title>Create Table</title>
</head>
<body>
    <h3>Create Table Example</h3>
    // new pushing

    <?php
    $conn = new mysqli("localhost", "root", "", "testdb"); // DB connection
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $sql = "CREATE TABLE simple_table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Table created successfully!</p>";
    } else {
        echo "<p>Table already exists or error: " . $conn->error . "</p>";
    }

    $conn->close();
    ?>
</body>
</html>

</body>
</html>

?>
