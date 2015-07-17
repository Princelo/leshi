<?php
//關你閪事
class cache_goods_tag_auto_cache extends auto_cache{
	public function load($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$tag_list = $GLOBALS['fcache']->get($key);
		if($tag_list === false)
		{		
			$tag_list_rs = $GLOBALS['db']->getAll("select * from ".DB_PREFIX."goods_type where 1 = 1");
			foreach($tag_list_rs as $k=>$v)
			{
				$tag_list[$v['id']] = $v;
			}
			$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
			$GLOBALS['fcache']->set($key,$tag_list);
		}
		return $tag_list;
	}
	public function rm($param)
	{
		$key = $this->build_key(__CLASS__,$param);
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$GLOBALS['fcache']->rm($key);
	}
	public function clear_all()
	{
		$GLOBALS['fcache']->set_dir(APP_ROOT_PATH."public/runtime/data/".__CLASS__."/");
		$GLOBALS['fcache']->clear();
	}
}
?>
