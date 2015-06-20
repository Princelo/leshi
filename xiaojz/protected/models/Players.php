<?php
/**
 * 商品模型
 * 13-5-9 下午8:00 
 * 模型里边有两个关键方法，缺一不可
 * model()  创建一个模型的对象 ，是静态方法
 * tableName()  返回当前数据表的名字
 */
class Players extends CActiveRecord{
    public $players_name;
    public $players_introduce;
    public $players_create_time;
    public $players_big_img;
    public $players_small_img;
    public $players_id;
    public $aimage;
    public $image;
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return '{{players}}';
    }
    
    public function rules() {
        return array(
            //array('players_name','required','message'=>'商品名称必填'),
            array('image', 'file', 'allowEmpty'=>true,
            'types'=>'png',
            'maxSize'=>1024*1024*1,
            'tooLarge'=>'too large!',),
        );
    }
    
    //对应标签名字
    function attributeLabels() {
        return array(
            'players_name'=>'选手名称',
            'players_id'=>'选手ID',
            'players_votes'=>'所得票数',
            'players_big_img'=>'原始图片',
            'players_introduce'=>'选手简介',
            'players_small_img'=>'缩略图',
            'players_school'=>'学校班级',
            'players_parents'=>'监护人',
            'players_tel'=>'联系电话',
        );
    }
    
    /*function getPlayersInfoByPk($id){
        //把获得的具体详细商品信息存入缓存，下次再来获得信息就去缓存读取
        $info = Yii::app()->cache->get('players_info'.$id);//获得缓存信息
        
        //判断缓存信息有无
        if(!empty($info))
            return $info;
        
        $sql = "select * from {{players}} where players_id='$id'";
        $players_info = $this->findBySql($sql);

        //设置缓存
        Yii::app()->cache->set('players_info'.$id,$players_info,3600);
        
        return $players_info;
    }*/
}
