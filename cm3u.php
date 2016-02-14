<?php

$ar1 = array('POLSKA NA TOPIE','');
$ar2 = array('87.98.149.666','');
$ar3 = array('6666','');


echo $ar1[0];

function channel($file,$chname,$ip,$port) {
	$const1 = "#EXTINF:-1,Radio LDN: ";
	$const2 = " (www.RadioLDN.net)\n";
	$const3 = "http://";
	echo $const1 . $chname . $const2 . $const3 . $ip . ":" . $port;
	if ($file == 'testo') {
		$write = $const1 . $chname . $const2 . $const3 . $ip . ":" . $port . "\n";
		$file = $file . ".m3u";
		unlink($file);
		touch($file);
		file_put_contents($file,$write,FILE_APPEND);
	}
}

channel('testo','LDN LIVE II','87.98.149.149','8888');
channel('testo','LDN LIVE I','87.98.149.149','8888');

?>