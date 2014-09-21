<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
	<meta http-equiv="content-style-type" content="text/css">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="contents" href="index.html">
	<link rel="stylesheet" href="main.css">
	<style type="text/css"></style>
	<title>page add</title>
</head>
<body>



<?php
	//データベースへ接続
  $url = "157.112.147.201";
  $user = "jaky0083_admin";
  $pass = "jing0083";
  $db = "jaky0083_marukai";
  
  $link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");
  // データベースを選択する
  $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
  
  // クエリを送信する
	$sql = "REPLACE `boardgame_table` ".
			"VALUES ('".$_POST['id']."','".$_POST['title']."','".$_POST['genre']."','".$_POST['owner']."','".$_POST['member']."','".$_POST['outline']."')";
	$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
?>


<table border="1">
  <tr>
    <td>タイトル</td><td><?php echo $_POST["title"] ?></td>
  </tr>
  <tr>
    <td>ジャンル</td><td><?php echo $_POST["genre"] ?></td>
  </tr>
  <tr>
    <td>所有者</td><td><?php echo $_POST["owner"] ?></td>
  </tr>
    <tr>
    <td>遊戯人数</td><td><?php echo $_POST["member"] ?></td>
  </tr>
    <tr>
    <td>概要</td><td><?php echo $_POST["outline"] ?></td>
  </tr>
</table>

<a>上記で上書きしました</a>

<table>
		<tr>
			<td width="50%">
				<form  action="index.php" class="add">
					<input type="submit" value="戻る">
				</form>
			</td>
		</tr>
</table>
</body>

</body>
</html>