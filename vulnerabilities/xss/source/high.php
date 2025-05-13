<?php
// CVWA2 - High Security Level XSS
// This level uses proper output encoding to prevent XSS.

if (isset($_GET['Submit'])) {
    $name = $_GET['name'];
    // Properly protected
    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $html .= "<pre>Hello, $safe_name!</pre>";
}
?> 