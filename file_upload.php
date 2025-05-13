<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.php';

$message = '';
if (isset($_POST['Submit']) && isset($_FILES['upload'])) {
    $filename = $_FILES['upload']['name'];
    // In a real app, move the file. Here, just simulate.
    $message = "<pre>Uploaded file: $filename (simulated, not saved)</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - File Upload</title>
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
    <h2>File Upload Demo</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="upload">Select file to upload:</label>
        <input type="file" name="upload" id="upload" required>
        <input type="submit" name="Submit" value="Upload">
    </form>
    <?php echo $message; ?>
    <div class="card">
        <strong>Try uploading a .php file or a script!</strong>
        <pre>&lt;?php echo 'Hacked!'; ?&gt;</pre>
    </div>
</div>
</body>
</html> 