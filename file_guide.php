<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - File Upload Guide</title>
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
    <h2>File Upload Guide</h2>
    <div class="card">
        <h3>What is a File Upload Vulnerability?</h3>
        <p>File upload vulnerabilities allow attackers to upload malicious files to a server. This can lead to remote code execution, defacement, or data theft if the uploaded file is executed or accessed by others.</p>
        <h3>How to Exploit in CVWA2</h3>
        <p>Go to the <strong>File Upload</strong> module. Try uploading a file like:</p>
        <pre>&lt;?php echo 'Hacked!'; ?&gt;</pre>
        <p>If the server saves and executes this file, it could be used to run arbitrary code.</p>
        <h3>How to Prevent</h3>
        <ul>
            <li>Check file type and extension on upload.</li>
            <li>Rename uploaded files and store them outside the web root.</li>
            <li>Never execute or include uploaded files.</li>
        </ul>
        <h3>References</h3>
        <ul>
            <li><a href="https://owasp.org/www-community/vulnerabilities/Unrestricted_File_Upload" target="_blank">OWASP File Upload</a></li>
        </ul>
    </div>
</div>
</body>
</html> 