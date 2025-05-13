<?php
// CVWA2 - Impossible Security Level XSS
// This level uses strict output encoding and input validation.

if (isset($_GET['Submit'])) {
    $name = $_GET['name'];
    // Input validation: only allow alphabetic names
    if (!preg_match('/^[a-zA-Z]+$/', $name)) {
        $html .= "<pre>Invalid name. Only alphabetic characters allowed.</pre>";
    } else {
        $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $html .= "<pre>Hello, $safe_name!</pre>";
    }
}
?> 