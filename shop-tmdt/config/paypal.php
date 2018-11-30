<?php 
	return [
			'client_id' => 'AVi3l49g09w1Crsc4S9giYXSOZGUdF5yfc45Jki6V8ouahnTI40dDfSqw_hVez_ZXJwz0Kr5sNorlHNP',
			'secret' => 'EB3dw6P4rMxXMXl14w4_r6OpL9vG7gwcsHD4JLCsj4eRQseggJTBfFZvgGv4cQCOJxHEWdPAnKY5MFsQ',
			'settings' => [
				'http.CURLOPT_CONNECTTIMEOUT'=> 30,
				'mode'=> 'sandbox',
				'log.LogEnabled'=>true,
				'log.FileName'=> storage_path().'/logs/PayPal.php',
				'log.LogLevel'=>'INFO',	
			]  
	];
 ?>