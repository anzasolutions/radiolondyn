
<div style="Visibility: Hidden; Position: Absolute;"> 
<?php 
$open = fsockopen($ip,$port); 
if ($open) { 
fputs($open,"GET /7.html HTTP/1.1\nUser-Agent:Mozilla\n\n"); 
$read = fread($open,1000); 
$text = explode("content-type:text/html",$read); 
$text = explode(",",$text[1]); 
} else { $er="Connection Refused!"; } 
?> 
</div> 
<?php 
if ($text[1]==1) { $state = "Up"; } else { $state = "Down"; } 
if (isset($er)) { echo $er; exit; } 
echo "<br><center>
<span style='padding-left: 0px; font-family: Trebuchet MS,Georgia; font-size: 24px; font-weight: bold; font-style: italic;'>$channel</span>
<br>
<br>
<span style='padding-left: 0px;'><b><font color='#FFFFFF'>$text[6]</font></b></span>
<br>
<span style='padding-left: 0px;'><a href='mailto:napisz@radiolondyn.net' class='zero'>napisz@radioldn.net</a>
</span>
<br>
<span style='padding-left: 0px;'><a href='gg:9883722' class='zero'>gg: 9883722</a>
</span></span>
</font></font>
<br><br>
";?>

