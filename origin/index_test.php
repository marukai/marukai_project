<?php
	require_once('common.php');
?>
<?php
if (is_mobile()) {
	// header("Location: http://www.kens-web.com/");
 	//exit;
 	//echo "スマートフォン";
}else{
	header("Location:http://jaky0083.php.xdomain.jp");
	echo "スマホ以外";
 	exit;
}
?>

<!DOCTYPE html>
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex,nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="content-style-type" content="text/css">
	
	<link rel="contents" href="index.html">
	<link rel="stylesheet" href="css/example.css">
	
	<title>丸会所持ゲーム一覧</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script>
		$(function(){
			$('.accordion_ul dl').hide();
				$('.accordion_ul div').click(function(e){
				$(this).toggleClass("active");
				$(this).next("dl").slideToggle();
			});
		});
	</script>



</head>

<body>
<div id="main">
	<header>
		<h1>丸会所持ゲーム一覧 SP版</h1>
		<table>
			<tr widht="100%">
				<td><a><img src="img/arrow.png" alt="ソート"></a></td>
				<td widht="28%"><form action='index_sp.php' method='post'><input name='sort' type='hidden' value='title'><input type='submit' value='タイトル'></form></td>
				<td widht="28%"><form action='index_sp.php' method='post'><input name='sort' type='hidden' value='genre'><input type='submit' value='ジャンル'></form></td>
				<td widht="28%"><form action='index_sp.php' method='post'><input name='sort' type='hidden' value='owner'><input type='submit' value='所有者'></form></td>
			</tr>
		</table>
	</header>

	<!--
	<form action="http://www.google.com/search" method="get" id="index">
	<input type="hidden" name="hl" value="ja">
	<input type="hidden" name="as_sitesearch" value="jaky0083.php.xdomain.jp/index_sp.php">
	<input class="text" type="text" name="q" size="16" value="">
	<input class="button" type="submit" value="Googleでサイト内検索">
	</form>
	-->
	<ul class="accordion_ul">

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
				echo "<li class='liBody'><section><div><h1>".$row['title']."</h1><span></span></div><dl>".
					"<dd class='image'><span></span></dd>".
					"<dd><a>ジャンル：".$row['genre']."</a></dd>".
					"<dd><a>所有者：".$row['owner']."</a></dd>".
					"<dd><a>人数：".$row['member']."</a></dd>".
					"<dd><a>紹介サイト：未実装</a></dd>".
					"<dd><a>概要:<br>".$row['outline']."</a></dd>".
					"<dd class='cf'><form action='del.php' method='post' id='pico_leftContents' class='add' ><input name='id' type='hidden' value='".$row['id']."'><input type='submit' value='削除'></form>".
					"<form action='add.php' method='post' id='pico_rightContents'><input name='id' type='hidden' value='".$row['id']."'><input type='submit' value='編集'></form></dd>".
					"</dl></section></li>";
			}
		}

	?>

	</ul>
</div>
<footer>
	<section>
		<form  action="add.php" class="add">
			<input type="submit" value="ゲームを追加 +" class="plusButton">
		</form>
	</section>
</footer>


</body>
</html>
