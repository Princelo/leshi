<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------


require APP_ROOT_PATH.'app/Lib/page.php';
class couponModule extends TuanBaseModule
{	
	public function supplier_login()
	{
		app_redirect(url("biz","index"));
	}
}

?>