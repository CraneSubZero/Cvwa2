<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.php';

$error = '';
if (isset($_POST['Login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    cvwa2DatabaseConnect();
    $query = "SELECT * FROM users WHERE user = '$user' AND password = '$pass'";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['cvwa2_logged_in'] = true;
        $_SESSION['cvwa2_user'] = $user;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 Login</title>
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
<h2>Login to CVWA2</h2>
<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="Login" value="Login">
</form>
<p>Don't have an account? <a href="register.php">Register here</a></p>
</div>
</body>
</html>