<?php
$success = unlink("../".$_POST['name']);
if($success == 1){
  echo "success";
}
else{
  echo "fail";
}
?>
