<?php
date_default_timezone_set('America/New_York'); 
   $currentTime = time() ;

if ($currentTime > strtotime('18:00:00')) {
    // whatever you have to do here
	echo "Well delete";
}else
{
echo "we'll not delete";
}
?> 
