<?php
header("Content-Type:text/html;charset=utf-8");
function connectDB($dbname){
    $db=mysql_connect("localhost", "root", "sise");
    $db_selected=mysql_select_db($dbname,$db);
    return $db;
}
$db = connectDB("liyajie");
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */

require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
       	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号

	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];
        
        //
        $total_fee = $_GET['total_fee'];
        $noticetime = date("Y-m-d H:i:s");
        $subject = $_GET['subject'];


    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
        $result = mysql_query("SELECT money FROM hao_lolgame_list WHERE orderno='{$out_trade_no}'");
        $row = mysql_fetch_assoc($result);
        //$teamname = $row["teamname"];
        if($row["money"]=='n'){
            $sql = "UPDATE hao_lolgame_list SET money='y' WHERE orderno='{$out_trade_no}'";
            mysql_query($sql);
            if(mysql_affected_rows()==1){
                echo "<style>.warteam{text-align:center;width:397px;height:266px;display:block;background:url(\"images/g9.png\");margin:0 auto;padding:0;font-size:12px;}.warteam .content{padding-top:90px;}.warteam p{text-align:left;margin:5px 0 5px 0;padding-left:130px;}</style><div class=\"warteam\"><div class=\"content\"><p class=\"first\">订单名称:{$subject}</p><p>支付金额:{$total_fee}人民币</p><p>交易时间:{$noticetime}</p><p>商户订单号:{$out_trade_no}</p><p>支付宝交易号:{$trade_no}</p><p>交易状态:完成支付</p><p><input type=\"button\" value=\"关闭窗口\" onclick=\"javascript:window.close();\" /></p></div></div>";
            }
        }else{
            echo "<style>.warteam{text-align:center;width:397px;height:266px;display:block;background:url(\"images/g9.png\");margin:0 auto;padding:0;font-size:12px;}.warteam .content{padding-top:90px;}.warteam p{text-align:left;margin:5px 0 5px 0;padding-left:130px;}</style><div class=\"warteam\"><div class=\"content\"><p class=\"first\">订单名称:{$subject}</p><p>支付金额:{$total_fee}人民币</p><p>交易时间:{$noticetime}</p><p>商户订单号:{$out_trade_no}</p><p>支付宝交易号:{$trade_no}</p><p>交易状态:完成支付</p><p><input type=\"button\" value=\"关闭窗口\" onclick=\"javascript:window.close();\" /></p></div></div>";
        }
            
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }
		
	//echo "";

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";
}
mysql_close();
?>
        <title>支付宝即时到账交易接口</title>
	</head>
    <body>
    </body>
</html>