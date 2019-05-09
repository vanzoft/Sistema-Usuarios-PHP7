<?php
session_start();
$_SESSION = []; //empty array. 
session_write_close();
session_destroy(); 
 
echo '<META HTTP-EQUIV=Refresh //CONTENT="0; URL=../index.php?alert=2">';
?>