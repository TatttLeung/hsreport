<?php

class Projectcommit extends BaseModel {
    public function tableName() {
        return '{{Projectcommit}}';
    }
    public $excelPath="";

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(

          array('excelPath','safe'),
        );
    }

    
     /*模型關聯規則
     */
    public function relations() {
        return array(
           // 'club_list' => array(self::BELONGS_TO, 'ClubList', 'club_id'),
        );
    }

    /**
     * 屬性標簽
     */
    public function attributeLabels() {
        return array(
        'courseyear'=>'学年',
        'coursename'=>'课程名字',
        'coursescore'=>'学分',
        'courseteacher'=>'教师',
        'coursestunum'=>'已选人数',
        'courseclass'=>'班级组成',
        'coursetype'=>'课程性质',
        'courseleader'=>'任务完成人',
        'courseterm'=>'学期',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function afterFind() {
        parent::afterFind();
        return true;
    }

   
}
