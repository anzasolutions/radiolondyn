<?php

function winstat($yourIP,$yourPORT) {
// -- Tweak Display Here -- // 

error_reporting(E_ERROR); 
$bgcolor = '#ffffff'; // Page background color 
$tablew = '400'; // Table width 
$toprow = '#c0c0c0'; // Top background color 
$bottom = '#ffffff'; // Bottom background color 
$border = '#000000'; // Border color 
$thickness = '2'; // Border thickness 
$padding = '4'; // Cell padding 
$font = 'Verdana'; // Font 
$fontsize = '2'; // Font size 

$refresh = '30'; // How often should it refresh? (seconds) 

// Return JavaScript or HTML 
$jsOutput=FALSE; // TRUE=js | FALSE=HTML 

// try to get the target from the url... 
$host = $_REQUEST[host]; 
if (!$host) $host = $yourIP; 
$port = $_REQUEST[port]; 
if (!$port) $port = $yourPORT; 

$lf = chr(10); // 0x0A [\n] 

// The lastN is configurable at the DNAS with, ShowLastSongs= it defaults to 10 and has a maximum of 20 
$t_max = $_REQUEST[n]; 
if (!t_max || $t_max<1 || $t_max>19) $t_max=10; 
//19 is the max here because 20=current_track+19 

// Let's get /index.html first... to keep this short, there is no code to handle the dnas being down 
// or not running, so the script will display nothing in those cases. 

$connect_timeout=5; 
$success=0; 

$fp1 = fsockopen($host, $port); //open connection 
if(!$fp1) { //if this fails, I'm done.... 
fclose($fp1); 
$success++; 
} else { 
$request="GET /index.html HTTP/1.1\r\nHost:" . $host . ":" . $port . "\r\nUser-Agent: SHOUTcast DNAS Status [index] * (Mozilla/PHP)\r\nConnection: close\r\n\r\n"; //get index.html 
fputs($fp1,$request,strlen($request)); 
$page=''; 
while(!feof($fp1)) { 
$page .= fread($fp1, 16384); 
} 
fclose($fp1); 

// now I have the entire /index.html in $page -- all I want from here is the current track... 
// (hint-hint) 

$song00 = ereg_replace("</b></td>.*", "", ereg_replace(".*Current Song: </font></td><td><font class=default><b>", "", $page)); // easy, right <img src="images/smilies/smile.gif" border="0" alt=""> 

// now let's get /played.html... (this is kinda long) 
$fp = fsockopen($host, $port); 
if(!$fp) { //if connection could not be made 
fclose($fp); 
$success++; 

} else { 
$request="GET /played.html HTTP/1.1\r\nHost: " . $host . ":" . $port . "\r\nUser-Agent: SHOUTcast DNAS Status [played] * (Mozilla/PHP)\r\n"."Connection: close\r\n\r\n"; 
fputs($fp,$request,strlen($request)); 
$page=''; 
while (!feof($fp)) { 
$page .= fread($fp, 16384); 
} 
fclose($fp); //close connection 
$played_html=$page; 

if ($played_html) { 
$played_html= ereg_replace('<x>','|-|',ereg_replace('</tr>','',ereg_replace('</td><td>','<x>',ereg_replace('<tr><td>','',ereg_replace('</tr>','</tr>' . $lf,ereg_replace('-->','--]',ereg_replace('<!--','[!--',ereg_replace('</table><br><br>.*','',ereg_replace('.*<b>Current Song</b></td></tr>','',$played_html))))))))); 
$xxn=strlen($played_html); 
$r=2; 
$t_count=0; 
$reading=0; 
$track[0]=$song00; 
while ($r<$xxn & $t_count<=$t_max){ 
$cur=substr($played_html,$r,1); 
if ($cur==$lf) $reading=0; 
if ($reading==1) $track[$t_count] .= $cur; 
if ($cur=="|" & substr($played_html,$r-1,1)=="-" & substr($played_html,$r-2,1)=="|") { 
$reading=1; 
$t_count++; 
} 
$r++; 
} 
} 
} 
} 

// I now have $track[0-N] containg the current plus last N tracks... 
// Output time... 

if ($success==0) { 



$r=0; 
$output_string=''; 

//tweak the output string (the table init) here.... 

while ($r<=$t_max){ 
if ($r==0) $output_string .= 'Now Playing:<br> <b>'.str_replace("'", "'",str_replace('"', '"',$track[$r])) . '</b><br><br><i>Earlier on the air:</i><br><br>'; 
else $output_string .= str_replace("'", "'",str_replace('"', '"',$track[$r])) . '<br>'; 

$r++; 
} 


if ($jsOutput) { 
echo "document.write('" . $output_string . "');"; 
} else { 
echo $output_string;
echo '<hr size="1" width=60%">';
} 

} 
}

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
	
	echo "<br><center>Channel: $channel<br>Info: $text[6]<br><br>";
	
	$nazwa = str_replace("</body></html>", "",$text[6]);
	
	/* OKLADKI start */
	$covers = "covers/";
	$plik = $covers . $nazwa . ".jpg";
	$plik2 = $covers . $nazwa . ".gif";
	$plik3 = $covers . $nazwa . ".png";
	if ($nazwa) {
		if (file_exists($plik)) {
			echo "<img src='$plik' width='200px' height='200px'>";
		} else if (file_exists($plik2)) {
			echo "<img src='$plik2'>";
		} else if (file_exists($plik3)) {
			echo "<img src='$plik3'>";
		} else {
			echo "<img src='vinyl.png'>\n";
		}
	}
	/* OKLADKI end */
	
	echo "<br><br>Listeners: $text[0] of $text[3] (max: $text[2])<br>Quality: $text[5] kbps<br><br>";
}

chan('Polska na topie','sc1.readycast.org:8888','8888');
winstat('sc1.readycast.org','8888');
chan('UK Charts','sc1.readycast.org:8026','8026');
winstat('sc1.readycast.org','8026');
chan('Trance','sc1.readycast.org:8558','8558');
winstat('sc1.readycast.org','8558');
chan('Chillout','sc1.readycast.org:8440','8440');
winstat('sc1.readycast.org','8440');
chan('Disco Polo','sc1.readycast.org:8544','8544');
winstat('sc1.readycast.org','8544');

?>