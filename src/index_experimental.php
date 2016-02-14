<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-style-type" content="text/css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="newsticker/newsticker.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="newsticker/prototype.js"></script>
    <script type="text/javascript" src="newsticker/effects.js"></script>
    <script type="text/javascript" src="newsticker/newsticker.js"></script>
	<title>Radio Londyn</title>
</head>

<body>

<div id="pos">
lol
</div>

<div id="back">

<div id="newsticker2">
<div id="newsticker">
	<ul>
		<li>This is a sample newsticker message 01</li>
		<li>This is a sample newsticker message 02</li>
		<li>This is a sample newsticker message 03</li>
		<li>This is a sample newsticker message 04</li>
	</ul>
</div>
</div>

<div id="main">
<?php
$channel = "POLSKA NA TOPIE";
$file = 'stats.php';
$ip = 'sc1.readycast.org:8888';
$port = '8888';
$name = 'Radio Londyn';
$pls = 'http://sc1.readycast.org:8888/listen.pls';
$www = 'di.fm';
include($file);
?>
<p style="margin-left: 40px;"><a href="http://sc1.readycast.org:8888/listen.pls" class="zero"><img src="button2.gif"></a><br>
</div>


<div id="main">
<?php
$channel = "UK CHARTS";
$file = 'stats.php';
$ip = 'sc1.readycast.org:8026';
$port = '8026';
$name = 'Radio Londyn';
$pls = 'http://sc1.readycast.org:8026/listen.pls';
$www = 'di.fm';
include($file);
?>
<p style="margin-left: 40px;"><a href="http://sc1.readycast.org:8026/listen.pls" class="zero"><img src="button2.gif"></a><br>
</div>
</div>

</body>
</html>