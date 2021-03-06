<?php
//create a unique id so we cachebust
$id = uniqid(rand(),true);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Media Query Test: Cascade Override for High Resolution</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

	<link rel="stylesheet" href="_css/style.css" />

	
	<!-- Test 7 Styles -->
	<style type="text/css">
	    #test7 {background-image:url('images/lowres.png?<?php echo $id; ?>');width:200px;height:75px;}
		@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
		only screen and (min--moz-device-pixel-ratio: 1.5),
		only screen and (-o-min-device-pixel-ratio: 3/2), 
		only screen and (min-device-pixel-ratio: 1.5)
		{
	    #test7 {background-image:url('images/highres.png?<?php echo $id; ?>');width:200px;height:75px;}
	}
	</style>


	
	<script type="text/javascript">
	var startTime = (new Date().getTime());
	</script>
</head>
<body>
<h1>Media Query Image Download Test</h1>

<h2 id="t5">Test Seven: Cascade Override for High Resolution</h2>
<p>
    In this test, we start with a background image that is low res. Then we use a CSS media query to replace that background image if the it is a high resolution display.
</p>

<div id="test7"></div>

<h4>HTML Code</h4>
<code>&#60;div id="test7"&#62;&#60;/div&#62;</code>

<h4>CSS Code</h4>
<code>&#60;style type="text/css"&#62;

    #test7 {background-image:url('images/lowres.png?<?php echo $id; ?>');width:200px;height:75px;}

@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
only screen and (min--moz-device-pixel-ratio: 1.5),
only screen and (-o-min-device-pixel-ratio: 3/2), 
only screen and (min-device-pixel-ratio: 1.5) {
    #test7 {background-image:url('images/highres.png?<?php echo $id; ?>');width:200px;height:75px;}
}
&#60;/style&#62;
</code>

<div id="loaded">
	<h2>Results</h2>
</div>
<?php include('includes/testLinks.inc.php'); ?>
<script type="text/javascript" src="_js/imageTest.js"></script>
<script type="text/javascript" charset="utf-8">
var _bTestResults = {};
window.onload = function() {

	//set the domain prefix so we can just pass image names
	prefix = 'images/';

	//set our suffix
    //needed because setting image.src fires request
    //this helps us avoid caching messing with the results
	suffix = '<?php echo $id; ?>';
	
	//get the div where we'll spit out the results
	target = document.getElementById('loaded');

	var images = [
		['lowres.png', 'Loaded (low res)'],
		['highres.png', 'Loaded (high res)']
	];
	
	_bTestResults = imageTest(images);

	if (window.devicePixelRatio === undefined) {
		_bTestResults['Pixel Ratio'] = 0;
	} else {
		_bTestResults['Pixel Ratio'] = window.devicePixelRatio;
	}
	target.innerHTML += "<p><strong>window.devicePixelRatio:</strong> " + _bTestResults['Pixel Ratio'] + "</p>";
	
	// Fetch the Browserscope script that sucks the results from _bTestResults
	(function() {
		var _bTestKey = 'agt1YS1wcm9maWxlcnINCxIEVGVzdBjj-d0ODA';
		var _bScript = document.createElement('script');
		_bScript.src = 'http://www.browserscope.org/user/beacon/' + _bTestKey;
		_bScript.src += '?sandboxid=44f7adc1dd3013d';
		_bScript.setAttribute('async', 'true');
		var scripts = document.getElementsByTagName('script');
		var lastScript = scripts[scripts.length - 1];
		lastScript.parentNode.insertBefore(_bScript, lastScript);
	})(); 
}

</script>
</body>
</html>
