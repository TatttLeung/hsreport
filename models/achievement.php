<?php

class achievement extends BaseModel {
    public $news_content_temp = '';
    public function tableName() {
        return '{{projectcommit}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
          array('explain', 'required', 'message' => '{attribute} 不能為空'),
          array('file', 'required', 'message' => '{attribute} 不能為空'),
          array('explain,file','safe'),

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
        'explain'=>'说明',
        'file'=>'附件',
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
        return 'file';//缩略图要加这一个函数
    }

}
