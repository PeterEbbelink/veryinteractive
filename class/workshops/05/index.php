<!doctype html>
<html>

<head>
	<title>Workshop 5: Yale Interactive Design</title>
	
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
		Workshop 5<br />
		Basic Javascript<br />
		with guest <a href="http://rey.sc" target="_blank">Jeffrey Scudder</a><br />
		April 8, 2014<br />
		<br />
		<br />
	</center>
	
	<section>
	
		<h2>What is JavaScript?</h2>
			
		<p>
		<a href="http://en.wikipedia.org/wiki/JavaScript">JavaScript</a> is a programming language designed in 1995 by <a href="http://en.wikipedia.org/wiki/Brendan_Eich">Brendan Eich</a> while he working at Netscape. JavaScript is cool because it allows web developers to shape the experience of their users in surprising and dynamic ways that go beyond the limitations of HTML. With JavaScript, you can animate HTML elements in realtime, load and display data from other websites on your page, or create a computer game!
		</p>
		
	</section>
	
	<section>
	
		<h2>Say “hello” to Chrome’s JavaScript console</h2>
		
		<p>
		Web browsers implement <em>virtual machines</em> for executing JavaScript code on a user’s computer. You can interact with this system via a command line interface that reads and interprets lines of JavaScript. Open Google’s Chrome browser, and type:
		</p>
		 
		<p>
			<code>MAC: Cmd + Opt + J</code><br />
			<code>WINDOWS: Ctrl + Shift + J</code>
		</p>
		
		<p>
		Now type <code>var n = 10;</code> and press the return key on your keyboard.<br/ >
		Next, type <code>n + 10;</code> and press return again.
		</p>
		
		<p>
		<em>You just wrote some JavaScript!</em>
		</p>
		
		<p>
		You can use this console any time to converse with the programs you write. It's a safe environment for you to try out new ideas, and can be really fun! Most programming langauges these days have a console of some kind. In technical terms, this environment is called a <a href="http://en.wikipedia.org/wiki/Read%E2%80%93eval%E2%80%93print_loop">Read-eval-print Loop</a>, or REPL. Thanks REPL!
		</p>
	
	</section>
	
	<section>
	
	<h2>What is jQuery?</h2>
	
		<p>
		JavaScript is pretty good on its own, but the browsers themselves can be naughty. The syntax for using JavaScript to inspect or modify your HTML code can differ, depending on which web browser you are using. In the early days of the web, programmers who wanted their program to do one thing would have to write it in three or more ways. Naughty browsers! Over the years however, some people have written their own JavaScript programs to help themselves and other web developers keep their sanity. <a href="http://jquery.com/">jQuery</a> is one of those JavaScript programs. It is, in fact, the most widely used JavaScript “library”. jQuery is already included as a <a href="http://en.wikipedia.org/wiki/Coupling_(computer_programming)">dependency</a> in your project.
		</p>
	
	</section>
	
	<section>
	
		<h2>Specific simpleWeather examples</h2>
	
		<p>
		To guide your work on <a href="../p4">Project 4</a>, check out the comments in <code><a href="../p4/js/weather.js">weather.js</a></code> for some basic JavaScript and simpleWeather examples, including:
		</p>
		
		<ul>
		
			<li>
				<code>EXAMPLE 1</code><br />
				How to load some weather data from a particular location and render it on an HTML page.
			</li><br />
			
			<li>
				<code>EXAMPLE 2</code><br />
				How to link certain weather conditions to formal elements in your HTML or CSS. For example: If it’s raining, automatically change the background image on your web page to be an image of rain.
				
			</li>
			
			
			
		</ul>
		
		<p>
		Possible weather conditions (via <a href="https://developer.yahoo.com/weather/" target="_blank">Yahoo API</a>):
		</p>
		
		<ul>
		<em>
		
			<li>0: tornado</li>
			<li>1: tropical storm</li>
			<li>2: hurricane</li>
			<li>3: severe thunderstorms</li>
			<li>4: thunderstorms</li>
			<li>5: mixed rain and snow</li>
			<li>6: mixed rain and sleet</li>
			<li>7: mixed snow and sleet</li>
			<li>8: freezing drizzle</li>
			<li>9: drizzle</li>
			<li>10: freezing rain</li>
			<li>11: showers</li>
			<li>12: showers</li>
			<li>13: snow flurries</li>
			<li>14: light snow showers</li>
			<li>15: blowing snow</li>
			<li>16: snow</li>
			<li>17: hail</li>
			<li>18: sleet</li>
			<li>19: dust</li>
			<li>20: foggy</li>
			<li>21: haze</li>
			<li>22: smoky</li>
			<li>23: blustery</li>
			<li>24: windy</li>
			<li>25: cold</li>
			<li>26: cloudy</li>
			<li>27: mostly cloudy (night)</li>
			<li>28: mostly cloudy (day)</li>
			<li>29: partly cloudy (night)</li>
			<li>30: partly cloudy (day)</li>
			<li>31: clear (night)</li>
			<li>32: sunny</li>
			<li>33: fair (night)</li>
			<li>34: fair (day)</li>
			<li>35: mixed rain and hail</li>
			<li>36: hot</li>
			<li>37: isolated thunderstorms</li>
			<li>38: scattered thunderstorms</li>
			<li>39: scattered thunderstorms</li>
			<li>40: scattered showers</li>
			<li>41: heavy snow</li>
			<li>42: scattered snow showers</li>
			<li>43: heavy snow</li>
			<li>44: partly cloudy</li>
			<li>45: thundershowers</li>
			<li>46: snow showers</li>
			<li>47: isolated thundershowers</li>
			<li>3200: not available</li>
		
		</em>
		</ul>
	
	</section>
	
	<section>
	
		<h2>Resources to learn more JavaScript</h2><br />
		
		<ul class="bullets">
			<li><a href="http://www.codecademy.com/tracks/javascript">Code Academy: JavaScript</a> <em>Suggested!</em></li>
			<li><a href="http://www.lynda.com/JavaScript-tutorials/Foundations-of-Programming-Fundamentals/83603-2.html">Foundations of Programming: Fundamentals</a> (Video) <em>Suggested! (Log in <a href="http://www.lynda.com/portal/yale">here</a>)</em></li>
			<li><a href="http://eloquentjavascript.net/index.html">Eloquent JavaScript</a> (HTML)</li>
			<li><a href="http://www.lynda.com/JavaScript-tutorials/Introducing-JavaScript-Language/123563-2.html">Introducing the JavaScript Language</a> (Video)</li>
	
		</ul>
	
	</section>
	
	<p>
	<em>Jeffrey Scudder is an artist, game-maker, and programmer at Linked by Air. He received an MFA in Sculpture from Yale in 2013. Some links: <a href="http://rey.sc" target="_blank">one</a>, <a href="http://rey.sc/psam-3210.html" target="_blank">two</a>, <a href="http://yaleinteractivedesign.com/pdfs/JeffreyScudder.mp3" target="_blank">three</a>, <a href="http://traveller.xn--q9jyb4c/" target="_blank">four</a>.</em>
	</p>
	</p>
	
	</div>
	
</div>
	
</body>

</html>
