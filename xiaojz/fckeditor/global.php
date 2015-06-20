<?

define('ROOT_PATH', str_replace('global.php', '', str_replace('\\', '/', __FILE__)));

//include('mian.php'); //如果你的应用程序的$_SESSION 是保存在数据库中的话，直接将你的全局配置文件包含在这里，即可配置全局$_SESSION，又可以进一步控制编辑器的上传权限。

$SET['webpath'] = '/a/fckeditor/'; # 程序根目录 必须用斜杠 '/' 开始 和 '/'结束

$SET['UpFile'] = 'upfile/';      # 上传文件存放目录  必须'/'结束

$SET['image'] = 'image/';        # 图片文件存放目录  必须'/'结束


$SET['flash'] = 'flash/';        # FLASH文件存放目录 必须'/'结束


$SET['media'] = 'media/';        # 媒体文件存放目录  必须'/'结束


$SET['files'] = 'files/';        # 其他类型文件存放目录  必须'/'结束


$SET['waterimage']  = C_ROOT_PATH.'waterimage/waterimage.png'; # 水印位置


$SET['weburl']  = 'http://'.$_SERVER['SERVER_NAME']; #文字水印。

?>