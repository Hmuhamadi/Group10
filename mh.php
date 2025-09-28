<?php
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


?>
