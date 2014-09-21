$(document).ready(function () {
	//アニメーションスピード
	var scrollSpeed = 0.5;
	//画像サイズ
	var imgWidth = 48;
	//画像の位置
	var posX = 0;
	//ループ処理
	fadeTimer = setInterval(function(){
		//画像のサイズまで移動したら0に戻る。
		if (posX >= imgWidth){
			posX= 0;
		}
		posX += scrollSpeed;
		$('.green td').css("background-position",posX+"px 0");
		$('.orange td').css("background-position",posX+"px 0");
		$('.red td').css("background-position",posX+"px 0");
		$('.blue td').css("background-position",posX+"px 0");
	}, 4);
});
$(document).ready(function () {
	//アニメーションスピード
	var scrollSpeed = 0.5;
	//画像サイズ
	var imgWidth = 48;
	//画像の位置
	var posX = 48;
	//ループ処理
	fadeTimer = setInterval(function(){
		//画像のサイズまで移動したら0に戻る。
		if (posX <= 0){
			posX= 48;
		}
		posX -= scrollSpeed;
		$('.green4 td').css("background-position",posX+"px 0");
		$('.orange4 td').css("background-position",posX+"px 0");
		$('.red4 td').css("background-position",posX+"px 0");
		$('.red2 td').css("background-position",posX+"px 0");
		$('.blue4 td').css("background-position",posX+"px 0");
	}, 4);
});

