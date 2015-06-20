<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo B_CSS_URL; ?>admin.css" type="text/css" rel="stylesheet" />
        <script language=javascript>
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <table height="100%" cellspacing=0 cellpadding=0 width=170 
               background=<?php echo B_IMG_URL; ?>menu_bg.jpg border=0>
               <tr>
                <td valign=top align=middle>
                    <table cellspacing=0 cellpadding=0 width="100%" border=0>

                        <tr>
                            <td height=10></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(1) 
                                    href="javascript:void(0);">选手管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                            <table id=child1 style="display: none" cellspacing=0 cellpadding=0 
                                   width=150 border=0>
                                <tr height=20>
                                    <td align=middle width=30><img height=9 
                                                                   src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                                    <td><a class=menuchild 
                                    href="<?php echo SITE_URL; ?>index.php?r=administrator/players/show" 
                                           target=right>选手列表</a></td></tr>
                                <tr height=20>
                                    <td align=middle width=30><img height=9 
                                                                   src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                                    <td><a class=menuchild 
                                    href="<?php echo SITE_URL; ?>index.php?r=administrator/players/add" 
                                           target=right>添加选手</a></td></tr>
                                <tr height=4>
                                    <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(8) 
                                    href="javascript:void(0);">大赛概况</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                            <table id=child8 style="display: none" cellspacing=0 cellpadding=0 
                                   width=150 border=0>
                                <tr height=20>
                                    <td align=middle width=30><img height=9 
                                                                   src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                                    <td><a class=menuchild 
                                    href="<?php echo SITE_URL; ?>index.php?r=administrator/news/updateother&type=profile" 
                                           target=right>比赛介绍</a></td></tr>
                                <tr height=20>
                                    <td align=middle width=30><img height=9 
                                                                   src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                                    <td><a class=menuchild 
                                    href="<?php echo SITE_URL; ?>index.php?r=administrator/news/updateother&type=rule" 
                                           target=right>赛事规则</a></td></tr>
                                <tr height=20>
                                    <td align=middle width=30><img height=9 
                                                                   src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                                    <td><a class=menuchild 
                                    href="<?php echo SITE_URL; ?>index.php?r=administrator/news/showcontribute" 
                                           target=right>赞助单位</a></td></tr>
                                <tr height=20>
                                    <td align=middle width=30><img height=9 
                                                                   src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                                    <td><a class=menuchild 
                                    href="<?php echo SITE_URL; ?>index.php?r=administrator/news/updateother&type=district" 
                                           target=right>分赛区机构</a></td></tr>
                                <tr height=4>
                                    <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(2) 
                                    href="javascript:void(0);">新闻中心</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child2 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                href="<?php echo SITE_URL?>index.php?r=administrator/news/showannouncement" 
                                   target=right>赛事公告</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                href="<?php echo SITE_URL;?>?r=administrator/news/show" 
                                   target=right>赛事新闻</a></td></tr>
                        
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(3) 
                                    href="javascript:void(0);">精彩瞬间</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child3 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/photo/show" 
                                   target="right">相片列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/photo/add" 
                                   target=right>添加相片</a></td></tr>
                        
                        
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(4) 
                                    href="javascript:void(0);">视频欣赏</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child4 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/video/show" 
                                   target=right>视频列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/video/add" 
                                   target=right>添加视频</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    
                    
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(6) 
                                    href="javascript:void(0);">脚部页面</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child6 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=about" 
                                   target=right>中国小金钟</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=star" 
                                   target=right>形象代言人</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=host" 
                                   target=right>大赛主持人</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=ambassador" 
                                   target=right>爱心大使</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=organize" 
                                   target=right>组织机构</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=workteam" 
                                   target=right>执行团队</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=partner" 
                                   target=right>合作伙伴</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=right" 
                                   target=right>大赛授权书</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=teacher" 
                                   target=right>大赛导师</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=certification" 
                                   target=right>大赛证书</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=promotion" 
                                   target=right>大赛晋级卡</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=board" 
                                   target=right>分赛区牌匾</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=bill" 
                                   target=right>大赛流程</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="./index.php?r=administrator/news/updateother&type=contact" 
                                   target=right>联系方式</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <!--<table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(7) 
                                    href="javascript:void(0);">系统管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child7 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>基本设置</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>样式管理</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>栏目管理</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>功能管理</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>菜单管理</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>首页设置</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>管理员列表</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo B_IMG_URL; ?>menu_bt.jpg><a 
                                    class=menuparent onclick=expand(0) 
                                    href="javascript:void(0);">个人管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child0 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=right>修改口令</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo B_IMG_URL; ?>menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   onclick="if (confirm('确定要退出吗？')) return true; else return false;" 
                                   href="http://www.865171.cn" 
                                   target=_top>退出系统</a></td></tr></table></td>-->
                <td width=1 bgcolor=#d1e6f7></td>
            </tr>
        </table>
    </body>
</html>
