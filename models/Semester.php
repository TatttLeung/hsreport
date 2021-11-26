<?php

class Semester extends BaseModel {
   /**
     * Returns the static model of the specified AR class.
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{semester}}';
    }

    /**
     * 模型验证规则
     */
    public function rules() {
        return array(
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
		'F_ID' => 'ID',
        'F_school' => '学校',
        'F_YEAR'  =>  '学年',
        'F_TERM'  =>  '学段',
        'F_SEMESTER' =>'学期名称',
        'f_date1'  => '学段开始日期',
        'f_date2' => '结束日期' ,
        'f_weeks'  =>'学周数' ,
        'F_DATEC1' => '学段开始日期',
        'F_DATEC2'  => '结束日期',
        );
    }

   public function get_term(&$pyear,&$term) {
     $term=1;
     $pyear=date("Y");
     $tmp=$this->model()->find('f_date1<=now() and now()<=f_date2');
     if ($tmp->F_YEAR){
         $pyear=$tmp->F_YEAR;
         $term=$tmp->F_TERM;
     }
    }

    public function getYear() {
     $pyear=date("Y");
     $tmp=$this->model()->find('f_date1<=now() and now()<=f_date2');
     if (!$tmp){
         $pyear=2021;//$tmp->F_YEAR;
     }
     $pyear=2021;
     return $pyear;
    }
   
   public function getTerm() {
     $term=1;
   //  $tmp=$this->model()->find('f_date1<=now() and now()<=f_date2');
    // if ($tmp->F_YEAR){
    //     $term=$tmp->F_TERM;
    // }
     return $term;
    }
}
