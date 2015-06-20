<?php
class Photo extends CActiveRecord{
    public $photo_create_time;
    public $photo_date;
    public $photo_category;
    public $photo_id;
    public $photo_big_img;
    public $photo_small_img;
    public $photo_desc;
    public $battle;
    public $aimage;
    public $image;
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return '{{photo}}';
    }
    
    public function rules() {
        return array(
            //array('photo_name','required','message'=>'名称必填'),
            array('aimage', 'file', 'allowEmpty'=>true,
            'types'=>'jpg,gif,png',
            'on'=>'update',
            'on'=>'insert',
            'maxSize'=>1024*1024*1,
            'tooLarge'=>'too large!',),
        );
    }
    
    //对应标签名字
    function attributeLabels() {
        return array(
            'photo_big_img'=>'相册大图',
            'photo_small_img'=>'相册缩略图',
            'photo_desc'=>'相册描述',
            'photo_category'=>'相片分类',
            'battle'=>'二级菜单',
        );
    }
    
    function getPlayersInfoByPk($id){
        //把获得的具体详细商品信息存入缓存，下次再来获得信息就去缓存读取
        $info = Yii::app()->cache->get('photo_info'.$id);//获得缓存信息
        
        //判断缓存信息有无
        if(!empty($info))
            return $info;
        
        $sql = "select * from {{photo}} where photo_id='$id'";
        $photo_info = $this->findBySql($sql);

        //设置缓存
        Yii::app()->cache->set('photo_info'.$id,$photo_info,3600);
        
        return $photo_info;
    }
}
