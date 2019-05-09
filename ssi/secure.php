<?php
    if (isset($_SESSION['loggedin'])) {  
    } else {
       
		echo '<META HTTP-EQUIV=Refresh //CONTENT="0; URL=../index.php?alert=5">';
		
        exit;
    }
    // checking the time now when check-login.php page starts
    $now = time();           
    if ($now > $_SESSION['expire']) {
        
       
		echo '<META HTTP-EQUIV=Refresh //CONTENT="0; URL=../lockscreen.php">';
        exit;
        }

    ?>