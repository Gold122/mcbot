<?php

require_once("src/ts3admin.class.php");
require_once("src/functions.php");
require_once("config.php");
require_once("src/MinecraftQuery.php");
require_once("src/MinecraftQueryException.php");

$ts = new ts3admin($c['ts3']['host'], $c['ts3']['query_port']);
if($ts->getElement('success', $ts->connect())){
	$ts->login($c['ts3']['login'], $c['ts3']['password']);
	$ts->selectServer($c['ts3']['login_port']);
	$ts->setName($c['ts3']['name']);
	$whoam = $ts->getElement('data',$ts->whoAmI());
    $ts->clientMove($whoam['client_id'],$c['ts3']['channel']);
	$Query = new MinecraftQuery();
	
	while(true)
	{
		foreach($c['servers'] as $config)
		{
			try
			{
				$Query->Connect($config['ip'], $config['query']);
				$info = $Query->GetInfo();
				$players = $Query->GetPlayers();
				$channel['channel_description'] = '[center][size=20][b]Graczy Online[/b][/size]\n\n[size=10]';
				if($info['Players'] != '')
				{
					$online = array();
					foreach($players as $player)
					{
						$online[] = '[IMG]https://minotar.net/helm/'.$player.'/16.png[/IMG]  -  '.$player;
					}
					$channel['channel_name'] = replace($config['channel_name'],$info);
					$channel['channel_description'].= implode("\n", $online);
				}
				else
				{
					$channel['channel_name'] = replace($config['channel_name'],$info);
					$channel['channel_description'].= '\n[b]Brak Graczy Online';
				}
				
			}
			catch(MinecraftQueryException $e)
			{
				$channel['channel_name'] = 'Error: Sprawdz Opis';
				$channel['channel_description'] = '[center][size=20][b]'.$e->getMessage();
			}
			$channel['channel_description'].= '\n\n[hr][/center][right][b] © Gold122 | Anno';
			$ts->channelEdit($config['channel_id'], $channel);
		}
		sleep($c['ts3']['interval']*60);
	}
}else
{
	echo 'Brak Połączenia z ts3!';
	echo PHP_EOL;
	echo 'Sprawdz config !';
	die;
}