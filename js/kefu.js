﻿lastScrollY = 0;
var graySrc = false;
var InterTime = 1;
var maxWidth = -1;
var minWidth = -128;
var numInter = 8;
var BigInter;
var SmallInter;
var o = null;
var i = 0;
www97zzwcom = function(id, _top, _left) {
    var me = id.charAt ? document.getElementById(id) : id, d1 = document.body, d2 = document.documentElement;
    d1.style.height = d2.style.height = '100%'; me.style.top = _top ? _top + 'px' : 0; me.style.left = _left + "px"; 
    me.style.position = 'absolute';
    me.style.display = 'block';
    setInterval(function() { me.style.top = parseInt(me.style.top) + (Math.max(d1.scrollTop, d2.scrollTop) + _top - parseInt(me.style.top)) * 0.1 + 'px'; }, 10 + parseInt(Math.random() * 20));
    return arguments.callee;
};
$(document).ready(function() {
    var html = '';
    html += '<div id="www97zzwcom" style="z-index:2; *width:180px; display:none;" onmouseover=toBig() onmouseout=toSmall()>';
    html += '    <div class="services">';
    html += '        <div class="con">';
    html += '        	<ul>';
    html += '            	<li class="qq">';
    html += '                	<p><a href="javascript:;" class="qq"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=88888888&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:88888888:41" alt="M网" title="M网"/></a></p>';

    html += '                 </li>';
    html += '            </ul>';
    html += '        </div>';
    html += '    </div>';
    html += '    <a href="http://www.leshi1.com" title="微信二维码" class="wx" target="_blank">微信二维码</a>';
    html += '    <div class=""></div>';
    html += '</div>';

    $(document.body).append(html);

    o = document.getElementById("www97zzwcom");
    i = parseInt(o.style.left);

    www97zzwcom('www97zzwcom', 210, -128);
});

function Big() {
    if (parseInt(o.style.left) < maxWidth) {
        i = parseInt(o.style.left);
        i += numInter;
        o.style.left = i + "px";
        if (i == maxWidth)
            clearInterval(BigInter);
    }
    if (!graySrc) {
        $(o).find("img").each(function() {
            $(this).attr("src", $(this).attr("Original"));
        });
        graySrc = true;
    }
}
function toBig() {
    clearInterval(SmallInter);
    clearInterval(BigInter);
    BigInter = setInterval(Big, InterTime);
}
function Small() {
    if (parseInt(o.style.left) > minWidth) {
        i = parseInt(o.style.left);
        i -= numInter;
        o.style.left = i + "px";

        if (i == minWidth)
            clearInterval(SmallInter);
    }
}
function toSmall() {
    clearInterval(SmallInter);
    clearInterval(BigInter);
    SmallInter = setInterval(Small, InterTime);

}