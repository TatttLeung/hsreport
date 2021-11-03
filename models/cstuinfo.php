<?php

class cstuinfo extends BaseModel {
    public $news_content_temp = '';
    public function tableName() {
        return '{{workcommit}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
          array('cyear', 'required', 'message' => '{attribute} 不能為空'),
          array('cterm', 'required', 'message' => '{attribute} 不能為空'),
          array('ccourseid', 'required', 'message' => '{attribute} 不能為空'),
          array('cworkid', 'required', 'message' => '{attribute} 不能為空'),
          array('cstuname', 'required', 'message' => '{attribute} 不能為空'),
          array('cstuid', 'required', 'message' => '{attribute} 不能為空'),
          array('cpath', 'required', 'message' => '{attribute} 不能為空'),
          array('cscore', 'required', 'message' => '{attribute} 不能為空'),
          array('cstatus', 'required', 'message' => '{attribute} 不能為空'),
          array('copinion', 'required', 'message' => '{attribute} 不能為空'),
          array('ccoursename', 'required', 'message' => '{attribute} 不能為空'),
          array('ctime', 'required', 'message' => '{attribute} 不能為空'),

          array('cyear,cterm,ccourseid,cworkid,cstuname,cstuid,cpath,cscore,cstatus,copinion,ccoursename,ctime','safe'),
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
        'cyear'=>'学年',
        'cterm'=>'学期',
        'ccourseid'=>'课程编码',
        'cworkid'=>'作业序号',
        'cstuname'=>'学生姓名',
        'cstuid'=>'学号',
        'cpath'=>'作业路径',
        'cscore'=>'作业分数',
        'cstatus'=>'审核状态',
        'copinion'=>'审核意见',
        'ccoursename'=>'课程名称',
        'ctime'=>'审核时间',



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
