<?php
// CVWA2 - Minimal Page Include for SQL Injection Module

if( !defined( 'CVWA2_WEB_PAGE_TO_ROOT' ) ) {
	die( 'CVWA2 System error- WEB_PAGE_TO_ROOT undefined' );
	exit;
}

if (!file_exists(CVWA2_WEB_PAGE_TO_ROOT . 'config/config.php')) {
	die ("CVWA2 System error - config file not found. Copy config/config.php to config/config.php and configure to your environment.");
}

// Include configs
require_once CVWA2_WEB_PAGE_TO_ROOT . 'config/config.php';

if( !isset( $html ) ) {
	$html = "";
}

function cvwa2PageStartup( $pActions ) {
	// For this module, just start session
	if (!session_id()) {
		session_start();
	}
}

function &cvwa2PageNewGrab() {
	$returnArray = array(
		'title'           => 'College Vulnerability Web Application (CVWA2)',
		'title_separator' => ' :: ',
		'body'            => '',
		'page_id'         => '',
		'help_button'     => '',
		'source_button'   => '',
	);
	return $returnArray;
}

function cvwa2HtmlEcho( $pPage ) {
	// Simple echo for demonstration
	echo "<html><head><title>{$pPage['title']}</title></head><body>{$pPage['body']}</body></html>";
}

function cvwa2SourceHtmlEcho( $pPage ) {
	// Simple echo for demonstration
	echo "<html><head><title>{$pPage['title']}</title></head><body>{$pPage['body']}</body></html>";
}

function cvwa2DatabaseConnect() {
	// Connect to the database using config values
	global $_CVWA2, $db;
	$GLOBALS["___mysqli_ston"] = mysqli_connect(
		$_CVWA2[ 'db_server' ],
		$_CVWA2[ 'db_user' ],
		$_CVWA2[ 'db_password' ],
		$_CVWA2[ 'db_database' ],
		$_CVWA2[ 'db_port' ]
	);
	if (!$GLOBALS["___mysqli_ston"]) {
		die('Database connection failed: ' . mysqli_connect_error());
	}
	// For PDO (impossible level)
	try {
		$dsn = "mysql:host={$_CVWA2['db_server']};dbname={$_CVWA2['db_database']};port={$_CVWA2['db_port']}";
		$db = new PDO($dsn, $_CVWA2['db_user'], $_CVWA2['db_password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		die('PDO Connection failed: ' . $e->getMessage());
	}
}

function cvwa2SecurityLevelGet() {
	// For demo, use a cookie or default to 'impossible'
	$levels = array('low', 'medium', 'high', 'impossible');
	if( isset( $_COOKIE[ 'security' ] ) && in_array( $_COOKIE[ 'security' ], $levels ) ) {
		return $_COOKIE[ 'security' ];
	}
	return 'impossible';
}

function tokenField() {
	// Dummy CSRF token field for impossible level
	return '<input type="hidden" name="user_token" value="dummy_token">';
}

function checkToken($user_token, $session_token, $returnURL) {
	// Dummy check for demonstration
	if ($user_token !== 'dummy_token') {
		die('Invalid CSRF token!');
	}
}

function generateSessionToken() {
	// Dummy token generation
	$_SESSION['session_token'] = 'dummy_token';
} 