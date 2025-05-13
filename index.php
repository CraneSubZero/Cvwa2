<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - Home</title>
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
    <h1>Welcome to College Vulnerability Web Application 2 (CVWA2)</h1>
    <div class="card">
        <h2>Vulnerability Modules</h2>
        <ul>
            <li><a href="sql_injection.php">SQL Injection</a></li>
            <li><a href="xss_reflected.php">Reflected XSS</a></li>
            <li><a href="csrf_simulation.php">CSRF Simulation</a></li>
            <li><a href="file_upload.php">File Upload</a></li>
        </ul>
    </div>
    <div class="card">
        <h2>Guides</h2>
        <ul>
            <li><a href="sql_guide.php">SQL Injection Guide</a></li>
            <li><a href="xss_guide.php">XSS Guide</a></li>
            <li><a href="csf_guide.php">CSRF Guide</a></li>
            <li><a href="file_guide.php">File Upload Guide</a></li>
            <li><a href="command_guide.php">Command Injection Guide</a></li>
            <li><a href="crypto_guide.php">Crypto Guide</a></li>
        </ul>
    </div>
</div>
</body>
</html> 