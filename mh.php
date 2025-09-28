
<?php
<<<<<<< HEAD
// index.php
require 'db.php';

// handle new student form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $year = (int)($_POST['year'] ?? 1);

    if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("INSERT INTO students (full_name, email, year) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $year]);
        // redirect to avoid form re-submit
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Please enter valid name and email.";
    }
}

// fetch all students
$students = $pdo->query("SELECT * FROM students ORDER BY id DESC")->fetchAll();
?>
<!doctype html>
=======
<<<<<<< HEAD
<!-- registration.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; }
        .container { max-width: 400px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input[type=text], input[type=email], input[type=password], input[type=tel] {
            width: 100%; padding: 10px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;
        }
        input[type=submit] {
            background-color: #4CAF50; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer;
        }
        input[type=submit]:hover { background-color: #45a049; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <?php
    $name = $email = $password = $phone = "";
    $nameErr = $emailErr = $passwordErr = $phoneErr = "";
    $successMsg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Name validation
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = htmlspecialchars($_POST["name"]);
        }

        // Email validation
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }

        // Password validation
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = htmlspecialchars($_POST["password"]);
        }

        // Phone validation
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone number is required";
        } else {
            $phone = htmlspecialchars($_POST["phone"]);
        }

        // Success message if all fields are valid
        if ($name && $email && $password && $phone) {
            $successMsg = "Registration successful!<br>Your details:<br>Name: $name<br>Email: $email<br>Phone: $phone";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
        <span class="error"><?php echo $passwordErr; ?></span>

        <label>Phone Number:</label>
        <input type="tel" name="phone" value="<?php echo $phone; ?>">
        <span class="error"><?php echo $phoneErr; ?></span>

        <input type="submit" value="Register">
    </form>

    <?php
    if ($successMsg) {
        echo "<p class='success'>$successMsg</p>";
    }
    ?>
</div>

</body>
</html>

=======
<!DOCTYPE html>
>>>>>>> 9639dbb090e4b755a2b784df9c17d68ce3998130
<html>
<head>
  <meta charset="utf-8">
  <title>Students Table</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; }
    table { border-collapse: collapse; width: 100%; max-width: 900px; }
    th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }
    th { background: #f4f4f4; }
    form { margin-bottom: 20px; }
    input[type="text"], input[type="email"], select { padding:6px; }
    .error { color: red; }
  </style>
</head>
<body>
  <h1>Students</h1>

  <?php if (!empty($error)): ?>
    <p class="error"><?=htmlspecialchars($error)?></p>
  <?php endif; ?>

  <form method="post" style="max-width:600px;">
    <input type="text" name="full_name" placeholder="Full name" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="year">
      <option value="1">Year 1</option>
      <option value="2">Year 2</option>
      <option value="3">Year 3</option>
    </select>
    <button type="submit">Add Student</button>
  </form>

<<<<<<< HEAD
  <table>
    <thead>
      <tr><th>ID</th><th>Full Name</th><th>Email</th><th>Year</th><th>Created At</th></tr>
    </thead>
    <tbody>
      <?php if (count($students) === 0): ?>
        <tr><td colspan="5">No students yet.</td></tr>
      <?php else: ?>
        <?php foreach ($students as $s): ?>
          <tr>
            <td><?=htmlspecialchars($s['id'])?></td>
            <td><?=htmlspecialchars($s['full_name'])?></td>
            <td><?=htmlspecialchars($s['email'])?></td>
            <td><?=htmlspecialchars($s['year'])?></td>
            <td><?=htmlspecialchars($s['created_at'])?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>


=======
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

<<<<<<< HEAD
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

=======
    <h1>this is foex</h1>
>>>>>>> ed702635a48aa8a20d0e12c4559a9fc98680e81e
</body>
</html>
>>>>>>> 61ca6416d824f93110c92efa29c25835f4c19134

?>
>>>>>>> 9639dbb090e4b755a2b784df9c17d68ce3998130
