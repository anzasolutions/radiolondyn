<?php

function chan($channel,$ip,$port,$recfile) {
	$open = fsockopen($ip,$port); 
	if ($open) { 
		fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
		$read = fread($open,1000); 
		$text = explode("content-type:text/html",$read); 
		$text = explode(",",$text[1]); 
	} else { 
		$er="Connection Refused!";
	}
	
	$max = $text[2];	
	$record = "record/" . $recfile . ".txt";
	$record2 = file_get_contents($record);
	if (!file_exists($record)) {
		echo "dupa!";
		touch($record);
		file_put_contents($record,$max);
	} else {
		if ($max > $record2) {
		file_put_contents($record,$max);
		}
	}
	$record3 = file_get_contents($record);
	echo "<br><center>Channel: $channel<br>Info: $text[6]<br>Listeners: $text[4] of $text[3]";
	echo "<br>Record: " . $record3 . " at " . date ("Y-m-d, H:i:s", filemtime($record));
	echo "<br>Quality: $text[5] kbps\n";
	$usage = ($text[4] / ($text[3] / 10)) * 10;
	$czo = round($usage,2);
	echo "<br>Usage: $czo%<br><br>\n";
	
	$nazwa = str_replace("</body></html>", "",$text[6]);
	
	/* OKLADKI: do wprowadzenia w przyszlosci
	$plik = $nazwa . ".jpg";
	if (file_exists($plik)) {
		if ($nazwa) {
			echo "<img src='$plik'>";
		}
	} else {
		echo "<img src='else.jpg'>\n";
	}
	*/
}

/*
function sum($port) {
	$ip = 'sc1.readycast.org';
	$open = fsockopen($ip,$port); 
	if ($open) { 
		fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
		$read = fread($open,1000); 
		$text = explode("content-type:text/html",$read); 
		$text = explode(",",$text[1]); 
	} else { 
		$er="Connection Refused!";
	}
	return $text[2];
}
*/

function sum2($ip,$port) {
	$open = fsockopen($ip,$port); 
	if ($open) { 
		fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
		$read = fread($open,1000); 
		$text = explode("content-type:text/html",$read); 
		$text = explode(",",$text[1]); 
	} else { 
		$er="Connection Refused!";
	}
	$czo = $text[4];
	return $czo;
}

function sum3($ip,$port) {
	$open = fsockopen($ip,$port); 
	if ($open) { 
		fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
		$read = fread($open,1000); 
		$text = explode("content-type:text/html",$read); 
		$text = explode(",",$text[1]); 
	} else { 
		$er="Connection Refused!";
	}
	$czo = $text[3];
	return $czo;
}

chan('Polska na topie I','sc1.readycast.org:8888','8888','polska1');
chan('Polska na topie II','89.248.166.198:8017','8017','polska2');
chan('UK Charts','sc1.readycast.org:8026','8026','ukcharts');
chan('Trance','sc1.readycast.org:8558','8558','trance');
chan('Chillout I','sc1.readycast.org:8440','8440','chillout');
chan('Chillout II','esr.rootnode.net:8021','8021','chillout2');
chan('Disco Polo I','sc1.readycast.org:8544','8544','discopolo');
chan('Disco Polo II','esr.rootnode.net:8019','8019','discopolo2');

echo "<br>";

$chan21 = sum2('sc1.readycast.org:8888','8888');
$chan22 = sum2('89.248.166.198:8017','8017');
$chan23 = sum2('sc1.readycast.org:8026','8026');
$chan24 = sum2('sc1.readycast.org:8558','8558');
$chan25 = sum2('sc1.readycast.org:8440','8440');
$chan26 = sum2('sc1.readycast.org:8544','8544');
$chan27 = sum2('esr.rootnode.net:8019','8019');
$chan28 = sum2('esr.rootnode.net:8021','8021');

$sumsum2 = $chan21 + $chan22 + $chan23 + $chan24 + $chan25 + $chan26 + $chan27 + $chan28;

echo "Total now: " . $sumsum2;

echo "<br>";

$record = "record.txt";
$record2 = file_get_contents($record);
if (!file_exists($record)) {
	touch($record);
	file_put_contents($record,$sumsum2);
} else {
	if ($sumsum2 > $record2) {
	file_put_contents($record,$sumsum2);
	}
}

$record3 = file_get_contents($record);
echo "Max: " . $record3 . " @ " . date ("Y-m-d, H:i:s", filemtime($record));

echo "<br>";

$chan31 = sum3('sc1.readycast.org:8888','8888');
$chan32 = sum3('89.248.166.198:8017','8017');
$chan33 = sum3('sc1.readycast.org:8026','8026');
$chan34 = sum3('sc1.readycast.org:8558','8558');
$chan35 = sum3('sc1.readycast.org:8440','8440');
$chan36 = sum3('sc1.readycast.org:8544','8544');
$chan37 = sum3('esr.rootnode.net:8019','8019');
$chan38 = sum3('esr.rootnode.net:8021','8021');

$sumsum3 = $chan31 + $chan32 + $chan33 + $chan34 + $chan35 + $chan36 + $chan37 + $chan38;

echo "Slots: " . $sumsum3;
	$usage2 = ($sumsum2 / ($sumsum3 / 10)) * 10;
	$czo2 = round($usage2,2);
	echo "<br>Usage: $czo2%<br><br>\n";

$dzis = date(Ymd);
$filename = "history/" . $dzis . ".txt";
$dzis2 = date("Y-m-d");
$nowtime = date("H:i:s");
$sumsum3b = $nowtime . " " . $chan21 . " " . $chan22 . " " . $chan23 . " " . $chan24 . " " . $chan25 . " " . $chan26 . " " . $chan27 . " " . $sumsum2 . "\n";
if (!file_exists($filename)) {
	touch($filename);
	file_put_contents($filename,$sumsum3b,FILE_APPEND);
} else {
	file_put_contents($filename,$sumsum3b,FILE_APPEND);
}

?>
