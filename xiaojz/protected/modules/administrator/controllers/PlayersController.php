<?php
require('princeloclass/resizeimage.php');
class PlayersController extends Controller {
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
        $players_model = Players::model();
        print_r($players_model);//exit;
        $players_infos = $players_model -> findAll();
        $this ->renderPartial('show',array('players_infos'=>$players_infos));
    }
    
    function actionShow(){
        $players_model = Players::model();
        $cnt = $players_model -> count();
        $per = 6;
        $page = new Pagination($cnt, $per);
        $sql = "select * from {{players}} $page->limit";
        $players_infos = $players_model -> findAllBySql($sql);
        $page_list = $page->fpage(array(3,4,5,6,7));
        $this ->renderPartial('show',array('players_infos'=>$players_infos,'page_list'=>$page_list));
    }
    
    function actionAdd(){
        $players_model = new Players();
        if(isset($_POST['Players'])){
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($players_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            //echo $uploaddir;exit;
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile'){
                echo "yes";
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
            if($players_model -> save()) {
                //Yii::app()->user->setFlash('success','添加成功');
                $this->redirect('players_image_edit_admin.php?players_id='.$players_model->players_id);
            }
         Yii::endProfile('addplayers');
        }
        
        $this ->renderPartial('add',array('players_model'=>$players_model),false,true);
    }
    
    function actionUpdate($id){
        $players_model = Players::model();  //除了添加(new Goods)数据我们都使用Goods::model()来实例化模型对象
        $players_info = $players_model -> findByPk($id);
        if(isset($_POST['Players'])){
            foreach($_POST['Players'] as $_k => $_v){
                $players_info -> $_k = $_v;
            }
            
            /*
             *pic upload test
             */
            $uploadedimage=CUploadedFile::getInstance($players_model, 'aimage');
            $uploaddir=Yii::app()->basePath . '/uploads/';
            //echo $uploaddir;exit;
            if(is_object($uploadedimage) && get_class($uploadedimage)==='CUploadedFile'){
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
                //$this -> redirect('./index.php?r=administrator/players/show');
                $this->redirect('players_image_edit_admin.php?players_id='.$players_info->players_id);
            }
        }
        $this ->renderPartial('update', array('players_model'=>$players_info));
    }
    
    function actionDel($id){
        //echo $id,"has deleted";exit;
        $id = $_GET['id'];
        //echo $id;exit;
        $players_model = Players::model(); //获得数据模型对象
        $players_info = $players_model -> findByPk($id);  //获得被删除商品的模型对象
        @unlink($players_info->players_big_img);
        @unlink($players_info->players_small_img);
        if($players_info->delete())
            $this -> redirect('./index.php?r=administrator/players/show');
     }
    
}
