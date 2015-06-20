<?php
require('princeloclass/resizeimage.php');
class PhotoController extends Controller {
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
    
    function actionShowbak(){
        $photo_model = Photo::model();
        print_r($photo_model);//exit;
        $photo_infos = $photo_model -> findAll();
        $this ->renderPartial('show',array('photo_infos'=>$photo_infos));
    }
    
    function actionShow(){
        $photo_model = Photo::model();
        $cnt = $photo_model -> count();
        $per = 6;
        $page = new Pagination($cnt, $per);
        $sql = "select * from {{photo}} $page->limit";
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(3,4,5,6,7));
        $this ->renderPartial('show',array('photo_infos'=>$photo_infos,'page_list'=>$page_list));
    }
    
    function actionAdd(){
        $photo_model = new Photo();
        $photo_model->photo_category=0;
        $photo_model->battle=0;
        if(isset($_POST['Photo'])){
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($photo_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile'){
                echo "yes";
                $filename = md5(uniqid());
                $ext = $uploadedimage->extensionName;
                $uploadfile = $uploaddir . $filename . '.' . $ext;
                $uploadedimage->saveAs($uploadfile);
                //$resizeimage = new resizeimage('protected/uploads/'.$filename.'.'.$ext, '226', '152', '0', 'protected/uploads/small/'.$filename.'.'.$ext);
                $photo_model->photo_big_img='protected/uploads/'. $filename . '.' . $ext;
                //$photo_model->photo_small_img='protected/uploads/small/'.$filename .'.'.$ext; 
                $photo_model->photo_date=date('Y.m.d');
            }
           Yii::beginProfile('addgoods'); 
            foreach($_POST['Photo'] as $_k => $_v){
                $photo_model -> $_k = $_v;
            }
            $photo_model -> photo_create_time = time();
            if($photo_model -> save()) {
                //Yii::app()->user->setFlash('success','添加成功');
                $this->redirect('photo_edit.php?photo_id='.$photo_model->photo_id);
            }
         Yii::endProfile('addphoto');
        }
        
        $this ->renderPartial('add',array('photo_model'=>$photo_model),false,true);
    }
    
    function actionUpdate($id){
        $photo_model = Photo::model();  
        $photo_info = $photo_model -> findByPk($id);
        if(isset($_POST['Photo'])){
            foreach($_POST['Photo'] as $_k => $_v){
                $photo_info -> $_k = $_v;
            }
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($photo_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            //echo $uploaddir;exit;
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile'){
                //echo "yes";
                $filename = md5(uniqid());
                $ext = $uploadedimage->extensionName;
                $uploadfile = $uploaddir . $filename . '.' . $ext;
                $uploadedimage->saveAs($uploadfile);
                //del the old pic
                @unlink($photo_info->photo_big_img);
                @unlink($photo_info->photo_small_img);
                //$resizeimage = new resizeimage('protected/uploads/'.$filename.'.'.$ext, '226', '152', '0', 'protected/uploads/small/'.$filename.'.'.$ext);
                $photo_info->photo_big_img='protected/uploads/'. $filename . '.' . $ext;
                //$photo_info->photo_small_img='protected/uploads/small/'. $filename . '.' . $ext;
                $photo_model->photo_date=date('Y.m.d');
            }
            if($photo_info -> save())
                //$this -> redirect('./index.php?r=administrator/photo/show');
                $this->redirect('photo_edit.php?photo_id='.$photo_info->photo_id);
        }
        $this ->renderPartial('update', array('photo_model'=>$photo_info));
    }
    function actionDel($id){
        $id = $_GET['id'];
        $photo_model = Photo::model();
        $photo_info = $photo_model -> findByPk($id);
        @unlink($photo_info->photo_big_img);
        @unlink($photo_info->photo_small_img);
        if($photo_info->delete())
            $this -> redirect('./index.php?r=administrator/photo/show');
     }
}
