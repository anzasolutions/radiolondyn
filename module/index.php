
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="Description" content="www.RadioLDN.net" />
  <meta name="Keywords" content="www.RadioLDN.net" />
  <meta name="Author" content="www.RadioLDN.net" />

  <title>www.RadioLDN.net</title>

  <link rel="stylesheet" href="module.css" type="text/css" />
</head>
<body>

<?php

function chan($channel,$ip,$port,$m3u) {
	$open = fsockopen($ip,$port); 
	if ($open) { 
		fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
		$read = fread($open,1000); 
		$text = explode("content-type:text/html",$read); 
		$text = explode(",",$text[1]); 
	} else { 
		$er="Connection Refused!";
	}
	
	$nazwa = str_replace("</body></html>", "",$text[6]);
	$nazwa2 = str_replace("</body></html>", "",$text[6]);
	
	if (strlen($nazwa) > 35)
		$nazwa = substr($nazwa,0,35) . "...";
		
	echo "<li><a href='../$m3u.m3u' title='$nazwa2'><b>$channel</b><br>$nazwa</a>\n";
}
?>

<div id="main">
<div id="logo">
</div>
</div>

<div id="lista">
<ul class="uleczka">

<?php
	chan('POLSKA NA TOPIE','sc1.readycast.org:8888','8888','polska');
	chan('UK CHARTS','sc1.readycast.org:8026','8026','ukcharts');
	chan('DISCO POLO','sc1.readycast.org:8544','8544','discopolo');
	chan('TRANCE','sc1.readycast.org:8558','8558','TRANCE');
	chan('CHILLOUT','sc1.readycast.org:8440','8440','chillout');
?>

</ul>
</div>

</body>
</html>