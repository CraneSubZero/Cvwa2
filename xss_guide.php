<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - XSS Guide</title>
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
    <h2>XSS Guide</h2>
    <div class="card">
        <h3>What is XSS?</h3>
        <p>Cross-Site Scripting (XSS) is a vulnerability that allows attackers to inject malicious scripts into web pages viewed by other users. It can be used to steal cookies, hijack sessions, or deface websites.</p>
        <h3>How to Exploit in CVWA2</h3>
        <p>Go to the <strong>Reflected XSS</strong> module. Enter a payload like:</p>
        <pre>&lt;script&gt;alert('XSS')&lt;/script&gt;</pre>
        <p>This will execute JavaScript in the browser, demonstrating XSS.</p>
        <h3>How to Prevent</h3>
        <ul>
            <li>Always encode user input before rendering it in HTML.</li>
            <li>Use frameworks that automatically escape XSS by design.</li>
            <li>Validate and sanitize user input.</li>
        </ul>
        <h3>References</h3>
        <ul>
            <li><a href="https://owasp.org/www-community/attacks/xss/" target="_blank">OWASP XSS</a></li>
        </ul>
    </div>
</div>
</body>
</html> 