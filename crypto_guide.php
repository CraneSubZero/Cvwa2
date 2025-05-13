<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - Crypto Guide</title>
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
    <h2>Crypto Guide</h2>
    <div class="card">
        <h3>What is Cryptography?</h3>
        <p>Cryptography is the practice and study of techniques for securing communication and data from adversaries. In web applications, it is used for password storage, data encryption, and secure communications.</p>
        <h3>Common Crypto Mistakes</h3>
        <ul>
            <li>Storing passwords in plaintext.</li>
            <li>Using weak or outdated algorithms (e.g., MD5, SHA1).</li>
            <li>Hardcoding cryptographic keys in source code.</li>
            <li>Improper use of encryption modes (e.g., ECB mode).</li>
        </ul>
        <h3>How to Avoid Crypto Pitfalls</h3>
        <ul>
            <li>Always hash passwords with a strong algorithm (e.g., bcrypt, Argon2).</li>
            <li>Use secure random number generators for keys and salts.</li>
            <li>Never hardcode secrets; use environment variables or secure vaults.</li>
            <li>Keep cryptographic libraries up to date.</li>
        </ul>
        <h3>References</h3>
        <ul>
            <li><a href="https://owasp.org/www-project-top-ten/2017/A3_2017-Sensitive_Data_Exposure.html" target="_blank">OWASP Sensitive Data Exposure</a></li>
        </ul>
    </div>
</div>
</body>
</html> 