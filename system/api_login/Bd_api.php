<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2010 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------

$api_lang = array(
	'name'	=>	'百度登录插件',
	'app_key'	=>	'百度API应用key',
	'app_secret'	=>	'百度API应用secret',
);

$config = array(
	'app_key'	=>	array(
		'INPUT_TYPE'	=>	'0',
	), //百度API应用的KEY值
	'app_secret'	=>	array(
		'INPUT_TYPE'	=>	'0'
	), //百度API应用的密码值
);

/* 模块的基本信息 */
if (isset($read_modules) && $read_modules == true)
{
	if(ACTION_NAME=='install')
	{
		//更新字段
		$GLOBALS['db']->query("ALTER TABLE `".DB_PREFIX."user`  ADD COLUMN `Bd_id`  varchar(255) NOT NULL",'SILENT');
	}
    $module['class_name']    = 'Bd';

    /* 名称 */
    $module['name']    = $api_lang['name'];

	$module['config'] = $config;
	
	$module['lang'] = $api_lang;
    
    return $module;
}

// 百度的api登录接口
require_once(APP_ROOT_PATH.'system/libs/api_login.php');
class Bd_api implements api_login {
	
	private $api;
	
	public function __construct($api)
	{
		$api['config'] = unserialize($api['config']);
		$this->api = $api;
	}
	
	public function get_api_url()
	{
		es_session::start();
        $redirect_uri = get_domain().APP_ROOT."/api_callback.php?c=Bd";
		$authorize_uri = "https://openapi.baidu.com/oauth/2.0/authorize?response_type=code&client_id=".$this->api['config']['app_key']."&redirect_uri=".urlencode($redirect_uri);
		$str = "<a href='".$authorize_uri."' title='".$this->api['name']."'><img src='".$this->api['icon']."' alt='".$this->api['name']."' /></a>&nbsp;";
		return $str;
	}
	
	public function get_big_api_url()
	{
		es_session::start();
		$redirect_uri = get_domain().APP_ROOT."/api_callback.php?c=Bd";
		$authorize_uri = "https://openapi.baidu.com/oauth/2.0/authorize?response_type=code&client_id=".$this->api['config']['app_key']."&redirect_uri=".urlencode($redirect_uri);	
		$str = "<a href='".$authorize_uri."' title='".$this->api['name']."'><img src='".$this->api['bicon']."' alt='".$this->api['name']."' /></a>&nbsp;";
		return $str;
	}
	function auto_do_login()
	{
		es_session::start();
        $redirect_uri = get_domain().APP_ROOT."/api_callback.php?c=Bd";
		$authorize_uri = "https://openapi.baidu.com/oauth/2.0/authorize?response_type=code&client_id=".$this->api['config']['app_key']."&redirect_uri=".urlencode($redirect_uri);
		@header("location:".$authorize_uri);
	}
        public function get_bind_api_url()
	{
		es_session::start();
		$redirect_uri = get_domain().APP_ROOT."/api_callback.php?c=Bdt&is_bind=1";
		$authorize_uri = "https://openapi.baidu.com/oauth/2.0/authorize?response_type=code&client_id=".$this->api['config']['app_key']."&redirect_uri=".urlencode($redirect_uri);	
		$str = "<a href='".$authorize_uri."' title='".$this->api['name']."'><img src='".$this->api['bicon']."' alt='".$this->api['name']."' /></a>&nbsp;";
		return $str;
	}


		
	public function callback()
	{
		es_session::start();	
		require_once APP_ROOT_PATH.'system/api_login/bd/get_access_token.php';
		
		//申请到的appid
		es_session::set("appid",$this->api['config']['app_key']);
		
		//申请到的appkey
		es_session::set("appkey",$this->api['config']['app_secret']);
			
		
		//Tips
		//这里已经获取到了openid，可以处理第三方账户与openid的绑定逻辑。
		//但是我们建议第三方等到获取access token之后在做绑定逻辑
		
		//用授权的request token换取access token
                $is_bind = intval($_REQUEST['is_bind']);
		        $access_token_data = get_access_token(es_session::get("appid"), es_session::get("appkey"));
                $access_token_data = json_decode($access_token_data);
                $result = array();
                $result = (array)$access_token_data;
                $access_token = $result['access_token'];

		//错误处理
		if (isset($result["error_code"]))
		{
		    echo "get access token error<br>";
		    echo "error msg: $access_token_data<br>";
		    echo "点击<a href=\"http://developer.baidu.com/wiki/index.php?title=百度OAuth2.0授权页面错误码定义\" target=_blank>查看错误码</a>";
		    exit;
		}
		

		//将access token，openid保存起来！！！
		//在demo演示中，直接保存在全局变量中.
		//正式网站运营环境中，我们强烈建议你将这两个值保存在MySQL或者其他永久的存储中以便于后续使用
		//尤其是在网站不止一台服务器的情况下，两次请求的sessoin信息可能不会保存再同一台服务器导致访问出错
		es_session::set("access_token",$access_token);
        //获取用户信息
		$arr = get_bduser_info($access_token);
		es_session::set("baidu_access_token",$access_token);
		es_session::set("baidu_userid",$arr['uid']);
        //var_dump($arr);exit;
        $msg['field'] = 'Bd_id';
		$msg['id'] = $arr["uid"];
		$msg['name'] = $arr["uname"];
        $msg['portrait'] = $arr["portrait"];
		es_session::set("api_user_info",$msg);
		$user_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where Bd_id = '".intval($msg['id'])."' and Bd_id <> ''");	
		if($user_data)
		{
				$user_current_group = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_group where id = ".intval($user_data['group_id']));
				$user_group = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user_group where score <=".intval($user_data['score'])." order by score desc");
				if($user_current_group['score']<$user_group['score'])
				{
					$user_data['group_id'] = intval($user_group['id']);
				}
				es_session::set("user_info",$user_data);
				$GLOBALS['db']->query("update ".DB_PREFIX."user set login_ip = '".get_client_ip()."',login_time= ".get_gmtime().",group_id=".intval($user_data['group_id'])." where id =".$user_data['id']);				
				$GLOBALS['db']->query("update ".DB_PREFIX."deal_cart set user_id = ".intval($user_data['id'])." where session_id = '".es_session::id()."'");
				es_session::delete("api_user_info");
				if($is_bind)
				{
					if(intval($user_data['id'])!=intval($GLOBALS['user_info']['id']))
					{
						showErr("该帐号已经被别的会员绑定过，请直接用帐号登录",0,url("shop","uc_center#setweibo"));
					}
					else
					{
						es_session::set("user_info",$user_data);
						app_redirect(url("shop","uc_center#setweibo"));
					}
				}
				else
				{
					es_session::set("user_info",$user_data);
					app_redirect(url("index"));
				}
		}
		elseif($is_bind==1&&$GLOBALS['user_info'])
		{
			//当有用户身份且要求绑定时
			$GLOBALS['db']->query("update ".DB_PREFIX."user set Bd_id= '".intval($msg['id'])."' where id =".$GLOBALS['user_info']['id']);						
			app_redirect(url("shop","uc_center#setweibo"));
		}
		else
		{
			$this->create_user();
			app_redirect(url("shop","user#stepone"));
		}
		
		
	}
	
	public function get_title()
	{
		return '百度登录接口，需要php_curl扩展的支持';
	}
	public function create_user()
	{
		$s_api_user_info = es_session::get("api_user_info");
		$user_data['user_name'] = $s_api_user_info['name'];
		$user_data['user_pwd'] = md5(rand(100000,999999));
		$user_data['create_time'] = get_gmtime();
		$user_data['update_time'] = get_gmtime();
		$user_data['login_ip'] = get_client_ip();
		$user_data['group_id'] = $GLOBALS['db']->getOne("select id from ".DB_PREFIX."user_group order by score asc limit 1");
		$user_data['is_effect'] = 1;
		$user_data['Bd_id'] = $s_api_user_info['id'];
		$origin_username = $user_data['user_name'];
		$count = 0;
		do{
			if($count>0)
			$user_data['user_name'] = $origin_username.get_gmtime();
			if($user_data['Bd_id'])
			$GLOBALS['db']->autoExecute(DB_PREFIX."user",$user_data,"INSERT",'','SILENT');
			$rs = $GLOBALS['db']->insert_id();
			$count++;
		}while(intval($rs)==0&&$user_data['Bd_id']);
		
		$user_info = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."user where id = ".intval($rs));
		es_session::set("user_info",$user_info);
		es_session::delete("api_user_info");
	}	
}
?>