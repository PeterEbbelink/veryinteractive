<!doctype html>
<html>

<head>
	<title>Workshop 6: Yale Interactive Design</title>
	
	<?php include('../meta.php'); ?>
	
	<style>
		p.symbol { width: 100%; text-align: center; }
		a.symbol { background: none; }
		ol li { list-style-type: decimal; }
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
		Workshop 6<br />
		Tumblr Themes<br />
		April 10, 2014<br />
		<br />
		<br />
	</center>
	
	<section>
	
		<h2>Tumblr</h2>
		
		<p>
		Tumblr is a popular blogging platform owned by Yahoo. It allows its users to post content in the form of text, image, video, links, quote, and audio. Its simplicity encourages short-form posts for their viral potential.
		</p>
	
		<p>
		Tumblr is easily customizable. To customize your Tumblr, log in and click the gear icon in the top right. Here you can change your blog’s title, theme, and other more specific options. To edit your theme, click the “Edit theme” button underneath your avatar and name. This is where you can edit the HTML and CSS of your theme. But first, consider starting out with something more similar to what you want so you have to do less work. Think of this as a structural foundation but something you can still modify. In this case, you can click the nearby “Find themes” button.
		</p>
	
		<p>
	You can browse available themes in the <a href="http://www.tumblr.com/themes/" target="_blank">Theme Garden</a>, which is where that button leads. Here are some simple themes to possibly start with: <a href="http://www.tumblr.com/theme/397">1</a>, <a href="http://www.tumblr.com/theme/106" target="_blank">2</a>, <a href="http://www.tumblr.com/theme/8738" target="_blank">3</a>, <a href="http://www.tumblr.com/theme/34366" target="_blank">4</a>, <a href="http://www.tumblr.com/theme/32023" target="_blank">5</a>, <a href="http://www.tumblr.com/theme/1489" target="_blank">6</a>, <a href="http://www.tumblr.com/theme/9601" target="_blank">7</a>, <a href="http://www.tumblr.com/theme/30524" target="_blank">8</a>, <a href="http://www.tumblr.com/theme/32948" target="_blank">9</a>, <a href="http://www.tumblr.com/theme/32933" target="_blank">10</a>, <a href="http://www.tumblr.com/theme/25774" target="_blank">11</a>, <a href="http://www.tumblr.com/theme/32351" tafget="_blank">12</a>, <a href="http://www.tumblr.com/theme/34155" target="_blank">13</a>, <a href="http://www.tumblr.com/theme/35249" target="_blank">14</a>, <a href="http://www.tumblr.com/theme/1489" target="_blank">15</a>. You can find documentation on creating custom themes in Tumblr’s own guide: “<a href="http://www.tumblr.com/docs/en/custom_themes" target="_blank">How to create a custom theme</a>”. Additionally, if you want to upload a static file (like a custom CSS file), you can use <a href="http://www.tumblr.com/themes/upload_static_file">Tumblr’s uploader</a>.
		</p>
	
		<p>
		For this demo, we’ll select the last theme (<a href="http://www.tumblr.com/theme/1489">Plain Times</a>) and install it. My Tumblr now looks like this: <a href="http://workshop06a.tumblr.com/" target="_blank">workshop06a.tumblr.com</a> &mdash; great, so plain.
		</p>
	
	</section>
	
	<section>
	
		<h2>Mockup to Theme</h2>
	
		<p>
		Often it’s easiest to go from HTML/CSS Mockup to Tumblr Theme. This helps make your process piecemeal to avoid more complex errors later on. Here is the template I made: <a href="tumblr-template.html">tumblr-template.html</a>. It’s important to note what size my thumbnails are. Here I made them <span class="code-inline">250px</span> wide. This is because Tumblr automatically generates multiple sizes after upload which you can see in the <a href="http://www.tumblr.com/docs/en/custom_themes#photo-posts" target="_blank">documentation</a>. Tumblr does this to expedite loading time. Those premade widths are <span class="code-inline">75px</span> (always square), <span class="code-inline">100px</span>, <span class="code-inline">250px</span>, <span class="code-inline">400px</span>, and <span class="code-inline">500px</span>.</p>
	
		<p>
		Next we’ll take this template code and wrap it around the special Tumblr code in the theme. To do this, go back to the gear icon and click the “Edit theme” button again. It might be easier to copy and paste this code into a separate text editor and work on it there instead of in this built-in code editor. After a handful of changes, this is my integrated code:
		</p>
	
	<script src="https://gist.github.com/laurelschwulst/5361317.js"></script><br />
	
	<p>I copy and paste this into the Tumblr code editor, press save, and see my updated Tumblr. Now it looks like this: <a href="http://workshop06b.tumblr.com/" target="_blank">workshop06b.tumblr.com</a> &mdash; looks pretty similar to the template!</p>

		</p>
	
	</section>
	
	<section>
	
		<h2>Tumblr Specifics</h2>
		
		<p>
		&mdash; Tags (#tagname) can be used to sort your collection<br />
		&mdash; “Notes” (likes or reblogs) can be displayed or not displayed<br />
		&mdash; Any Tumblr’s archive is viewable here: yourname.tumblr.com/archive<br />
		&mdash; Permalinks are pages that contain a single post and have a unique URL<br />
		</p>
	</p>
	
	</section>
