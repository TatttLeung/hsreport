<?php
//上传图片要改这里
use yii\validatoers;

class major extends BaseModel {

    public function tableName() {
        return '{{major}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
      
        return array(
      array('majorname,majorid','safe'), 
    );
    } 


    /**
     * 模型关联规则
     */
    public function relations() {
        return array(
     
    );
    }

    /**
     * 属性标签
     */
    public function attributeLabels() {
        return array(
      'id'=>'ID',
      'majorname'=>'专业名字',
      'majorid'=>'专业编码',
 );
}

    /**
     * Returns the static model of the specified AR class.
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
  
  

    public function getCode() {
        return $this->findAll('1=1');
    }
}
