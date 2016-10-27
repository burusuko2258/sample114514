<!DOCTYPE html>
<html lang = “ja”>
<head><LINK rel="stylesheet"type="text/css"href="style1.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php
//error_reporting(E_ALL ^ E_NOTICE);
//$SEND = $_POST['send'];
//$SUBJECT = $_POST['subject'];
$SUBJECT = "1";
//$NAME = $_POST['name'];
$NAME = "-f burusuko2258@gmail.jp";
//$MAIL = $_POST['mail'];
$MAIL = "testmail2258@gmail.com";
//$MESSAGE = $_POST['message'];
$MESSAGE = "うんち";

mb_language("Ja");
mb_internal_encoding("UTF-8");

/*$header = "MIME-Version: 1.0\n";
$header .= "^Content-Transfer-Encoding: 7bin\n";
$header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
$header .= "Message-Id: <" . md5(uniqid(microtime())) . "@1609-16.is.oit.ac.jp >\n";
$header .= "X-Mailer: PHP/". phpversion();
$header .= "from: burusuko2258@gmail.com \n";
$header .= "Reply-To: burusuko2258@gmail.com \n";
$header .= "Return-Path: burusuko2258@gmail.com \n";*/

$SEND = 0;
echo $SEND;
$SEND = $_POST['send'];
	if($SEND == 1){
		/*if(!mail($MAIL, $SUBJECT, $MESSAGE, $header, $NAME)){
			echo("ダメみたいですね");
			exit("error");
		}else{
			echo "送信完了";
		}*/
		mb_send_mail($MAIL, $SUBJECT, $MESSAGE, $header, $NAME);
		echo "送信完了";
	}

	echo $SEND;
?>
<body>
<div>
</div>
	<form action ="mailsample1.php" method ="POST">
		<p>件名:</p>
		<p><input type ="text" name ="subject"></p>
		<p>送信者名:</p>
		<p><input type ="text" name ="name"></p>
		<p>メールアドレス:</p>
		<p><input type ="text" name ="mail"></p>
		<p>本文:</p>
		<p><textarea  name ="message" cols ="50" rows ="5"></textarea></p>
		<p><input type ="hidden" name ="send" value ="1">
		<input type ="submit" value ="送信する"></p>
	</form>
</body>
</html>