<?php

$filename0 = $_POST['file'];
$filep = fopen("../".$filename0, 'w');
$data = stripslashes($_POST['data']);
//Fix the image locations to point to the server
$docname = $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI'];
$docname = preg_replace("/(?<=\/)[a-z]*\.php/Ui","",$docname);
$docname = preg_replace("/composer\//","",$docname);
$filepath = $docname.$filename0;
//This line sets the image src to a absolute path
$docname = preg_replace("/\"\.\.\/uploads\//","\"http://".$docname."uploads/",$data);
//This line sets the online version path
$docname = preg_replace("/$filename0/","http://".$filepath,$docname);
//These lines remove tags used for editing
$docname = preg_replace("/ id=\".*?\"/i"," ",$docname);
$docname = preg_replace("/ id=.*? /i"," ",$docname);
$docname = preg_replace("/ id=.*?(?=>)/i"," ",$docname);
$docname = preg_replace("/ name=\".*?\"/i"," ",$docname);
$docname = preg_replace("/ href=\"#.*?\"/i"," ",$docname);
//These two lines remove the borders from the template
$docname = preg_replace("/[ ]{0,}border[\sA-Za-z0-9-:#]*?;/Ui","",$docname);
$docname = preg_replace("/[ ]{0,}border[\sA-Za-z0-9-;:]*?\"/Ui","\"",$docname);
//These three lines try to clear up things left from other removals
$docname = preg_replace("/style=\" *?\"/i","",$docname);
$docname = preg_replace("/\"\"/","",$docname);
$docname = preg_replace("/[ ]{2,}/"," ",$docname);
//Try and fix removed quotation marks (in explorer)
$docname = preg_replace("/class=dashed/","class=\"dashed\"",$docname);
$docname = preg_replace("/class=unsub/","class=\"unsub\"",$docname);
//These lines are to try and fix copy/pasta from Microsoft Word
//To fix the char £
$docname = preg_replace("/¬£/","£",$docname);
//to fix the char ¶
$docname = preg_replace("/¬¶/","¶",$docname);
//to fix the char '
$docname = preg_replace("/‚Äò/","'", $docname);
$docname = preg_replace("/‚Äô/","'", $docname);
//To fix the char " 
$docname = preg_replace("/‚Äú/","\"", $docname);
$docname = preg_replace("/‚Äù/","\"", $docname);
//To fix the char ¨
$docname = preg_replace("/¬¨/","¨",$docname);
$docname = preg_replace("/¨¬/","¨",$docname);
fwrite($filep,$docname);
fclose($filep);
//The next three lines cause the browser to download the file locally.
header('Content-disposition: attachment; filename='.$filename0);
header('Content-type: text/html');
readfile("../".$filename0);
//This last bit removes the "click here to view online" section from the online version
$filep = fopen("../".$filename0,'r');
$filedata = fread($filep, filesize("../".$filename0));
$filedata = preg_replace("/<tr class=\"online\">.*?<\/tr>/","",$filedata);
fclose($filep);
$filep = fopen("../".$filename0,'w');
fwrite($filep,$filedata);
fclose($filep);

//echo '<html><body onload="'.$js.'"></body></html>';//echo $replace;
//echo $filename0;

?>
