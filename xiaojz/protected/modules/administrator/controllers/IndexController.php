<?php
/**
 * 后台整体架构控制器
 * 13-5-8 下午9:33 
 */
class IndexController extends Controller{
    /*
     * 该控制器里边的方法可以被登录系统用户访问
     * 没有登陆系统用户禁止访问
     */
    function filters() {
        return array(
            'accessControl',
        );
    }
    
    function accessRules() {
        return array(
            array(
                'allow',
                'actions'=>array('head','left','right','index'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }
    
    /*
     * 生成头部
     */
    function actionHead(){
        $this->renderPartial('head');
    }
    
    /*
     * 生成左侧菜单
     */
    function actionLeft(){
        $this ->renderPartial('left');
    }
    
    /*
     * 生成右侧主体内容区域
     */
    function actionRight(){
        $this ->renderPartial('right');
    }
    
    /*
     * 将头部、左侧、右侧集成到一起
     */
    function actionIndex(){
        $this ->renderPartial('index');
    }
}
