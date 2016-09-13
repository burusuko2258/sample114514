<!DOCTYPE html>
<html lang = “ja”>
<head><LINK rel="stylesheet"type="text/css"href="style1.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
$answer = ''; //値の初期化
$answer = $_POST['answer']; //answerの情報を受け取る
$ID = $_POST['ID'];
$PASS = $_POST['PASS'];

if($answer == 1){ //answerが1、つまりボタンが押されたとき、やったぜ。と表示
	if($ID == 123 && $PASS == 123){ //IDとPASSに123と入力されると、ログイン完了
		echo '<red>ログイン完了</red>';
	}else{
		echo '<red>ログインできませんでした...(小声)</red>';	
	}
}
?>

<title>フォームからデータを受け取る</title>

<body>
<div id = "AllForm">
	<p class = "title">Login</p>
	<form name = "Hai" action = "loginSample.php" method = "POST">
		<p>ID</p>
		<p class = "ID"><input type = "text" name = "ID"></p>
		<p>PassWord</p>
		<p><input type = "password" name = "PASS"></p>
		<p class = "Button1"><input type = "hidden" name ="answer" value ="1"> <!-- ボタン、押されると値が1に-->
		<input type = "submit" value ="はい"></p>				<!-- ボタン名の表示 -->
	</form>
</div>
</body>
</html>