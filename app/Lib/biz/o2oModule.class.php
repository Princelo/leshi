<?php
// +----------------------------------------------------------------------
// | U&V 远维花都商业联盟系统
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.unvweb.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Mr.袁(55171868@qq.com)
// +----------------------------------------------------------------------

require_once APP_ROOT_PATH."app/Lib/shop_lib.php";
class o2oModule extends BizBaseModule
{
    public function __construct()
    {
        parent::__construct();
        $this->check_auth();
    }
    public function index()
    {
        exit;
        if( isset($_POST) && !empty($_POST) ) {
            $account_info = es_session::get('account_info');
            $biz_id = intval($account_info['supplier_id']);
            $title = addslashes(htmlspecialchars(trim($_REQUEST['title'])));
            $consumer_name = addslashes(htmlspecialchars(trim($_REQUEST['consumer_name'])));
            if(!is_numeric($_REQUEST['volume']))
                showErr('消费金额无效');
            $volume = addslashes(htmlspecialchars(trim($_REQUEST['volume'])));
            $remark = addslashes(htmlspecialchars(trim($_REQUEST['remark'])));
            $consumer_id = $GLOBALS['db']->getOne("select id from ".DB_PREFIX."user where user_name = '{$consumer_name}'");
            $ratio = $GLOBALS['db']->getOne("select consumption_ratio from ".DB_PREFIX."supplier_location where id = {$biz_id};");
            if ($consumer_id == "") {
                showErr('找不到会员名为'.$consumer_name.'的会员');
            } else {
                /*$sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
                    WHERE TABLE_SCHEMA = 'leshi'
                    AND ENGINE = 'MyISAM'";

                $rs = mysql_query($sql);

                while($row = mysql_fetch_array($rs))
                {
                    $tbl = $row[0];
                    $sql = "ALTER TABLE `$tbl` ENGINE=INNODB";
                    mysql_query($sql);
                }*/
                $consumer_id = intval($consumer_id);
                $ratio = intval($ratio);
                $GLOBALS['pdo']->beginTransaction();
                $GLOBALS['pdo']->exec("
                insert into ".DB_PREFIX."biz_consume_log (biz_id, title, remark, consumer_name, consumer_id, volume, ratio)
                values (
                    {$biz_id}, '{$title}', '{$remark}', '{$consumer_name}', {$consumer_id}, '{$volume}', {$ratio}
                );");
                $GLOBALS['pdo']->exec("update ".DB_PREFIX."supplier_location set return_profit = return_profit + ({$volume} * {$ratio} * 0.2 / 100)
                    where id = (
                        select case when p_biz_id is null then 1 else p_biz_id end from ".DB_PREFIX."user where id = {$consumer_id}
                    );");
                $GLOBALS['pdo']->exec("update ".DB_PREFIX."user set score = score + ({$volume} * {$ratio} * 0.2 / 100) where id = {$consumer_id}; ");
                $GLOBALS['pdo']->commit();
                showSuccess('消费纪录更新成功');
            }
        } else {
            $GLOBALS['tmpl']->display("biz/biz_consumption.html");
        }
    }








}
?>