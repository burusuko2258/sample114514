<!DOCTYPE html>
<html lang = “ja”>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php 
$answer = '';
$answer = $_POST['answer'];

if($answer == 1){
	echo 'やったぜ。';
}else if($answer != 1){
	echo 'ちんちんはお好き？';	
}
?>
<title>フォームからデータを受け取る</title>
</head>
<body>
<h1>フォームデータの送信</h1>
<form name = "Hai" action = "loginSample.php" method = "POST">
	<input type = "hidden" name ="answer" value ="1"><br/>
	<input type = "submit" value ="はい">
</form>
</body>
</html>