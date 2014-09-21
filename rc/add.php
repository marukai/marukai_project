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
<table class="red"><tr><td>
	<p class="hed">丸会所有物追加ページ</p>
</td></tr></table>


<?php
	//echo "post_id = ".$_POST['id']."<br>";
	//post[id]が存在＝編集
	if( isset( $_POST['id'])){
		//データベースへ接続
		$url = "157.112.147.201";
		$user = "jaky0083_admin";
		$pass = "jing0083";
		$db = "jaky0083_marukai";
	  
		$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");
		// データベースを選択する
		$sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");
		// クエリを送信する
		$sql =  "SELECT * FROM `boardgame_table` WHERE id = '".$_POST['id']."';";
		$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。(編集)<br />SQL:".$sql);
		$row = mysql_fetch_array($result);
?>

<form action="revision.php" method="post" class="add">
	タイトル：<br />
	<input type="text" name="title" size="30" value=<?php echo "'".$row['title']."'"; ?> /><br />
	ジャンル：<br />
	<input type="text" name="genre" size="30" value=<?php echo "'".$row['genre']."'"; ?> /><br />
	所有者：<br />
	<input type="text" name="owner" size="30" value=<?php echo "'".$row['owner']."'"; ?> /><br />
	遊戯人数：<br />
	<input type="text" name="member" size="30" value=<?php echo "'".$row['member']."'"; ?> /><br />
	概要：<br />
	<textarea name="outline" cols="30" rows="20"><?php echo $row['outline']; ?></textarea><br />
	<br />
	<input name='id' type='hidden' value=<?php echo "'".$_POST['id']."'"; ?>>
	<input type="submit" value="編集する" />
</form>
	

<?php
	//post[id]が存在しない＝追加
	}else{
?>


<form action="send.php" method="post" class="add">
  タイトル：<br />
  <input type="text" name="title" size="30" value="" /><br />
  ジャンル：<br />
  <input type="text" name="genre" size="30" value="" /><br />
  所有者：<br />
  <input type="text" name="owner" size="30" value="" /><br />
  遊戯人数：<br />
  <input type="text" name="member" size="30" value="" /><br />
  概要：<br />
  <textarea name="outline" cols="30" rows="20"></textarea><br />
  <br />
  <input type="submit" value="登録する" />
</form>

<?php
}
?>
</body>
</html>
