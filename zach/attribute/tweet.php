<!DOCTYPE html>
<?php
	$tweet_index = $_GET["tweet"];
	$tweet = json_decode(file_get_contents("http://api.twitter.com/1/statuses/show/".$tweet_index.".json"));
	$tweet_text = $tweet->text;
?>
<html>
	<head>
		<title><? echo $tweet_text; ?></title>
		<style type="text/css">
			body {
				margin: 0px;
				padding: 0px;
			}
			#tweet {
				width: 700px;
				height: 700px;
				font-family: Helvetica;
				font-weight: bold;
				text-transform: uppercase;
				border-style: solid;
				border-width: 0px;
				overflow: hidden;
			}
		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	</head>
	<body>
		<div id="tweet"></div>
	</body>
	<script type="text/javascript">
			var tweet = "<? echo $tweet_text; ?>";
			$("#tweet").text(tweet);
			var characters = tweet.split("");
			var attributes = new Array("color", "background-color", "border-top-color", "border-right-color", "border-bottom-color", "border-left-color", "line-height", "font-size", "letter-spacing", "border-width", "text-align");
			
			function max(n, max) {
				while (n > max)
					n -= max;
				return n;
			}
			
			function calculateColor(i) {
				var r = characters[i].charCodeAt(0);
				var g = characters[i+1].charCodeAt(0);
				var b = characters[i+2].charCodeAt(0);
				
				r = r*r;
				g = g*g;
				b = b*b;
				
				r = max(r, 255);
				g = max(g, 255);
				b = max(b, 255);
					
				return r+", "+g+", "+b;
			}
		    
			for (i = 0; i < characters.length; i++) {
				var charcode = characters[i].charCodeAt(0);
				
				var attributeIndex = charcode;
				
				while (attributeIndex >= attributes.length)
					attributeIndex -= attributes.length;
					
				var attribute = attributes[attributeIndex];
				
				if (i < characters.length - 2) {
					var color = i;
				} else {
					var color = i - 2;
				}
				
				if (i < characters.length - 1) {
					var value = characters[i+1].charCodeAt(0);
				} else {
					var value = characters[i-1].charCodeAt(0);
				}
				
				switch (attribute) {
					case "color":
					case "background-color":
					case "border-top-color":
					case "border-right-color":
					case "border-bottom-color":
					case "border-left-color":
						$("#tweet").css(attribute, "rgb("+calculateColor(color)+")");
						break;
					case "font-size":
						$("#tweet").css(attribute, max(value, 62)+10+"px");
						break;
					case "letter-spacing":
						$("#tweet").css(attribute, max(value, 11)-1+"px");
						break;
					case "border-width":
						$("#tweet").css(attribute, (max(value, 4)-1)*20+"px");
						$("#tweet").css("width", 700-(max(value, 4)-1)*40+"px");
						$("#tweet").css("height", 700-(max(value, 4)-1)*40+"px");
						break;
					case "text-align":
						switch (max(value, 4)) {
							case 1:
								$("#tweet").css(attribute, "left");
								break;
							case 2:
								$("#tweet").css(attribute, "right");
								break;
							case 3:
								$("#tweet").css(attribute, "center");
								break;
							case 4:
								$("#tweet").css(attribute, "justify");
								break;
						}
						break;
				}
				
			}
		</script>
</html>