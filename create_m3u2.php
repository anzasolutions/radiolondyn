

function channel($file,$chname,$ip,$port) {
	$const1 = "#EXTINF:-1,Radio LDN: ";
	$const2 = " (www.RadioLDN.net)\n";
	$const3 = "http://";
	echo $const1 . $chname . $const2 . $const3 . $ip . ":" . $port;
	$write = $const1 . $chname . $const2 . $const3 . $ip . ":" . $port;
	$file = $file . ".m3u";
	file_put_contents($file,$write);
}