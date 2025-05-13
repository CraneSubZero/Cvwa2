<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.php';

$result_html = '';
if (isset($_GET['Submit'])) {
    $id = $_GET['id'];
    cvwa2DatabaseConnect();
    $query = "SELECT first_name, last_name FROM users WHERE user_id = '$id'";
    $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $result_html = "<pre>ID: $id\nFirst name: {$row['first_name']}\nSurname: {$row['last_name']}</pre>";
    } else {
        $result_html = "<pre>No user found for ID: $id</pre>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - SQL Injection</title>
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
        <?php if (!empty($_SESSION['cvwa2_logged_in'])): ?>
            <span>Welcome, <strong><?php echo htmlspecialchars($_SESSION['cvwa2_user']); ?></strong></span>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
        <a href="security.php">Security Level</a>
        <button class="toggle-mode" onclick="toggleDarkMode()">Toggle Dark Mode</button>
    </div>
</nav>
<div class="container">
    <h2>SQL Injection Demo</h2>
    <form method="GET">
        <label for="id">User ID:</label>
        <input type="text" name="id" id="id" required>
        <input type="submit" name="Submit" value="Submit">
    </form>
    <?php echo $result_html; ?>
    <div class="card">
        <strong>Try this for SQL Injection:</strong>
        <pre>1' OR '1'='1</pre>
    </div>
</div>
</body>
</html> 