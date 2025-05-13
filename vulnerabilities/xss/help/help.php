<div class="body_padded">
	<h1>Help - Cross-Site Scripting (XSS) (CVWA2)</h1>

	<div id="code">
	<table width='100%' bgcolor='white' style="border:2px #C0C0C0 solid">
	<tr>
	<td><div id="code">
		<h3>About</h3>
		<p>Cross-Site Scripting (XSS) is a vulnerability that allows attackers to inject malicious scripts into web pages viewed by other users. XSS can be used to steal cookies, hijack sessions, or deface websites.</p>

		<br /><hr /><br />

		<h3>Objective</h3>
		<p>Your goal is to execute JavaScript in the victim's browser by injecting code into the vulnerable input field.</p>

		<br /><hr /><br />

		<h3>Low Level</h3>
		<p>The input is reflected directly without any sanitization. Try:</p>
		<pre><span class="spoiler"><code><script>alert('XSS')</script></code></span></pre>

		<br />

		<h3>Medium Level</h3>
		<p>The input is encoded with <code>htmlspecialchars</code> but single quotes are not encoded. Try:</p>
		<pre><span class="spoiler"><code><img src=x onerror=alert('XSS')></code></span></pre>

		<br />

		<h3>High Level</h3>
		<p>All quotes are encoded, making most XSS attacks ineffective. Try to bypass if you can!</p>

		<br />

		<h3>Impossible Level</h3>
		<p>Strict input validation and output encoding make XSS impossible at this level.</p>
	</div></td>
	</tr>
	</table>

	</div>

	<br />

	<p>Reference: <a href="https://owasp.org/www-community/attacks/xss/" target="_blank">OWASP XSS</a></p>
</div> 