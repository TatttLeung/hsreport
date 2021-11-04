<?php

class base_num extends BaseModel {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return '{{base_num}}';
    }
    /**
     * 模型验证规则
     */
    public function rules() {
        return array(
           array('number', 'required', 'message' => '{attribute} 不能为空'),
           array('number', 'safe'),
        );
    }

    /**
     * 模型关联规则
     */
    public function relations() {
        return array(
        //'F_CODE' => array(self::HAS_MANY, 'MallBrandProject', 'brand_id'),
        //'qmdd_administrators' => array(self::BELONGS_TO, 'QmddAdministrators', 'f_user_id'),
            
        );
    }

    /**
     * 属性标签
     */
    public function attributeLabels() {
        return array(
           'id' => 'ID',
  'number'=> '值',

        );
    }

    /**
     * Returns the static model of the specified AR class.
     */
 

    protected function beforeSave() {
        parent::beforeSave();
        return true;
    }

}
