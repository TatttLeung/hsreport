<?php

class ClubNewsSignListController extends BaseController {

    protected $model = '';
    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
    }
   public function actionDelete($id) { //ajax_status(1, '删除成功');
        parent::_clear($id);
    }

   public function actionIndex($school='',$scyear='',$term='',$keywords = '',$club_news_id=0,$oper='') {
    set_cookie('_currentUrl_', Yii::app()->request->url);
    $modelName = $this->model;
    $model = $modelName::model();
    $criteria = new CDbCriteria;
    $club_news_id=empty($club_news_id) ? 0 : $club_news_id;
    $w1=($club_news_id<=0) ? "f_chose=1" : ' f_chose=1 AND club_news_id='.$club_news_id;
    $w1=get_where( $w1,$scyear,'f_year',$scyear,'');
    $w1=get_where( $w1,$term,'f_term',$term,'');

    $criteria->condition=get_like($w1,'stname,f_level',$keywords,'');
  //  put_msg($criteria->condition);
    $criteria->order = 'f_level,f_class,scsnum';
        $data['xls'] =""; 
       if ($oper=='excel'){
          $data1=ClubNewsSignList::model()->findAll($w1.' order by f_level,f_class,scsnum');
          $this->toexcel($data1);
          $data['xls'] = save_excel_file(1);
        }
    parent::_list($model, $criteria,'index',$data);
    }
 
    public function actionListsclass($school='',$scyear='',$term='',$level='',$sclass='',$oper='null'){
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $s1= $sclass;
        get_school_resquest($school,$level,$sclass,$scyear,$term);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria->order = 'f_level,f_class,scsnum';
        if(indexof($s1,'(')>=0){
        if ((get_session('admin')==0)||(indexof($s1,'(')>=0)){
          $level=subsstr_hz($s1,0,2);
          $sclass=get_tclass($s1);
          }
        }
        if(empty($s1)) {
          $sclass=1000;
        }
        $w1=get_where( "f_chose=1",$scyear,'f_year',$scyear,'');
        $w1=get_where( $w1,$term,'f_term',$term,'');
        $w1=get_where( $w1,$level,'f_level',$level,"'");
        $criteria->condition=get_where( $w1,$sclass,'f_class',$sclass,'');
        $data = array();
         $w1=get_where( "SCHOOL='".$school."'",$scyear,'scyear',$scyear,'');
    $w1=get_where( $w1,$term,'scterm',$term,'');
    $w1=get_where( $w1,$level,'sclev',$level,"'");
    $w1=get_where( $w1,$sclass,'scclass',$sclass,'');
     $data['sclass_name_list']=Sclass::model()->findAll( $w1.' order by sclev,scclass,scsnum');
        $data['xls'] ="";
        $data['sign']=ClubNewsSignList::model()->get_class_marks($scyear,$term,$level,$sclass);
        
        if ($oper=='excel'){
          $data1=$data['sclass_name_list'];//$model->findALL( $criteria);
          $this->actionSavetoexcel($data1,$data['sign']);
          $data['xls'] = save_excel_file(1);
        }

        parent::_list($model, $criteria, 'listsclass',$data,30);

    }

  public function actionInputscore($club_news_id=0) {
    set_cookie('_currentUrl_', Yii::app()->request->url);
    $modelName = $this->model;
    $model = $modelName::model();
    $criteria = new CDbCriteria;
    $keywords="";
    if(empty($club_news_id)) $club_news_id=0;
    $criteria->condition=get_like('f_chose=1 and club_news_id='.$club_news_id,'stname,f_level',$keywords,'');
    $criteria->order = 'f_level,f_class,scsnum';
    if (isset($_POST['row_num'])){
        $this-> Savescore();
     }  
      $data = array();
    parent::_list($model, $criteria,'inputscore',$data,30);
    }

    public function actionTeacherscore($club_news_id=0) {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $keywords="";
        $criteria->condition=get_like('f_chose=1 and club_news_id='.$club_news_id,'stname,f_level',$keywords,'');
        $criteria->order = 'f_level,f_class,scsnum';
        if (isset($_POST['row_num'])){
            $this-> Savescore();
        }  
        $data = array();
        parent::_list($model, $criteria,'teacherscore',$data,30);
    }
    
       public function actionTeacherlate($club_news_id=0) {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $keywords="";
        $criteria->condition=get_like('club_news_id='.$club_news_id,'stname,f_level',$keywords,'');
        $criteria->order = 'f_level,f_class,scsnum';
        if (isset($_POST['row_num'])){
           Savelate();
        }  
        parent::_list($model, $criteria,'teacherlate');
    }

    public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        parent::_create($model, 'update', $data, get_cookie('_currentUrl_'));
    }

    public function actionteacherset() {
        $modelName = $this->model;

        parent::_list($model, $criteria,'teacherset');
    }

    public function actionUpdate($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $data = array();
        parent::_update($model, 'update', $data, get_cookie('_currentUrl_'));
    }

    public function Savescore() {
     $modelName = $this->model;   
     $rows=$_POST['row_num'];
     for($i=1;$i<=$rows;$i++){
       $model = $this->loadModel($_POST['id'.$i], $modelName);
       $model->f_mark=$_POST['f_mark'.$i];
       $model->save();
     }
    }

    public function actionSavelate() {
     $modelName = $this->model;
      $id="0";$value="";////
      if (isset($_REQUEST['id'])) { $id=$_REQUEST['id'];};
      if (isset($_REQUEST['value'])) { $value=$_REQUEST['value'];};
      $model= $modelName::model()->find("id='".$id."'");
      if(isset($model->id))
      if($model->id==$id){
         $model->f_late=$value;
         $model->save();
      }
      $data['ok'] ='ok';
      echo CJSON::encode($data);
    }

    public function actionSavestartend() {
     $modelName = $this->model;
      $id="0";$value="";$field="start";
      if (isset($_REQUEST['id'])) { $id=$_REQUEST['id'];};
      if (isset($_REQUEST['value'])) { $value=$_REQUEST['value'];};
      if (isset($_REQUEST['field'])) { $field=$_REQUEST['field'];};
      $model= $modelName::model()->find("id='".$id."' ");
      if(isset($model->id))
      if($model->id==$id){
        if($field=="start"){
         $model->f_start=1; $model->f_starttime=get_date();
       } else{
          $model->f_end=1; $model->f_endtime=get_date();
       
       }
         $model->save();
      }
      $data['ok'] ='ok';
      echo CJSON::encode($data);
    }


  public function Savedata($fieldname) {
     $modelName = $this->model;   
     $rows=$_POST['row_num'];
     for($i=1;$i<=$rows;$i++){
       $model = $this->loadModel($_POST['id'.$i], $modelName);
       $model[$fieldname]=$_POST[$fieldname.$i];
       $model->save();
     }
    }

    public function actionSavemark() {
      $modelName = $this->model;
      $id="0";$value="";////
      if (isset($_REQUEST['id'])) { $id=$_REQUEST['id'];};
      if (isset($_REQUEST['value'])) { $value=$_REQUEST['value'];};
      $model= $modelName::model()->find("id='".$id."'");
      if(isset($model->id))
      if($model->id==$id){
         $model->f_mark=$value;
         $model->save();
      }
      $data['ok'] ='ok';
      echo CJSON::encode($data);
    }


//学生报名选择，参数club_news->id,选择，CHOSE,学号stsnum
   public function actionSavechose() {
      $modelName = $this->model;
      $id="0";$value="";$stsnum=0;////
      if (isset($_REQUEST['id'])) { $id=$_REQUEST['id'];};
      if (isset($_REQUEST['chose'])) { $value=$_REQUEST['chose'];};
      if (isset($_REQUEST['stsnum'])) { $stsnum=$_REQUEST['stsnum'];};
     $model= $modelName::model()->find("club_news_id='".$id."' and stsnum=".$stsnum);
     if (empty($model->id)){
       $model = new $modelName();
       $model->isNewRecord = true;//
       } 
     $model->club_news_id=$id;
     $model->stsnum=$stsnum;
     $model->F_year=Yearsc();
     $model->f_term=Termbm();
     $model->f_chose=$value;
     unset($model->id);
     $model->save();
     $bm=ClubNews::model()->find("id='".$id."'");
     $data['sign_num'] =$bm->sign_num;
     $data['ok'] ='ok';
      echo CJSON::encode($data);
    }


//学生报名选择，参数club_news->id,选择，CHOSE,学号stsnum
   public function actionSavesign() {
      $modelName = $this->model;
      $id="0";$value="";$stsnum=0;////
      if (isset($_REQUEST['id'])) { $id=$_REQUEST['id'];};
      if (isset($_REQUEST['chose'])) { $value=$_REQUEST['chose'];};
      if (isset($_REQUEST['stsnum'])) { $stsnum=$_REQUEST['stsnum'];};
     $model= $modelName::model()->find("club_news_id='".$id."' and stsnum=".$stsnum);
 
     $model->club_news_id=$id;
     $model->stsnum=$stsnum;
     $model->f_chose=$value;
     unset($model->id);
     $model->save();
     $bm=ClubNews::model()->find("id='".$id."'");
     $data['sign_num'] =$bm->sign_num;
     $data['ok'] ='ok';
      echo CJSON::encode($data);
    }


public function actionSavetoexcel($data,$sign) {  
      $objectPHPExcel = new PHPExcel();
       $objectPHPExcel->setActiveSheetIndex(0);
        //报表头的输出
        $objectPHPExcel->getActiveSheet()->mergeCells('B1:J1');
        $objectPHPExcel->getActiveSheet()->setCellValue('B1','學生社會實踐名單');
   
        $objectPHPExcel->setActiveSheetIndex(0)->getStyle('B1')->getFont()->setSize(24);
        $objectPHPExcel->setActiveSheetIndex(0)->getStyle('B1')
          ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
   
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B2','日期：'.date("Y年m月j日"));
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('G2','第'.'頁');
        $objectPHPExcel->setActiveSheetIndex(0)->getStyle('G2')
          ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
           
        //表格頭的輸出
        $objectPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B3','年級');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(6.5);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('C3','班別');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('D3','學號');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('E3','姓名');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('F3','機構名稱');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('G3','活動主題');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('H3','身份證號');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
           $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('I3','出生日期');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
       $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('J3','手機號');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
       // $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('H3','成績');
        //$objectPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    
        $page_size = 52;
        
        $n = 4;
        foreach ( $data as $v ){

                 $id=$v->id;
                 $club_name="";$title="";$f_mark="";
                  foreach($sign as $v1){
                     if(($v1->stsnum==$v->STSNUM)){
                         $club_name=$v1->club_name;
                         $title=$v1->club_title;
                         $f_mark=$v1->f_mark;
                       }
                    } 
            $f_mark1="";
            if( $f_mark=='優秀') {  $f_mark1='20';}
            if( $f_mark=='良好') {  $f_mark1='18';}
            if( $f_mark=='一般') {  $f_mark1='15';}
            $objectPHPExcel->getActiveSheet()->setCellValue('B'.($n) ,$v->SCLEV);
            $objectPHPExcel->getActiveSheet()->setCellValue('C'.($n) ,$v->SCCLASS);
            $objectPHPExcel->getActiveSheet()->setCellValue('D'.($n) ,$v->SCSNUM);
            $objectPHPExcel->getActiveSheet()->setCellValue('E'.($n) ,$v->STNAME);
            $objectPHPExcel->getActiveSheet()->setCellValue('F'.($n) ,$v->club_name);
            $objectPHPExcel->getActiveSheet()->setCellValue('G'.($n) ,$title);
            $objectPHPExcel->getActiveSheet()->setCellValue('H'.($n) ,$v->STIDNO);
            $objectPHPExcel->getActiveSheet()->setCellValue('I'.($n) ,substr($v->STBORND,0,10));
            $objectPHPExcel->getActiveSheet()->setCellValue('J'.($n) ,$v->STPHONE);
         //
         //   $objectPHPExcel->getActiveSheet()->setCellValue('H'.($n) ,$f_mark1);
            $n+=1;
        
        
        }
    $objWriter = PHPExcel_IOFactory::createWriter($objectPHPExcel,'Excel5');
    $objWriter->save(save_excel_file());
  //  $this->redirect(array('public/downexcel'));
    //$objWriter->save ( "Excel/" . $excelName . ".xls" );
    //echo '<script language="javascript" type="text/javascript">window.top.window.stopUpload(1);</script>';
  }  

public function toexcel($data) {  
      $objectPHPExcel = new PHPExcel();
       $objectPHPExcel->setActiveSheetIndex(0);
        //报表头的输出
        $objectPHPExcel->getActiveSheet()->mergeCells('B1:G1');
        $objectPHPExcel->getActiveSheet()->setCellValue('B1','學生社會實踐报名名單');
   
        $objectPHPExcel->setActiveSheetIndex(0)->getStyle('B1')->getFont()->setSize(24);
        $objectPHPExcel->setActiveSheetIndex(0)->getStyle('B1')
          ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
   
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B2','日期：'.date("Y年m月j日"));
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('G2','第'.'頁');
        $objectPHPExcel->setActiveSheetIndex(0)->getStyle('G2')
          ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
           
        //表格頭的輸出
        $objectPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('B3','年級');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(6.5);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('C3','班別');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('D3','學號');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('E3','姓名');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('F3','機構名稱');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('G3','活動主題');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('H3','报名日期');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('I3','電話');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('J3','出生日期');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $objectPHPExcel->setActiveSheetIndex(0)->setCellValue('K3','身份證');
        $objectPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        
        $page_size = 52;
        
        $n = 4;
        foreach ( $data as $v ){
           $stm= Student::model()->find("stsnum=".$v->stsnum);
            $t1="";$t2="";$t3="";
            if (!empty($stm)){
               $t1=$stm->STMOBILE;$t2=$stm->STBORND;$t3=$stm->STIDN;
            }
            $objectPHPExcel->getActiveSheet()->setCellValue('B'.($n) ,$v->f_level);
            $objectPHPExcel->getActiveSheet()->setCellValue('C'.($n) ,$v->f_class);
            $objectPHPExcel->getActiveSheet()->setCellValue('D'.($n) ,$v->scsnum);
            $objectPHPExcel->getActiveSheet()->setCellValue('E'.($n) ,$v->stname);
            $objectPHPExcel->getActiveSheet()->setCellValue('F'.($n) ,$v->club_name);
            $objectPHPExcel->getActiveSheet()->setCellValue('G'.($n) ,$v->club_title);
            $objectPHPExcel->getActiveSheet()->setCellValue('H'.($n) ,$v->f_chosedate);
            $objectPHPExcel->getActiveSheet()->setCellValue('I'.($n) ,$t1);
            $objectPHPExcel->getActiveSheet()->setCellValue('J'.($n) ,$t2);
            $objectPHPExcel->getActiveSheet()->setCellValue('K'.($n) ,$t3);
          
            $n+=1;
        
        
        }
    $objWriter = PHPExcel_IOFactory::createWriter($objectPHPExcel,'Excel5');
    $objWriter->save(save_excel_file());

  }  
 

}
 