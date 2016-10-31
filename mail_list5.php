<?php
$enc = "UTF-8";
$mail_host = "ik1-332-26487.vs.sakura.ne.jp";
$mail_port = 110;
$mail_user = "mailuser";
$mail_pwd = "naoya2258";

$fp = fsockopen($mail_host, $mail_port);

echo "ver:1.047";
echo '<br>';

$line = fgets($fp, 512);
fputs($fp, "USER $mail_user\r\n");
$line = fgets($fp, 512);
fputs($fp, "PASS $mail_pwd\r\n");
$line = fgets($fp, 512);
if(!preg_match("(OK)", $line)){
	fclose($fp);
	die("ログインチャレンジ失敗");
}

fputs($fp,"STAT\r\n");
$line = fgets($fp, 512);	//STATの内容を$listに挿入
print $line ."<br>";

list($status,$cnt,$size) = explode(' ',$line);	//$list(STAT)の内容を挿入
//var_dump($cnt);

if(intVal($cnt) == 0){	//受信メールの有無チェック、intVal()は()内のものを数字に変える
	print "受信メールなし<br><br>";
}else{
	print "受信メールあり<br><br>";
}


for($i=1; $i<= $cnt; $i++){		//受信メールの数の分だけ処理
	fputs($fp, "RETR $i\r\n");

	do{	//do~while分は最低一回は実行することが保障されたwhile文
		$line = fgets($fp, 512);	//ここのlineは$i番目のメールの情報が入ってる

		/*if(preg_match("/^Subject/", $line)){
			$subject = mb_decode_mimeheader($line);	//文字化け対策のデコード
			$subject = preg_replace("/Subject:/","",$subject);	//preg_replaceは置き換えができる正規検索。詳しいことはword見ろ
			print $i.":".mb_convert_encoding($subject,$enc,"auto")."<br>";
		}*/


		$text = str_replace(array("\r\n","\r","\n"),'',$line);
		//echo $text;
		$body = strstr($text, 'text/plain ?');
		echo $body;
		/*if(preg_match("/Content-Type: text/plain; charset=UTF-8/\n", $line)){
			$body = mb_decode_mimeheader($line);	//文字化け対策のデコード
			//$body = preg_replace("/Content-Transfer-Encoding: base64\n\n/","",$body);	//preg_replaceは置き換えができる正規検索。詳しいことはword見ろ
			print $i.":".mb_convert_encoding($body,$enc,"auto")."<br>";
		}*/


		//$de = mb_decode_mineheader($line);
		//print mb_convert_encoding($line,$enc,"auto")."<br>";

	}while(!preg_match("/^\.\r\n/", $line));
}

fputs($fp, "QUIT\r\n");
fclose($fp);
?>
