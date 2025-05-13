<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
$levels = ['low', 'medium', 'high', 'impossible'];
if (isset($_POST['level']) && in_array($_POST['level'], $levels)) {
    setcookie('security', $_POST['level'], time() + 3600, '/');
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header('Location: ' . $redirect);
    exit;
}
$current = isset($_COOKIE['security']) ? $_COOKIE['security'] : 'impossible';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 Security Level</title>
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
<h2>Set Security Level</h2>
<form method="POST">
    <select name="level">
        <?php foreach ($levels as $level): ?>
            <option value="<?php echo $level; ?>" <?php if ($current == $level) echo 'selected'; ?>><?php echo ucfirst($level); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Set Level">
</form>
<p>Current level: <strong><?php echo ucfirst($current); ?></strong></p>
<p><a href="index.php">Back to Home</a></p>
</div>
</body>
</html>