<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
$db = 'mysql:dbname=middle_manager; host=150.89.234.16';
$id = 'root';
$pass = 'fkmnuser';


try{
	$pdo = new PDO($db, $id, $pass);
	print('接続成功　やったぜ。<br>');

	$sql = 'SELECT * FROM user';
	$stmt = $pdo->query($sql);
	
	while($result = $stmt->fetch(PDO::FETCH_BOTH)){
	print($result[UserID]);
	}
	
}catch(PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}

?>
</html>