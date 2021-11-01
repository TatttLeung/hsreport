<?php

class stuinfo extends BaseModel {
    public $news_content_temp = '';
    public function tableName() {
        return '{{stuinfo}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
          array('stuid', 'required', 'message' => '{attribute} 不能為空'),
          array('stuname', 'required', 'message' => '{attribute} 不能為空'),
          array('stusex', 'required', 'message' => '{attribute} 不能為空'),
          array('stugrade', 'required', 'message' => '{attribute} 不能為空'),
          array('stumajor', 'required', 'message' => '{attribute} 不能為空')
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
        'stuid'=>'学生学号',
        'stuname'=>'学生姓名',
        'stusex'=>'学生性别',
        'stugrade'=>'学生年级',
        'stumajor'=>'学生专业',
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
