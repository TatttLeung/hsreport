<?php

class cstuinfo extends BaseModel {
    public function tableName() {
        return '{{coursestu}}';
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

    /**
     *    array('f_year,f_term,news_code,news_title,news_pic,news_content,club_id,news_introduction,news_date_start,news_date_end,state,reasons_for_failure,
            news_address,latitude,Longitude,
                ','safe'),
     * 模型關聯規則
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
        'courseterm'=>'学期',
        'courseid'=>'课程编码',
        'coursename'=>'课程名称',
        'stuid'=>'学号',
        'stuscore'=>'作业分数',
        'stugrade'=>'年级',
        'stuname'=>'学生姓名',



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

    public function picLabels() {
        return 'excelPath';//缩略图要加这一个函数
    }

}
