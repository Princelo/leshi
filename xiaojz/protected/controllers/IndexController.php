<?php

class IndexController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    //public $layout = "//layouts/xiaojzlayout2";
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
	public function actionIndex()
	{
        $photo_model = Photo::model();
        
        //1. 获得全部记录数目
        //$total = $photo_model->countByAttributes(array('battle'=>'0'));
        //$per = 6;
        
        //2. 实例化分页类对象
        //$page = new Pagination($total, $per);
        
        //3. 重新拼装具体的sql语句，有limit关键字
        //$sql = "select * from {{photo}} WHERE battle='0' order by photo_id desc {$page -> limit}";
        $sql = "select * from {{photo}} WHERE battle='0' order by photo_id desc LIMIT 6;";
        
        //4. 执行sql语句获得每页数据
        $photo_infos = $photo_model -> findAllBySql($sql);
        
        //5. 获得页码列表
        //$page_list = $page -> fpage();
        
        $news_model = News::model();
        $sql = "SELECT * FROM {{news}} WHERE type='default' ORDER BY news_id DESC LIMIT 8";
        $news_infos = $news_model -> findAllBySql($sql);
        $sql = "SELECT * FROM {{news}} WHERE type='announcement' ORDER BY news_id DESC LIMIT 8";
        $announcement_infos = $news_model -> findAllBySql($sql);
        $video_model = Video::model();
        $sql = "SELECT video_youku_id FROM {{video}} WHERE video_category='2' ORDER BY video_id DESC LIMIT 1";
        $video_youku_id = $video_model->findAllBySql($sql);
        $video_youku_id = $video_youku_id[0]->video_youku_id;
        
        //$this -> render('index',array('photo_infos'=>$photo_infos,'page_list'=>$page_list, 'news_infos'=>$news_infos, 'announcement_infos'=>$announcement_infos, 'video_youku_id'=>$video_youku_id));
        $this -> render('index',array('photo_infos'=>$photo_infos, 'news_infos'=>$news_infos, 'announcement_infos'=>$announcement_infos, 'video_youku_id'=>$video_youku_id));
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
        //$this->renderPartial('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

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
}
