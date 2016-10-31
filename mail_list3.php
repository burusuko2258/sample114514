<!DOCTYPE html>
<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

include_once 'qdmail_receiver.php';

$server = array(
		'host' => 'ik1-332-26487.vs.sakura.ne.jp' ,
		'protocol' => 'pop3' ,
		'user' => 'mailuser' ,
		'pass' => 'naoya2258' ,
);

$receiver = QdmailReceiver::start('pop', $server, 'UTF-8');

echo '<br/>';
$ver = "1.044";
echo $ver;
echo  "<pre>";	//print_rの内容が改行されて見やすくなる
for($i = 1 ; $i <= $receiver->count() ; $i++){

    echo "Mail number: ".$receiver->pointer()."\r\n";
    echo htmlspecialchars(	//特殊文字を変換
        print_r(
           $receiver->header('subject')
        ,true)
    ,ENT_NOQUOTES);	//ダブルクォート、もしくはシングルクォートを変換するか。多分これは両方変換しない
	echo "from ";
    print_r(
    		$receiver->header('from')
    );
	echo "body: ";
	$receiver->header('subject');
	var_dump($receiver->bodyAutoSelect());
    echo "\r\n";
    $receiver->next();
}

echo "</pre>";

//echo qd_receive_mail('count');
//$cnt = $receiver->count();
//echo "$cnt";
//echo '<p>test</p>';
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