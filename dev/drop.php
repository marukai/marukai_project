<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
	<meta http-equiv="content-style-type" content="text/css">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="contents" href="index.html">
	<link rel="stylesheet" href="main.css">
	<style type="text/css"></style>
	<title>page add</title>
	
<?php
	require_once('common.php');
	
	//判別実行
	if (is_mobile()) {
		// header("Location: http://www.kens-web.com/");
	 	//exit;
	 	//echo "スマートフォン";
	 	echo '<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">';
	}else{
		//echo "スマホ以外";
	}
	
	
?>	
	
</head>
<body>



<?php
	echo "post_id = ".$_POST['id']."<br>";

	//データベースへ接続
  $url = "157.112.147.201";
  $user = "jaky0083_admin";
  $pass = "jing0083";
  $db = "jaky0083_marukai";
  
  $link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");
  // データベースを選択する
  $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
  
  // クエリを送信する
	$sql = "DELETE FROM `boardgame_table` WHERE id='".$_POST['id']."'";
	$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
?>



<a>削除しました</a>

<table>
		<tr>
			<td width="50%">
				<form  action="index.php">
					<input type="submit" value="戻る">
				</form>
			</td>
		</tr>
</table>
</body>

</body>
</html>