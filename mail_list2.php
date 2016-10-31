<!DOCTYPE html>
<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
//ob_start();
include_once('/var/www/html/qdmail_receiver.php');
$account = array(
		'host' => 'ik1-332-26487.vs.sakura.ne.jp',
		'protocol' => 'pop3',
		'user' => 'mailuser',
		'pass' => 'naoya2258',
);


$ver = "ver:1.2110";
echo $ver;

ob_start();
$recv = QdmailReceiver::start('pop', $account);
$cnt = $recv->count();

for($i=1; $i<=$cnt; $i++){
	$from = $recv->header(Array('from','mail'));
	$to = $recv->header(array('to','mail'));
	$h = $recv->header(array('subject','name'));
	$body = qd_receive_mail('body');
	//$recv->header('subject');
	$all = $recv->header('ALL');
	//var_dump($recv->bodyAutoSelect());
	//$html .= str_repeat("v",60)."\n";
	$html .= '<br>';
	$ALL = "ALL: ".$all;
	$html .= "From: ".$from;
	$html .= "To: ".$to."\n";
	$html .= "body: ".$body;

	$html .= "H: ".$h."\n";
	/*echo $from;
	echo '<br>';
	echo $to;
	echo '<br>';
	echo $h;
	echo '<br>';*/
}
$output = ob_get_contents();
print $ALL;
print $html;
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