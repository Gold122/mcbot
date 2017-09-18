<?php

	//LOGOWANIE DO SERWERA
	$c['ts3'] = array(
            'host' => 'localhost', // IP TS3
	    'login_port' => 9987, // Port Głosowy
            'query_port' => 10011, // Port Query 
            'login' => 'serveradmin', // Login Query
	    'password' => 'password', // Hasło Query
            'name' => 'McBot',  // Nazwa bota QUERY 
			'channel' => '655',  // Kanał na jakim ma siedzieć bot QUERY !!
			'interval' => '5',     // Co ile ma bot odświeżać kanał ( Czas w minutach )
			);
	
	//Konfiguracja
	
	$c['servers'] = array(
		0 => array(
			'ip' => 'lobby.freecraft.eu',    // IP serwera       
			'query' => '25555',  // Query port serwera
			'channel_name' => 'Lobby: [online] / [max]', // Nazwa kanału // Domyślnie 2 zmienne [online] , [max]
			'channel_id' => '980', // Kanał który ma edytować
		),
		1 => array(
			'ip' => 'lobby.freecraft.eu',    // IP serwera       
			'query' => '25555',  // Query port serwera
			'channel_name' => 'Server 2: [online] / [max]', // Nazwa kanału // Domyślnie 2 zmienne [online] , [max]
			'channel_id' => '980', // Kanał który ma edytować
		),
	);
	
?>
