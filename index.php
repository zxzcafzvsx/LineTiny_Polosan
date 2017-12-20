<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'KSqC4L4DQB5o2uk3eZTIwSNQgUGKoMF451X9VIkgmlzzDTEw+yCoA1eknDJ8HQM/IK0aLhJYABpYBZZpInVA7tksnVvLen2MUIDGwR8MtG1DBnz9LFcip99gZJ0zqCaezrR3tQlGlK8Xhb7Gz3nPMAdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = 'd735bbd21936b39f05224829eaed6f50';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Halo')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);
