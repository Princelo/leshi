<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

require APP_ROOT_PATH.'app/Lib/TuanBaseModule.class.php';
require APP_ROOT_PATH.'app/Lib/tuan_init.php';
define("CTL",'ctl');
define("ACT",'act');

class TuanApp{		
	private $module_obj;
	//网站项目构造
	public function __construct(){
		if(is_mobile() === false) {
            $module = strtolower($_REQUEST[CTL] ? $_REQUEST[CTL] : "index");
            $action = strtolower($_REQUEST[ACT] ? $_REQUEST[ACT] : "index");

            if (!file_exists(APP_ROOT_PATH . "app/Lib/tuan/" . $module . "Module.class.php"))
                $module = "index";

            require_once APP_ROOT_PATH . "app/Lib/tuan/" . $module . "Module.class.php";
            if (!class_exists($module . "Module")) {
                $module = "index";
                require_once APP_ROOT_PATH . "app/Lib/tuan/" . $module . "Module.class.php";
            }
            if (!method_exists($module . "Module", $action))
                $action = "index";

            define("MODULE_NAME", $module);
            define("ACTION_NAME", $action);

            $module_name = $module . "Module";
            $this->module_obj = new $module_name;
            $this->module_obj->$action();
        } else {
            $module = strtolower($_REQUEST[CTL] ? "mobile_" . $_REQUEST[CTL] : "mobile_" . "index");
            $action = strtolower($_REQUEST[ACT] ? $_REQUEST[ACT] : "index");

            if (!file_exists(APP_ROOT_PATH . "app/Lib/tuan/" . $module . "Module.class.php"))
                $module = "mobile_index";

            require_once APP_ROOT_PATH . "app/Lib/tuan/" . $module . "Module.class.php";
            if (!class_exists($module . "Module")) {
                $module = "index";
                require_once APP_ROOT_PATH . "app/Lib/tuan/" . $module . "Module.class.php";
            }
            if (!method_exists($module . "Module", $action))
                $action = "index";

            define("MODULE_NAME", $module);
            define("ACTION_NAME", $action);

            $module_name = $module . "Module";
            $this->module_obj = new $module_name;
            $this->module_obj->$action();
        }
	}
	
	public function __destruct()
	{
		unset($this);
	}
}
?>