<ol class="breadcrumb">
<?php 

if($location = substr(dirname($_SERVER['PHP_SELF']), 1)) 
   $dirlist = explode('/', $location);
else 
   $dirlist = array();

$count = array_push($dirlist, basename($_SERVER['PHP_SELF']));
$address = 'http://'.$_SERVER['HTTP_HOST'];
echo '<li><a href="'.$address.'"><i class="fa fa-dashboard"></i> Home</a></li>';
echo "";
for($i = 0; $i < $count; $i++)
   echo '<li><a href="'.($address .= '/'.$dirlist[$i]).'">'.ucfirst(str_replace(array(".php","_"),array(""," "),$dirlist[$i])). ' '.'</a></li>'; ?></ol>