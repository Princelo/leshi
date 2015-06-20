<?php
if(!isset($_COOKIE['user_name']))
    header('Location: notlogin.php');
error_reporting(E_ALL);
date_default_timezone_set("Asia/Shanghai");
header("Content-type:text/html; Charset=utf-8");
require_once("./image.class.php");
require("./db_connect.php");
if(isset($_COOKIE['user_name'])){
    $result = $xiaojz_mysqli->query("SELECT players_big_img FROM `xiaojz`.`xiaojz_players` WHERE players_user_name='{$_COOKIE['user_name']}';")->fetch_array();
    $players_big_img = $result['players_big_img'];
}

$images = new Images("file");

if ($_GET['act'] == 'cut'){	
	$image = $players_big_img;
	$res = $images->thumb($image,false,1);
	if($res == false){
		echo "裁剪失败";
	}elseif(is_array($res)){
		echo '<img src="'.$res['big'].'" style="margin:10px;">';
		echo '<img src="'.$res['small'].'" style="margin:10px;">';
	}elseif(is_string($res)){
		echo '<img src="'.$res.'">';
	}
}elseif(isset($_GET['act']) && $_GET['act'] == "upload"){
	
	$path = $images->move_uploaded();
	$images->thumb($path,false,0);							//文件比规定的尺寸大则生成缩略图，小则保持原样
	if($path == false){
		$images->get_errMsg();
	}else{
		echo "上传成功！<a href='".$path."' target='_blank'>查看</a>";
	}
}else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <meta name="Author" content="SeekEver">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
  <script src="./js/jquery.min.js" type="text/javascript"></script>
  <script src="./js/jquery.Jcrop.js" type="text/javascript"></script>
  <link rel="stylesheet" href="./css/jquery.Jcrop.css" type="text/css" />
<script type="text/javascript">

    jQuery(function($){

      // Create variables (in this scope) to hold the API and image size
      var jcrop_api, boundx, boundy;
      
      $('#target').Jcrop({
		minSize: [225,290],
		setSelect: [0,0,450,580],
        onChange: updatePreview,
        onSelect: updatePreview,
		onSelect: updateCoords,
        aspectRatio: 0
      },
	function(){
        // Use the API to get the real image size
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        // Store the API in the jcrop_api variable
        jcrop_api = this;
    });
	function updateCoords(c)
	{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};
	function checkCoords()
	{
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};
      function updatePreview(c){
        if (parseInt(c.w) > 0)
        {
          var rx = 48 / c.w;		//小头像预览Div的大小
          var ry = 48 / c.h;

          $('#preview').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
        }
	    {
          var rx = 225 / c.w;		//大头像预览Div的大小
          var ry = 290 / c.h;
          $('#preview2').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
        }
      };
    });

  </script>
 </head>
 <body>
	<!--<form method="post" action="?act=upload" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" value="上传">
	</form>-->
    <div style="color:#666666;font-size:24px;margin:0 15px; padding:25px 0 15px 45px; text-align:center; ">完成预览图裁剪后即成功报名！</div>
    <div style="clear:both"></div>
    <div style="text-align:center; margin:0 auto; margin-top:150px;">
    <div style="clear:both"></div>
    <div style="float:left;"><img id="target" src="<?php echo $players_big_img; ?>"  ></div>
	<!--<div style="width:48px;height:48px;margin:10px;overflow:hidden; float:left;"><img  style="float:left;" id="preview" src="<?php echo $players_big_img; ?>" ></div>-->
    <div style="width:225px;height:290px;margin:10px;overflow:hidden; float:left; position:relative;" class="preview"><img  style="float:left;" id="preview2" src="<?php echo $players_big_img; ?>" >
        <div class="preview-txt">预览图</div>
    </div>
    <style type="text/css">
        .preview-txt{height:40px;padding:0 20px; position:absolute; background:#fff;font-family:simsun;text-align:center;font-weight:bold; font-size:16px; line-height:40px;width:225px;background-color: rgba(255, 255, 255, 0.4);  /*display:none;*/ top:0px; text-align:center;}
        .preview>img:hover{.preview-txt:display:block;}
    </style>
	<form style="float:left;"  action="players_image_edit.php?act=cut" method="post" onsubmit="return checkCoords();">
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
		<input type="submit" value="裁剪并提交报名信息" />
    </form>
    </div>
 </body>
</html>
<?php
}	
?>

