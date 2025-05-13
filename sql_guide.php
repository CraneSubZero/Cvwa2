<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - SQL Injection Guide</title>
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
    <h2>SQL Injection Guide</h2>
    <div class="card">
        <h3>What is SQL Injection?</h3>
        <p>SQL Injection is a web security vulnerability that allows an attacker to interfere with the queries an application makes to its database. It can allow attackers to view data they are not normally able to retrieve, and in some cases, modify or delete data.</p>
        <h3>How to Exploit in CVWA2</h3>
        <p>Go to the <strong>SQL Injection</strong> module. Enter a payload like:</p>
        <pre>1' OR '1'='1</pre>
        <p>This will return all users, demonstrating a classic SQL Injection attack.</p>
        <h3>How to Prevent</h3>
        <ul>
            <li>Use prepared statements and parameterized queries.</li>
            <li>Validate and sanitize user input.</li>
            <li>Use least privilege for database accounts.</li>
        </ul>
        <h3>References</h3>
        <ul>
            <li><a href="https://owasp.org/www-community/attacks/SQL_Injection" target="_blank">OWASP SQL Injection</a></li>
        </ul>
    </div>
</div>
</body>
</html> 