<?php

class teainfo extends BaseModel {
    public $news_content_temp = '';
    public function tableName() {
        return '{{teainfo}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
          //array('f_year', 'required', 'message' => '{attribute} 不能為空'),
          //array('f_term', 'required', 'message' => '{attribute} 不能為空'),
/*          array('news_title', 'required', 'message' => '{attribute} 不能為空'),
          array('news_introduction', 'required', 'message' => '{attribute} 不能為空'),
          array('sign_date_start', 'required', 'message' => '{attribute} 不能為空'),
          array('sign_date_end', 'required', 'message' => '{attribute} 不能為空'),*/
          array('teaname', 'required', 'message' => '{attribute} 不能為空'),
          array('teasex', 'required', 'message' => '{attribute} 不能為空'),
          array('teadep', 'required', 'message' => '{attribute} 不能為空'),
          array('tealevel', 'required', 'message' => '{attribute} 不能為空'),
      
          array('news_title,news_pic,news_content,club_id,news_date_start,news_date_end,news_club_name,
            news_address,latitude,Longitude,sign_date_start,sign_date_end,club_list,
            sign_max,sign_num','safe'),

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
        'id'=>'ID',
        //'f_year' =>'学年',
        //'f_term' =>'学段',
        'teaname' => '教师姓名',
        'teasex' => '教师性别',
        'teadep' => '教师院系',
        'tealevel' => '教师职称',
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
