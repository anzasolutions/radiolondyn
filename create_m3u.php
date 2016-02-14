<?php

/*
$tabela = array('LDN LIVE','POLSKA NA TOPIE','UK CHARTS','TRANCE','CHILLOUT','DISCOPOLO');
$tabela2 = array('87.98.149.146:8000','87.98.149.146:8000','esr.rootnode.net:8030','esr.rootnode.net:8032','esr.rootnode.net:8021','esr.rootnode.net:8019');

sort($tabela);

foreach($tabela as $key => $lolo) {
	echo $key . "#EXTINF:-1,Radio LDN: " . $lolo . " (www.RadioLDN.net) <br>";
	foreach($tabela2 as $key => $lolo2) { 
		echo $key . "http:// " . $lolo2 . "<br>";
	}
}

echo $lol;
*/


function crefil($filename,$name,$ip,$port) {
	$content = "#EXTINF:-1,Radio LDN ooo: " . $name . " (www.RadioLDN.net)\n";
	$content2 = "http://" . $ip . ":" . $port ."\n";
	$content0 = "#EXTM3U\n";
	if (file_exists($filename)) {
		unlink($filename);
		touch($filename);
		file_put_contents($filename,$content0);
		file_put_contents($filename,$content,FILE_APPEND);
		file_put_contents($filename,$content2,FILE_APPEND);
	} else if (!file_exists($filename)) {
		touch($filename);
		file_put_contents($filename,$content0);
		file_put_contents($filename,$content,FILE_APPEND);
		file_put_contents($filename,$content2,FILE_APPEND);
	}
	return $filename;
}

$pic = crefil('test.m3u','LDN LIVE','87.98.149.149','8000');

//echo $pic;

echo "<br>";
echo "<br>";
echo "<br>";
/*




function crefil($filename,$name,$ip,$port) {
	$content = "#EXTINF:-1,Radio LDN ooo: " . $name . " (www.RadioLDN.net)\n";
	$content2 = "http://" . $ip . ":" . $port ."\n";
	$content0 = "#EXTM3U\n";
	if (file_exists($filename)) {
		touch($filename);
		if (file_exists($filename)) {
			file_put_contents($filename,$content0);
			file_put_contents($filename,$content,FILE_APPEND);
			file_put_contents($filename,$content2,FILE_APPEND);
		}
	} else if (!file_exists($filename)) {
		touch($filename);
		if (file_exists($filename)) {
			file_put_contents($filename,$content0);
			file_put_contents($filename,$content,FILE_APPEND);
			file_put_contents($filename,$content2,FILE_APPEND);
		}
	}
	return $filename;
}


echo "#EXTINF:-1,Radio LDN: " . $tabela[0] . " (www.RadioLDN.net)<br>";
echo "http:// " . $tabela2[0] . "<br>";
echo "#EXTINF:-1,Radio LDN: " . $tabela[1] . " (www.RadioLDN.net)<br>";
echo "http:// " . $tabela2[1] . "<br>";
echo "#EXTINF:-1,Radio LDN: " . $tabela[2] . " (www.RadioLDN.net)<br>";
echo "http:// " . $tabela2[2] . "<br>";
echo "#EXTINF:-1,Radio LDN: " . $tabela[3] . " (www.RadioLDN.net)<br>";
echo "http:// " . $tabela2[3] . "<br>";
echo "#EXTINF:-1,Radio LDN: " . $tabela[4] . " (www.RadioLDN.net)<br>";
echo "http:// " . $tabela2[4] . "<br>";
echo "#EXTINF:-1,Radio LDN: " . $tabela[5] . " (www.RadioLDN.net)<br>";
echo "http:// " . $tabela2[5] . "<br>";
*/

echo "<a href='$pic'>lol</a>";

?>


