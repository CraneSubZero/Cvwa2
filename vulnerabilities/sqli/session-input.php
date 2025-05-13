<?php
// CVWA2 - Session Input for High Security Level SQL Injection

define( 'CVWA2_WEB_PAGE_TO_ROOT', '../../' );
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.inc.php';

cvwa2PageStartup( array( 'authenticated' ) );

$page = cvwa2PageNewGrab();
$page[ 'title' ] = 'SQL Injection Session Input (CVWA2)' . $page[ 'title_separator' ].$page[ 'title' ];

if( isset( $_POST[ 'id' ] ) ) {
	$_SESSION[ 'id' ] =  $_POST[ 'id' ];
	$page[ 'body' ] .= "Session ID: {$_SESSION[ 'id' ]}<br /><br /><br />";
	$page[ 'body' ] .= "<script>window.opener.location.reload(true);</script>";
}

$page[ 'body' ] .= "
<form action=\"#\" method=\"POST\">
	<input type=\"text\" size=\"15\" name=\"id\">
	<input type=\"submit\" name=\"Submit\" value=\"Submit\">
</form>
<hr />
<br />

<button onclick=\"self.close();\">Close</button>";

cvwa2SourceHtmlEcho( $page );

?> 