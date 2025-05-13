<?php

define( 'CVWA2_WEB_PAGE_TO_ROOT', '../../' );
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.php';

cvwa2PageStartup( array( 'authenticated' ) );

$page = cvwa2PageNewGrab();
$page[ 'title' ]   = 'Vulnerability: SQL Injection (CVWA2)' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'sqli';
$page[ 'help_button' ]   = 'sqli';
$page[ 'source_button' ] = 'sqli';

cvwa2DatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = '';
switch( cvwa2SecurityLevelGet() ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		$method = 'POST';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		break;
}

require_once CVWA2_WEB_PAGE_TO_ROOT . "vulnerabilities/sqli/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerability: SQL Injection (CVWA2)</h1>

	<div class=\"vulnerable_code_area\">";
if( $vulnerabilityFile == 'high.php' ) {
	$page[ 'body' ] .= "Click <a href=\"#\" onclick=\"javascript:popUp('session-input.php');return false;\">here to change your ID</a>.";
}
else {
	$page[ 'body' ] .= "
		<form action=\"#\" method=\"{$method}\">
			<p>
				User ID:";
	if( $vulnerabilityFile == 'medium.php' ) {
		$page[ 'body' ] .= "\n\t\t\t\t<select name=\"id\">";

		for( $i = 1; $i < $number_of_rows + 1 ; $i++ ) { $page[ 'body' ] .= "<option value=\"{$i}\">{$i}</option>"; }
		$page[ 'body' ] .= "</select>";
	}
	else
		$page[ 'body' ] .= "\n\t\t\t\t<input type=\"text\" size=\"15\" name=\"id\">";

	$page[ 'body' ] .= "\n\t\t\t\t<input type=\"submit\" name=\"Submit\" value=\"Submit\">
			</p>\n";

	if( $vulnerabilityFile == 'impossible.php' )
		$page[ 'body' ] .= "\t\t\t\t" . tokenField();

	$page[ 'body' ] .= "
		</form>";
}
$page[ 'body' ] .= "
		{$html}
	</div>

	<h2>More Information</h2>
	<ul>
		<li><a href=\"https://en.wikipedia.org/wiki/SQL_injection\" target=\"_blank\">Wikipedia: SQL Injection</a></li>
		<li><a href=\"https://www.netsparker.com/blog/web-security/sql-injection-cheat-sheet/\" target=\"_blank\">Netsparker SQL Injection Cheat Sheet</a></li>
		<li><a href=\"https://owasp.org/www-community/attacks/SQL_Injection\" target=\"_blank\">OWASP: SQL Injection</a></li>
		<li><a href=\"https://bobby-tables.com/\" target=\"_blank\">Bobby Tables</a></li>
	</ul>
</div>\n";

cvwa2HtmlEcho( $page );

?> 