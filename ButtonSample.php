<!DOCTYPE html>
<html lang = “ja”>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
$answer = ''; //値の初期化
$answer = $_POST['answer']; //answerの情報を受け取る

if($answer == 1){ //answerが1、つまりボタンが押されたとき、やったぜ。と表示
	echo 'やったぜ。';
}else if($answer != 1){
	echo 'ちんちんはお好き？';
}
?>
<title>フォームからデータを受け取る</title>
</head>
<body>
<h1></h1>
<div id = "AllForm">
	<p class = "title">Login</p>
	<form name = "Hai" action = "ButtonSample.php" method = "POST">
		<input type = "hidden" name ="answer" value ="1"><br> <!-- ボタン、押されると値が1に-->
		<input type = "submit" value ="はい">				<!-- ボタン名の表示 -->
	</form>
</div>
</body>
</html>