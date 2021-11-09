<?php

class courseinfo extends BaseModel {
    public $news_content_temp = '';
    public $chose_name = '';
    public function tableName() {
        return '{{courseinfo}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
          array('courseid', 'required', 'message' => '{attribute} 不能為空'),
          array('coursename', 'required', 'message' => '{attribute} 不能為空'),
          array('courseteacher', 'required', 'message' => '{attribute} 不能為空'),
          array('coursetime', 'required', 'message' => '{attribute} 不能為空'),
          array('reportcnt', 'required', 'message' => '{attribute} 不能為空'),
          array('homeworkcnt', 'required', 'message' => '{attribute} 不能為空'),
          array('examcnt', 'required', 'message' => '{attribute} 不能為空'),
         // array('teaname', 'required', 'message' => '{attribute} 不能為空'),
          array('courseyear', 'required', 'message' => '{attribute} 不能為空'),
          array('courseterm', 'required', 'message' => '{attribute} 不能為空')
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
        'courseid'=>'课程编号',
        'coursename'=>'课程名称',
        'courseteacher'=>'课程教师',
        'coursetime'=>'课程时间',
        'reportcnt'=>'报告提交次数',
        'homeworkcnt'=>'作业提交次数',
        'examcnt'=>'考试次数',
        'courseyear'=>'学年',
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
        $this->chose_name=$this->courseteacher.'-'.$this->coursename;
        return true;
    } 

}
