<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +-----------------------------------------
class SupplierLocationDpReplyAction extends CommonAction
{	
	public function index() {
		//列表过滤器，生成查询Map对象
		$map = $this->_search ();
		if (method_exists ( $this, '_filter' )) {
			$this->_filter ( $map );
		}
		$name=$this->getActionName();
		$model = D ("SupplierLocationDpReply");
		if (! empty ( $model )) {
			$this->_list ( $model, $map );
		}
		
		$this->display ();
		return;
	}
	
	public function foreverdelete() {
		//删除指定记录
		$ajax = intval($_REQUEST['ajax']);
		$id = $_REQUEST['id'];
		if(!empty($id))
		{
			$name=$this->getActionName();
			$model = D($name);
			$pk = $model->getPk ();
			$condition = array ($pk => array ('in', explode ( ',', $id ) ) );
			$res = $model->where($condition)->findAll();
			if(false !== $model->where ( $condition )->delete ())
			{
				foreach($res as $k=>$v)
				{
					$count = $model->where("dp_id=".$v['dp_id'])->count();
					M("SupplierLocationDp")->where("id=".$v['dp_id'])->setField("reply_count",$count);
				}
				
				save_log($res.l("FOREVER_DELETE_SUCCESS"),1);
				$this->success (l("FOREVER_DELETE_SUCCESS"),$ajax);
			}
			else
			{
				save_log($res.l("FOREVER_DELETE_FAILED"),0);
				$this->error (l("FOREVER_DELETE_FAILED"),$ajax);
			}
		}
		else
		{
			$this->error (l("INVALID_OPERATION"),$ajax);
		}
	}

}
function getUNAME($id)
{
	return 	M("User")->where("id=".$id)->getField("user_name");
}
?>