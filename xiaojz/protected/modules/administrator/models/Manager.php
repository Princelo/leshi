<?php
/**
 * 后天管理员数据模型manager
 * 13-5-21 下午9:05
 * 基本方法：
 * model()
 * tableName()
 * rules()
 * attributeLabels()
 */
class Manager extends CActiveRecord{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return '{{manager}}';
    }
    
    
}