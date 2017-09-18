<?php

function replace($msg, $info)
{
	
	$replace = array(
			1 => array(1 => '[online]', 2 => $info['Players']),
			2 => array(1 => '[max]', 2 => $info['MaxPlayers']),
			
			);
			
	foreach($replace as $stats)
	{
	$msg = str_replace($stats[1], $stats[2], $msg);
	}
	
	return $msg;	
}



?>