<?php
// CVWA2 - Medium Security Level XSS
// This level uses htmlspecialchars but is still partially vulnerable.

if (isset($_GET['Submit'])) {
    $name = $_GET['name'];
    // Partially protected: single quotes are not encoded
    $safe_name = htmlspecialchars($name, ENT_NOQUOTES, 'UTF-8');
    $html .= "<pre>Hello, $safe_name!</pre>";
}
?> 