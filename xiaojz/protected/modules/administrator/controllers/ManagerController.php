<?php
/**
 * 后台管理员登录控制器
 * 13-5-8 下午9:03 
 */
class ManagerController extends Controller{
    /*
     * 实现用户登录
     */
    function actionLogin(){
        $login_model = new LoginForm();
        
        if(isset($_POST['LoginForm'])){
            $login_model->attributes = $_POST['LoginForm'];
            
            //用户名和密码(包括真实性)判断validate，持久化session信息login
            if($login_model->validate() &&  $login_model->login())
                $this->redirect('./index.php?r=administrator/index/index');
        }
        
        //调用模板
        $this ->renderPartial('login',array('login_model'=>$login_model));
    }
    
    /*
     * 管理员退出系统
     */
    function actionLogout(){
        //删除session变量
        Yii::app()->session->clear();
        
        //删除服务器session信息
        Yii::app()->session->destroy();
        
        //页面重定向到登录页面
        $this -> redirect('./index.php?r=administrator/manager/login');
    }
    
}
