var GvodUrlArray = new Array();
GvodUrlArray = GvodUrls.split("###");
GvodUrlLen = GvodUrlArray.length;
var htmlurl = document.URL;
var gvascii = '&#103;&#118;&#111;&#100;&#98;&#46;&#99;&#111;&#109;';
var gdomain = U2A(gvascii);
if (htmlurl.indexOf('?gvod=') > 0) {
	var chtmlurl = htmlurl.split('?gvod=');
	var domain = chtmlurl[0];
	if (domain.indexOf(gdomain) < 0) {
		GvodUrlArray = new Array();
		GvodUrlLen = 0
	}
	var playnum = chtmlurl[1];
	if (isNaN(playnum)) {
		playnum = 1
	} else if ((playnum < 1) || (playnum > GvodUrlLen)) {
		playnum = 1
	}
} else {
	var playnum = 1;
	var domain = htmlurl
}
var urlnum = playnum - 1;

function getSubstr(downurl){
    var resultStr = downurl
    if(downurl.indexOf("ed2k://|file|")==0){
        var tmpStr =  resultStr.split('|');
        if(tmpStr.length>3){
            if(tmpStr[2].length>0){
                resultStr = decodeURIComponent(tmpStr[2]);
            }
        }

        return resultStr;
    }else{
        return resultStr;
    }
}
