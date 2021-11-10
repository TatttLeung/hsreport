<?php

class teaclass extends BaseModel {
    public $news_content_temp = '';
    public function tableName() {
        return '{{courseinfo}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
         // array('courseyear', 'required', 'message' => '{attribute} 不能為空'),
         // array('courseterm', 'required', 'message' => '{attribute} 不能為空'),
          array('courseteacher', 'required', 'message' => '{attribute} 不能為空'),
          array('coursename', 'required', 'message' => '{attribute} 不能為空'),
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
        //'courseyear'=>'学年',
        //'courseterm'=>'学期',
        'courseteacher'=>'课程教师',
        'coursename'=>'课程名称',
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
