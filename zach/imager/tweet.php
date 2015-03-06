<!DOCTYPE html>
<?php
	function _uniord($c) {
		if (ord($c{0}) >=0 && ord($c{0}) <= 127)
			return ord($c{0});
		if (ord($c{0}) >= 192 && ord($c{0}) <= 223)
			return (ord($c{0})-192)*64 + (ord($c{1})-128);
		if (ord($c{0}) >= 224 && ord($c{0}) <= 239)
			return (ord($c{0})-224)*4096 + (ord($c{1})-128)*64 + (ord($c{2})-128);
		if (ord($c{0}) >= 240 && ord($c{0}) <= 247)
			return (ord($c{0})-240)*262144 + (ord($c{1})-128)*4096 + (ord($c{2})-128)*64 + (ord($c{3})-128);
		if (ord($c{0}) >= 248 && ord($c{0}) <= 251)
			return (ord($c{0})-248)*16777216 + (ord($c{1})-128)*262144 + (ord($c{2})-128)*4096 + (ord($c{3})-128)*64 + (ord($c{4})-128);
		if (ord($c{0}) >= 252 && ord($c{0}) <= 253)
			return (ord($c{0})-252)*1073741824 + (ord($c{1})-128)*16777216 + (ord($c{2})-128)*262144 + (ord($c{3})-128)*4096 + (ord($c{4})-128)*64 + (ord($c{5})-128);
		if (ord($c{0}) >= 254 && ord($c{0}) <= 255)    //  error
			return FALSE;
		return 0;
	}
	$tweet_index = $_GET["tweet"];
	$tweet = json_decode(file_get_contents("http://api.twitter.com/1/statuses/show/".$tweet_index.".json"));
	$tweet_text = $tweet->text;
	$r2 = 0;
	$g2 = 0;
	$b2 = 0;
	$rotator = 0;
	$tweet_characters = str_split($tweet_text);

	foreach($tweet_characters as $character) {
		switch ($rotator) {
			case 0:
				$r2 += _uniord($character);
				while ($r2 > 255) {
					$r2 -= 255;
				}
				$rotator++;
				break;
			case 1:
				$g2 += _uniord($character);
				while ($g2 > 255) {
					$g2 -= 255;
				}
				$rotator++;
				break;
			case 2:
				$b2 += _uniord($character);
				while ($b2 > 255) {
					$b2 -= 255;
				}
				$rotator = 0;
				break;
		}
	}

	//file_put_contents('./values/r', $r2);
	//file_put_contents('./values/g', $g2);
	//file_put_contents('./values/b', $b2);
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
				position: absolute;
				width: 620px;
				height: 620px;
				font-family: Helvetica;
				font-size: 40px;
				line-height: 100px;
				padding: 40px;
				font-weight: bold;
				text-align: justify;
				color: rgb(<?php echo $r2; ?>, <?php echo $g2; ?>, <?php echo $b2; ?>);
				background: rgb(<?php echo $r2; ?>, <?php echo $g2; ?>, <?php echo $b2; ?>);
			}

			#tweet div {
				opacity: 1.0;
			}
			
			span {
				background: white;
				float: left;
				padding-left: 40px;
				padding-right: 40px;
				background-position: center center;
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
			document.title = text;
			var index = "<?php echo $tweet_index; ?>";
			var words = text.split(" ");
			
			for (i = 0; i < words.length; i++) {
				var word = document.createDocumentFragment();
				var span = document.createElement("span");
				span.innerHTML = words[i];
				word.appendChild(span);
				document.getElementById("text").appendChild(word);
				lengthen(words[i], span);
			}

			function parseWord(word, element) {
				$.ajax({
				    url: "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q="+encodeURIComponent(word)+"&callback=?",
				    dataType: "jsonp",
				    success: function(data) {
      					element.style.backgroundImage = "url('"+data.responseData.results[0].unescapedUrl+"')";
				    }
				});
			}
			
			function lengthen(word, element) {
				$.ajax({
				  url: 'http://clients1.google.com/complete/search',
				  dataType: 'jsonp',
				  data: {
					q: word,
					nolabels: 'f',
					client: 'img',
					ds: 'i'
				  },
				  success: function(data) {
					  if (data[1][0]) {
						  result = data[1][0][0].replace("<b>", "").replace("</b>", "");
					  } else {
						  result = word;
					  }
					 parseWord(result, element);
				  }
				});
			}
		</script>
</html>