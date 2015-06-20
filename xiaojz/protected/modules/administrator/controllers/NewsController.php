<?php
class NewsController extends Controller {
    function filters() {
        return array(
            'accessControl',
        );
    }
    
    /*function accessRules() {
        return array(
            array(
                'allow',
                'actions'=>array('add'),
                'users'=>array('*'),
            ),
            
            array(
                'allow',
                'actions'=>array('del'),
                'users' => array('xiaojz','root','admin'),
            ),
            
            array(
                'allow',
                'actions'=>array('update'),
                //'users'=>array('?'),
                'users'=>array('xiaojz','root','admin'),
            ),
            
            array(
                'allow',
                'actions'=>array('show'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }
     */
    
    function actionShow(){
        $news_model = News::model();
        $cnt = $news_model -> countByAttributes(array('type'=>'default'));
        $per = 10;
        $page = new Pagination($cnt, $per);
        $sql = "select * from {{news}} WHERE type='default' $page->limit";
        $news_infos = $news_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(3,4,5,6,7));
        $this ->renderPartial('show',array('news_infos'=>$news_infos,'page_list'=>$page_list));
    }

    function actionShowannouncement(){
        $news_model = News::model();
        $cnt = $news_model -> countByAttributes(array('type'=>'announcement'));
        $per = 10;
        $page = new Pagination($cnt, $per);
        $sql = "select * from {{news}} WHERE type='announcement' $page->limit";
        $news_infos = $news_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(3,4,5,6,7));
        $this ->renderPartial('showannouncement',array('news_infos'=>$news_infos,'page_list'=>$page_list));
    }
    function actionShowcontribute(){
        $news_model = News::model();
        $cnt = $news_model -> countByAttributes(array('type'=>'contribute'));
        $per = 10;
        $page = new Pagination($cnt, $per);
        $sql = "select * from {{news}} WHERE type='contribute' $page->limit";
        $news_infos = $news_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(3,4,5,6,7));
        $this ->renderPartial('showcontribute',array('news_infos'=>$news_infos,'page_list'=>$page_list));
    }
    
    function actionAdd(){
        $news_model = new News();
        if(isset($_POST['News'])){
            $news_model->news_date=date('Y.m.d');
           Yii::beginProfile('addgoods'); 
            foreach($_POST['News'] as $_k => $_v){
                $news_model -> type='default';
                $news_model -> $_k = $_v;
            }
            //$news_model -> news_create_time = time();
            if($news_model -> save()) {
                Yii::app()->user->setFlash('success','添加成功');
            }
         Yii::endProfile('addnews');
        }
        $this ->renderPartial('add',array('news_model'=>$news_model),false,true);
        }
        
    function actionAddannouncement(){
        $news_model = new News();
        if(isset($_POST['News'])){
            $news_model->news_date=date('Y.m.d');
           Yii::beginProfile('addgoods'); 
            foreach($_POST['News'] as $_k => $_v){
                $news_model -> type = 'announcement';
                $news_model -> $_k = $_v;
            }
            //$news_model -> news_create_time = time();
            if($news_model -> save()) {
                Yii::app()->user->setFlash('success','添加成功');
            }
         Yii::endProfile('addnews');
        }
        $this ->renderPartial('addannouncement',array('news_model'=>$news_model),false,true);
        }
    function actionAddcontribute(){
        $news_model = new News();
        if(isset($_POST['News'])){
            $news_model->news_date=date('Y.m.d');
           Yii::beginProfile('addgoods'); 
            foreach($_POST['News'] as $_k => $_v){
                $news_model -> type = 'contribute';
                $news_model -> $_k = $_v;
            }
            //$news_model -> news_create_time = time();
            if($news_model -> save()) {
                Yii::app()->user->setFlash('success','添加成功');
            }
         Yii::endProfile('addnews');
        }
        $this ->renderPartial('addcontribute',array('news_model'=>$news_model),false,true);
        }
    
    function actionUpdate($id){
        $news_model = News::model();  
        $news_info = $news_model -> findByPk($id);
        if(isset($_POST['News'])){
            foreach($_POST['News'] as $_k => $_v){
                $news_info -> type='default';
                $news_info -> $_k = $_v;
            }
            $news_model->news_date=date('Y.m.d');
            if($news_info -> save())
                $this -> redirect('./index.php?r=administrator/news/show');
            }
        $this ->renderPartial('update', array('news_model'=>$news_info));
    }


    function actionUpdateannouncement($id){
        $news_model = News::model();  
        $news_info = $news_model -> findByPk($id);
        if(isset($_POST['News'])){
            foreach($_POST['News'] as $_k => $_v){
                $news_info->type='announcement';
                $news_info -> $_k = $_v;
            }
            $news_model->news_date=date('Y.m.d');
            if($news_info -> save())
                $this -> redirect('./index.php?r=administrator/news/showannouncement');
        }
        $this ->renderPartial('updateannouncement', array('news_model'=>$news_info));
    }
    function actionUpdatecontribute($id){
        $news_model = News::model();  
        $news_info = $news_model -> findByPk($id);
        if(isset($_POST['News'])){
            foreach($_POST['News'] as $_k => $_v){
                $news_info->type='contribute';
                $news_info -> $_k = $_v;
            }
            $news_model->news_date=date('Y.m.d');
            if($news_info -> save())
                $this -> redirect('./index.php?r=administrator/news/showcontribute');
        }
        $this ->renderPartial('updatecontribute', array('news_model'=>$news_info));
    }

    public function actionUpdateother($type)
    {
        $news_model = News::model();
        $news_info = $news_model -> findByAttributes(array('type'=>$type));
        if(isset($_POST['News'])){
            foreach($_POST['News'] as $_k => $_v){
                $news_info->type=$type;
                $news_info->$_k = $_v;
            }
            $news_model->news_date=date('Y.m.d');
            if($news_info->save())
                $this -> redirect('./index.php?r=administrator/index/right');
        }
        $this->renderPartial('updateother', array('news_model'=>$news_info));
    }

    function actionDel($id){
        $id = $_GET['id'];
        $news_model = News::model();
        $news_info = $news_model -> findByPk($id);
        if($news_info->delete())
            $this -> redirect('./index.php?r=administrator/news/show');
     }

    function actionDelannouncement($id){
        $id = $_GET['id'];
        $news_model = News::model();
        $news_info = $news_model -> findByPk($id);
        if($news_info->delete())
            $this -> redirect('./index.php?r=administrator/news/showannouncement');
     }
    function actionDelcontribute($id){
        $id = $_GET['id'];
        $news_model = News::model();
        $news_info = $news_model -> findByPk($id);
        if($news_info->delete())
            $this -> redirect('./index.php?r=administrator/news/showcontribute');
     }
}
