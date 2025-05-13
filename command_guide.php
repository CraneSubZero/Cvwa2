<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - Command Injection Guide</title>
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
    <h2>Command Injection Guide</h2>
    <div class="card">
        <h3>What is Command Injection?</h3>
        <p>Command injection is a vulnerability that allows an attacker to execute arbitrary commands on the host operating system via a vulnerable application. This can lead to full system compromise.</p>
        <h3>Sample Payload</h3>
        <pre>127.0.0.1; cat /etc/passwd</pre>
        <h3>How to Prevent</h3>
        <ul>
            <li>Never pass user input directly to system commands.</li>
            <li>Use safe APIs and avoid shell execution when possible.</li>
            <li>Validate and sanitize all user input.</li>
        </ul>
        <h3>References</h3>
        <ul>
            <li><a href="https://owasp.org/www-community/attacks/Command_Injection" target="_blank">OWASP Command Injection</a></li>
        </ul>
    </div>
</div>
</body>
</html> 