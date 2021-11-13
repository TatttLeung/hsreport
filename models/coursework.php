<?php

class coursework extends BaseModel {
    public $news_content_temp = '';
    public function tableName() {
        return '{{coursework}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
          array('workyear', 'required', 'message' => '{attribute} 不能為空'),
          array('workterm', 'required', 'message' => '{attribute} 不能為空'),
          array('workid', 'required', 'message' => '{attribute} 不能為空'),
          array('workcourse', 'required', 'message' => '{attribute} 不能為空'),
          array('workname', 'required', 'message' => '{attribute} 不能為空'),
          array('workstart', 'required', 'message' => '{attribute} 不能為空'),
          array('workend', 'required', 'message' => '{attribute} 不能為空'),
          array('workcourseid', 'required', 'message' => '{attribute} 不能為空'),
          array('workteacher', 'required', 'message' => '{attribute} 不能為空'),
          array('worktype', 'required', 'message' => '{attribute} 不能為空'),
          array('workyear,workterm,workid,workname,workstart,workend,workcourse,workcourseid,workteacher,worktype','safe'),

           // array('f_year,f_term,news_title,news_content_temp','safe'),
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
        'workyear'=>'学年',
        'workterm'=>'学期',
        'workid'=>'作业序号',
        'workname'=>'作业名称',
        'workstart'=>'开始提交时间',
        'workend'=>'提交结束时间',
        'workcourse'=>'绑定课程',
        'workcourseid'=>'课程编码',
        'workteacher'=>'课程老师',
        'worktype'=>'作业类型',
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

    public function downSelect($form,$m,$atts,$onchange='',$noneshow=''){
     $data=$this->findAll('1 order by F_CODE');
     return BaseLib::model()->selectByData($form,$m,$atts,$data,'F_NAME',$onchange,$noneshow);
    }
}
