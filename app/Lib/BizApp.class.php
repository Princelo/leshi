<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/BizBaseModule.class.php';
require APP_ROOT_PATH.'app/Lib/biz_init.php';
define("CTL",'ctl');
define("ACT",'act');

class BizApp{		
	private $module_obj;
	//网站项目构造
	public function __construct(){
		$module = strtolower($_REQUEST[CTL]?$_REQUEST[CTL]:"index");
		$action = strtolower($_REQUEST[ACT]?$_REQUEST[ACT]:"index");

		
		if(!file_exists(APP_ROOT_PATH."app/Lib/biz/".$module."Module.class.php"))
		$module = "index";
		
		require_once APP_ROOT_PATH."app/Lib/biz/".$module."Module.class.php";				
		if(!class_exists($module."Module"))
		{
			$module = "fcate";
			require_once APP_ROOT_PATH."app/Lib/biz/".$module."Module.class.php";	
		}
		if(!method_exists($module."Module",$action))
		$action = "index";
		
		define("MODULE_NAME",$module);
		define("ACTION_NAME",$action);
		
		$module_name = $module."Module";
		$this->module_obj = new $module_name;
		if(method_exists($module_name,$action))
		$this->module_obj->$action();
		else
		$this->module_obj->index();
	}
	
	public function __destruct()
	{
		unset($this);
	}
}
?>