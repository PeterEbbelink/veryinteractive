<!DOCTYPE html>
<?php
	$tweet_index = $_GET["tweet"];
	$tweet = json_decode(file_get_contents("http://api.twitter.com/1/statuses/show/".$tweet_index.".json"));
	$tweet_text = $tweet->text;
?>
<html>
	<head>
		<title></title>
		<style type="text/css">
			body {
				margin: 0px;
				padding: 0px;
			}

			#tweet {
				font-family: Helvetica;
				font-weight: bold;
				position: absolute;
				width: 700px;
				height: 700px;
				border-style: solid;
				border-width: 0px;
				overflow: hidden;
			}

			#text {
				margin-left: -1px;
				margin-top: -2px;
				position: absolute;
				width: 620px;
				height: 636px;
				font-family: Helvetica;
				font-size: 60px;
				line-height: 60px;
				padding: 40px;
				font-weight: bold;
				text-align: justify;
				color: #fff;
			}

			#tweet div {
				opacity: 1.0;
			}
		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	</head>
	<body>
		<div id="tweet"></div>
		<div id="text"></div>
	</body>
	<script type="text/javascript">
			var text = "<?php echo $tweet_text; ?>";
			text = text.replace("&amp;", "&");
			$("#text").text(text);
			document.title = text;
			var index = "<?php echo $tweet_index; ?>";
			var seed = "";
			var words = text.split(" ");

			var characters = text.split("");
			for (i = 0; i < characters.length; i++) {
				var charcode = characters[i].charCodeAt(0);
				seed += String(charcode);
			}
			seed += index;

			var actions = new Array("circle", "square", "triangle", "word", "background-color", "border-color", "border-width");

			var numbers = seed.split("");
			for (i = 0; i < numbers.length; i++) {
				var action = actions[scale(numbers[i], 9, 6)];
				switch (action) {
					case "image":
						string = words[scale(getNumber(i+1, 3), 999, words.length)];
						x = scale(getNumber(i+1, 3), 999, 800)-100;
						y = scale(getNumber(i+4, 3), 999, 800)-100;
						drawImage(string, x, y);
						break;
					case "circle":
						x = scale(getNumber(i+1, 3), 999, 800)-100;
						y = scale(getNumber(i+4, 3), 999, 800)-100;
						radius = scale(getNumber(i+7, 3), 999, 350);
						r = scale(getNumber(i+10, 3), 999, 255);
						g = scale(getNumber(i+13, 3), 999, 255);
						b = scale(getNumber(i+16, 3), 999, 255);
						drawCircle(x, y, radius, r, g, b);
						break;
					case "square":
						x = scale(getNumber(i+1, 3), 999, 800)-100;
						y = scale(getNumber(i+4, 3), 999, 800)-100;
						width = scale(getNumber(i+7, 3), 999, 700);
						r = scale(getNumber(i+10, 3), 999, 255);
						g = scale(getNumber(i+13, 3), 999, 255);
						b = scale(getNumber(i+16, 3), 999, 255);
						drawSquare(x, y, width, r, g, b);
						break;
					case "triangle":
						x = scale(getNumber(i+1, 3), 999, 800)-100;
						y = scale(getNumber(i+4, 3), 999, 800)-100;
						base = scale(getNumber(i+7, 3), 999, 700);
						r = scale(getNumber(i+10, 3), 999, 255);
						g = scale(getNumber(i+13, 3), 999, 255);
						b = scale(getNumber(i+16, 3), 999, 255);
						drawTriangle(x, y, base, r, g, b);
						break;
					case "word":
						string = words[scale(getNumber(i+1, 3), 999, words.length)];
						x = scale(getNumber(i+4, 3), 999, 800)-100;
						y = scale(getNumber(i+7, 3), 999, 800)-100;
						size = scale(getNumber(i+10, 2), 99, 60)+12;
						r = scale(getNumber(i+12, 3), 999, 255);
						g = scale(getNumber(i+15, 3), 999, 255);
						b = scale(getNumber(i+18, 3), 999, 255);
						drawWord(string, x, y, size, r, g, b);
						break;
					case "background-color":
						r = scale(getNumber(i, 3), 999, 255);
						g = scale(getNumber(i+3, 3), 999, 255);
						b = scale(getNumber(i+6, 3), 999, 255);
						document.getElementById("tweet").style.backgroundColor = "rgb("+r+", "+g+", "+b+")";
						break;
					case "border-color":
						r = scale(getNumber(i+1, 3), 999, 255);
						g = scale(getNumber(i+4, 3), 999, 255);
						b = scale(getNumber(i+7, 3), 999, 255);
						document.getElementById("tweet").style.borderColor = "rgb("+r+", "+g+", "+b+")";
						break;
					case "border-width":
						width = 10*scale(getNumber(i+1, 1), 9, 4);
						document.getElementById("tweet").style.borderWidth = width+"px";
						document.getElementById("tweet").style.width = 700-2*width+"px";
						document.getElementById("tweet").style.height = 700-2*width+"px";
						break;
					case "delete":
						$('#tweet div:last-child').remove();
						break;
				}
			}

			function getNumber(i, digits) {
				if (i > numbers.length - 1) {
					i = i - (numbers.length - 1);
				}
				result = String(numbers[i]);
			    for (j = 0; j < digits-1; j++) {
			        result += next(i + j);
			    }
			    return Number(result);
			}


			function scale(n, oldMax, newMax) {
				return Math.floor((n/oldMax)*newMax);
			}

			function next(i) {
				if (i < numbers.length - 1) {
					return numbers[i+1];
				} else {
					return numbers[i - (numbers.length - 1)];
				}
			}

			function drawCircle(x, y, radius, r, g, b) {
				var circle = document.createDocumentFragment();
				var div = document.createElement("div");
				div.style.left = x+"px";
				div.style.top = y+"px";
				div.style.position = "absolute";
				div.style.width = radius*2+"px";
				div.style.height = radius*2+"px";
				div.style.borderRadius = radius+"px";
				div.style.backgroundColor = "rgb("+r+", "+g+", "+b+")";
				circle.appendChild(div);
				document.getElementById("tweet").appendChild(circle);
			}

			function drawSquare(x, y, width, r, g, b) {
				var square = document.createDocumentFragment();
				var div = document.createElement("div");
				div.style.left = x+"px";
				div.style.top = y+"px";
				div.style.position = "absolute";
				div.style.width = width+"px";
				div.style.height = width+"px";
				div.style.backgroundColor = "rgb("+r+", "+g+", "+b+")";
				square.appendChild(div);
				document.getElementById("tweet").appendChild(square);
			}

			function drawTriangle(x, y, base,  r, g, b) {
				var triangle = document.createDocumentFragment();
				var div = document.createElement("div");
				div.style.left = x+"px";
				div.style.top = y+"px";
				div.style.position = "absolute";
				div.style.width = "0px";
				div.style.height = "0px";
				div.style.borderWidth = base/2+"px";
				div.style.borderStyle = "solid";
				div.style.borderColor = "rgb("+r+", "+g+", "+b+")";
				div.style.borderLeftColor = "transparent";
				div.style.borderTopColor = "transparent";
				triangle.appendChild(div);
				document.getElementById("tweet").appendChild(triangle);
			}

			function drawWord(string, x, y, size, r, g, b) {
				var word = document.createDocumentFragment();
				var div = document.createElement("div");
				div.innerHTML = string;
				div.style.left = x+"px";
				div.style.top = y+"px";
				div.style.position = "absolute";
				div.style.borderWidth = size/4+"px";
				div.style.fontSize = size+"px";
				div.style.paddingTop = size/4+"px";
				div.style.paddingBottom = size/4+"px";
				div.style.paddingLeft = size/2+"px";
				div.style.paddingRight = size/2+"px";
				div.style.borderStyle = "solid";
				div.style.color = "rgb("+r+", "+g+", "+b+")";
				word.appendChild(div);
				document.getElementById("tweet").appendChild(word);
			}

			function drawImage(string, x, y) {
				$.ajax({
				    url: "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q="+encodeURIComponent(string)+"&callback=?",
				    dataType: "jsonp",
				    success: function(data) {
				    	var image = document.createDocumentFragment();
				    	var img = document.createElement("img");
				    	img.style.left = x+"px";
				    	img.style.top = y+"px";
				    	img.style.position = "absolute";
				    	img.src = data.responseData.results[0].tbUrl;
				    	image.appendChild(img);
				    	document.getElementById("tweet").appendChild(image);
				    }
				});
			}
		</script>
</html>