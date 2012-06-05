<?php
//echo $file;
$filename = "../" . $_POST['efile'];
$filep = fopen($filename, 'r');
$contents = fread($filep, filesize($filename));
fclose($filep);
//fix double ''
$contents = preg_replace("/''/","'",$contents);
//Add s1 div
$contents = preg_replace("/<table.*\/table>/is","<div id=\"s1\">\n$0\n</div>",$contents);
//Add id=main to main table
$contents = preg_replace("/<table/i","$0 id=\"main\" ",$contents,1);
//Add in the necessary scripts
$contents = preg_replace('/<\/title>/',"</title>
  <script type=\"text/javascript\" src=\"scripts/wysiwyg.js\"></script>
 <script type=\"text/javascript\" src=\"scripts/wysiwyg-settings.js\"></script>
<script type=\"text/javascript\" src=\"jquery-1.4.2.min.js\"></script>
<script type=\"text/javascript\" src=\"jscolor/jscolor.js\"></script>
		<link rel=\"stylesheet\" href=\"styles.css\">
		<script type=\"text/javascript\" src=\"scripts.js\"></script>\n",$contents);
//Add the body style
$contents = preg_replace("/<body.*>/i","<body style=\"background-color:#77bbff;text-align:center;margin:100px auto\">",$contents);
//Remove unnecessary style info (I.E.)
//Remove the unnecessary style info
$contents = preg_replace("/<td style=\"margin: 0px; padding: 0px; font-size: 0px;\" class=\"dashed\"/","<td class=\"dashed\"",$contents);
//Get the number of class='dashed' cells
$count = preg_match_all("/class=\"dashed\"/",$contents,$matches);
//loop through adding the other info
for($i=0;$i<$count;$i++){
  $contents = preg_replace("/<TD class=\"dashed\"/i","<td href=\"#dialog\" name=\"modal\" class=\"dashed\" id=\"cell".$i."\"",$contents, 1);
}
//add the editor, mask and save
$contents = preg_replace("/<\/body>/","<br><button onclick=\"jQuery('#tablecolor').hide();jQuery('#savefilename').hide();jQuery('#newrow').toggle();jQuery('#editfilename').hide();\" class=\"XXaddrow\" style=\"height:35px;width:80px\">Add Row</button>
 <button onclick=\"jQuery('#tablecolor').toggle();jQuery('#savefilename').hide();jQuery('#newrow').hide();jQuery('#editfilename').hide();\" style=\"height:35px;width:80px\">Color</button>
<button onclick=\"jQuery('#tablecolor').hide();jQuery('#newrow').hide();jQuery('#savefilename').toggle();jQuery('#editfilename').hide();\" style=\"height:35px;width:80px\">Save</button>
<button onclick=\"jQuery('#tablecolor').hide();jQuery('#savefilename').hide();jQuery('#newrow').hide();jQuery('#editfilename').toggle();jQuery('#files').load('filelist.php')\" style=\"height:35px;width:80px\">Edit</button>

<div id=\"newrow\" style=\"display:none;margin:10px auto;background:#77bbff;width:150px;border:2px solid #004488\">
	 <div style=\"margin:2px\">
		  <img class=\"add5050\" src=\"images/5050.PNG\">
	 </div>
	 <div style=\"margin:2px\">
		<img class=\"add2575\" src=\"images/2575.PNG\">
	 </div>
	 <div style=\"margin:2px\">
		<img class=\"add7525\" src=\"images/7525.PNG\">
	</div>
	 <div style=\"margin:2px\">
		<img class=\"add1000\" src=\"images/1000.PNG\">
	</div>
	 <div style=\"margin:2px\">
    <img class=\"add3333\" src=\"images/3333.png\"> 
  </div>
 </div>
 <div id=\"tablecolor\" style=\"display:none;margin:10px auto;background:#77bbff;width:200px;border:2px solid #004488;word-wrap:break-word;\">
	 <table style=\"text-align:left\"	>
		 <tr>
			 <td>
				 Text:
			 </td>
			 <td>
         <input class=\"color\" id=\"selecttextcolor\" value=\"000000\">
			 </td>
		 </tr>
		 <tr>
			 <td>
				 Background: 
			 </td>
			 <td>
				 <input class=\"color\" id=\"selectbackgroundcolor\">
			 </td>
		 </tr>
	 </table>
   <button id=\"colorchange\">OK</button>&nbsp;<button onclick=\"jQuery('#tablecolor').hide();\">Cancel</button>
 </div>


 <div id=\"savefilename\" style=\"display:none;margin:10px auto;background:#77bbff;width:150px;border:2px solid #004488\">
	 <br><input type=\"text\" id=\"filename\" value=\"newsletter1.html\">
	 <button class=\"write\">Save</button>
</div>
<div id=\"editfilename\" style=\"display:none;margin:10px auto;background:#77bbff;width:300px;overflow:auto;border:2px solid #004488\">
<div id=\"files\" style=\"overflow:auto\"></div>
  <br><input type=\"text\" id=\"efilename\" value=\"newsletter1.html\">
  <button class=\"read\">Edit</button>
</div>

 <div id=\"boxes\">  
   
	 <div id=\"dialog\" class=\"window\">
		 <form action=\"\">
			 <textarea id=\"text2\" style=\"width:600px;height:300px\" rows=\"\" cols=\"\"></textarea> 
		 </form>
		 <br><button class=\"save\">OK</button>
	 <button class=\"close\">Cancel</button>
     <!-- #customize your modal window here -->  

     </div>  
       
     <!-- Do not remove div#mask, because you'll need it to fill the whole screen -->    
     <div id=\"mask\"></div>  
 </div>

 <div>
	 <form id=\"saveform\" method=\"post\" action=\"save.php\">
		 <input type=\"hidden\" id=\"file\" name=\"file\" value=\"temp1.html\">
		 <input type=\"hidden\" id=\"pagedata\" name=\"data\">
	
     </form>
     
     <form id=\"editform\" method=\"post\" action=\"test.php\">
    <input type=\"hidden\" id=\"efile\" name=\"efile\" value=\"temp1.html\">
   </form>

  </body>",$contents);
$filename = 'edit.html';
$filep = fopen($filename, 'w');
$contents = fwrite($filep, $contents);
fclose($filep);
//echo $contents;
header("Location: edit.html");
?>
