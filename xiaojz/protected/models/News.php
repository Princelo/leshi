<?php
class News extends CActiveRecord{
    public $news_id;
    public $news_title;
    public $news_content;
    public $news_date;
    public $type;
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return '{{news}}';
    }
    
    public function rules() {
        return array(
            //array('news_name','required','message'=>'名称必填'),
        );
    }
    
    //对应标签名字
    function attributeLabels() {
        return array(
            'news_title'=>'文章标题',
            'news_content'=>'文章內容',
        );
    }
    
    function getPlayersInfoByPk($id){
        $info = Yii::app()->cache->get('news_info'.$id);//获得缓存信息
        //判断缓存信息有无
        if(!empty($info))
            return $info;
        $sql = "select * from {{news}} where news_id='$id'";
        $news_info = $this->findBySql($sql);
        //设置缓存
        Yii::app()->cache->set('news_info'.$id,$news_info,3600);
        return $news_info;
    }
}
