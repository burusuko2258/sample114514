<!DOCTYPE html>
<html lang = “ja”>
<head><LINK rel="stylesheet"type="text/css"href="style1.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php
$send = 0;
$send = $_POST['send'];
$SUBJECT = $_POST['subject'];
$NAME = mb_encode_mimeheader(mb_convert_encoding("MailSystem", "JIS", "EUC-JP"));
$MAIL = $_POST['mail'];
$MESSAGE = $_POST['message'];

mb_language("Ja");
mb_internal_encoding("UTF-8");

	echo "ver 1.27";
	if($send == 1){
		mb_send_mail($MAIL, $SUBJECT, $MESSAGE, "From: ".$NAME);
		$send = 0;
	}

?>
<body>
<div>
</div>
	<form action ="mailsample2.php" method ="POST">
		<p>件名:</p>
		<p><input type ="text" name ="subject"></p>
		<p>メールアドレス:</p>
		<p><input type ="text" name ="mail"></p>
		<p>本文:</p>
		<p><textarea  name ="message" cols ="50" rows ="5"></textarea></p>
		<p><input type ="hidden" name ="send" value ="1">
		<input type ="submit" value ="送信する"></p>
	</form>
</body>
</html>