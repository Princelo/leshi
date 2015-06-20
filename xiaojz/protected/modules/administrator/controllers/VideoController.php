<?php
class VideoController extends Controller {
    function filters() {
        return array(
            'accessControl',
        );
    }
    
    function accessRules() {
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
    
    
    function actionShow(){
        $video_model = Video::model();
        $cnt = $video_model -> count();
        $per = 6;
        $page = new Pagination($cnt, $per);
        $sql = "select * from {{video}} $page->limit";
        $video_infos = $video_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(3,4,5,6,7));
        $this ->renderPartial('show',array('video_infos'=>$video_infos,'page_list'=>$page_list));
    }
    
    function actionAdd(){
        $video_model = new Video();
        $video_model->video_category=0;
        if(isset($_POST['Video'])){
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($video_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile'){
                echo "yes";
                $filename = md5(uniqid());
                $ext = $uploadedimage->extensionName;
                $uploadfile = $uploaddir . $filename . '.' . $ext;
                $uploadedimage->saveAs($uploadfile);
                //$resizeimage = new resizeimage('protected/uploads/'.$filename.'.'.$ext, '226', '152', '0', 'protected/uploads/small/'.$filename.'.'.$ext);
                $video_model->video_pic='protected/uploads/'. $filename . '.' . $ext;
                //$video_model->video_small_img='protected/uploads/small/'.$filename .'.'.$ext; 
                $video_model->video_date=date('Y.m.d');
            }
           Yii::beginProfile('addvideo'); 
            foreach($_POST['Video'] as $_k => $_v){
                $video_model -> $_k = $_v;
            }
            //$video_model -> video_date = date('Y.m.d');
            if($video_model -> save()) {
                Yii::app()->user->setFlash('success','添加成功');
            }
         Yii::endProfile('addvideo');
        }
        
        $this ->renderPartial('add',array('video_model'=>$video_model),false,true);
    }
    
    function actionUpdate($id){
        $video_model = Video::model();  
        $video_info = $video_model -> findByPk($id);
        if(isset($_POST['Video'])){
            foreach($_POST['Video'] as $_k => $_v){
                $video_info -> $_k = $_v;
            }
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($video_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            //echo $uploaddir;exit;
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile'){
                //echo "yes";
                $filename = md5(uniqid());
                $ext = $uploadedimage->extensionName;
                $uploadfile = $uploaddir . $filename . '.' . $ext;
                $uploadedimage->saveAs($uploadfile);
                //del the old pic
                @unlink($video_info->video_pic);
                //@unlink($video_info->video_small_img);
                //$resizeimage = new resizeimage('protected/uploads/'.$filename.'.'.$ext, '226', '152', '0', 'protected/uploads/small/'.$filename.'.'.$ext);
                $video_info->video_pic='protected/uploads/'. $filename . '.' . $ext;
                //$video_info->video_small_img='protected/uploads/small/'. $filename . '.' . $ext;
                $video_model->video_date=date('Y.m.d');
            }
            if($video_info -> save())
                $this -> redirect('./index.php?r=administrator/video/show');
        }
        $this ->renderPartial('update', array('video_model'=>$video_info));
    }
    function actionDel($id){
        $id = $_GET['id'];
        $video_model = Video::model();
        $video_info = $video_model -> findByPk($id);
        @unlink($video_info->video_pic);
        //@unlink($video_info->video_small_img);
        if($video_info->delete())
            $this -> redirect('./index.php?r=administrator/video/show');
     }
}
