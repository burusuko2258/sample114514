<!DOCTYPE html>
<?php
include_once 'qdmail_receiver.php';

$server = array(
		'host' => 'ik1-332-26487.vs.sakura.ne.jp' ,
		'protocol' => 'pop3' ,
		'user' => 'mailuser' ,
		'pass' => 'naoya2258' ,
);

$receiver = QdmailReceiver::start('pop', $server, 'UTF-8');

$ver = "1.12";
echo $ver;

echo  "<pre>";	//print_rの内容が改行されて見やすくなる
for($i = 1 ; $i <= $receiver->count() ; $i++){
	echo "From: ";
	print_r(
		$receiver->header(array('from','mail'), 'none')
			);
	echo '<br>';
	echo "subject: ";
	print_r(
		$receiver->header(array('subject','name'),'none')
			);
	echo '<br>';
	print_r(
		$receiver->header(array('subject','value'),'none')
			);

	echo "\r\n";
	$receiver->next();
}
echo "</pre>";
?>
<html lang = “ja”>
<head><LINK rel="stylesheet"type="text/css"href="style1.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
<div>
</div>
</body>
</html>