<?php
	require_once('common.php');
?>
<?php
if (is_mobile()) {
 	//echo "スマートフォン";
 	header("Location:http://jaky0083.php.xdomain.jp/index_sp.php");
 	exit;
}else{
	//echo "スマホ以外";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">


<head>
	<meta http-equiv="content-style-type" content="text/css">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="contents" href="index.html">
	<link rel="stylesheet" href="main.css">
	<style type="text/css"></style>
	<title>page top</title>
	
	

	
</head>
<body>
<table class="red"><tr><td>
	<p class="hed">丸会テストページ</p>
</td></tr></table>

<a>ソート</a>
<table>
	<tr widht="100%">
		<td widht="30%"><form action='index.php' method='post'><input name='sort' type='hidden' value='title'><input type='submit' value='タイトル' style="width: 100px;"></form></td>
		<td widht="30%"><form action='index.php' method='post'><input name='sort' type='hidden' value='genre'><input type='submit' value='ジャンル' style="width: 100px;"></form></td>
		<td widht="30%"><form action='index.php' method='post'><input name='sort' type='hidden' value='owner'><input type='submit' value='所有者' style="width: 100px;"></form></td>
	</tr>
</table>

<table class="red2" border="1" rules="all">
	<tr>
		<td></td><td>ID</td><td>タイトル</td><td>ジャンル</td><td>所有者</td><td>遊戯人数</td><td>概要</td>
	</tr>
		

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
  // クエリを送信する
	if( isset( $_POST['sort'])){	
		//echo "sort = ".$_POST['sort']."<br>";
		switch ($_POST['sort']){
			case "title":
				$sql = "SELECT * FROM `boardgame_table` ORDER BY title ASC;";
				break;
			case "genre":
				$sql = "SELECT * FROM `boardgame_table` ORDER BY genre ASC;";
				break;
			case "owner":
				$sql = "SELECT * FROM `boardgame_table` ORDER BY owner ASC;";
				break;
			case "membe":
				$sql = "SELECT * FROM `boardgame_table` ORDER BY member ASC;";
				break;
			default:
				$sql = "SELECT * FROM `boardgame_table`";
				break;
		}
	}else{
		$sql = "SELECT * FROM `boardgame_table`";
	}
	
  $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
  	if (!$result) {
	    die('code:102 データベースの問い合わせに失敗しました。');   
	}else{
		while ($row = mysql_fetch_array($result)){
			echo "<tr><td><form action='add.php' method='post'><input name='id' type='hidden' value='".$row['id']."'><input type='submit' value='編集'></form></td>";
			echo "<td>".$row['id']."</td><td>".$row['title']."</td><td>".$row['genre']."</td><td>".$row['owner']."</td><td>".$row['member']."</td><td>".$row['outline']."</td></tr>\n";
		}
	}

?>
		<tr>
			<td width="10%" >
				<form  action="add.php">
					<input type="submit" value="追加">
				</form>
			</td>
		</tr>
</table>



</form>
</body>
</html>
