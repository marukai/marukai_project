/* ���j���[�̃X���C�h */

//�N�b�L�[�֐�
function WriteCookie(key, value, days) {
//    var str = key + "=" + escape(value) + ";";
//    if (days != 0) {
//        var dt = new Date();
//        dt.setDate(dt.getDate() + days);
//        str += "expires=" + dt.toGMTString() + ";";
//    }
//    document.cookie = str;
}
function ReadCookie(key) {
//    var sCookie = document.cookie;
//    var aData = sCookie.split(";");
//    var oExp = new RegExp(" ", "g");
//    key = key.replace(oExp, "");
//    var i = 0;
//    while (aData[i]) {
//        var aWord = aData[i].split("=");
//        aWord[0] = aWord[0].replace(oExp, "");
//        if (key == aWord[0]) return unescape(aWord[1]);
//        if (++i >= aData.length) break;
//    }
//    return "";
}
function DeleteCookie(key)
{
//    var dt = new Date();
//    var str = key + "=;expires=" + dt.toGMTString();
//    document.cookie = str;
}

//���[�U�[�ݒ荀��
var days = 30;   //�N�b�L�[�ۑ�����


//�܂肽���݃X�N���v�g�i������� ��\���j
function FoldListDefHide(FoldName){
    if((ReadCookie("SlideDown")+"|").indexOf("|" + FoldName + "|") == -1)
        $("#title" + FoldName).next().hide();
    $("#title" + FoldName).click(function(){
        $(this).next()
          .slideToggle("normal",function(){
            if ($(this).is(":hidden")){
                var t = (ReadCookie("SlideDown")+"|").replace("|" + FoldName + "|","|");
                t = t.replace(/\|$/,"");
                if ((t=="") || (t==undefined) || (t=="|"))
                    DeleteCookie("SlideDown");
                else
                    WriteCookie("SlideDown", t, days);
            }else{
                WriteCookie("SlideDown", ReadCookie("SlideDown") + "|" + FoldName, days);
          }
         });
    });
};
//�܂肽���݃X�N���v�g
function FoldList(FoldName){
    if((ReadCookie("SlideUp")+"|").indexOf("|" + FoldName + "|") != -1)
        $("#title" + FoldName).next().hide();
    $("#title" + FoldName).click(function(){
        $(this).next()
          .slideToggle("normal",function(){
            if ($(this).is(":hidden")){
                WriteCookie("SlideUp", ReadCookie("SlideUp") + "|" + FoldName, days);
            }else{
            var t = (ReadCookie("SlideUp")+"|").replace("|" + FoldName + "|","|");
            t = t.replace(/\|$/,"");
            if ((t=="") || (t==undefined))
                DeleteCookie("SlideUp");
            else
                WriteCookie("SlideUp", t, days);
          }
         });
    });
};


//

