<?php
header("Cache-Control: no-cache");
$myDirectory = opendir('..');

// get each entry
while($entryName = readdir($myDirectory)) {
  $dirArray[] = "../" . $entryName;
}

// close directory
closedir($myDirectory);

//	count elements in array
$indexCount	= count($dirArray);

// sort 'em
sort($dirArray);

$output = "<table style=\"width:290px\"><tr>";

// loop through the array of files and print them all
for($index=0; $index < $indexCount; $index++) {

  if (substr("$dirArray[$index]", 3, 1) != "."){ // don't list hidden files
    //Don't list directories
    $isdir = filetype($dirArray[$index]);
    if($isdir != "dir"){
      $filename = substr($dirArray[$index],3);
      if($filename != "index.html"){
        $output = $output . "<td><a href=\"#\" onclick=\"javascript:jQuery('#efilename').val('". $filename . "')\">" . $filename . "</a></td>";
        $output = $output . "<td style=\"width:32px\"><a href=\"#\" onclick=\"javascript:return confirm_delete('".$filename."');\"><img src=\"images/delete.png\" style=\"float:right\"></a></td>";
      }
    }
  }
  $output = $output . "</tr><tr>";
}
$output = $output . "</table>";
echo $output;
?>

