<!doctype html>
<html>

<head>
	<title>Workshop 3: Yale Interactive Design</title>
	
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
		<p><a href="workshop3.pdf">Download the PDF</a></p>
		Workshop 3<br />
		CSS: Stylesheet for Craigslist<br />
		February 4, 2014<br />
		<br />
		<br />
	</center>
	
	<p>
	CSS, or Cascading Style Sheets, lets us apply visual style to semantic HTML. A good way to see what stylesheets do is to view popular websites without them. Watch as I remove the styles on recognizable websites such as <a href="http://yale.edu">yale.edu</a>, <a href="http://apple.com">apple.com</a>, <a href="http://reddit.com">reddit.com</a>, <a href="http://etsy.com">etsy.com</a>, <a href="http://tumblr.com">tumblr.com</a>. <em>(To see how I removed the style, see this <a href="https://gist.github.com/laurelschwulst/8801273">gist</a>. To find more top sites to test, view this <a href="http://wwwwwwwwwwwwww.net">website</a>.)</em>
	</p>
	
	<h2>Ways to include CSS</h2>
	<p>
	As we've seen before, it's important that websites still use semantic HTML underneath style so that, in the case the website doesn't load the styles, it's still somewhat readable. Semantic HTML also helps with search engine optimization (SEO) so that elements marked as important will likely surface in search results.
	</p>
	
	<p>
	As we learned previously, there are three ways to include CSS within an HTML page:
	<ol class="numbers">
		<li>Inline style</li>
		<li>Internal CSS</li>
		<li>External CSS</li>
	</ol>
	</p>
	
	<p>
	Inline style is the most basic but often the least useful type since it can't be easily propagated. Internal CSS is more useful, but not if you have more than one HTML page. External CSS is the most useful since it can be referenced by many HTML pages.
	</p>
	
	<h2>Writing basic CSS</h2>
	<p>
	By writing CSS, you are creating rules or restrictions. Each rule is made by pairing a selector with a declaration. Like HTML, white space doesn't matter in CSS, so you can format your CSS in a way that makes sense to you.
	</p>
	
	<p class="code">selector { declaration; declaration; declaration; }</p>
	
	<p class="code">selector {<br>
	&nbsp;&nbsp;&nbsp;declaration;<br>
	&nbsp;&nbsp;&nbsp;declaration;<br>
	&nbsp;&nbsp;&nbsp;declaration;<br>
	}
	</p>
	
	<p>
	Each declaration is made up of a property and a value. These can't be made up or imagined, as there is a predefined list of properties and values. Likewise, if you make a typo, the declaration won't work.
	</p>
	
	<p class="code">selector {<br>
	&nbsp;&nbsp;&nbsp;property: value;<br>
	&nbsp;&nbsp;&nbsp;property: value;<br>
	&nbsp;&nbsp;&nbsp;property: value;<br>
	}
	</p>
	
	<p class="code">h2 {<br>
	&nbsp;&nbsp;&nbsp;color: #FFFFFF;<br>
	&nbsp;&nbsp;&nbsp;text-transform: uppercase;<br>
	&nbsp;&nbsp;&nbsp;font-style: italic;<br>
	}
	</p>
	
	<h2>Classes and ID's</h2>
	<p>
		Classes and ID's help you specify your CSS. You can name them anything you want, but it helps to describe the purpose or content of the element you're labeling. ID's should be used once per page, but classes can appear more than one time. When writing CSS, you reference ID names and class names likewise:
	</p>
	
	<p class="code">#id { declaration; }</p>
	<p class="code">.class { declaration; }</p>
	
	<h2>Nesting and levels</h2>
	<p>
	To further target elements, CSS selectors can be nested. The following example targets a link <span class="code">a</span> within an <span class="code">h2</span>.
	</p>
	<p class="code">h2 a { declaration; }<br>
	</p>
	
	<h2>Block versus inline elements</h2>
	
	<p>
	As explained <a href="../workshop02">before</a>, every HTML element is inherently "block" or "inline". Block means it takes up vertical space and has a hard return before or after it. Inline goes with the flow.
	</p>
	
	<div class="code" style="background: red; padding: 20px; margin: 1em 0; text-align: center;">block</div>
	
	<p class="code">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam leo nec dui laoreet iaculis. Nunc congue cursus ultrices. Donec rutrum accumsan porta. Quisque pellentesque pulvinar sed <span class="code" style="background: yellow;">inline</span> volutpat quis arcu sit amet euismod. Sed a enim porta, tempus odio eget, consectetur tortor. Nulla volutpat vitae velit a eleifend. Mauris et urna dictum, mattis sapien vel, vulputate libero.</p>
	
	<p>
	To change an HTML element's inherent block or inline characteristic, use CSS "display" property. If you want a <span class="code">h1</span> element to be inline (since it is natively block), write <span class="code">h1 { display: inline; }</span>. Here is an <a href="http://dochub.io/#css/display">exhaustive list</a> of display values.
	</p>
	
	<h2>Box Model</h2>
	<p>
	A good thing to remember is that most elements on a page are rectangles, or some kind of box. It is important to know that every element in CSS has a content-box inside of a padding-box inside of a border-box inside of a margin-box. See the drawing of the box model below. 
		<img src="box-model.png">	
	</p>
	<p>
	To horizontally center something with the box model, the width of the element must be defined. Then, use <span class="code">margin: 0 auto;</span>.
	</p>
	
	<h2>Position</h2>
	<p>
	In order to make more complex layouts, we need to use position:
	</p><br>
	<ul class="bullets">
		<li>
			<span class="code">position: static</span><br>
			&mdash; default position<br>
			&mdash; not "positioned"<br><br>
		</li>
		<li>
			<span class="code">position: relative</span><br>
			&mdash; is positioned relative to where it'd fall if it were static<br>
			&mdash; top: 2px means the top will fall 2 pixels below where it would naturally<br>
			&mdash; offset does not affect the layout of adjacent elements<br><br>
		</li>
		<li>
			<span class="code">position: absolute</span><br>
			&mdash; positioned relative to the closest non-static (positioned) element, or the document body<br>
			&mdash; outside the "flow"<br><br>
		</li>
		<li>
			<span class="code">position: fixed</span><br>
			&mdash; positioned relative to the browser window (will always fall on the same part of the window)<br>
			&mdash; not affected by scrolling<br>
			&mdash; outside the "flow"
		</li>
	</ul>

	<p>
	Here are two examples that explore both the box model and position:
	<ul class="bullets">
		<li><a href="css-box-model.html">css-box-model.html</a></li>
		<li><a href="css-positioning.html">css-positioning.html</a></li>
	</ul>
	</p>

	<p>
	Here are a couple practical examples exploring floats and position:
	<ul class="bullets">
		<li><a href="css-layout-floats.html">css-layout-floats.html</a> (<a href="http://learnlayout.com/position-example.html">see also</a>)</li>
		<li><a href="css-layout-absolute.html">css-layout-absolute.html</a> (<a href="http://learnlayout.com/float-layout.html">see also</a>)</li>
	</ul>
	</p>
	

	<h2>Common CSS Properties</h2>
	
	<p>
	Text<br />
	<ul class="bullets">
		<span class="code">
		<li>color</li>
		<li>text-align</li>
		<li>text-decoration</li>
		<li>text-transform</li>
		<li>line-height</li>
		<li>letter-spacing</li>
		</span>
	</ul>
	</p>
	
	<p>
	Fonts<br />
	<ul class="bullets">
		<span class="code">
		<li>font-family</li>
		<li>font-size</li>
		<li>font-style</li>
		<li>font-weight</li>
	</ul>
	</p>

	<p>
	Backgrounds<br />
	<ul class="bullets">
		<span class="code">
		<li>background-color</li>
		<li>background-image</li>
		<li>background-repeat</li>
		<li>background-position</li>
	</ul>
	</p>

	<p>
	Lists<br />
	<ul class="bullets">
		<span class="code">
		<li>list-style-type</li>
	</ul>
	</p>

	<p>
	Box Model<br />
	<ul class="bullets">
		<span class="code">
		<li>padding</li>
		<li>border</li>
		<li>border-color</li>
		<li>border-style</li>
		<li>margin</li>
	</ul>
	</p>

	<p>
	Positioning<br />
	<ul class="bullets">
		<span class="code">
		<li>position</li>
		<li>float</li>
		<li>clear</li>
		<li>display (inline vs. block)</li>

		<li>top</li>
		<li>right</li>
		<li>bottom</li>
		<li>left</li>

		<li>height</li>
		<li>width</li>
		
		<li>z-index</li>
		
	</ul>
	</p>
	
	<p>
	To find more properties, use this <a href="http://tech.journalism.cuny.edu/documentation/css-cheat-sheet/" target="_blank">CSS Cheat Sheet</a> or <a href="http://dochub.io/#css/" target="_blank">DocHub</a>.
	</p>
	
	<p>
	<h2>External Reference</h2>
	</p>
	
	<p>
	For beginners<br />
	<ul class="bullets">
		<li><a href="http://learnlayout.com/" target="_blank">Learn Layout</a> <i>(Highly Recommended)</i></li>
		<li><a href="http://learn.shayhowe.com/html-css/box-model" target="_blank">Beginner's Guide: Box-Model &amp; Positioning</a></li>
		<li><a href="http://htmldog.com/guides/css/beginner/">HTML Dog: CSS: Beginner</a></li>
	</ul>
	</p>
	
	<p>
	More advanced<br />
	<ul class="bullets">
		<li><a href="http://learn.shayhowe.com/advanced-html-css/detailed-css-positioning" target="_blank">Advanced Guide: Detailed CSS Positioning</a></li>
		<li><a href="http://htmldog.com/guides/css/intermediate/">HTML Dog: CSS: Intermediate</a> & <a href="http://htmldog.com/guides/css/advanced/">Advanced</li>
		<li><a href="http://www.colorzilla.com/gradient-editor/" target="_blank">CSS Gradient Editor</a></li>
		<li><a href="http://css3generator.com/" target="_blank">CSS3 Generator</a></li>
	</ul>
	
	<h2>Short assignment</h2>
	
	<p>
	When you are done reading through this information, please complete the short assignment: <a href="workshop3.pdf">Download the Workshop PDF</a>. To test your Craigslist stylesheet, use this: <a href="http://jsfiddle.net/n3CWZ/1/">http://jsfiddle.net/n3CWZ/1/</a>.
	</p>
	
	<p>
	To see all styles, use this bookmarklet: <a href="http://jsfiddle.net/Uvve4/10/">http://jsfiddle.net/Uvve4/10/</a>.
	</p>
	</div>
	
</div>
	
</body>

</html>
