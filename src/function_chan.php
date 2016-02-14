<?php

function chan($channel,$ip,$port,$index) {
	$open = fsockopen($ip,$port); 
	if ($open) { 
		fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
		$read = fread($open,1000); 
		$text = explode("content-type:text/html",$read); 
		$text = explode(",",$text[1]); 
	} else { 
		$er="Connection Refused!";
	}
	
	if ($index) {
		echo "<td valign='middle' style='font-family: Tahoma,sans-serif; font-size: 11px; color: #c0c0c0; padding-top: 340px; line-height: 180%;'>";
		echo "<center>";
		echo "<br><center>
		<span style='padding-left: 0px; font-family: Trebuchet MS,Georgia; font-size: 24px; font-weight: bold; font-style: italic;'>$channel</span>
		<br>
		<br>
		<span style='padding-left: 0px;'><b><font color='#FFFFFF'>$text[6]</font></b></span>
		<br>
		<span style='padding-left: 0px;'><a href='mailto:napisz@radiolondyn.net' class='zero'>napisz@radiolondyn.net</a>
		</span></span>
		</font></font>
		<br><br>";
		echo "<p style='margin-left: 40px; margin-right: 30px;'><a href='http://sc1.readycast.org:8888/listen.pls' class='zero'><img src='button2.gif'></a><br></center></td>";
	} else {
		echo "<br><center>Channel: $channel<br>Info: $text[6]<br>Listeners: $text[0] of $text[3] (max: $text[2])<br>Quality: $text[5] kbps<br><br>";
	}
}

?>