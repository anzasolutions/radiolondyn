<?php

/* 
www.RadioLDN.net
*/

function chan($channel,$ip,$port) {
	$open = fsockopen($ip,$port); 
	if ($open) { 
		fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
		$read = fread($open,1000); 
		$text = explode("content-type:text/html",$read); 
		$text = explode(",",$text[1]); 
	} else { 
		$er="Connection Refused!";
	}
	echo "<br><center>Channel: $channel<br>Info: $text[6]<br>Listeners: $text[4] of $text[3] (max: $text[2])<br>Quality: $text[5] kbps<br><br>";
}

chan('Polska na topie','sc1.readycast.org:8888','8888');
chan('UK Charts','sc1.readycast.org:8026','8026');
chan('Drum\'n\'Bass','sc1.readycast.org:8558','8558');
chan('Chillout','sc1.readycast.org:8440','8440');
chan('Disco Polo','sc1.readycast.org:8544','8544');

?>