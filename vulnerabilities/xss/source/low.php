<?php
// CVWA2 - Low Security Level XSS
// This level is intentionally vulnerable to reflected XSS.

if (isset($_GET['Submit'])) {
    $name = $_GET['name'];
    // Vulnerable: output is not sanitized
    $html .= "<pre>Hello, $name!</pre>";
}
?> 