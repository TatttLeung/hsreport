<?php

class Term extends BaseModel {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return '{{base_term}}';
    }
    /**
     * 模型验证规则
     */
    public function rules() {
        return array(
           array('F_CODE', 'required', 'message' => '{attribute} 不能为空'),
           array('F_NAME', 'required', 'message' => '{attribute} 不能为空'),
           array('F_value', 'safe'),
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
           'f_id' => 'ID',
            'F_CODE'=> '编码',
            'F_NAME'=> '名称',
            'F_value'=> '短名称',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     */
 

    protected function beforeSave() {
        parent::beforeSave();
	    return true;
    }

    public function name_to_term($PTERM){
       $RS=0;
       if($PTERM == "第一段") $RS=1;
       if($PTERM == "第二段") $RS=2;
       if($PTERM == "第三段") $RS=3;
       if($PTERM == "第四段") $RS=4;
       if($PTERM == "上學期") $RS=2.5;
       if($PTERM == "下學期") $RS=4.5;
       if($PTERM == "學年") $RS=5;
       if($PTERM == "毕业") $RS=6;
        return $RS;
    }
 
     public function term_to_name($PTERM){
       $RS="第一段";
       if($PTERM ==1) $RS= "第一段";
       if($PTERM ==2) $RS=  "第二段";
       if($PTERM ==3) $RS=  "第三段";
       if($PTERM ==4) $RS=  "第四段";
       if($PTERM ==2.5) $RS=  "上學期";
       if($PTERM ==4.5) $RS=  "下學期";
       if($PTERM ==5) $RS=  "學年";
       if($PTERM ==6) $RS=  "毕业";
        return $RS;
     }
      
     public function term_to_xh($PTERM){
       $RS=1;
       if($PTERM ==1) $RS= 1;
       if($PTERM ==2) $RS= 2;
       if($PTERM ==2.5) $RS=3;
       if($PTERM ==3) $RS= 4;
       if($PTERM ==4) $RS= 5;
       if($PTERM ==4.5) $RS=6;
       if($PTERM ==5) $RS=7;
       if($PTERM ==6) $RS=8;
       return $RS;
     } 
}
