<?php

define( 'CVWA2_WEB_PAGE_TO_ROOT', '../../' );
require_once CVWA2_WEB_PAGE_TO_ROOT . 'includes/cvwa2Page.php';

cvwa2PageStartup( array( 'authenticated' ) );

$page = cvwa2PageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Cross-Site Scripting (XSS) (CVWA2)' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'xss';
$page[ 'help_button' ]   = 'xss';
$page[ 'source_button' ] = 'xss';

$method            = 'GET';
$vulnerabilityFile = '';
switch( cvwa2SecurityLevelGet() ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		break;
}

require_once CVWA2_WEB_PAGE_TO_ROOT . "vulnerabilities/xss/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerability: Cross-Site Scripting (XSS) (CVWA2)</h1>

	<div class=\"vulnerable_code_area\">
		<form action=\"#\" method=\"{$method}\">
			<p>
				Enter your name: <input type=\"text\" size=\"15\" name=\"name\">
				<input type=\"submit\" name=\"Submit\" value=\"Submit\">
			</p>
		</form>
		{$html}
	</div>

	<h2>More Information</h2>
	<ul>
		<li><a href=\"https://en.wikipedia.org/wiki/Cross-site_scripting\" target=\"_blank\">Wikipedia: XSS</a></li>
		<li><a href=\"https://owasp.org/www-community/attacks/xss/\" target=\"_blank\">OWASP: XSS</a></li>
	</ul>
</div>\n";

cvwa2HtmlEcho( $page );

?> 