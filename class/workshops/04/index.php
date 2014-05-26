<!doctype html>
<html>

<head>
	<title>Workshop 4: Yale Interactive Design</title>
	
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

		<p>
		Workshop 4<br />
		CSS: Responsive Design<br />
		February 27, 2014<br />
		<br />
		<br />
		</p>

	</center>

	<h2>Intro</h2>

	<p style="text-transform: uppercase;" class="code">
		Print is dead<br />
		Web is dead<br />
		Mobilize<br />
		<a href="https://twitter.com/jenniferdaniel/status/438386956528275457">*</a>
	</p>

	<p>
	If you are not already familiar with responsive websites, please look at some while resizing your browser on each. Also feel free to check them out on a smartphone:
	</p>
	
	<ul class="bullets">
		<li><span class="code"><a href="http://bostonglobe.com/" target="_blank">http://bostonglobe.com/</a></span></li>
		<li><span class="code"><a href="http://disney.com/" target="_blank">http://disney.com/</a></span></li>
		<li><span class="code"><a href="http://contentsmagazine.com/" target="_blank">http://contentsmagazine.com/</a></span></li>
		<li><span class="code"><a href="https://status.heroku.com/" target="_blank">https://status.heroku.com/</a></span></li>
		<li><span class="code"><a href="http://www.breakingnews.com/" target="_blank">http://www.breakingnews.com/</a></span></li>
		<li><span class="code"><a href="http://reformat.no/" target="_blank">http://reformat.no/</a></span></li>
		<li><span class="code"><a href="http://www.shapeofdesignbook.com/" target="_blank">http://www.shapeofdesignbook.com/</a></span></li>
		<li><span class="code"><a href="http://www.artsy.net" target="_blank">http://www.artsy.net</a></span></li>
		<li><span class="code"><a href="http://www.p-r-i-m-e-t-i-m-e.com" target="_blank">http://www.p-r-i-m-e-t-i-m-e.com</a></span></li>
		<li><span class="code"><a href="#" target="_blank">http://frankchimero.com/what-screens-want/</a></li>
		</ul>
	
	<p>
	Also look at these more experimental websites that encourage or are flexible with browser resize:
	</p>
	
	<ul class="bullets">
	<li><span class="code"><a href="http://oliverlaric.com/pixel.htm" target="_blank">http://oliverlaric.com/pixel.htm</a></span></li>
	<li><span class="code"><a href="http://www.intotime.com/" target="_blank">http://www.intotime.com/</a></span></li>
	</ul>
	
	<p>
	A wide variety of websites have made their websites responsive over the past few years. Of course lists like these could go on and on, but you get the idea. These websites are flexible for any screen dimensions, capable of being viewed on a wide variety of devices. 
	</p>
	
	<p>
	In CSS, media queries help designate what happens at different browser sizes. Look at <span class="code"><a href="responsive-world.html">responsive-world.html</a></span> and take note of what happens on browser resize. The HTML/CSS for this page is below. Notice the media queries and the pixel breakpoints for the differences in background color: <br />
	<script src="https://gist.github.com/laurelschwulst/5056245.js"></script>
	</p>
		
	<p>
	In that example, you'll notice that areas are defined with <span class="code">@media screen and (max-width:???px)</span>. Anything contained in the curly braces that follow will override any previous style declarations for that specific screen size. Be sure to place these media queries at the end of your CSS document or section so that they will properly override previous declarations.
	</p>
	
	<p>
	You'll also notice the line that includes <span class="code">meta name="viewport"</span> etc. This line prevents certain mobile browsers like iOS and Android from auto-resizing the initial page if it is too large. Here it is set to an initial and maximum scale of 1.0 so that the mobile version is scaling to the same size as the laptop or desktop version (where 0.5 would be scaling to half the size, 3.0 would be three times the size and so on). The maximum scale controls how much a user can zoom in and out on the page. In this example, we're not allowing the user to do any zooming. For the purposes of the workshop, keeping initial and maximum values as 1.0 is fine.
	</p>
	
	<p>
	Images and other graphics can easily be made responsive as well. Look at <span class="code"><a href="responsive-image.html">responsive-image.html</a></span> to see a few images that shrink as the browser does. See the code below:<br />
	<script src="https://gist.github.com/laurelschwulst/5056591.js"></script>
	</p><br />

	<h2>Em versus Px</h2>

	<p>
	<i>Ems</i> <span class="code">(em)</span> are scalable units. An em is equal to the current font-size of the document. (For example, if you set your body to be 12px, 2em would be 24px, and 0.5em would be 6px.) Ems are becoming increasingly popular due to their mobile-friendliness.
	</p>

	<p>
	<i>Pixels</i> <span class="code">(px)</span> are fixed-size units used in screen media. One pixel is equal to one dot on the computer screen. They are approximately equal to the point <span class="code">(pt)</span> used in print media.
	</p>
	
	<h2>Quick assignment</h2>
	<p>
	Create any website during the span of the class that changes its form and/or content at the breakpoints in the first example, <span class="code"><a href="responsive-world.html">responsive-world.html</a></span>:</p>

	<ul class="bullets">
		<li><span class="code">320px</span></li>
		<li><span class="code">480px</span></li>
		<li><span class="code">600px</span></li>
		<li><span class="code">768px</span></li>
		<li><span class="code">1024px</span></li>
		<li><span class="code">1200px</span></li>
	</ul>
	
	<p>
	Your website can contain any kind of content. It could be the start of the responsive website for your tutorial, but it could instead be a self-contained responsive website experiment. In your assignment, please also include at least one image or graphic that changes on browser resize.
	</p>
	
	<p>
	<img src="responsive-error.png" class="responsive-image">
	</p>
	
	<h2>End notes</h2>
	<p>
	For accessibility purposes, it's obviously good for websites to be readable, legible, and easily navigable on any device. However, I am most excited in how websites prioritize or create new content for specific platforms. For example, on a mobile website, this can mean sacrificing existing content that is normally initially viewable on the laptop or desktop version. What is most important for viewers of the mobile website? If it's a museum, content like "hours" and "address" should be surfaced instead of, say, the "about" page. Other times, maybe mobile viewers should be rewarded with new content made for the mobile version only, like an audio guide for viewing artwork at the museum. On this note, look at <a href="http://walkerart.org" target="_blank">walkerart.org</a> and <a href="http://okfoc.us" target="_blank">okfoc.us</a> on a smartphone. And on your computer while changing the browser size, look at <a href="something-world.html">something-world.html</a>, a quick riff I made on the first example.
	</p>
	
	<h2>Articles about responsive design</h2><br />
	<ul class="bullets">
		<li><a href="http://alistapart.com/article/responsive-web-design" target="_blank">Responsive Web Design</a>, Ethan Marcotte, 2010, from A List Apart</li>
		<li><a href="http://blog.linedandunlined.com/post/36122874494/unbuilding" target="_blank">Unbuilding</a>, Rob Giampietro, 2012</li>
		<li><a href="https://gocardless.com/blog/unresponsive-design/" target="_blank">Ditching Responsive Design</a>, Hiroki Takeuchi, 2013</li>
	</ul>
	
	<h2>Resources for responsive design</h2><br />
	<ul class="bullets">
		<li><a href="http://mediaqueri.es/" target="_blank">Mediaqueri.es</a></li>
		<li><a href="http://responsive.is/" target="_blank">Responsive.is</a></li>
		<li><a href="http://screenqueri.es/" target="_blank">Screenqueri.es</a></li>
		<li>Book: <a href="http://www.amazon.com/Responsive-Web-Design-HTML5-CSS3/dp/1849693188" target="_blank">Responsive Web Design with HTML5 and CSS3</a>, Ben Frain, 2012</li>
		<li>Book: <a href="http://www.abookapart.com/products/responsive-web-design" target="_blank">Responsive Web Design</a>, Ethan Marcotte, A List Apart </li>
	</ul>
	
	<h2>Keeping up to date with front-end web</h2><br />
	<ul class="bullets">
		<li><a href="https://news.layervault.com/" target="_blank">Layervault News</a></li>
	</ul>
	
	<h2>Other useful links</h2><br />
	<ul class="bullets">
		<li><a href="../beautiful-gallery/index-responsive.html">Demo: Beautiful Gallery</a></li>
		<li><a href="http://www.maclife.com/article/howtos/how_host_your_website_dropbox" target="_blank">Hosting your site on Dropbox</a></li>
	</ul>
	
			
</div>

<?php include('../symbol-motto-footer.php'); ?>

<div class="footer-space"></div>
	
</body>

</html>
