<!DOCTYPE html>
<html lang = “ja”>
<head><LINK rel="stylesheet"type="text/css"href="style1.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php
include_once('/var/www/html/qdmail_receiver.php');

$account = array(
		'host' => 'ik1-332-26487.vs.sakura.ne.jp',
		'protocol' => 'pop3',
		'user' => 'mailuser',
		'pass' => 'naoya2258',
);

$recv = QdmailReceiver::start('pop', $account,'SJIS');
$cnt = $recv->count();

echo $cnt;

?>
<body>
<div>
</div>
</body>
</html>