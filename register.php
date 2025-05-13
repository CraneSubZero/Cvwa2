<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.php';

$error = '';
$success = '';
if (isset($_POST['Register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    cvwa2DatabaseConnect();
    $query = "SELECT * FROM users WHERE user = '$user'";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    if (mysqli_fetch_assoc($result)) {
        $error = 'Username already exists!';
    } else {
        $query = "INSERT INTO users (first_name, last_name, user, password) VALUES ('$first', '$last', '$user', '$pass')";
        if (mysqli_query($GLOBALS["___mysqli_ston"], $query)) {
            $success = 'Registration successful! You can now <a href=\"login.php\">login</a>.';
        } else {
            $error = 'Registration failed. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 Register</title>
    <link rel="stylesheet" href="assets/style.css">
    <script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('cvwa2-dark', document.body.classList.contains('dark-mode'));
    }
    window.onload = function() {
        if(localStorage.getItem('cvwa2-dark') === 'true') {
            document.body.classList.add('dark-mode');
        }
    }
    </script>
</head>
<body>
<nav>
    <div><strong>CVWA2</strong></div>
    <div>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="security.php">Security Level</a>
        <button class="toggle-mode" onclick="toggleDarkMode()">Toggle Dark Mode</button>
    </div>
</nav>
<div class="container">
<h2>Register for CVWA2</h2>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>
<form method="POST">
    First Name: <input type="text" name="first_name" required><br>
    Last Name: <input type="text" name="last_name" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="Register" value="Register">
</form>
<p>Already have an account? <a href="login.php">Login here</a></p>
</div>
</body>
</html>