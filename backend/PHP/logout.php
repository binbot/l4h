<?php
$expire = time()-360000;
setcookie("L4HUserid","",$expire, "/",".linux4hope.org" );
setcookie("L4HPassword","",$expire, "/",".linux4hope.org");
header("Location: http://linux4hope.org");
?>
