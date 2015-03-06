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
	$r1 = file_get_contents('./values/r');
	$g1 = file_get_contents('./values/g');
	$b1 = file_get_contents('./values/b');
	$r2 = $r1;
	$g2 = $g1;
	$b2 = $b1;
	$rotator = 0;
	$tweet_characters = str_split($tweet_text);
	$tweet_words = explode(" ", $tweet_text);
	$break_index = floor((count($tweet_words)/2));
	$i = 0;
	$tweet_html = $tweet_html."<span>";
	foreach($tweet_words as $word) {
		if ($i != 0) {
			$tweet_html = $tweet_html." ";
		}
		if ($i == $break_index) {
			$tweet_html = $tweet_html."</span><span>";
		}
		$tweet_html = $tweet_html.$word;
		$i++;
	}
	$tweet_html = $tweet_html."</span>";


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
		<title><?php echo $tweet_text; ?></title>
		<style type="text/css">
			body {
				margin: 0px;
				padding: 0px;
				color: transparent;
			}
			body a {
				display: none;
			}
			#tweet #text {
				display: block;
				z-index: 2;
			}
			#tweet {
				position: absolute;
				left: 50%;
				top: 50%;
				margin-left: -350px;
				margin-top: -350px;
				width: 580px;
				height: 540px;
				background-image: -webkit-linear-gradient(bottom, rgb(<?php echo $r1; ?>,<?php echo $g1; ?>,<?php echo $b1; ?>) 0%, rgb(<?php echo $r2; ?>,<?php echo $g2; ?>,<?php echo $b2; ?>) 100%);
				background-repeat: no-repeat;
				background-position-x: center;
				background-position-y: center;
				color: #ffc800;
				font: 55px/50px Helvetica;
				padding-left: 20px;
				padding-right: 20px;
				padding-top: 80px;
				text-align: center;
				font-weight: bold;
				text-transform: uppercase;
				border: 40px solid;
			}
			#tweet span:last-child {
				display: block;
				position: absolute;
				width: 580px;
				bottom: 80px;
			}
		</style>
		<script type="text/javascript">
			function randomColor() {
				colors = new Array();
				colors[0] = "#e5583c";
				colors[1] = "#ffc40f";
				colors[2] = "#7790b2";
				colors[3] = "#23007c";
				colors[4] = "#95b934";
				var chosen = Math.floor(Math.random()*5);
				document.getElementById("tweet").style.color = colors[chosen];
			}
		</script>
	</head>
	<body onload="randomColor();">
		<div id="tweet">
			<?php echo $tweet_html; ?>
		</div>
	</body>
</html>