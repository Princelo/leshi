<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------


class indexModule extends BizBaseModule
{
	public function __construct()
	{
		parent::__construct();
		$this->check_auth();
	}
	public function index()
	{				
		$GLOBALS['tmpl']->display("biz/biz_index.html");
	}
}
?>