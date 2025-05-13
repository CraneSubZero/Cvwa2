<?php
session_start();
define('CVWA2_WEB_PAGE_TO_ROOT', './');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVWA2 - CSRF Guide</title>
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
    <h2>CSRF Guide</h2>
    <div class="card">
        <h3>What is CSRF?</h3>
        <p>Cross-Site Request Forgery (CSRF) is an attack that forces an end user to execute unwanted actions on a web application in which they're authenticated. It can be used to change user data, such as passwords, without their consent.</p>
        <h3>How to Exploit in CVWA2</h3>
        <p>Go to the <strong>CSRF Simulation</strong> module. You can use a form like this on another site to change the password:</p>
        <pre>&lt;form action='http://localhost/cvwa2/csrf_simulation.php' method='POST'&gt;
&lt;input type='hidden' name='newpass' value='hacked'&gt;
&lt;input type='submit' name='Submit' value='Submit'&gt;
&lt;/form&gt;</pre>
        <h3>How to Prevent</h3>
        <ul>
            <li>Use anti-CSRF tokens in forms.</li>
            <li>Check the HTTP Referer header.</li>
            <li>Require re-authentication for sensitive actions.</li>
        </ul>
        <h3>References</h3>
        <ul>
            <li><a href="https://owasp.org/www-community/attacks/csrf" target="_blank">OWASP CSRF</a></li>
        </ul>
    </div>
</div>
</body>
</html> 