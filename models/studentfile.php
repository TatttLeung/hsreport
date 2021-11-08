<?php

class studentfile extends BaseModel {
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
          array('cstuid', 'required', 'message' => '{attribute} 不能為空'),
          array('cstuname', 'required', 'message' => '{attribute} 不能為空'),
          array('ccoursename', 'required', 'message' => '{attribute} 不能為空'),
          array('cworkid', 'required', 'message' => '{attribute} 不能為空'),
          array('cpath', 'required', 'message' => '{attribute} 不能為空'),  
           array('worktype', 'required', 'message' => '{attribute} 不能為空'),   
          array('cyear,cterm,cstuid,cstuname,ccoursename,cworkid,cpath','safe'),
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
        'id'=>'ID',
        'cyear'=>'学年',
        'cterm' => '学期',
        'cstuid' =>'学号',
        'cstuname' =>'姓名',
        'ccoursename'=>'课程名称',
        'cworkid'=>'作业序号',
        'cpath'=>'提交文件',
        'cscore'=>'分数',
        'worktype'=>'分数',
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
        return 'cpath';//缩略图要加这一个函数
    }

}
