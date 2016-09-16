<!DOCTYPE html>
<html lang = “ja”>
<head><LINK rel="stylesheet"type="text/css"href="style1.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php
$db = 'mysql:dbname=middle_manager; host=150.89.234.16';
$id = 'root';
$pass = 'fkmnuser';
error_reporting(E_ALL ^ E_NOTICE);

try{
	$pdo = new PDO($db, $id, $pass);

	$sql = 'SELECT * FROM user';
	$stmt = $pdo->query($sql);
}catch(PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}

$answer = ''; //値の初期化
$answer = $_POST['answer']; //answerの情報を受け取る
$ID = $_POST['ID'];
$PASS = $_POST['PASS'];

if($ID!=NULL){	//IDに文字をもし入力されたら処理開始
	while($result = $stmt->fetch(PDO::FETCH_BOTH)){	//$userと$Passwordにデータベースの内容を入力していく
		$user=$result[UserName];
		$Password=$result[Password];
		if($ID==$user){			//先に打ち込まれたIDとデータベースの$userを比較し、もし一致した場合$LoginUserと
			$LoginUser = $user; //$LoginPassに入力する
			$LoginPass = $Password;
		}
	}
}
if($answer == 1){ //answerが1、つまりボタンが押されたとき、PASSと$Password比較
	if($PASS == $LoginPass){
		header('Location: http://localhost/menu.php');	//ログイン時処理
		exit;
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
		<input type = "submit" value ="ログイン"></p>				<!-- ボタン名の表示 -->
	</form>
</div>
</body>
</html>