<?php
class Video extends CActiveRecord{
    public $video_date;
    public $video_category;
    public $video_id;
    public $video_pic;
    public $video_title;
    public $aimage;
    public $image;
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return '{{video}}';
    }
    
    public function rules() {
        return array(
            //array('video_name','required','message'=>'名称必填'),
            array('image', 'file', 'allowEmpty'=>true,
            'types'=>'jpg,jpeg,gif,png',
            'maxSize'=>1024*1024*1,
            'tooLarge'=>'too large!',),
        );
    }
    
    //对应标签名字
    function attributeLabels() {
        return array(
            'video_pic'=>'视频预览',
            'video_title'=>'视频标题',
            'video_category'=>'视频分类',
        );
    }
    
    function getVideoInfoByPk($id){
        $info = Yii::app()->cache->get('video_info'.$id);//获得缓存信息
        
        //判断缓存信息有无
        if(!empty($info))
            return $info;
        
        $sql = "select * from {{video}} where video_id='$id'";
        $video_info = $this->findBySql($sql);

        //设置缓存
        Yii::app()->cache->set('video_info'.$id,$video_info,3600);
        
        return $video_info;
    }
}
