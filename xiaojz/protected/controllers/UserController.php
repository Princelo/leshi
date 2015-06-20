<?php
/**
 * 用户控制器
 * 13-5-7 下午8:30 
 */
class UserController extends Controller{
    /*
     * 验证码生成
     * 以下代码的意思：在当前控制器里边，以方法的形式访问其他类
     * 我们访问./index.php?r=user/captcha就会访问到以方法的CCaptchaAction
     *          会走CCaptchaAction类里边的run()方法
     * 
     * 谁会过来使用 user/captcha 这个路由
     * 答：是视图表单间接过来调用($this->widget('CCaptcha'))
     */
    function actions(){
        return array(
            'captcha'=>array(
                            'class'=>'CCaptchaAction',
                            'backColor'=>0xFFFFFF, 
                            'maxLength'=>'4',       // 最多生成几个字符
                            'minLength'=>'4',       // 最少生成几个字符
                            'height'=>'30',
                            'width'=>'70'
                    ), 
            
            //我们在外边随便定义一个类，都可以通过这种方式访问
            // user/co 就会访问Computer.php里边的run()方法
            'co'=>array(
                'class'=>'application.controllers.Computer',
            ),
        );
    }
    
    /**
     *用户登录 
     */
    function actionLogin(){
        //创建登录模型对象
        $user_login = new LoginForm;
        
        if(isset($_POST['LoginForm'])){
            //收集表单信息
            $user_login->attributes = $_POST['LoginForm'];
            
            //校验数据,走的是rules()方法
            //该地方不只校验用户名和密码是否填写，还要校验真实性(在模型里边自定义方法校验真实性)
            //用户信息进行session存储，调用模型里边的一个方法login()，就可以进行session存储
            
            if($user_login->validate() && $user_login->login()){
                //print_r($_POST['LoginForm']);exit;
                setcookie('user_name', $_POST['LoginForm']['user_name'], time()+3600);
                $this ->redirect ('./index.php');
            }
        }
        
        $this -> render('login',array('user_login'=>$user_login));
    }
   
    /*
     * 实现用户注册功能：
     * 1. 展现注册表单
     * 2. 收集数据、校验数据、存储数据
     */
    function actionRegister(){
        //实例化数据模型对象user
        $user_model = new User();
        /**
         * renderPartial不渲染布局
         * render会渲染布局 
         */
        //$this ->renderPartial('register');
        
        //性别信息
        $sex[1] = "男";
        $sex[2] = "女";
        $sex[3] = "保密";
        
        //定义学历
        $xueli[1] = "-请选择-";
        $xueli[2] = "小学";
        $xueli[3] = "初中";
        $xueli[4] = "高中";
        $xueli[5] = "大学";
        
        //定义爱好信息
        $hobby[1] = "篮球";
        $hobby[2] = "足球";
        $hobby[3] = "排球";
        $hobby[4] = "棒球";
        
        //如果用户有注册表单
        if(isset($_POST['User'])){
            //给模型收集表单信息
            //foreach($_POST['User'] as $_k => $_v){
            //    $user_model -> $_k = $_v;
            //}
            
            //收集转化爱好的信息implode
            //if(is_array($_POST['User']['user_hobby']))
            //    $_POST['User']['user_hobby'] = implode(',',$_POST['User']['user_hobby']);
            
            //密码要md5加密
            $_POST['User']['user_pwd'] = md5($_POST['User']['user_pwd']);
            $_POST['User']['user_pwd2'] = md5($_POST['User']['user_pwd2']);
            
            //上边的foreach，在yii框架里边有优化，使用模型属性attributes来进行优化
            //attributes 属性已经把foreach集成好了，我们可以直接使用
            $user_model -> create_time = $this->get_gmtime();
            $user_model -> update_time = $user_model -> create_time;
            $user_model -> login_ip = $_SERVER['REMOTE_ADDR'];
            $user_model -> group_id = '1';
            $user_model -> is_effect = '1';
            $user_model -> is_delete = '0';
            $user_model -> score = '100';
            $user_model -> money = '0.0000';
            $user_model -> pid = '1';
            $user_model -> login_time = $user_model -> create_time;
            $user_model -> referral_count ='0';
            $user_model -> integrate_id = '0';
            $user_model -> password_verify = $user_model -> create_time;
            $user_model -> verify_create_time = '0';
            $user_model -> login_pay_time = 0;
            $user_model -> focus_count=0;
            $user_model -> focused_count=0;
            $user_model -> province_id=6;
            $user_model -> city_id=76;
            $user_model -> sex = -1;
            $user_model -> is_merchant=0;
            $user_model -> is_daren = 0;
            $user_model -> step=1;
            $user_model -> byear = 1949;
            $user_model -> bmonth = 1;
            $user_model -> bday = 1;
            $user_model -> locate_time = $user_model -> create_time;
            $user_model -> xpoint = '0.000000';
            $user_model -> ypoint = '0.000000';
            $user_model -> level_id = 1;
            $user_model -> point = 100;
            $user_model -> is_syn_sina = 0;
            $user_model -> is_syn_tencent = 0;
            $user_model -> verify = 0;
            $user_model -> code =0;
            $user_model-> sina_id=0;
            $user_model-> renren_id=0;
            $user_model->kaixin_id=0;
            $user_model->sohu_id=0;
            $user_model->lottery_mobile=0;
            $user_model->lottery_verify=0;
            $user_model->tencent_id=0;
            $user_model->referer=0;
            $user_model->my_intro=0;
            $user_model->merchant_name=0;
            $user_model->daren_title=0;
            $user_model->topic_count=0;
            $user_model->fav_count=0;
            $user_model->faved_count=0;
            $user_model->dp_count=0;
            $user_model->insite_count=0;
            $user_model->outsite_count=0;
            $user_model->sina_app_key=0;
            $user_model->sina_app_secret=0;
            $user_model->tencent_app_key=0;
            $user_model->tencent_app_secret=0;
            $user_model->sina_token=0;
            $user_model->t_access_token=0;
            $user_model->t_openkey=0;
            $user_model->t_openid=0;
            $user_model->qq_id=0;
  
            
            
            $user_model -> attributes = $_POST['User'];
            //$_mysqli=new mysqli('localhost','root','sise','liyajie');
            include('db_connect.php');

    
            $user_pwd = $_POST['User']['user_pwd'];
            $create_time = $user_model -> create_time;
            $ip = $_SERVER['REMOTE_ADDR'];
            $_sql = "INSERT INTO `liyajie`.`fanwe_user` (`id`, `user_name`, `user_pwd`, `create_time`, `update_time`, `login_ip`, `group_id`, `is_effect`, `is_delete`, `email`, `mobile`, `score`, `money`, `verify`, `code`, `pid`, `login_time`, `referral_count`, `password_verify`, `integrate_id`, `sina_id`, `renren_id`, `kaixin_id`, `sohu_id`, `lottery_mobile`, `lottery_verify`, `verify_create_time`, `tencent_id`, `referer`, `login_pay_time`, `focus_count`, `focused_count`, `province_id`, `city_id`, `sex`, `my_intro`, `is_merchant`, `merchant_name`, `is_daren`, `daren_title`, `step`, `byear`, `bmonth`, `bday`, `locate_time`, `xpoint`, `ypoint`, `topic_count`, `fav_count`, `faved_count`, `dp_count`, `insite_count`, `outsite_count`, `level_id`, `point`, `sina_app_key`, `sina_app_secret`, `is_syn_sina`, `tencent_app_key`, `tencent_app_secret`, `is_syn_tencent`, `sina_token`, `t_access_token`, `t_openkey`, `t_openid`, `qq_id`) VALUES (NULL, '{$_POST['User']['user_name']}', '{$user_pwd}', '{$create_time}', '{$create_time}', '{$ip}', '1', '1', '0', '{$_POST['User']['email']}', '{$_POST['User']['mobile']}', '100', '0.0000', '0', '0', '0', '{$create_time}', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6', '76', '-1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0.000000', '0.000000', '0', '0', '0', '0', '0', '0', '1', '100', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');";
            $_result1 = $liyajie_mysqli->query($_sql);
            //实现信息存储
            if($user_model -> save())
                $this ->render('register', array('user_name'=>$user_model->user_name));
        }
        
        $this -> render('register',array('user_model'=>$user_model));
    }
    function get_gmtime()
    {
    static $now;
    if($now) return $now;
    $now = (time()) - date('Z');
    return $now;
    }
    function actionCc(){
        echo "cc";
    }
    
    /*
     * 用户退出系统
     */
    function actionLogout(){
        //删除session信息
        Yii::app()->session->clear();  //删除内存里边sessiion变量信息
        Yii::app()->session->destroy(); //删除服务器的session文件
        
        //session和cookie一并删除
        //Yii::app()->user->logout();
        setcookie('user_name', null, time()-3600);
        
        $this->redirect(SITE_URL);
    }
    
    /*
     * session使用
     */
    function actionS1(){
        echo $this->id."<br />";
        echo $this->action->id."<br />";
        //设置session,通过session组件来设置
        Yii::app()->session['user_name'] = "zhangsan";
        Yii::app()->session['useraddr'] = "beijing";
        echo "make session success";
    }
    
    function actionS2(){
        //使用session
        echo Yii::app()->session['user_name'],"<br />";
        echo Yii::app()->session['useraddr'];
        echo "use session success";
    }
    
    function actionS3(){
        //删除一个session
        //unset(Yii::app()->session['useraddr']);
        
        //删除全部session
        Yii::app()->session->clear();  //删除session变量
        Yii::app()->session->destroy(); //删除服务器的session信息
    }
    
    /*
     * cookie在Yii框架使用 
     */
    function actionC1(){
        //设置cookie
        $ck = new CHttpCookie('hobby','篮球，足球');
        $ck -> expire = time()+3600;
        //把$ck对象放入cookie组件里边
        Yii::app()->request->cookies['hobby'] = $ck;
        
        $ck2 = new CHttpCookie('sex','nan');
        $ck2 -> expire = time()+3600;
        //把$ck对象放入cookie组件里边
        Yii::app()->request->cookies['sex'] = $ck2;
        
        echo "cookie make success";
    }
    function actionC2(){
        //访问cookie
        echo Yii::app()->request->cookies['hobby'],"<br />";
        echo Yii::app()->request->cookies['sex'];
    }
    function actionC3(){
        //删除cookie
        unset(Yii::app()->request->cookies['sex']);
    }
    
    function actionLu(){
        //输出路径别名信息/yii就是框架直接可以操作使用的类
        //Yii::app()　是一个实例，是在当前框架里边唯一可以直接使用的实例对象
        //echo Yii::getPathOfAlias('system');  //D:\www\0507\framework
        //echo Yii::getPathOfAlias('system.web');  //D:\www\0507\framework\web
        //echo Yii::getPathOfAlias('application');  //D:\www\0507\shop\protected
        //echo Yii::getPathOfAlias('zii');  //D:\www\0507\framework\zii
        echo Yii::getPathOfAlias('webroot');  //D:/www/0507/shop
        
    }
    
    
    /*
     * 使用Yii::app()调用相关属性、方法
     */
    function actionAp(){
        echo Yii::app()->defaultController,"<br />";
        echo Yii::app()->layout,"<br />";
        echo Yii::app()->name,"<br />";
        echo Yii::app()->charset,"<br />";
        echo Yii::app()->getLayoutPath(),"<br />";
        echo Yii::app()->request->getUrl(),"<br />";
        echo Yii::app()->request->getHostInfo(),"<br />";
    }
    
    /*
     * 计算脚本执行时间
     */
    function actionTime(){
        //查看脚本开始时间
        Yii::beginProfile('mytime');
        for($i=0; $i<=100; $i++){
            if($i%7==0)
                echo "seven<br />";
            else if($i%8==0)
                echo "eight<br />";
            else
                echo $i."<br />";
        }
        Yii::endProfile('mytime');
    }
    
    function actionAbc(){
        $goods_model = Goods::model();
        $info = $goods_model->find();
        
        
        echo $info['goods_name'];
        echo $info->goods_price;
    }

    function actionQuicklogin(){
        //print_r($_POST);exit;
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //$_mysqli1=new mysqli('localhost', 'root', 'sise', 'liyajie');
        //$_mysqli2=new mysqli('localhost','root','sise','xiaojz');
        include('db_connect.php');
        $_sql = "SELECT user_pwd FROM fanwe_user WHERE user_name = '{$username}';";
        $_result1 = $liyajie_mysqli->query($_sql)->fetch_array();
        $_sql = "SELECT user_pwd FROM xiaojz_user WHERE user_name = '{$username}';";
        $_result2 = $xiaojz_mysqli->query($_sql)->fetch_array();
        if($_result1['user_pwd'] == $password)
            setcookie('user_name', $username,time()+3600);
        elseif($_result2['user_pwd'] == $password)
            setcookie('user_name', $username,time()+3600);
        header("Location: ". SITE_URL);
    }
}
