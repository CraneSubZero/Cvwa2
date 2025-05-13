<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.php';

$message = '';
if (isset($_POST['Submit'])) {
    $newpass = $_POST['newpass'];
    // In a real app, update the DB. Here, just simulate.
    $message = "<pre>Password changed to: $newpass (simulated, no DB update)</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - CSRF Simulation</title>
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
    <h2>CSRF Simulation Demo</h2>
    <form method="POST">
        <label for="newpass">New Password:</label>
        <input type="text" name="newpass" id="newpass" required>
        <input type="submit" name="Submit" value="Change Password">
    </form>
    <?php echo $message; ?>
    <div class="card">
        <strong>Try this for CSRF:</strong>
        <pre>&lt;form action='http://localhost/cvwa2/csrf_simulation.php' method='POST'&gt;
&lt;input type='hidden' name='newpass' value='hacked'&gt;
&lt;input type='submit' name='Submit' value='Submit'&gt;
&lt;/form&gt;</pre>
    </div>
</div>
</body>
</html> 