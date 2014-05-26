<!doctype html>
<html>

<head>
	<title>Workshop 2: Yale Interactive Design</title>
	
	<?php include('../meta.php'); ?>
	
	<style>
		p.symbol { width: 100%; text-align: center; }
		a.symbol { background: none; }
	</style>
	
</head>

<body>

<div id="main-column">

	<?php include('../twitter.php'); ?>

	<nav>
	
		<ul>
			<li><a href="../library">Library</a></li>
			<li><a href="../calendar">Calendar</a></li>
			<li><a href="../people">People</a></li>
		</ul>

	</nav>
	
	<div id="workshop">

	<center>
	<br />
	Workshop 2<br />
	HTML in Depth<br />
	January 23, 2014<br />
	&nbsp;<br />
	<img src="images/html02.jpg" width="450px" height="auto">
	&nbsp;<br />
	&nbsp;<br />
	</center>
	
	<p>
	<h2>HTML Structure</h2><br />
	<a href="html-structure.html">html-structure.html</a><br />
	<script src="https://gist.github.com/4620885.js"></script>
	<img src="images/html06.png">
	<img src="images/html07.png">
	</p>
	
	<p>
	<h2>White space</h2><br />
	HTML makes no difference between horizontal and vertical spaces you make in the actual HTML file. To make a visible space, you can use the <span class="code-inline">&amp;nbsp;</span> tag.
	</p>
	
	<h2>Block vs. inline elements</h2>
	<p>
	Block<br />
	<ul class="bullets">
		<li><span class="code">div</span> (general purpose block element)</li>
		<li><span class="code">p</span> (paragraph)</li>
		<li><span class="code">h1, h2, h3, h4, h5, h6</span> (all headings)</li>
		<li><span class="code">ul, ol, dl, li, dt, dd</span> (lists, list items, etc.)</li>
		<li><span class="code">table</span> (tables)</li>
		<li><span class="code">blockquote</span> (indented paragraph meant for long passage of text)</li>
		<li><span class="code">form</span> (an input form)</li>
	</ul>
	</p>
	
	<p>
	Inline<br />
	<ul class="bullets">
		<li><span class="code">span</span> (general purpose inline element)</li>
		<li><span class="code">a</span> (link)</li>
		<li><span class="code">strong</span> (strong text)</li>
		<li><span class="code">em</span> (emphasized text)</li>
		<li><span class="code">img</span> (image)</li>
		<li><span class="code">br</span> (line-break)</li>
		<li><span class="code">input</span> (input field used in forms)</li>
	</ul>
	</p>
	
	<p>
	You can change the display property of any element using CSS.
	</p>
	
	<p>
	<h2>Types of Links</h2><br /><br />
	<ul class="bullets">
		<li>internal link</li>
		<li>external link</li>
		<li>link that opens in a new window or tab</li>
		<li>link with a title</li>
		<li>image link</li>
		<li>mailto link</li>
		<li>id selector link</li>
	</ul>
	</p>
	<a href="html-links.html">html-links.html</a><br />
	<script src="https://gist.github.com/4625790.js"></script>

	<p>
	<h2>Troubleshooting Questions to Ask Yourself</h2><br /><br />
	<ul class="bullets ">
		<li>Do all tags (that need to) have an opening and closing tag?</li>
		<li>Is everything I want to display in the body section?</li>
		<li>Do all links or assets have the right file path?</li>
		<li>Are all assets uploaded/in the right place?</li>
		<li>Am I editing the correct file?</li>
		<li>Did I include the correct <span class="code-inline">DOCTYPE</span> or did I include one at all?</li>
		<li>Does my code validate? <a href="http://validator.w3.org/" target="_blank">Markup Validation Service</a></li>
	</ul>
	</p>
	
	</div>
	
</div>
	
</body>

</html>
