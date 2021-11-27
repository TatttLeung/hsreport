<?php

class ClubNews extends BaseModel {
    public $news_content_temp = '';
    public function tableName() {
        return '{{club_news}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
          array('f_year', 'required', 'message' => '{attribute} 不能為空'),
          array('f_term', 'required', 'message' => '{attribute} 不能為空'),
          array('news_title', 'required', 'message' => '{attribute} 不能為空'),
          array('news_introduction', 'required', 'message' => '{attribute} 不能為空'),
          array('sign_date_start', 'required', 'message' => '{attribute} 不能為空'),
          array('sign_date_end', 'required', 'message' => '{attribute} 不能為空'),
      
          array('news_title,news_pic,news_content,club_id,news_date_start,news_date_end,news_club_name,
            news_address,latitude,Longitude,sign_date_start,sign_date_end,f_year,f_term,club_list,
            sign_max,sign_num,state,reasons_for_failure','safe'),

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
        'no' => '序号',
        'f_year' =>'学年',
        'f_term' =>'学段',
        'news_code'=>'编码',
        'news_title'=>'标题',
        'news_pic'=>'封面图',
        'news_type'=>'信息类型',
        'news_type_name'=>'信息类型',
        'news_introduction'=>'內容简介',
        'news_content'=>'信息內容',
        'news_content_temp' => '信息內容',
        'club_id'=>'机构',
        'news_clicked'=>'点击量',
        'collection_num'=>'报名限额',
        'version'=>'版本号',
        'order_num'=>'序号',
        'news_date_start'=>'上线日期',
        'news_date_end'=>'上线结束',
        'uDate'=>'更新时间',
        'state'=>'状态',
        'reasons_for_failure'=>'未过原因',
        'state_qmddid'=>'审核员',
        'state_time'=>'审核时间',
        'if_del'=>'下架',
        'club_list'=>'推荐到机构',
        'project_list'=>'項目',
        'latitude' => '纬度',
        'Longitude' => '经度',
        'sign_dist'  =>  '签到距离米',
        'news_address' => '活动地址',
        'sign_date_start' => '活动日期',
        'sign_date_end'  =>  '活动报名结束',
        'sign_max'  =>  '最多人数',
        'sign_num' =>  '报名人数',
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
        $this->news_content_temp = $this->news_content;
        return true;
    } 

    protected function beforeSave() {
        parent::beforeSave();
        // 圖文描述處理

        $this->uDate = date('Y-m-d H:i:s');  
        return true;
    }
 
 public function getClubnews() {
      $club_id=get_session('club_id');
      $club=($club_id<=1) ?'(1=1)' : 'club_id='.$club_id;
  //    put_msg($club);
      return $this->findAll($club.' and f_year='.Yearsc().'  and f_term>='.Termsc().' order by id desc ');
    }  

  public function get_chose_news($club_id=0) {

      $club=($club_id==-10) ?' ' : ' and ( club_id='.$club_id. " OR CONCAT(',',trim(club_list),',') like '%,".$club_id.",%')";
      put_msg('is_online=1 and f_year='.Yearsc().'  and f_term>='.Termsc().' and now()<sign_date_end '. $club);
      return $this->findAll('is_online=1 and f_year='.Yearsc().'  and f_term>='.Termsc().' and now()<sign_date_end '. $club);
     // return $this->findAll('is_online=1 and sign_date_start<=now() and now()<sign_date_end '. $club);
    }
  public function get_all_news($club_id=0) {
      $club=($club_id==0) ?' ' : ' and ( club_id='.$club_id. " OR CONCAT(',',trim(club_list),',') like '%,".$club_id.",%')";
      return $this->findAll('is_online=1 and f_year='.Yearsc().'  and f_term>='.Termsc());
     // return $this->findAll('is_online=1 and sign_date_start<=now() and now()<sign_date_end '. $club);
    }

      public function get_all_news_year($club_id=0) {
      $club=($club_id==0) ?' ' : ' and ( club_id='.$club_id. " OR CONCAT(',',trim(club_list),',') like '%,".$club_id.",%')";
      return $this->findAll('is_online=1 and f_year='.Yearsc().'  and f_term>='.Termsc());
     // return $this->findAll('is_online=1 and sign_date_start<=now() and now()<sign_date_end '. $club);
    }

    public function picLabels() {
        return 'news_pic';
    }
}
