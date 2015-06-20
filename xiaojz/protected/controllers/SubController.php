<?php
require('princeloclass/resizeimage.php');
header("Content-type:text/html;charset=utf-8");
class SubController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    public $layout = "//layouts/xiaojzlayout2";
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndexsub()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('indexsub');
        //$this->renderPartial('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	/*public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
    }*/

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionPhoto()
    {
        //改用ajax實現
        /*$photo_model = Photo::model();
        $total = $photo_model->count();
        $per = 8;
        $page = new PaginationAjax($total, $per);
        $sql = "select * from {{photo}} order by photo_id desc {$page -> limit}";
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> render('photo',array('photo_infos'=>$photo_infos,'page_list'=>$page_list));*/
        $this->render('photo');
    }
    public function actionPhotobattle()
    {
        $this->render('photobattle');
    }

    public function actionVideo()
    {
        $this -> render('video');
    }
    public function actionVideonews()
    {
        $this -> render('videonews');
    }
    public function actionVideotitbits()
    {
        $this -> render('videotitbits');
    }

    public function actionNews()
    {
        $this->render('news');
    }

    public function actionAnnouncement()
    {
        $this->render('announcement');
    }
    public function actionContribute()
    {
        $this->render('contribute');
    }

    public function actionVideodetail($vid)
    {
        $video_model = Video::model();
        $sql = "SELECT * FROM {{video}} WHERE video_id='{$vid}'";
        $video_infos = $video_model->findAllBySql($sql);
        $this -> render('videodetail', array('video_infos'=>$video_infos));
    }

    public function actionNewsdetail($cid)
    {
        $news_model = News::model();
        $sql = "SELECT * FROM {{news}} WHERE news_id='{$cid}'";
        $news_infos = $news_model -> findAllBySql($sql);
        $this -> render('newsdetail', array('news_infos'=>$news_infos));
    }

    public function actionVote()
    {
        $this -> render('vote');
    }

    public function actionNewsother($type)
    {
        $news_model = News::model();
        $sql = "SELECT * FROM {{new}} WHERE type='{$type}';";
        $news_infos = $news_model-> findByAttributes(array('type'=>$type));
        $this->render('newsother', array('news_infos'=>$news_infos));
    }

    public function actionSignup(){
        $players_model = new Players();
        if(isset($_POST['Players'])){
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($players_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            //echo $uploaddir;exit;
            if(!(strpos($uploadedimage->type, 'image')===0)){
                echo "<script>alert('上传文件类型不合法！');window.location.href='index.php?r=sub/signup';</script>";exit;
            }
            if($uploadedimage->size>900000){
                echo "<script>alert('上传文件过大！'); window.location.href='index.php?r=sub/signup';</script>";exit;
            }
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile' && (strpos($uploadedimage->type, 'image')===0)){
                //echo "yes";
                $filename = md5(uniqid());
                $ext = $uploadedimage->extensionName;
                $uploadfile = $uploaddir . $filename . '.' . $ext;
                $uploadedimage->saveAs($uploadfile);
                //$resizeimage = new resizeimage('protected/uploads/'.$filename.'.'.$ext, '220', '150', '0', 'protected/uploads/small/'.$filename.'.'.$ext);
                $players_model->players_big_img='protected/uploads/'. $filename . '.' . $ext;
                //$players_model->players_small_img='protected/uploads/small/'.$filename .'.'.$ext; 
            }
            //$players_model->save();
            /*echo "<pre>";
            print_r($_POST);
            print_r($players_model);
            echo "</pre>";*/
           Yii::beginProfile('addgoods'); 
            //上边代码优化，利用foreach遍历来优化
            foreach($_POST['Players'] as $_k => $_v){
                $players_model -> $_k = $_v;
            }
            $players_model -> players_create_time = date('Y.m.d H:i:s');
            //echo $_COOKIE['user_name'];exit;
            if(isset($_COOKIE['user_name']))$players_model->players_user_name=$_COOKIE['user_name'];
            if($players_model -> save()) {
                //Yii::app()->user->setFlash('success','添加成功');
                //header('Location: singupsucess.php');
                header('Location: players_image_edit.php');exit;
            }
         Yii::endProfile('addplayers');
        }
        
        $this ->render('signup',array('players_model'=>$players_model),false,true);
    }

    function actionFormedit(){
        $players_model = Players::model();  //除了添加(new Goods)数据我们都使用Goods::model()来实例化模型对象
        $players_info = $players_model -> findByAttributes(array('players_user_name'=>$_COOKIE['user_name']));
        if(isset($_POST['Players'])){
            foreach($_POST['Players'] as $_k => $_v){
                $players_info -> $_k = $_v;
            }
            $players_info->players_user_name=$_COOKIE['user_name'];
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($players_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            //print_r($uploadedimage);echo "<br />";print_r(is_object($uploadedimage));echo "<br />";print_r(strpos($uploadedimage->type, 'image'));exit;
            if(!(strpos($uploadedimage->type, 'image')===0)){
                echo "<script>alert('上传文件类型不合法！');window.location.href='index.php?r=sub/signup';</script>";exit;
            }
            if($uploadedimage->size>900000){
                echo "<script>alert('上传文件过大！'); window.location.href='index.php?r=sub/signup';</script>";exit;
            }
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile' && (strpos($uploadedimage->type, 'image')===0)){
                //echo "yes";
                $filename = md5(uniqid());
                $ext = $uploadedimage->extensionName;
                $uploadfile = $uploaddir . $filename . '.' . $ext;
                $uploadedimage->saveAs($uploadfile);
                //del the old pic
                @unlink($players_info->players_big_img);
                @unlink($players_info->players_small_img);
                /* if($dh = opendir($dir)){
                          while(($file = readdir($dh))!== false){
                                       if(file_exists($dir.$players_info->players_big_img)) @unlink($dir.$players_info->players_big_img);
                                            }
                                   closedir($dh);
                } */
                //$resizeimage = new resizeimage('protected/uploads/'.$filename.'.'.$ext, '225', '300', '0', 'protected/uploads/small/'.$filename.'.'.$ext);
                $players_info->players_big_img='protected/uploads/'. $filename . '.' . $ext;
                //$players_info->players_small_img='protected/uploads/small/'. $filename . '.' . $ext;
            }
            if($players_info -> save()){
                //$this -> redirect('./signupsuccess.php');
                header('Location: players_image_edit.php');exit;
            }
        }
        $this ->render('formedit', array('players_model'=>$players_info));
    }

}
