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
			#tweet {
				position: absolute;
				width: 616px;
				height: 620px;
				padding-left: 2px;
				padding-right: 2px;
				text-align: justify;
				background-color: rgb(<?php echo $r1; ?>,<?php echo $g1; ?>,<?php echo $b1; ?>);
				background-repeat: no-repeat;
				background-position-x: center;
				background-position-y: center;
				font: 70px/60px Helvetica;
				font-weight: bold;
				border: 40px solid;
				color: rgb(<?php echo $r2; ?>,<?php echo $g2; ?>,<?php echo $b2; ?>);
			}
		</style>
	</head>
	<body>
		<div id="tweet">
			<?php echo $tweet_text; ?>
		</div>
	</body>
</html>