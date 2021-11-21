<?php

class ClubNewsSignList extends BaseModel {

    public function tableName() {
        return '{{clubnewssign}}';
    }

    /**
     * 模型驗證規則
     */
    public function rules() {
        return array(
             array('stsnum', 'required', 'message' => '{attribute} 不能為空'),
        //  array('stname', 'required', 'message' => '{attribute} 不能為空'),
    //      array('news_title', 'required', 'message' => '{attribute} 不能為空'),
       
            array('F_year,f_term,club_news_id,stsnum,f_chose,stname,f_chosedate,f_start,f_starttime,f_end,f_endtime','safe'),
        );
     //            array('club_id,club_news_id,F_year,f_level,f_class,scsnum,stsnum,stname,f_qr,
  //f_rand,f_chose,f_dist,Longitude,latitude,f_qrtime,f_chosedate,club_name,f_mark,','safe'),
   //     );
    }

    public function relations() {
        return array(  
        'club_newsr'=>array(self::HAS_ONE,'club_news','','on'=>'t.club_news_id=club_news.id'),  
       );  
    }

    /**
     * 屬性標簽
     */
    public function attributeLabels() {
        return array(
          'id' => 'ID',
          'club_id' => '機構',
          'club_news_id' => '活動ID',
          'f_year' =>'學年',
          'f_term' =>'學段',
          'f_level' => '年級',
          'f_class' => '班別',
          'scsnum' => '座號',
          'stsnum' => '學號',
          'stname' => '姓名',
          'f_xh' => '序號',
          'f_qr' => '確認',
          'f_rand' => '隨機數',
          'f_chose' => '選擇',
          'f_dist' => '規定點距離(m)',
          'Longitude' => '位置經度',
          'latitude' => '維度',
          'f_qrtime' => '確認時間',
          'f_chosedate' => '報名日期',
          'f_mark' => '成績',
          'club_name' => '機構名稱',
          'f_lateid' => '考勤',
          'f_latename' => '考勤',
          'f_late' => '考勤',
          'club_title' => '活動主題',
          'f_start' => '签到',
          'f_starttime' => '签到时间',
          'f_end' => '签退',
          'f_endtime' => '签退时间',
       
        );
    }

    /**
     * Returns the static model of the specified AR class.
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
  
  protected function beforeSave() {
        parent::beforeSave();
        return true;
    }
  
 public function get_sign_news($stsnum=0) {
  //'select' =>array('id','club_news_id','f_chose','f_qr'),
  $ep=array(
  'order' => 'club_news_id desc ',
  'condition' => 'f_chose=1 and F_year=2019 and f_term>=1 and stsnum= '. $stsnum);
  return $this->findAll($ep);
  }
  
  public function get_sign_news_late($stsnum=0) {
  //'select' =>array('id','club_news_id','f_chose','f_qr'),
  $ep=array(
  'order' => 'club_news_id desc ',
  'condition' => "f_chose=1 and f_year=2019 and f_term>=1 and left(f_mark,1)=' '  and stsnum= ". $stsnum);
  return $this->findAll($ep);
  }
  public function get_class_news($scyear,$term,$level,$sclass) {
  //'select' =>array('id','club_news_id','f_chose','f_qr'),
  //     if (get_session('admin')==0){
      
  $w1=get_where("f_chose=1 and scyear=".$scyear,$term,'scterm',$term,'');
  $w1=get_where( $w1,$level,'sclev',$level,"'");
  $w1=get_where( $w1,$sclass,'scclass',$sclass,'');
  $ep=array(
  'order' => 'club_news_id ',
  'condition' => 'f_chose=1 and stsnum= '. $stsnum);
  return $this->findAll($ep);
  }

  public function get_class_marks($scyear,$term,$level,$sclass,$mk=0) {
  //'select' =>array('id','club_news_id','f_chose','f_qr'),
  //     if (get_session('admin')==0){
  $w1="f_chose=1 and f_year=".$scyear;    
  if ($mk==1){
   $w1.= " and left(f_mark,1)<>' ' ";
  }
  if($term==2.5 || $term==4.5)
  {
    $term=$term-0.5;
     $w1.= " and (f_term= ".$term .' or f_term= '.($term-1) .')';

  }
    else {
   $w1=get_where($w1,$term,'f_term',$term,'');}
  
  $w1=get_where( $w1,$level,'f_level',$level,"'");
  $w1=get_where( $w1,$sclass,'f_class',$sclass,'');
  $ep=array(
  'order' => 'club_news_id ',
  'condition' => $w1);
  return $this->findAll($w1);
  }
}

